@extends('app')
@section('content')
<div id="app">
    <div class="row mb-3">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Details de l'élève</h3>
        </div>
    </div>

    <div class="card">
        <div class="row justify-content-center col-lg-12 grid-margin stretch-card">
            <div class="col-xxl-6 col-lg-8 col-sm-10">
                <div class="edit-profile__body mx-lg-20">
                    <form>
                        <div class="form-group mb-20">
                            <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px; margin: 0 auto;">
                                <img src="{{ asset($eleve->photo) }}" alt="image" class="img-fluid w-100 h-100">
                            </div>
                        </div>
                        <div class="form-group mb-20">
                            <label for="nomComplet">Nom complet</label>
                            <input type="text" class="form-control" id="nomComplet" value="{{ $eleve->nomComplet }}" readonly>
                        </div>
                        <div class="form-group mb-20">
                            <label for="dateNaissance">Date de naissance</label>
                            <input type="text" class="form-control" id="dateNaissance" value="{{ \Carbon\Carbon::parse($eleve->date_naissance)->format('d-m-Y') }}" readonly>
                        </div>
                        <div class="form-group mb-20">
                            <label for="lieuNaissance">Lieu de naissance</label>
                            <input type="text" class="form-control" id="lieuNaissance" value="{{ $eleve->lieu_naissance }}" readonly>
                        </div>
                        <div class="form-group mb-20">
                            <label for="nationalite">Nationalité</label>
                            <input type="text" class="form-control" id="nationalite" value="{{ $eleve->nationalite }}" readonly>
                        </div>
                        <div class="form-group mb-20">
                            <label for="niveau">Niveau</label>
                            <input type="text" class="form-control" id="niveau" value="{{ $eleve->niveau }}" readonly>
                        </div>
                        <!-- Ajoutez d'autres champs en fonction de vos besoins -->

                        <div class="button-group d-flex justify-content-start pt-30 mb-15">
                            <a href="{{ route('edit_eleve', ['id' => $eleve->id]) }}" class="btn btn-warning btn-default btn-squared fw-400 text-capitalize mr-2">Modifier </a>
                            <a href="{{ route('eleve_delete', ['id' => $eleve->id]) }}" class="btn btn-danger btn-default btn-squared fw-400 text-capitalize mr-2">Supprimer</a>
                            <a href="{{ route('liste_eleves') }}" class="btn btn-light btn-default btn-squared fw-400 text-capitalize">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
