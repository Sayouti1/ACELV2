@extends('Admin.admin')

@section('title', 'Nouveau étudiant')

@section('AjouterEtudiantActive', 'active')

@section('the-home-content')
    <div class="home-content container-fluid px-4 pt-4">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Ajouter un étudiant</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Etudiants / </li>
                            <li class="breadcrumb-active">Ajouter un étudiant</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }} <a href="{{ url('/list-etudiants') }}">consulter la liste des etudiants</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('errors'))
                @foreach (session('errors')->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style=" font-size: 14px;">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
                @if (session('errorET'))
                    @if (strpos(session('errorET'), 'users_email_unique') !== false)
                        <div class="alert alert-danger">
                            email deja existe !
                        </div>
                    @else
                        <div class="alert alert-danger">
                            {{ session('errorET') }}
                        </div>
                    @endif
                @endif

                <div class="col-sm-12">
                <div class="card comman-shadow d-flex">
                    <div class="card-body">
                        <form class="nouv-form" method="post" action="{{ url('/AjouterEtudiant/ajouter') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex">
                                <div class="col-12">
                                    <h5 class="form-title student-info d-flex">Informations d'etudiant <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="nom"
                                            placeholder="Entrer le nom" value="{{old('nom')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prenom <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="prenom"
                                            placeholder="Entrer le prenom" value="{{old('prenom')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Sexe <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="sexe">
                                            <option value="">Choisir le sexe</option>
                                            <option value="Homme" {{ old('sexe') == 'Homme' ? 'selected' : '' }}>Homme</option>
                                            <option value="Femme" {{ old('sexe') == 'Femme' ? 'selected' : '' }}>Femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date de naissance <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="date" name="dateNaissance"
                                            placeholder="AAAA-MM-JJ" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="email"
                                            placeholder="Entrer adresse email" value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Telephone </label>
                                        <input class="form-control" type="tel" name="telephone"
                                            placeholder="Enter Phone Number" value="{{old('telephone')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Niveau <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="niveau">
                                            <option value="">Choisir un niveau</option>
                                            @foreach($niveaux as $niveau)
                                                <option value="{{ $niveau->id_niveau }}" {{ old('niveau') == $niveau->id_niveau ? 'selected' : '' }}>
                                                    {{ $niveau->libele }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Groupe <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="groupe">
                                            <option value="">Choisir un groupe</option>
                                            <option value="90" {{ old('groupe') == '90' ? 'selected' : '' }}>A</option>
                                            <option value="95" {{ old('groupe') == '95' ? 'selected' : '' }}>B</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Adresse </label>
                                        <input class="form-control" type="text" name="Adresse"
                                            placeholder="Enterer Adresse" value="{{old('Adresse')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mot de passe </label>
                                        <input class="form-control" type="text" name="motDePasse"
                                            placeholder="Entrer le mot de passe" value="{{old('motDePasse')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Confirmer Mot de passe </label>
                                        <input class="form-control" type="text" name="ConfirmerMotDePasse"
                                            placeholder="Confirmer le mot de passe" value="{{old('ConfirmerMotDePasse')}}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4"></div>
                                <div class="col-12 col-sm-4 mx-auto mb-4">
                                    <div class="image-group-container">
                                        <label for="photo" class="photo-label">Photo</label>
                                        <div class="display_image ">
                                            <img id="image">
                                        </div>

                                        <input type="file" id="real-file" name="photoP" hidden="hidden" value="{{old('photoP')}}">
                                        <button type="button" id="custom-button" class="custom-button">Sélectionner une
                                            image</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title student-info d-flex">Informations du tuteur <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="nom-pere"
                                            placeholder="Entrer le nom" value="{{old('nom-pere')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prenom <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="prenom-pere"
                                            placeholder="Entrer le prenom" value="{{old('prenom-pere')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Parité <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="parite">
                                            <option>Choisir la parité</option>
                                            <option>Père</option>
                                            <option>Mère</option>
                                            <option>Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="email-pere"
                                            placeholder="Entrer adresse email" value="{{old('email-pere')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Telephone </label>
                                        <input class="form-control" type="tel" name="telephone-pere"
                                            placeholder="Enter Phone Number" value="{{old('telephone-pere')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Adresse </label>
                                        <input class="form-control" type="text" name="adresse-pere"
                                            placeholder="Adresse" value="{{old('adresse-pere')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>CIN </label>
                                        <input class="form-control" type="text" name="CIN-pere" placeholder="CIN" value="{{old('CIN-pere')}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
