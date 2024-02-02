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
                @include('messages')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom complet</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Nationnalité</th>
                                <th>Niveau</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getEleves as $eleve)
                            <tr>
                                <td class="py-1">
                                    <img src="{{ asset($eleve->photo) }}" alt="image">
                                </td>
                                <td>{{ $eleve->nomComplet }}</td>
                                <td>{{ \Carbon\Carbon::parse($eleve->date_naissance)->format('d-m-Y') }}</td>
                                <td>{{ $eleve->lieu_naissance }}</td>
                                <td>{{ $eleve->nationalite }}</td>
                                <td>{{ $eleve->niveau }}</td>
                                <td>
                                    <!-- Action Edit -->
                                    <a href="{{ route('edit_eleve', ['id' => $eleve->id]) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
                                    {{-- <a href="{{ route('liste_eleves') }}"  class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('eleve_delete', ['id' => $eleve->id]) }}')"><i class="mdi mdi-delete"></i></a> --}}
                                    <a href="{{ route('eleve_delete', ['id' => $eleve->id]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(deleteUrl) {
        if (confirm('Voulez-vous vraiment supprimer cet élève ?')) {
            // Créez une requête DELETE avec Fetch API
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors de la suppression');
                }
                // Redirigez ou mettez à jour la page après la suppression
                // window.location.reload(); // ou autre action
            })
            .catch(error => {
                console.error('Erreur:', error.message);
            });
        }
    }
</script>

@endsection
