<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    // Display the admin page
    public function index(Request $request)
    {
        $mahallah = $request->get('mahallah', 'Ali');
        $reports = Report::where('mahallah', $mahallah)->get();
        return view('admin', compact('reports', 'mahallah'));
    }

    // Show the edit form for a report
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('admin.edit', compact('report'));
    }

    // Update a report
    public function update(Request $request, $id)
    {
        $request->validate([
            'mahallah' => 'required',
            'block' => 'required',
            'compartment' => 'required',
            'issue_type' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $report = Report::findOrFail($id);
        $report->update($request->all());

        return redirect()->route('admin')->with('success', 'Report updated successfully!');
    }

    // Delete a report
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('admin')->with('success', 'Report deleted successfully!');
    }

    public function checkAdmin()
{
    // Check if the user is an admin
    if (Auth::check() && Auth::user()->role === 'admin') {
        // Redirect to the admin page
        return redirect()->route('admin');
    }

    // Return a response indicating access denied
    return response()->json(['access' => 'denied'], 403);
}
}