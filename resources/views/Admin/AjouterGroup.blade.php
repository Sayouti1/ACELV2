@extends('Admin.admin')

@section('title', 'Nouveau professeur')

@section('AjouterProfesseurActive', 'active')

@section('the-home-content')

    <div class="home-content px-3 pt-4" id="myDiv" style="font-family:roboto,sans-serif;">
        <div class="content container-fluid">
            <div class="main-wrapper">





                <div class="page-wrapper">
                    <div class="content container-fluid">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Ajouter Un Group</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Groupes</a></li>
                                        <li class="breadcrumb-item active">Ajouter Un Group</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="/groups" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    @if (session('success'))
                                                        <div class="alert alert-success alert-dismissible fade show"
                                                            role="alert">
                                                            {{ session('success') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                        </div>
                                                    @endif
                                                    @if (session('errors'))
                                                        @if (is_a(session('errors'), 'Illuminate\Support\MessageBag'))
                                                            @foreach (session('errors')->all() as $error)
                                                                <div class="alert alert-danger">{{ $error }}</div>
                                                            @endforeach
                                                        @else
                                                            <div class="alert alert-danger">{{ session('errors') }}</div>
                                                        @endif
                                                    @endif
                                                    <h5 class="form-title"><span>Details du Group</span></h5>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="form-group local-forms">
                                                        <label>Niveau<span class="login-danger">*</span></label>
                                                        <select name="niveau" class="form-control">
                                                            <option value="hidden-opt" disabled selected hidden>
                                                                Sélectionez Un Niveaux
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
                                                        <label>Nom du group <span class="login-danger">*</span></label>
                                                        <input type="text" class="form-control" name="lib_group">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="form-group local-forms">
                                                        <label>Nombre des étudiants <span
                                                                class="login-danger">*</span></label>
                                                        <input type="text" class="form-control" name="nbr_etud">
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

            </div>
        </div>
    </div>
@endsection

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/script.js"></script>
