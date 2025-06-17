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
     * Display the sections and lectures for a given Autoformation.
     *
     * @param  int  $autoformationId
     * @return \Illuminate\View\View
     */
    public function sections($autoformationId)
    {
        // Get the logged-in apprenant
        $apprenant = Auth::guard('apprenant')->user();
        // Find the apprenant's formateur (teacher) by groupe_id
        $formateur = \App\Models\Formateur::where('groupe_id', $apprenant->groupe_id)->first();
        // Only allow access if the autoformation belongs to this formateur
        $autoformation = Autoformation::with('tutoriels')
            ->where('id', $autoformationId)
            ->where('formateur_id', $formateur->id)
            ->firstOrFail();

        // 2. Retrieve the logged-in Apprenant ID directly
        $apprenantId = $apprenant->id;

        // Although middleware should handle this, add a check for safety
        // this is not important i can remove it cuz i have middleware 
        if (!$apprenantId) {
             // This should ideally not be reached if middleware is active and correct
            abort(403, 'Authentication required.'); // Or redirect to a login page
        }

        // 3. Retrieve the Apprenant's RealisationTutoriel records for this autoformation
        //    Join through RealisationAutoformation to filter by autoformation_id and apprenant_id
        //    Key the results by tutoriel_id for easy lookup.
        $realisationTutoriels = RealisationTutoriel::whereHas('realisationAutoformation', function ($query) use ($autoformationId, $apprenantId) {
            $query->where('autoformation_id', $autoformationId)
                  ->where('apprenant_id', $apprenantId); // Use the ID directly
        })->get()->keyBy('tutoriel_id');

        // 4. Builds a $sections array by mapping each Tutoriel (using the updated relationship name)
        $sections = $autoformation->tutoriels->map(function ($tutoriel) use ($realisationTutoriels) {
            $realisation = $realisationTutoriels->get($tutoriel->id);

            return [
                'id'              => $tutoriel->id, // Tutoriel ID
                'realisation_id'  => $realisation->id ?? null, // RealisationTutoriel ID (will be null if no realisation)
                'title'           => $tutoriel->title, // Assuming Tutoriel model has a 'title' attribute
                'contenu'         => $tutoriel->contenu ?? null, // Assuming Tutoriel model has a 'contenu' attribute
                'ordre'           => $tutoriel->ordre ?? null, // Assuming Tutoriel model has an 'ordre' attribute
                'etat'            => $realisation->etat ?? 'not_started', // Default status if no realisation found
                'github_link'     => $realisation->github_link ?? null,
                // Add an editable flag if needed, based on status or user role
                // 'editable'      => $realisation ? ($realisation->etat === 'encours') : false,
            ];
        })->sortBy('ordre'); // Sort sections by their order

        // 5. Passes the Autoformation and the $sections array to the Blade view
        return view('Apprenant.courses.sections', compact('autoformation', 'sections'));
    }

    /**
     * Show the form for editing a specific tutorial realisation.
     *
     * @param  int  $autoformationId
     * @param  int  $tutorialId
     * @return \Illuminate\View\View
     */

    public function editRealisation($autoformationId, $tutorialId)
    {
        $apprenant = Auth::user();

        // Find or create the RealisationAutoformation for this student and autoformation
        $realisationAutoformation = RealisationAutoformation::firstOrCreate(
            ['apprenant_id' => $apprenant->id, 'autoformation_id' => $autoformationId],
            ['status' => 'En cours'] // Set a default status if creating
        );

        // Find or create the RealisationTutoriel for this specific tutorial
        $realisation = RealisationTutoriel::firstOrCreate(
            [
                'realisation_autoformation_id' => $realisationAutoformation->id,
                'tutoriel_id' => $tutorialId,
                'apprenant_id' => $apprenant->id // Add apprenant_id here
            ],
            ['etat' => 'Non commencé'] // Set a default status if creating
        );

        // Load the related Tutoriel and Autoformation for the view
        $tutoriel = Tutoriel::findOrFail($tutorialId);
        $autoformation = Autoformation::findOrFail($autoformationId);

        // Pass the found or created realisation and related data to the view
        return view('Apprenant.courses.edit_realisation', compact('realisation', 'autoformation', 'tutoriel'));
    }

    public function getRealisation($realisationId)
    {
        $realisation = RealisationTutoriel::findOrFail($realisationId);
        return response()->json($realisation);
    }

    public function storeRealisation(Request $request)
    {
        $validated = $request->validate([
            'tutorial_id' => 'required|exists:tutoriels,id',
            'etat' => 'required|in:Non commencé,En cours,Terminé,Abandonné',
            'notes' => 'nullable|string',
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
            'etat' => 'required|in:Non commencé,En cours,Terminé,Abandonné',
            'notes' => 'nullable|string',
            'github_link' => 'nullable|url',
        ]);

        $realisation->update($validated);

        return response()->json($realisation);
    }

    // TODO: Add other methods for course interaction (e.g., viewing lecture details)
} 