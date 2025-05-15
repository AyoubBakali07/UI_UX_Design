<?php

namespace App\Http\Controllers;

use App\Models\Tuto;
use App\Models\Formation;
use App\Models\Realisation;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'contenu' => 'required|string',
            'duree' => 'required|integer|min:1',
            'formation_id' => 'required|exists:formations,id',
            'autoformation_id' => 'required|exists:autoformations,id'
        ]);
        
        $tutorial = Tuto::create($validated);
        
        return redirect()->back()
            ->with('success', 'Tutorial created successfully.');
    }
    
    public function update(Request $request, Tuto $tutorial)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'contenu' => 'required|string',
            'duree' => 'required|integer|min:1'
        ]);
        
        $tutorial->update($validated);
        
        return redirect()->back()
            ->with('success', 'Tutorial updated successfully.');
    }
    
    public function destroy(Tuto $tutorial)
    {
        $tutorial->delete();
        
        return redirect()->back()
            ->with('success', 'Tutorial deleted successfully.');
    }
    
    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'tutorial_id' => 'required|exists:tutos,id',
            'status' => 'required|in:not_started,in_progress,completed'
        ]);
        
        $student = auth()->user()->apprenant;
        
        // Create or update realisation
        Realisation::updateOrCreate(
            [
                'apprenant_id' => $student->id,
                'tuto_id' => $validated['tutorial_id']
            ],
            [
                'status' => $validated['status'],
                'date_realisation' => now()
            ]
        );
        
        return response()->json(['message' => 'Status updated successfully']);
    }
} 