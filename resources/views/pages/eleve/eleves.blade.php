@extends('app')
@section('content')
<div id="app">
    <div class="row mb-3">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Liste des élèves</h3>
        </div>

        <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
                <a href="{{ route('ajout_eleve') }}" class="btn btn-primary"><i class="mdi mdi-account-plus"></i> Ajouter un élève</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom</th>
                                <th>Prénom(s)</th>
                                <th>Date de naissance</th>
                                <th>Classe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eleves as $eleve)
                            <tr>
                                <td class="py-1">
                                    <img src="{{ $eleve->photo }}" alt="image">
                                </td>
                                <td>{{ $eleve->nom }}</td>
                                <td>{{ $eleve->prenom }}</td>
                                <td>{{ $eleve->date_naissance }}</td>
                                <td>{{ $eleve->classe }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Import Vue.js -->
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<script>
    new Vue({
        el: '#app',
        data: {
            eleves: [
                { nom: 'Herman', prenom: 'Beck', date_naissance: '15 Mai, 2015', classe: 'Maths', image: '../../images/faces/face1.jpg' },
                { nom: 'Messsy', prenom: 'Adam', date_naissance: '1 Juillet, 2015', classe: 'Français', image: '../../images/faces/face2.jpg' },
                // Ajoutez plus d'élèves ici...
            ]
        }
    });
</script> --}}
@endsection
