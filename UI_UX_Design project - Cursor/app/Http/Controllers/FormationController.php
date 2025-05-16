<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with(['autoformations'])->latest()->paginate(12);
        return view('formations.index', compact('formations'));
    }

    public function create()
    {
        return view('formations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'niveau' => 'required|in:debutant,intermediaire,avance'
        ]);

        $validated['instructor_id'] = auth()->id();
        
        Formation::create($validated);
        
        return redirect()->route('formations.index')
            ->with('success', 'Course created successfully.');
    }

    public function show(Formation $formation)
    {
        $formation->load(['autoformations.tutos', 'instructor']);
        return view('formations.show', compact('formation'));
    }

    public function edit(Formation $formation)
    {
        $this->authorize('update', $formation);
        return view('formations.edit', compact('formation'));
    }

    public function update(Request $request, Formation $formation)
    {
        $this->authorize('update', $formation);
        
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'niveau' => 'required|in:debutant,intermediaire,avance'
        ]);
        
        $formation->update($validated);
        
        return redirect()->route('formations.show', $formation)
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Formation $formation)
    {
        $this->authorize('delete', $formation);
        
        $formation->delete();
        
        return redirect()->route('formations.index')
            ->with('success', 'Course deleted successfully.');
    }
} 