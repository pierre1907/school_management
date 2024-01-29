@extends('app')

@section('content')


<div class="row mb-3">
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
      <h3 class="font-weight-bold">Ajout d'un élève</h3>
    </div>
</div>
<div class="card">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- Formulaire d'ajout d'élève -->
                <form method="post" action="{{ route('ajouter_eleve') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <!-- Champs pour les informations de l'élève -->
                    <div class="form-group">
                        <label for="exampleInputPhoto">Photo</label>
                        <input type="file" name="photo" class="file-upload-default" id="exampleInputPhoto" style="display: none;" onchange="updateFileName(this)">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Ajoutez l'image" id="photoFileName">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('exampleInputPhoto').click();">Charger</button>
                            </span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Nom complet de l'élève">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Genre</label>
                        <select class="form-control" name="genre" id="exampleSelectGender">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDOB">Date de naissance</label>
                        <input type="date" name="date_naissance" class="form-control" id="exampleInputDOB">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPOB">Lieu de naissance</label>
                        <input type="text" name="lieu_naissance" class="form-control" id="exampleInputPOB" placeholder="Lieu de naissance">
                    </div>
                    <div class="form-group">
                        <label for="exampleNationality">Nationalité</label>
                        <select class="form-control" name="nationalite" id="exampleNationality">
                            @foreach($countries as $country)
                                <option>{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputClass">Classe</label>
                        <input type="text" name="classe" class="form-control" id="exampleInputClass" placeholder="Classe de l'élève">
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleInputLevel">Niveau</label>
                        <select class="form-control" name="niveau" id="exampleInputLevel">
                            @foreach($levels as $level)
                                <option>{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Autres champs du formulaire (ajoutez-les au besoin) -->

                    <!-- Boutons de soumission et d'annulation -->
                    <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                    <a href="{{ route('liste_eleves') }}" class="btn btn-light">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- <script>
     const inputPhoto = document.getElementById('exampleInputPhoto');

     inputPhoto.addEventListener('change', function() {
        const fileName = inputPhoto.files[0].name;
        const fileInputInfo = document.getElementById('photoFileName');
        fileInputInfo.placeholder = fileName;
    });
</script> --}}

<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        var placeholderInput = document.getElementById('photoFileName');
        placeholderInput.value = fileName;
    }
</script>
