<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;


class EleveController extends Controller
{
    //

    public function liste_eleves()
    {
        $header_title = "Liste des élèves";
        $eleves = Eleve::all(); // Récupération de tous les élèves depuis la base de données
        return view('pages.eleve.eleves', compact('header_title', 'eleves'));
    }
    // public function liste_eleves(){
    //     $header_title = "Liste des élèves";
    //     return view('pages.eleve.eleves')->with('header_title', $header_title);
    // }

     // Afficher le formulaire d'ajout d'élève
    public function ajoutElevesForm()
    {
        $countries = ['Nigeria', 'Ghana', 'Sénégal', 'Mali', 'Côte d\'Ivoire', 'Burkina Faso', 'Niger', 'Togo', 'Bénin', 'Liberia'];
        $levels = ['Licence 1', 'Licence 2', 'Licence 2', 'Master 1', 'Master 2'];


        return view('pages.eleve.ajoutEleve', compact('countries', 'levels'));
    }

     // Traitement du formulaire d'ajout d'élève
     public function ajoutEleves(Request $request)
     {
         // Validation des données
         $request->validate([
             'nom' => 'required|string|max:255',
             'genre' => 'required|in:homme,femme',
             'date_naissance' => 'required|date',
             'lieu_naissance' => 'required|string|max:255',
             'nationalite' => 'required|string|in:Nigeria,Ghana,Sénégal,Mali,Côte d\'Ivoire,Burkina Faso,Niger,Togo,Bénin,Liberia',
             'niveau' => 'required|string|in:Licence 1,Licence 2,Licence 3, MBA 1, MBA 2',
             'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

         try {
             // Enregistrement d'un nouvel élève
             $eleve = new Eleve();
             $eleve->nom = $request->input('nom');
             $eleve->genre = $request->input('genre');
             $eleve->date_naissance = $request->input('date_naissance');
             $eleve->lieu_naissance = $request->input('lieu_naissance');
             $eleve->nationalite = $request->input('nationalite');
             $eleve->classe = $request->input('classe');
             $eleve->niveau = $request->input('niveau');


             if ($request->hasFile('photo')) {
                 $imagePath = $request->file('photo')->store('photos', 'public');
                 $eleve->photo = $imagePath;
             }
             dd($eleve);

             $eleve->save();

             // Redirection vers la liste des élèves après l'ajout
             return redirect()->route('liste_eleves')->with('success', 'Élève ajouté avec succès.');
         } catch (\Exception $e) {
             // Gestion des erreurs
             dd($e);
             return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de l\'ajout de l\'élève. Veuillez réessayer.']);
         }
     }

}
