@extends('Professeur.AcceuilProf')
@section('AbsenceActive', 'active')
@section('title', 'List Des étudiant')



@section('the-home-content')

    <style>
        .insert-student-notes-btn {
            float: right;
        }

        .project-list-table {
            border-collapse: separate;
            border-spacing: 0 12px
        }

        .project-list-table tr {
            background-color: #fff;


        }

        .table-nowrap td,
        .table-nowrap th {
            white-space: nowrap;
        }

        .table-borderless>:not(caption)>*>* {
            border-bottom-width: 0;
        }

        .table>:not(caption)>*>* {
            padding: 0.75rem 0.75rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .avatar-sm {
            height: 2rem;
            width: 2rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }

        img,
        svg {
            vertical-align: middle;
        }

        a {
            color: #3b76e1;
            text-decoration: none;
        }

        .badge-soft-danger {
            color: #f56e6e !important;
            background-color: rgba(245, 110, 110, .1);
        }

        .badge-soft-success {
            color: #63ad6f !important;
            background-color: rgba(99, 173, 111, .1);
        }

        .badge-soft-primary {
            color: #3b76e1 !important;
            background-color: rgba(59, 118, 225, .1);
        }

        .badge-soft-info {
            color: #57c9eb !important;
            background-color: rgba(87, 201, 235, .1);
        }

        .avatar-title {
            align-items: center;
            background-color: #3b76e1;
            color: #fff;
            display: flex;
            font-weight: 500;
            height: 100%;
            justify-content: center;
            width: 100%;
        }

        .bg-soft-primary {
            background-color: rgba(59, 118, 225, .25) !important;
        }
    </style>
    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Absence du jour</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Professeur / </li>
                            <li class="breadcrumb-active">Noter l'absence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-group-form">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <select class="form-control" id="jour">
                            <option value="0">--Sélectionez un jour--</option>
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                            <option value="Vendredi">Vendredi</option>

                        </select>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <select name="niveau" id="niveau" class="form-control" onchange="getGroups()">
                            <option value="0" disabled selected hidden>Sélectionez Un Niveaux</option>
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
                        <select class="form-control" id="group">
                            <option value="0">--Sélectionez Un Group--</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary" onclick="searchEtu()">Recherche</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const jour = document.getElementById('jour');
            const group = document.getElementById('group');
            const niveau = document.getElementById('niveau');
            function searchEtu(){
                if (jour.value != '0' && group.value != '0' && niveau.value != '0'){
                    window.location.href = '/Prossefeur/Absence/'+jour.value+'/'+niveau.value+'/'+group.value;
                }
            }
        </script>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title" >Fiche d'absence</h3>
                                </div>

                            </div>
                        </div>
                        <div class="container">

                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('absences.store') }}" method="POST" id="myform">
                                        @csrf
                                    <div class="table-responsive">

                                            <table
                                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                                <thead class="student-thread">
                                                    <tr>

                                                        <th>ID</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Absent</th>
                                                        <th>En retard</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($students as $stu)
                                                    <tr>
                                                        <td>{{ $stu->id_etudiant }}</td>
                                                        <td>{{ $stu->nom }}</td>
                                                        <td>{{ $stu->prenom }}</td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="absence[{{ $stu->id_etudiant }}]" value="absent" class="form-check-input" id="absent-{{ $stu->id_etudiant }}" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="absence[{{ $stu->id_etudiant }}]" value="retard" class="form-check-input" id="retard-{{ $stu->id_etudiant }}" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                    </div>

                                    <div class="col-4 insert-student-notes-btn py-2 text-end">
                                        <div class="Annuler d-inline">
                                            <button type="btn" class="btn btn-danger mx-2" >Annuler</button>
                                        </div>
                                        <script>
                                            function fF(){
                                                iziToast.question({
                                                    timeout: 20000,
                                                    close: false,
                                                    overlay: true,
                                                    displayMode: 'once',
                                                    id: 'question',
                                                    zindex: 999,
                                                    title: 'Notes',
                                                    message: 'Sauvegarder l\'Absence ?',
                                                    position: 'center',
                                                    buttons: [
                                                        ['<button><b>Oui</b></button>', function (instance, toast) {
                                                            document.getElementById('myform').submit();
                                                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                                                        }, true],
                                                        ['<button>Annuler</button>', function (instance, toast) {
                                                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');

                                                        }],
                                                    ],
                                                    onClosing: function (instance, toast, closedBy) {
                                                        console.info('Closing | closedBy: ' + closedBy);
                                                    },
                                                    onClosed: function (instance, toast, closedBy) {
                                                        console.info('Closed | closedBy: ' + closedBy);
                                                    }
                                                });
                                            }

                                        </script>
                                        <div class="insert d-inline" >
                                            <div  class="btn btn-primary" onclick="fF()" >Enregister</div>
                                        </div>

                                    </div>
                                    </form>
                                </div>
                            </div>
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
