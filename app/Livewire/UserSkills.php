<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;

class UserSkills extends Component
{
    public $user;
    public $selectedLanguages = [];

    public function mount()
    {
        $this->user = Auth::user()->load('languages'); // Assuming 'languages' is a relationship defined in the User model
    }

    public function setLanguage($language)
    {
        $user = auth()->user();
        $user->language = $language;
        $user->save();
    
        session()->flash('message', 'Language updated successfully.');
    }
    
    public function toggleLanguage($language)
    {
        $user = auth()->user();

        if ($user->language === $language) {
            $user->language = null; // Uncheck if the same language is clicked
        } else {
            $user->language = $language;
        }

        $user->save();

        // Update the user property to reflect changes in the UI
        $this->user = Auth::user()->load('languages');

    }

    public function render()
    {
        return view('livewire.user-skills');
    }
    
}