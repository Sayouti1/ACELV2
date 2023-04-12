@extends('Admin.admin')

@section('title', 'Nouveau étudiant')

@section('AjouterEtudiantActive', 'active')

@section('the-home-content')
    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Demandes d'inscription</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Etudiants / </li>
                            <li class="breadcrumb-active">Preinscription</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(session('mailsent'))
            <script>
                iziToast.success({
                    title: 'OK',
                    message: '{{ session('mailsent') }}',
                });
            </script>
        @endif
        @if(session('maildelete'))
            <script>
                iziToast.success({
                    title: 'OK',
                    message: '{{ session('maildelete') }}',
                });
            </script>
        @endif
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
                                        <th>Prénom</th>
                                        <th>Nom</th>
                                        <th>Date de naissance</th>
                                        <th>Ecole Actuelle</th>
                                        <th>Nom Tuteur</th>
                                        <th>Prénom Tuteur</th>
                                        <th>Télephone Tuteur</th>
                                        <th>Classe envisagée</th>
                                        <th class="text-end">Accepter</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($preinscr as $et)
                                    <tr>
                                        <td>
                                            {{$et->nom_eleve}}
                                        </td>


                                        <td>{{$et->prenom_eleve}}</td>
                                        <td>{{$et->date_naissance}}</td>
                                        <td>{{$et->ecole_actuel}}</td>
                                        <td>{{$et->prenom_parent}}</td>
                                        <td>{{$et->nom_parent}}</td>
                                        <td>{{$et->telephone_parent}}</td>
                                        <td>{{$et->class_envisage}}</td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="javascript:;" onclick="acceptMail('{{$et->email_parent}}')" style="color:green"
                                                    class="btn btn-sm bg-success-light me-2">
                                                    <i class="fa-regular fa-circle-check"></i>
                                                </a>
                                                <a href="javascript:;" onclick="refuseMail('{{$et->email_parent}}')"  style="color:red"
                                                    class="btn btn-sm bg-danger-light">
                                                    <i class="fa-regular fa-circle-xmark"></i>
                                                </a>

                                            </div>
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
    </div>
    <script>
        function acceptMail(mail){
            window.location.href = `/mail/${mail}`;
        }
        function refuseMail(mail){
            window.location.href = `/refusemail/${mail}`;
        }

    </script>

@endsection
