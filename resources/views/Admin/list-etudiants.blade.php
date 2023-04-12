@extends('Admin.admin')
@section('ListeEtudiantsActive', 'active')
@section('title', 'Nouveau étudiant')



@section('the-home-content')
    <div class="home-content container-fluid  px-4 pt-4">
        @if(isset($success11) && !empty($success11))
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h2 class="page-title" style="font-family: 'Poppins', sans-serif">{{ $success11 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Liste de etudiants</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Etudiants / </li>
                                <li class="breadcrumb-active">Liste des étudiants</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="student-group-form"><form method="post" action="{{ route('etudiant.search') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" name="searchid" class="form-control" placeholder="Chercher par ID">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" name="searchnom" class="form-control" placeholder="Chercher par nom">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <input type="text" name="searchemail" class="form-control" placeholder="Chercher par email">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="submit" class="btn btn-primary">Chercher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
           {{-- @if( !session('success11'))
            <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Liste de etudiants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Etudiants / </li>
                            <li class="breadcrumb-active">Liste des étudiants</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <div class="student-group-form"><form method="post" action="{{ route('etudiant.search') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" name="searchid" class="form-control" placeholder="Chercher par ID">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" name="searchnom" class="form-control" placeholder="Chercher par nom">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <input type="text" name="searchemail" class="form-control" placeholder="Chercher par email">
                            </div>
                        </div>

                        <div class="col-lg-2">
                           <div class="search-student-btn">
                              <button type="submit" class="btn btn-primary">Chercher</button>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
            @if( session('success11'))
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            {{ session('listgroup')}}
                        </div>
                    </div>
                </div>
        @endif--}}
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
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Niveau</th>
                                        <th>Groupe</th>
                                        <th>Telephone</th>
                                        <th>Adresse</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               {{-- @foreach($etudiants as $etudiant)
                                    <tr>
                                        <td>{{$etudiant->id}}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="student-details.html" class="avatar avatar-sm me-2"></a>
                                                <a href="student-details.html">{{$etudiant->nom}}</a>
                                            </h2>
                                        </td>
                                        <td>{{$etudiant->prenom}}</td>
                                        <td>{{$etudiant->niveau}}</td>
                                        <td>{{$etudiant->groupe}}</td>
                                        <td>{{$etudiant->telephone}}</td>
                                        <td>{{$etudiant->email}}</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item" onclick="details('{{$etudiant->id}}')">
                                                    <a href="javascript:void(0);" data-target="#quoteForm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Voir" class="px-2 text-primary"><i class='bx bx-show' style='color:#038fff'  ></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach--}}
                               @foreach ($etudiants as $etudiant)
                                   <tr>
                                      {{-- <td>
                                           <div class="form-check check-tables">
                                               <input class="form-check-input" type="checkbox" value="something">
                                           </div>
                                       </td>--}}
                                       <td>{{ $etudiant->id_etudiant }}</td>
                                       <td>
                                           <h2 class="table-avatar">
                                               <img src="{{ asset('storage/images/profiles/'.$etudiant->photo) }}" width="32" height="32" style="border-radius: 50px;margin-right: 5px">
                                               {{ $etudiant->nom }}
                                           </h2>
                                       </td>

                                       <td>{{$etudiant->prenom}}</td>
                                       <td>
                                           {{ DB::table('niveaux')->join('class', 'niveaux.id_niveau', '=', 'class.id_niveau')
                                                ->where('class.id_etudiant', '=', $etudiant->id_etudiant)
                                                ->select('niveaux.libele')
                                                ->value('libele')
                                           }}</td>
                                       <td>{{
                                               $groupeLibele = DB::table('groupe')
                                                ->join('class', 'groupe.id_group', '=', 'class.id_group')
                                                ->where('class.id_etudiant', '=', $etudiant->id_etudiant)
                                                ->value('groupe.libele')

                                           }}</td>
                                       <td>{{ $etudiant->telephone }}</td>
                                       <td>{{ $etudiant->adresse }}</td>
                                       <td class="text-end">
                                           <div class="actions">
                                               <a href="javascript:;" data-target="#quoteForm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" class="btn btn-sm bg-success-light me-2" onclick="details('{{$etudiant->id_etudiant}}')">
                                                   <i class="fa-solid fa-pen-to-square"></i>
                                               </a>
                                               <a  class="btn btn-sm bg-danger-light" onclick="supprimerEtu({{ $etudiant->id_etudiant }})">
                                                   <i class="fa-solid fa-circle-minus"></i>
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
    @if(session('etudiantSupprimer'))
            <script>
                iziToast.success({
                    title: 'OK',
                    message: '{{ session('etudiantSupprimer') }}',
                });
            </script>
    @endif
    <script>
        function supprimerEtu(id){
            iziToast.question({
                timeout: 20000,
                close: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                title: 'Avertissement !!',
                message: 'Êtes-vous sûr de vouloir supprimer cet étudiant ?',
                position: 'center',
                buttons: [
                    ['<button><b>Oui</b></button>', function (instance, toast) {
                        window.location.href = '/supprimer-etudiant/' + id;
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
                    <h4 class="modal-title">Informations d' <span class="text-primary" style="color: #0CDA90 !important;">Etudiant</span></h4>
                    <button class="close border-1 btn bg-transparent" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label class="font-weight-bold text-small" for="admissionID">ID<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                <input class="form-control" id="admissionID" type="text"  required="" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="font-weight-bold text-small" for="nom">Nom<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                <input class="form-control" id="nom" type="text"  required="" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="font-weight-bold text-small" for="prenom">Prenom<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                <input class="form-control" id="prenom" type="text"  required="" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="font-weight-bold text-small" for="sexe">Sexe<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                <select class="form-control select" name="sexe" id="sexe">
                                    <option selected>Homme</option>
                                    <option>Femme</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="font-weight-bold text-small" for="dateNaissance">Date de naissance<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                <input class="form-control" id="dateNaissance" type="date"  required="" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="font-weight-bold text-small" for="telephone">Telephone</label>
                                <input class="form-control" id="telephone" type="tel"  />
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="font-weight-bold text-small" for="telephone">Adresse</label>
                                <input class="form-control" id="adresse" type="tel"  />
                            </div>
                            <div class="form-group col-lg-8">
                                <label class="font-weight-bold text-small" for="email"> Email<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                <input class="form-control" id="email" type="email"  required="" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="font-weight-bold text-small" for="motDePasse">Mot de passe<span class="text-primary ml-1" style="color: #0CDA90 !important;">*</span></label>
                                <input class="form-control" id="motDePasse" type="text"  required="" />
                            </div>
                            <div class="form-group col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary " type="button" style="box-shadow: 0 3px 2px rgb(12 218 144 / 20%);"><i class='bx bx-save' style='color:#f3f3f3'  ></i> Sauvegarder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function details(id){
            console.log('hasia');
            axios.get('/etudiant/get-details/'+id)
                .then(function (response) {
                    const details = response.data;
                    console.log(details);
                    admissionID.value=details[0].id_etudiant;
                    nom.value=details[0].nom;
                    prenom.value=details[0].prenom;
                    sexe.selectedIndex= details[0].sexe=='Homme'?0:1;
                    console.log(details[0].date_naissaince);
                    dateNaissance.value=details[0].date_naissaince;
                    telephone.value=details[0].telephone;
                    email.value=details[0].email;
                    adresse.value=details[0].adresse;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>
@endsection

{{--
@section('the-home-content')
    <div class="container">
        <div class="content contact-list">
            <div class="card card-default">
                <div class="card-header align-items-center px-3 px-md-5">
                    <h2>Contacts</h2>

                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modal-add-contact">Add Contact</button>
                </div>

                <div class="card-body px-3 px-md-5">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar8.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                            <div class="card card-default p-4">
                                <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                    data-target="#modal-contact">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                        class="mr-3 img-fluid rounded" alt="Avatar Image" />

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-2 text-dark">Emma Smith</h5>
                                        <ul class="list-unstyled text-smoke">
                                            <li class="d-flex">
                                                <i class="mdi mdi-map mr-1"></i>
                                                <span>Nulla vel metus 15/178</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-email mr-1"></i>
                                                <span>exmaple@email.com</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="mdi mdi-phone mr-1"></i>
                                                <span>(123) 888 777 632</span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Modal -->
            <div class="modal fade" id="modal-contact" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header justify-content-end border-bottom-0">
                            <button type="button" class="btn-edit-icon" data-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-pencil"></i>
                            </button>

                            <div class="dropdown">
                                <button class="btn-dots-icon" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                </div>
                            </div>

                            <button type="button" class="btn-close-icon" data-dismiss="modal" aria-label="Close">
                                <i class="mdi mdi-close"></i>
                            </button>
                        </div>

                        <div class="modal-body pt-0">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="profile-content-left px-4">
                                        <div class="card text-center px-0 border-0">
                                            <div class="card-img mx-auto">
                                                <img class="rounded-circle"
                                                    src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                    alt="user image" />
                                            </div>

                                            <div class="card-body">
                                                <h4 class="py-2">Albrecht Straub</h4>
                                                <p>Albrecht.straub@gmail.com</p>
                                                <a class="btn btn-primary btn-pill btn-lg my-4"
                                                    href="javascript:void(0)">Follow</a>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <div class="text-center pb-4">
                                                <h6 class="pb-2">1503</h6>
                                                <p>Friends</p>
                                            </div>

                                            <div class="text-center pb-4">
                                                <h6 class="pb-2">2905</h6>
                                                <p>Followers</p>
                                            </div>

                                            <div class="text-center pb-4">
                                                <h6 class="pb-2">1200</h6>
                                                <p>Following</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="contact-info px-4">
                                        <h4 class="mb-1">Contact Details</h4>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                                        <p>Albrecht.straub@gmail.com</p>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                                        <p>+99 9539 2641 31</p>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Birthday</p>
                                        <p>Nov 15, 1990</p>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Event</p>
                                        <p>Lorem, ipsum dolor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Contact Button  -->
            <div class="modal fade" id="modal-add-contact" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Create New Contact</h5>
                            </div>
                            <div class="modal-body px-4">
                                <div class="form-group row mb-6">
                                    <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="custom-file mb-1">
                                            <input type="file" class="custom-file-input" id="coverImage"
                                                required="" />
                                            <label class="custom-file-label" for="coverImage">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstName">First name</label>
                                            <input type="text" class="form-control" id="firstName"
                                                value="Albrecht" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName">Last name</label>
                                            <input type="text" class="form-control" id="lastName" value="Straub" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="userName">User name</label>
                                            <input type="text" class="form-control" id="userName" value="Doe" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                value="albrecht.straub@gmail.com" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="Birthday">Birthday</label>
                                            <input type="text" class="form-control" id="Birthday"
                                                value="01-10-1993" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="event">Event</label>
                                            <input type="text" class="form-control" id="event"
                                                value="Some value for event" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer px-4">
                                <button type="button" class="btn btn-smoke btn-pill"
                                    data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary btn-pill">Save Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}
