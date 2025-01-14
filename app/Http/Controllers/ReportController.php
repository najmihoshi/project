<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    // Show the form for creating a new report
    public function create()
    {
        return view('reports.create');
    }

    // Store a newly created report in the database
    public function store(Request $request)
    {
        $request->validate([
            'mahallah' => 'required',
            'block' => 'required',
            'compartment' => 'required',
            'issue_type' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('proofs', 'public'); // Store in public/proofs
        }

        // Create a new report
        Report::create([
            'user_id' => auth()->id(), // Associate the report with the logged-in user
            'mahallah' => $request->mahallah,
            'block' => $request->block,
            'compartment' => $request->compartment,
            'issue_type' => $request->issue_type,
            'description' => $request->description,
            'image_path' => $imagePath, // Save the image path
            'status' => 'Pending', // Default status
        ]);

        return redirect()->route('profile')->with('success', 'Report lodged successfully!');
    }
    
    // Show the edit form for a report
    public function edit($id)
    {
        $report = Report::findOrFail($id);

        // Ensure the user can only edit their own reports
        if ($report->user_id !== Auth::id()) {
            return redirect()->route('profile')->with('error', 'You are not authorized to edit this report.');
        }

        return view('reports.edit', compact('report'));
    }

    // Update a report
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        // Ensure the user can only update their own reports
        if ($report->user_id !== Auth::id()) {
            return redirect()->route('profile')->with('error', 'You are not authorized to update this report.');
        }

        $request->validate([
            'mahallah' => 'required',
            'block' => 'required',
            'compartment' => 'required',
            'issue_type' => 'required',
            'description' => 'required',
        ]);

        $report->update($request->all());

        return redirect()->route('profile')->with('success', 'Report updated successfully!');
    }

    // Delete a report
    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        // Ensure the user can only delete their own reports
        if ($report->user_id !== Auth::id()) {
            return redirect()->route('profile')->with('error', 'You are not authorized to delete this report.');
        }

        $report->delete();

        return redirect()->route('profile')->with('success', 'Report deleted successfully!');
    }
}