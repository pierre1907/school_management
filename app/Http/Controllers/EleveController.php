<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;


class EleveController extends Controller
{
    //

    public function liste_eleves()
    {
        $getEleves = Eleve::getEleves();
        $header_title = "Liste des élèves";
        //$eleves = Eleve::all();

        return view('pages.eleve.eleves', ['header_title' => $header_title, 'getEleves' => $getEleves]);
    }

    public function ajoutElevesForm()
    {
        $countries = ['Nigeria', 'Ghana', 'Sénégal', 'Mali', 'Côte d\'Ivoire', 'Burkina Faso', 'Niger', 'Togo', 'Bénin', 'Liberia'];
        $levels = ['Licence 1', 'Licence 2', 'Licence 2', 'Master 1', 'Master 2'];
        return view('pages.eleve.ajoutEleve', compact('countries', 'levels'));
    }

      public function ajoutEleves(Request $request)
     {
        try {
             $eleve = new Eleve;
            $eleve->nomComplet = trim($request->nomComplet);
            $eleve->genre = trim($request->genre);
            $eleve->date_naissance = trim($request->date_naissance);
            $eleve->lieu_naissance = trim($request->lieu_naissance);
            $eleve->nationalite = trim($request->nationalite);
            $eleve->niveau = trim($request->niveau);
            $eleve->user_type = "eleve";
            $eleve->is_deleted = 0;
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('photos', 'public');
                $eleve->photo = 'public/storage/' . $imagePath;
            }
            $eleve->save();
            return redirect()->route('liste_eleves')->with('success', 'Élève ajouté avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de l\'ajout de l\'élève. Veuillez réessayer.']);
        }
    }


    //edit
    public function editElevesForm($id)
    {
        $eleve = Eleve::find($id);

        $countries = ['Nigeria', 'Ghana', 'Sénégal', 'Mali', 'Côte d\'Ivoire', 'Burkina Faso', 'Niger', 'Togo', 'Bénin', 'Liberia'];
        $levels = ['Licence 1', 'Licence 2', 'Licence 2', 'Master 1', 'Master 2'];
        return view('pages.eleve.editEleve', compact('countries', 'levels', 'eleve'));
    }


    public function modifier(Request $request, $id)
    {
        try {
             $eleve = Eleve::find($id);

             if (!$eleve) {
                return redirect()->back()->withInput()->withErrors(['error' => 'Élève non trouvé']);
            }

             $eleve->nomComplet = trim($request->nomComplet);
            $eleve->genre = trim($request->genre);
            $eleve->date_naissance = trim($request->date_naissance);
            $eleve->lieu_naissance = trim($request->lieu_naissance);
            $eleve->nationalite = trim($request->nationalite);
            $eleve->niveau = trim($request->niveau);

             if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('photos', 'public');
                $eleve->photo = 'public/storage/' . $imagePath;
            }

            // Sauvegarder les modifications
            $eleve->save();

            return redirect()->route('liste_eleves')->with('success', 'Élève modifié avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de la modification de l\'élève. Veuillez réessayer.']);
        }
    }


    //delete
    public function delete($id)
    {
        try {
            $eleve = Eleve::getSingle($id);
            $eleve->is_delete = 1;
            $eleve->save();

            // Supprimer l'élève
            //$eleve->delete();

            return redirect()->route('liste_eleves')->with('success', 'Élève supprimé avec succès.');
        } catch (\Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            return redirect()->route('liste_eleves')->with('error', 'Une erreur est survenue lors de la suppression de l\'élève. Veuillez réessayer.');
        }
    }

}
