@extends('Admin.admin')

@section('title', 'List Professeurs')

@section('ListeProfesseursActive','active')

@section('the-home-content')
    <style>
        .project-list-table {
            border-collapse: separate;
            border-spacing: 0 12px
        }

        .project-list-table tr {
            background-color: #fff
        }

        .table-nowrap td, .table-nowrap th {
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
            border-radius: 50%!important;
        }
        .me-2 {
            margin-right: 0.5rem!important;
        }
        img, svg {
            vertical-align: middle;
        }

        a {
            color: #3b76e1;
            text-decoration: none;
        }

        .badge-soft-danger {
            color: #f56e6e !important;
            background-color: rgba(245,110,110,.1);
        }
        .badge-soft-success {
            color: #63ad6f !important;
            background-color: rgba(99,173,111,.1);
        }

        .badge-soft-primary {
            color: #3b76e1 !important;
            background-color: rgba(59,118,225,.1);
        }

        .badge-soft-info {
            color: #57c9eb !important;
            background-color: rgba(87,201,235,.1);
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
            background-color: rgba(59,118,225,.25)!important;
        }
    </style>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Liste des professeurs <span class="text-muted fw-normal ms-2">({{$countProfesseurs}})</span></h5>
                </div>
            </div>
            <div class="col d-flex justify-content-around"><i class="fa-solid fa-grip" style=" transform: scale(1.5);"></i></div>
        </div>
        <div class="row">
            @if(session('errorET'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style=" font-size: 14px;">
                    {{session('errorET')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }} <a  href="{{url('/listeProfesseurs')}}">consulter la liste des professeurs</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('errors'))
                @foreach (session('errors')->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style=" font-size: 14px;">
                        {{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Matricule</th>
                                <th scope="col">Nom et Prenom</th>
                                <th scope="col">Matiere</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date de recrutement</th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listeprofesseurs as $prof)
                            <tr>
                                <td>{{$prof->id_prof}}</td>
                                <td>
                                    <div class="avatar-sm d-inline-block me-2">
                                        <div class="avatar-title bg-soft-primary rounded-circle text-primary"><i class="mdi mdi-account-circle m-0"></i></div>
                                    </div><a href="#" class="text-body">{{$prof->nom}} {{$prof->prenom}}</a></td>
                                <td><span class="badge badge-soft-success mb-0">{{$prof->libele}}</span></td>
                                <td>{{$prof->email}}</td>
                                <td>{{$prof->date_adhesion}}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item" onclick="details('{{$prof->id_prof}}')">
                                            <a href="javascript:void(0);" data-target="#quoteForm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Voir" class="px-2 text-primary"><i class='bx bx-show' style='color:#038fff'  ></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" class="px-2 text-danger" onclick="supprimerProf({{$prof->id_prof}})"><i class="bx bx-trash-alt font-size-18"></i></a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if(session('ProfSupprimer'))
            <script>
                iziToast.success({
                    title: 'OK',
                    message: '{{ session('ProfSupprimer') }}',
                });
            </script>
        @endif
        <script>
            function supprimerProf(id){
                iziToast.question({
                    timeout: 20000,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: 'Avertissement !!',
                    message: 'Êtes-vous sûr de vouloir supprimer ce professeur,\n Cette action est irréversible  ?',
                    position: 'center',
                    buttons: [
                        ['<button><b>Oui</b></button>', function (instance, toast) {
                            window.location.href = '/supprimer-professeur/' + id;
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
        <div class="modal fade" id="quoteForm" tabindex="-1" role="dialog" aria-labelledby="quoteForm" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content p-md-3">
                    <div class="modal-header">
                        <h4 class="modal-title">Informations du <span class="text-primary" style="color: #0CDA90 !important;">Professeur</span></h4>
                        <button class="close border-1 btn bg-transparent" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('professeur.modifierProf') }}">
                            @csrf
                            <input type="text" name="id_prof" id="idProf" class="form-control d-none"/>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="nom">Nom<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="nom" type="text" name="newnom"  required="" />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="prenom">Prenom<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="prenom" type="text" name="newprenom"  required="" />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="sexe">Sexe<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <select class="form-control select" id="sexe" name="newsexe">
                                        <option selected>Homme</option>
                                        <option>Femme</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="dateNaissance">Date de naissance<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="dateNaissance" type="date" name="newdateNaissance"  required="" />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="telephone">Telephone</label>
                                    <input class="form-control" id="telephone" name="newtelephone" type="tel"  />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="salaire">Salaire<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="salaire" name="newsalaire" type="number"  required="" />
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="font-weight-bold text-small" for="deplome">Deplome<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="deplome" name="newdeplome" type="text"  required="" />
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="font-weight-bold text-small" for="adresse">Adresse<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="adresse" name="newadresse" type="text"  required="" />
                                </div>


                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="ville">Ville<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="ville" type="text" name="newville"  required="" />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="zip">Code postal<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="zip" type="text" name="newzip"  required="" />
                                </div>
                                <div class="form-group col-lg-8">
                                    <label class="font-weight-bold text-small" for="email"> Email<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="email" type="email" name="newemail"  required="" />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="font-weight-bold text-small" for="motDePasse">Mot de passe<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="motDePasse" type="text" name="newmotDePasse" />
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="font-weight-bold text-small" for="portefeuille">Adresse du portefeuille<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                    <input class="form-control" id="portefeuille" type="text" name="newportefeuille"  required="" />
                                </div>
                                <div class="form-group col-lg-12 d-flex justify-content-end">
                                    <button class="btn btn-primary " type="submit" name="submit" style="box-shadow: 0 3px 2px rgb(12 218 144 / 20%);"><i class='bx bx-save' style='color:#f3f3f3'  ></i> Sauvegarder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function details(id){
            console.log('hasia');
            axios.get('/professeurs/get-details/'+id)
                .then(function (response) {
                    const details = response.data;
                    console.log(details);
                    idProf.value=details[0].id_prof;
                    nom.value=details[0].nom;
                    prenom.value=details[0].prenom;
                    sexe.selectedIndex= details[0].sexe=='Homme'?0:1;
                    dateNaissance.value=details[0].dateNaissance;
                    telephone.value=details[0].telephone;
                    email.value=details[0].email;
                    salaire.value=details[0].sallaire;
                    adresse.value=details[0].adresse;
                    deplome.value=details[0].diplome;
                    zip.value=details[0].zip;
                    ville.value=details[0].ville;
                    portefeuille.value=details[0].wallet;

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>
@endsection
