{{--
@extends('Admin.admin')

@section('title', 'Modifier Emploi Du Temps')

@section('ListeProfesseursActive', 'active')

@section('the-home-content')
    <div class="home-content px-3 pt-4" id="myDiv" style="font-family:roboto,sans-serif;">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Ajouter Une Séance</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Emploi Du Temps</li>
                            <li class="breadcrumb-item active">Ajouter Une Séance</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span></span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Id Professeur <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom<span class="login-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Class <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Matière <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text"
                                                placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Heure Début <span class="login-danger">*</span></label>
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Heure Fin <span class="login-danger">*</span></label>
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}
@extends('Admin.admin')

@section('title', 'Modifier Emploi Du Temps')

@section('ListeProfesseursActive', 'active')

@section('the-home-content')
    <div class="home-content px-3 pt-4" id="myDiv" style="font-family:roboto,sans-serif;">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Ajouter Une Séance</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Emploi Du Temps</li>
                            <li class="breadcrumb-item active">Ajouter Une Séance</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <script>
                    iziToast.success({
                        title: 'OK',
                        message: '{{ session('success') }}',
                    });
                </script>
            @endif

            @if(session('classOccupe'))
                <div class="alert alert-danger">
                    {{ session('classOccupe') }}
                </div>
            @endif

            @if(session('profOccupe'))
                <div class="alert alert-danger">
                    {{ session('profOccupe') }}
                </div>
            @endif


            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/emploi_du_temps/AjouterLaSeance') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span></span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Niveau <span class="login-danger">*</span></label>
                                            <select name="niveau" class="form-control" onchange="getGroups()">
                                                <option value="hidden-opt" disabled selected hidden>Sélectionez Un Niveaux
                                                </option>
                                                @foreach ($listeNiveau as $niv)
                                                    <option value="{{ $niv->id_niveau }}">
                                                        {{ $niv->libele }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Group <span class="login-danger">*</span></label>
                                            <select name="id_group" class="form-control" id="group">
                                                <option value="">--Sélectionez Un Group--</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Matiere <span class="login-danger">*</span></label>
                                            <select name="id_matiere" class="form-control" onchange="getProfs()">
                                                @foreach ($matieres as $niv)
                                                    <option value="{{ $niv->id_matiere }}">
                                                        {{ $niv->libele }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Professeur <span class="login-danger">*</span></label>
                                            <select name="id_prof" class="form-control" id="professeur">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Jour <span class="login-danger">*</span></label>
                                            <select class="form-control" name="jour" id="jour">
                                                <option value="Lundi">Lundi</option>
                                                <option value="Mardi">Mardi</option>
                                                <option value="Mercredi">Mercredi</option>
                                                <option value="Jeudi">Jeudi</option>
                                                <option value="Vendredi">Vendredi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Séance <span class="login-danger">*</span></label>
                                            <select class="form-control" name="seance" id="seance">
                                                <option value="1">8:30 - 10:00</option>
                                                <option value="2">10:30 - 12:00</option>
                                                <option value="3">14:30 - 16:00</option>
                                                <option value="4">16:30 - 18</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header my-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Supprimer Une Séance</h3>

                    </div>
                </div>
            </div>
            <div class="row">
                @if(session('seanceSupprime'))
                    <script>
                        iziToast.success({
                            title: 'OK',
                            message: '{{ session('seanceSupprime') }}',
                        });
                    </script>
                @endif
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/emploi_du_temps/supprimerSeance') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span></span></h5>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Niveau <span class="login-danger">*</span></label>
                                            <select name="niveau1" class="form-control" onchange="getGroups1()">
                                                <option value="hidden-opt" disabled selected hidden>Sélectionez Un Niveaux </option>
                                                @foreach ($listeNiveau as $niv)
                                                    <option value="{{ $niv->id_niveau }}">
                                                        {{ $niv->libele }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Group <span class="login-danger">*</span></label>
                                            <select class="form-control" name="group1" id="group1">
                                                <option value="">--Sélectionez Un Group--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Jour <span class="login-danger">*</span></label>
                                            <select class="form-control" name="jour" id="jour">
                                                <option value="Lundi">Lundi</option>
                                                <option value="Mardi">Mardi</option>
                                                <option value="Mercredi">Mercredi</option>
                                                <option value="Jeudi">Jeudi</option>
                                                <option value="Vendredi">Vendredi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Séance <span class="login-danger">*</span></label>
                                            <select class="form-control" name="seance" id="seance">
                                                <option value="1">8:30 - 10:00</option>
                                                <option value="2">10:30 - 12:00</option>
                                                <option value="3">14:30 - 16:00</option>
                                                <option value="4">16:30 - 18</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-danger">Libérer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                url: "/get-groups-by-level/" + level_id,
                type: "GET",
                success: function(response) {
                    // Use the parsed response directly
                    var groups = response;
                    console.log(groups);
                    for (var i = 0; i < groups.length; i++) {
                        var option = document.createElement('option');
                        option.text = groups[i].libele;
                        option.value = groups[i].id_group;
                        console.log(groups[i].id_group);
                        group_select.add(option);
                    }
                },
                error: function(xhr) {
                    // Handle the error if the request fails
                    console.log(xhr.responseText);
                }
            });
        }
        function getGroups1() {
            var level_id = document.querySelector('select[name="niveau1"]').value;
            var group_select = document.getElementById('group1');
            // Clear existing options
            group_select.innerHTML = '<option value="">--Sélectionez Un Group--</option>';

            $.ajax({
                url: "/get-groups-by-level/" + level_id,
                type: "GET",
                success: function(response) {
                    // Use the parsed response directly
                    var groups = response;
                    console.log(groups);
                    for (var i = 0; i < groups.length; i++) {
                        var option = document.createElement('option');
                        option.text = groups[i].libele;
                        option.value = groups[i].id_group;
                        console.log(groups[i].id_group);
                        group_select.add(option);
                    }
                },
                error: function(xhr) {
                    // Handle the error if the request fails
                    console.log(xhr.responseText);
                }
            });
        }
        function getProfs() {
            var matiere_id = document.querySelector('select[name="id_matiere"]').value;
            var group_select = document.getElementById('professeur');
            group_select.innerHTML = '';

            $.ajax({
                url: "/get-professeurs-by-matiere/" + matiere_id,
                type: "GET",
                success: function(response) {
                    // Use the parsed response directly
                    var profs = response;
                    console.log(profs);
                    for (var i = 0; i < profs.length; i++) {
                        var option = document.createElement('option');
                        option.text = profs[i].nom+' '+profs[i].prenom;
                        option.value = profs[i].id_prof;
                        console.log(profs[i].id_prof);
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
