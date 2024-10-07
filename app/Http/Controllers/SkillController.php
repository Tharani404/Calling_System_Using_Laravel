<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    
    public function index()
    {
        
        $languages = Language::all(); // Fetch all languages
        return view('roles-permissions-users.usersetting.manageskills', compact('languages'));
    }

    public function create()
    {
        return view('roles-permissions-users.usersetting.skills');
    }


    public function store(Request $request)
    {
        $request->validate([
            'skill' => 'required|string|max:255', // Assuming you're treating 'skill' as the language name.
            
        ]);

        $language = new Language();
        $language->skill = $request->skill;
        $language->save();

        return redirect('/setting')->with('success', 'Language created successfully');

    }

    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('roles-permissions-users.usersetting.edit_skill', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
        ]);

        $language = Language::findOrFail($id);
        $language->skill = $request->skill;
        $language->save();

        return redirect('/setting')->with('success', 'Language updated successfully');
    }

    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect('/setting')->with('success', 'Language deleted successfully');
    }
}
