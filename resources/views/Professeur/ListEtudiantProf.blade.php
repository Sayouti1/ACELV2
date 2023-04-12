@extends('Professeur.AcceuilProf')
@section('EtudiantActive', 'active')
@section('title', 'List Des étudiant')



@section('the-home-content')
    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">List des étudiants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Etudiants / </li>
                            <li class="breadcrumb-active">List des étudiants</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-group-form"><form method="post" action="{{ route('profListEtudiant.search') }}">
                @csrf
            <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nomEt" placeholder="Chercher par Nom ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <select name="niveau" class="form-control" onchange="getGroups()">
                                <option value="hidden-opt" disabled selected hidden>Sélectionez Un Niveaux</option>
                                @foreach ($listeNiveau as $niv)
                                    <option value="{{ $niv->id_niveau }}">
                                        {{ $niv->libele }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <select class="form-control" id="group" name="groupe">
                                <option value="0">--Sélectionez Un Group--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="submit" class="btn btn-primary">Recherche</button>
                    </div>
                </div>

            </div></form>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Etudiants</h3>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>ID</th>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Classe</th>
                                        <th class="text-center">Date de naissance</th>
                                        <th class="text-center">Télephone</th>
                                        <th class="text-center">Adresse</th>
                                    </tr>
                                </thead>
                                <tbody style="font-family: 'Poppins', sans-serif">
                                    @foreach ($etudiants as $etudiant)
                                        <tr>
                                            <td>{{ $etudiant->id_etudiant }}</td>
                                            <td class="text-center">{{ $etudiant->nom.' '.$etudiant->prenom }}
                                            </td>
                                            <td class="text-center">{{$etudiant->nlibele.' '.$etudiant->glibele}}</td>
                                            <td class="text-center">{{ $etudiant->date_naissaince }}</td>
                                            <td class="text-center">{{ $etudiant->telephone }}</td>
                                            <td class="text-center">{{ $etudiant->adresse }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function getGroups() {
            var level_id = document.querySelector('select[name="niveau"]').value;
            var group_select = document.getElementById('group');

            // Clear existing options
            group_select.innerHTML = '<option value="">--Sélectionez Un Group--</option>';

            $.ajax({
                url: "/get-groups-by-levels/" + level_id,
                type: "GET",
                success: function(response) {
                    // Use the parsed response directly
                    var groups = response;
                    console.log(groups);
                    for (var i = 0; i < groups.length; i++) {
                        var option = document.createElement('option');
                        option.text = groups[i].libele;
                        option.value = groups[i].id_group;
                        group_select.add(option);
                    }
                },
                error: function(xhr) {
                    // Handle the error if the request fails
                    console.log(xhr.responseText);
                }
            });
        }
    </script>

@endsection
