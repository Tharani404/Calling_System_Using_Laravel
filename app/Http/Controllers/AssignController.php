<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $users = User::all();
        $selectedUser = null;

        return view('roles-permissions-users.usersetting.assign', compact('users', 'languages'));   
    }

    public function store(Request $request)
    {
        $request->validate([
            'languages' => 'required|array',
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->languages()->sync($request->languages); // Sync the selected languages with the user

        // return redirect('/assign')->with('success', 'Language assigned successfully');

        return redirect()->back()->with([
            'success' => 'Languages assigned successfully.',
            'selectedUser' => $user->load('languages') // Load languages relationship
        ]);



    }

}
