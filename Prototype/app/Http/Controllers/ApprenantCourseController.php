<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutoriel;
use App\Models\Autoformation;
use App\Models\RealisationTutoriel;
use App\Models\RealisationAutoformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApprenantCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:apprenant');
    }

    /**
     * Display a listing of all courses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the logged-in apprenant
        $apprenant = Auth::guard('apprenant')->user();
        // Find the apprenant's formateur (teacher) by groupe_id
        $formateur = \App\Models\Formateur::where('groupe_id', $apprenant->groupe_id)->first();
        // Get only autoformations of this formateur
        $allCourses = \App\Models\Autoformation::where('formateur_id', $formateur->id)->get();
        return view('Apprenant.courses.index', compact('allCourses'));
    }

    /**
     * Show the form for editing a specific tutorial realisation.
     *
     * @param  int  $autoformationId
     * @param  int  $tutorialId
     * @return \Illuminate\View\View
     */

    // public function editRealisation($autoformationId, $tutorialId)
    // {
    //     $apprenant = Auth::user();

    //     // Find or create the RealisationAutoformation for this student and autoformation
    //     $realisationAutoformation = RealisationAutoformation::firstOrCreate(
    //         ['apprenant_id' => $apprenant->id, 'autoformation_id' => $autoformationId],
    //         ['status' => 'En cours'] // Set a default status if creating
    //     );

    //     // Find or create the RealisationTutoriel for this specific tutorial
    //     $realisation = RealisationTutoriel::firstOrCreate(
    //         [
    //             'realisation_autoformation_id' => $realisationAutoformation->id,
    //             'tutoriel_id' => $tutorialId,
    //             'apprenant_id' => $apprenant->id // Add apprenant_id here
    //         ],
    //         ['etat' => 'Non commencé'] // Set a default status if creating
    //     );

    //     // Load the related Tutoriel and Autoformation for the view
    //     $tutoriel = Tutoriel::findOrFail($tutorialId);
    //     $autoformation = Autoformation::findOrFail($autoformationId);

    //     // Pass the found or created realisation and related data to the view
    //     return view('Apprenant.courses.edit_realisation', compact('realisation', 'autoformation', 'tutoriel'));
    // }

    public function getRealisation($realisationId)
    {
        $realisation = RealisationTutoriel::findOrFail($realisationId);
        return response()->json($realisation);
    }

    public function storeRealisation(Request $request)
    {
        $validated = $request->validate([
            'tutorial_id' => 'required|exists:tutoriels,id',
            'etat' => 'required|in:Non commencé,En cours,Terminé',
            // 'notes' => 'nullable|string',
            'github_link' => 'nullable|url',
        ]);

        $apprenant = Auth::user();
        $tutorialId = $validated['tutorial_id'];

        // Find the Autoformation ID associated with this tutorial
        $tutoriel = Tutoriel::findOrFail($tutorialId);
        $autoformationId = $tutoriel->autoformation_id; // Assuming Tutoriel model has autoformation_id

        // Find or create the RealisationAutoformation for this student and autoformation
        $realisationAutoformation = RealisationAutoformation::firstOrCreate(
            ['apprenant_id' => $apprenant->id, 'autoformation_id' => $autoformationId],
            ['status' => 'En cours'] // Set a default status if creating
        );

        // Create the RealisationTutoriel, linking it to the RealisationAutoformation
        $realisation = RealisationTutoriel::create([
            'apprenant_id' => $apprenant->id,
            'realisation_autoformation_id' => $realisationAutoformation->id,
            'tutoriel_id' => $tutorialId,
            'etat' => $validated['etat'],
            'github_link' => $validated['github_link'] ?? null,
        ]);

        return response()->json($realisation, 201);
    }

    public function updateRealisation(Request $request, $realisationId)
    {
        $realisation = RealisationTutoriel::findOrFail($realisationId);

        $validated = $request->validate([
            'etat' => 'required|in:Non commencé,En cours,Terminé',
            // 'notes' => 'nullable|string',
            'github_link' => 'nullable|url',
        ]);

        $realisation->update($validated);

        return response()->json($realisation);
    }

}
