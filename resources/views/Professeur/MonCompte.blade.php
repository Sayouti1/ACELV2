@extends('Professeur.AcceuilProf')

@section('title', 'Mon Compte')

@section('ParametresActive', 'active')

@section('the-home-content')
    <div class="home-content container-fluid px-4 pt-4">
        <div class="container">
            <div class="row flex-lg-nowrap" style="font-family: 'Poppins', sans-serif">
                <div class="col">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded"
                                                        style="height: 140px; background-color: rgb(233, 236, 239);">
                                                        <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"><img
                                                                src="{{ asset('storage/images/profiles/' . session('photo')) }}"
                                                                style="max-height: 140px; max-width: 140px;"
                                                                alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0 align-self-center">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{session('nom').' '.session('prenom')}} </h4>
                                                    <p class="mb-0" name="username">{{session('id_prof')}}</p>
                                                    {{--<div class="mt-2">
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fa fa-fw fa-camera"></i>
                                                            <span>Changer Photo</span>
                                                        </button>
                                                    </div>--}}
                                                </div>
                                                <div class="text-center text-sm-right">
                                                    <span class="badge badge-secondary">Etudiant</span>
                                                    <div class="text-muted"><small>Rejoint le {{session('date_adhesion')}}</small></div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#" class="active nav-link">Mes
                                                    Informations</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Nom</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{session('nom')}}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Prénom</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{session('prenom')}}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text"
                                                                            name="username" value="{{session('email')}}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <div class="form-group">
                                                                        <label>Adresse</label>
                                                                        <textarea class="form-control" rows="5" disabled>{{session('adresse')}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                @if(session('errors'))
                                                    <div class="alert alert-danger">
                                                        {{ session('errors') }}
                                                    </div>
                                                @endif

                                                <form class="form" method="post" action="{{ route('professeur.changeMotDePasse') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 mb-3">
                                                            <div class="mb-2"><b>Changer Mot de passe</b></div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Mot de passe Actuel</label>
                                                                        <input class="form-control" type="password" name="passwordActuel"
                                                                            placeholder="••••••">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Nouveau Mot de passe</label>
                                                                        <input class="form-control" type="password" name="newPassword"
                                                                            placeholder="••••••">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Confirmer <span
                                                                                class="d-none d-xl-inline">Password</span></label>
                                                                        <input class="form-control" type="password" name="confirmPassword"
                                                                            placeholder="••••••">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit">Sauvegarder</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       {{-- <div class="col-12 col-md-3 mb-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="px-xl-3">
                                        <button class="btn btn-block btn-secondary">
                                            <i class="fa fa-sign-out"></i>
                                            <span>Déconexion</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold">Support</h6>
                                    <p class="card-text">Vous rencontrez un problème ? Contactez-nous
                                    </p>
                                    <button type="button" class="btn btn-primary">Contactez Nous</button>
                                </div>
                            </div>
                        </div>--}}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
