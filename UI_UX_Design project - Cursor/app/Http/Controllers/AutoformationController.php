<?php

namespace App\Http\Controllers;

use App\Models\Autoformation;
use App\Models\Formation;
use Illuminate\Http\Request;

class AutoformationController extends Controller
{
    public function index()
    {
        $autoformations = Autoformation::with(['formation'])
            ->latest()
            ->paginate(12);
            
        return view('autoformations.index', compact('autoformations'));
    }

    public function create()
    {
        $formations = Formation::where('instructor_id', auth()->id())->get();
        return view('autoformations.create', compact('formations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'niveau' => 'required|in:debutant,intermediaire,avance',
            'duree' => 'required|integer|min:1',
            'formation_id' => 'required|exists:formations,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);

        $formation = Formation::findOrFail($validated['formation_id']);
        $this->authorize('update', $formation);

        Autoformation::create($validated);

        return redirect()->route('formations.show', $formation)
            ->with('success', 'Module created successfully.');
    }

    public function show(Autoformation $autoformation)
    {
        $autoformation->load(['formation', 'tutos']);
        return view('autoformations.show', compact('autoformation'));
    }

    public function edit(Autoformation $autoformation)
    {
        $this->authorize('update', $autoformation->formation);
        $formations = Formation::where('instructor_id', auth()->id())->get();
        return view('autoformations.edit', compact('autoformation', 'formations'));
    }

    public function update(Request $request, Autoformation $autoformation)
    {
        $this->authorize('update', $autoformation->formation);

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'niveau' => 'required|in:debutant,intermediaire,avance',
            'duree' => 'required|integer|min:1',
            'formation_id' => 'required|exists:formations,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);

        $autoformation->update($validated);

        return redirect()->route('autoformations.show', $autoformation)
            ->with('success', 'Module updated successfully.');
    }

    public function destroy(Autoformation $autoformation)
    {
        $this->authorize('update', $autoformation->formation);
        
        $formation = $autoformation->formation;
        $autoformation->delete();

        return redirect()->route('formations.show', $formation)
            ->with('success', 'Module deleted successfully.');
    }
} 