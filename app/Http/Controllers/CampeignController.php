<?php

namespace App\Http\Controllers;

use App\Models\Campeign;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CampeignController extends Controller
{
    public function index()
    {
        $campeign = Campeign::all();
        return view('roles-permissions-users.campeign.campeign', compact('campeign'));
    }

    public function create()
    {
        return view('roles-permissions-users.campeign.createCampeign');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'type' => 'required|string',
        ]);

        $campeigns = new Campeign();
        $campeigns->name = $request->name;
        $campeigns->type = $request->type;
        $campeigns->save();

        return redirect('/campeign')->with('success', 'Campaign created successfully');
    }

    public function edit($id)
    {
        $campeigns = Campeign::findOrFail($id);
        return view('roles-permissions-users.campeign.editCampeign', compact('campeigns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            
            'name' => 'required|string|max:255', 
            'type' => 'required|string',
        ]);

        $campeigns = Campeign::findOrFail($id);
        $campeigns->name = $request->name;
        $campeigns->type = $request->type;
        $campeigns->save();

        return redirect('/campeign')->with('success', 'Campaign updated successfully');
    }

    public function destroy($id)
    {
        $campeigns = Campeign::findOrFail($id);
        $campeigns->delete();

        return redirect('/campeign')->with('success', 'Campaign deleted successfully');
    }


    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls|max:2048', // Validate file type and size
            'campaign_id' => 'required|exists:campeign,id',
        ]);

        if ($request->hasFile('file')) {
            Excel::import(new CampaignImport, $request->file('file'));
            return redirect()->back()->with('success', 'File imported successfully.');
        }

        return redirect()->back()->with('error', 'Please upload a valid Excel file.');
    }
}