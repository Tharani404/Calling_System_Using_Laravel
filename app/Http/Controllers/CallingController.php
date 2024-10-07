<?php

namespace App\Http\Controllers;

use view;
use App\Models\Campeign;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class CallingController extends Controller
{
    public $skills = [];



    public function toggleSkill($userId, $skill)
    {
        if (!isset($this->skills[$userId])) {
            $this->skills[$userId] = [];
        }

        if (($key = array_search($skill, $this->skills[$userId])) !== false) {
            unset($this->skills[$userId][$key]);
        } else {
            $this->skills[$userId][] = $skill;
        }
    }

    public function index()
    {
        $campeign = Campeign::all();
        return view('roles-permissions-users.calling.index', compact('campeign'));

    }

    

    // public function updateCampaign(Request $request)
    // {
    //     $user = Auth::user();
    //     $selectedCampaignId = $request->input('campeign');
    //     $selectedCampaign = Campeign::find($selectedCampaignId);

    //     // Store the selected campaign in the user's session or save it to the user model
    //     if ($selectedCampaign) {
    //         $user->selected_campaign = $selectedCampaign->name; // Assuming 'name' is the campaign name
    //         $user->save();
    //     }

    //     return back(); // Or wherever you need to redirect
    // }


    // public function saveCampaign(Request $request)
    // {
    //     // Validate the request
    //     $validated = $request->validate([
    //         'campaign' => 'required|exists:campaigns,id', // Assuming you are saving a campaign id
    //     ]);

    //     // Save the selected campaign to the database for the logged-in user
    //     $user = auth()->user();
    //     $user->campaign_id = $request->campaign; // Assuming the user model has a campaign_id column
    //     $user->save();

    //     // Redirect back or show a success message
    //     return redirect()->back()->with('success', 'Campaign selected successfully!');
    // }


    public function updateCampaign(Request $request)
    {
        $user = auth()->user();
        $user->campaign_id = $request->input('campaign_id');
        $user->save();

        return redirect()->back()->with('success', 'Campaign updated successfully!');
    }


}
