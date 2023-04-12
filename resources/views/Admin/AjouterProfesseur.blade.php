
@extends('Admin.admin')

@section('title', 'Nouveau professeur')

@section('AjouterProfesseurActive','active')

@section('the-home-content')
<div class="home-content px-3 pt-4" id="myDiv" style="font-family:roboto,sans-serif;">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Ajouter professeurs</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @if (session('errorET'))

                    <div class="alert alert-danger">
                        {{ session('errorET') }}
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('professeur.ajouterProf') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Informations personelles</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom
                                            <span class="login-danger">*</span></label>
                                        <input type="text" name="nom" class="form-control" placeholder="Entrer Nom" value="{{ old('nom')}}"/>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Prenom <span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="text" name="prenom"
                                            class="form-control"
                                            placeholder="Entrer Prenom"
                                            value="{{ old('prenom')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >CIN
                                            <span class="login-danger">*</span></label
                                        >
                                        <input
                                            class="form-control"
                                            type="text" name="cin"
                                            placeholder="AB12345"
                                            value="{{ old('cin')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Sexe <span class="login-danger">*</span></label
                                        >
                                        <select class="form-control select" name="sexe">
                                            <option selected>Homme</option>
                                            <option>Femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label
                                        >Date de naissance
                                            <span class="login-danger">*</span></label
                                        >
                                        <input
                                            class="form-control datetimepicker"
                                            type="date" name="dateNaissance"
                                            placeholder="jj-mm-aaaa"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Telephone <span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="text"
                                            class="form-control" name="telephone"
                                            placeholder="Entrer Telephone"
                                            value="{{ old('telephone')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label
                                        >Date d'entrée
                                            <span class="login-danger">*</span></label
                                        >
                                        <input
                                            class="form-control datetimepicker"
                                            type="date" name="dateEntree"
                                            placeholder="DD-MM-YYYY"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 local-forms">
                                    <div class="form-group">
                                        <label
                                        >Deplome
                                            <span class="login-danger">*</span></label
                                        >
                                        <input
                                            class="form-control"
                                            type="text" name="deplome"
                                            placeholder="Exemple : Licence en informatique"
                                            value="{{ old('deplome')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Matiere <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="matiere">
                                            <option >Choisir la matiere</option>
                                            @foreach($matieres as $matiere)
                                                <option value="{{$matiere->id_matiere}}">{{$matiere->libele}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Salaire
                                            <span class="login-danger">*</span></label
                                        >
                                        <input
                                            class="form-control"
                                            type="number" name="salaire"
                                            placeholder="7000 DH" min="3000"
                                            value="{{ old('salaire')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Adresse</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label
                                        >Adresse <span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="text" name="adresse"
                                            class="form-control"
                                            placeholder="Entrer adresse"
                                            value="{{ old('adresse')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Ville <span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="text" name="ville"
                                            class="form-control"
                                            placeholder="Entrer ville"
                                            value="{{ old('ville')}}"
                                        />
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Code postal<span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="text" name="zip"
                                            class="form-control"
                                            placeholder="Entrer code postal"
                                            value="{{ old('zip')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Details de connexion</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Email <span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="email"
                                            class="form-control" name="email"
                                            placeholder="Entrer Email"
                                            value="{{ old('email')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Mot de passe <span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="text" name="password"
                                            class="form-control"
                                            placeholder="Entrer mot de passe"
                                            value="{{ old('password')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Confirmer le mot de passe
                                            <span class="login-danger">*</span></label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="confirmer mot de passe"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Adresse du portefeuille</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label
                                        >Portefeuille</label
                                        >
                                        <input
                                            type="text" name="portefeuille"
                                            class="form-control"
                                            placeholder="0x.................."
                                            value="{{ old('portefeuille')}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="student-submit">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            Ajouter
                                        </button>
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
