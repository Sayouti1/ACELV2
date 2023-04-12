@extends('Etudiant.Etudiant')

@section('title', 'Absences')

@section('MesAbsencesActive','active')

@section('the-home-content')
        {{-- <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        </style> --}}
        <style>
            .order-card {
                color: #fff;
            }

            .bg-c-blue {
                background: linear-gradient(45deg, #4099ff, #73b4ff);
            }

            .bg-c-green {
                background: linear-gradient(45deg, #2ed8b6, #59e0c5);
            }

            .bg-c-yellow {
                background: linear-gradient(9deg, #ffffff, #e4e4e4);
            }

            .bg-c-pink {
                background: linear-gradient(45deg, #FF5370, #ff869a);
            }


            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }



            .main-box.no-header {
                padding-top: 20px;
            }

            .main-box {
                background: #FFFFFF;
                -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
                -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
                -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
                -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
                box-shadow: 1px 1px 2px 0 #CCCCCC;
                margin-bottom: 16px;
                -webikt-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
            }

            .table a.table-link.danger {
                color: #e74c3c;
            }

            .label {
                border-radius: 3px;
                font-size: 0.875em;
                font-weight: 600;
            }

            .label-success {
                background-color: #5cb85c;
            }

            .label-danger {
                background-color: #d9534f;
            }

            a {
                color: #3498db;
                outline: none !important;
            }



            .table thead tr th {
                text-transform: uppercase;
                font-size: 0.875em;
            }

            .table thead tr th {
                border-bottom: 2px solid #e7ebee;
            }

            .table tbody tr td:first-child {
                font-size: 1.125em;
                font-weight: 300;
            }

            .table tbody tr td {
                font-size: 0.875em;
                vertical-align: middle;
                border-top: 1px solid #e7ebee;
                padding: 12px 8px;
            }

            a:hover {
                text-decoration: none;
            }

            .statut-td {
                text-align: center;
            }

            .table-responsive {
            // Other values...
            overflow-x: auto;
                overflow-y: hidden;
            // Other values...
            }
        </style>
        {{-- <div class="container-fluid ms-md-3 mt-5 border border-primary rounded align-items-center"
         style="background-color:#FFFFFF; width: 98%;height: 90%; padding-top: 10px;"> --}}
        {{-- <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8 text-center fs-3 border-bottom" style="font-family: 'Poppins', sans-serif;">Historique des absences</div>
            <div class="col-2"></div>
        </div> --}}
        {{-- <div class="row mt-2 d-flex justify-content-center">
            <div class="col m-5 mt-2 text-center">
                <table class="table   table-hover">
                    <thead class="thead-dark bg-warning bg-gradient fst-normal">
                    <tr class="p-1">
                        <th class="text-center">Situation</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Statut</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    {{-- <tr>
                        <td>Absence</td>
                        <td>23-12-2023</td>
                        <td class="text-center">Justifie</td>
                    </tr>
                    <tr>
                        <td>Retard</td>
                        <td>10-12-2023</td>
                        <td class="text-center">Non justifie</td>
                    </tr>
                    <tr>
                        <td>Absence</td>
                        <td>14-12-2023</td>
                        <td class="text-center">Justifie</td>
                    </tr>
                    <tr>
                        <td>Retard</td>
                        <td>01-12-2023</td>
                        <td class="text-center">Justifie</td>
                    </tr> --}}
        {{-- @foreach ($absence as $abs)
                        <tr>
                            <td>{{$abs->situation}}</td>
                            <td>{{$abs->laDate}}</td>
                            <td class="text-center">{{$abs->statut}}</td>
                        </tr>
                    @endforeach --}}
        {{-- </tbody>
                </table>

            </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}


        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="home-content px-3 pt-4" id="myDiv" style="font-family:roboto,sans-serif;">
            <div class="home-content container-fluid px-4 pt-4">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Mes Absences</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">Etudiants / </li>
                                    <li class="breadcrumb-active">Ajouter un étudiant</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container px-0">

                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total des absences</h6>
                                    <h2 class="text-right d-flex justify-content-between"><i
                                            class="fa-regular fa-clock"></i><span>{{
                                             DB::table('absences')
                                            ->where('idEtudiant', '=', session('id_etudiant'))
                                            ->where('situation', '=', 'absent')
                                            ->count()
                                            }}</span></h2>
                                    <p class="m-b-0">Non Justifier<span class="f-right">{{
                                             DB::table('absences')
                                            ->where('idEtudiant', '=', session('id_etudiant'))
                                            ->where('situation', '=', 'absent')->where('statut','=','non')
                                            ->count()
                                            }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total des retards</h6>
                                    <h2 class="text-right d-flex justify-content-between"><i
                                            class="fa-regular fa-clock"></i><span>{{
                                             DB::table('absences')
                                            ->where('idEtudiant', '=', session('id_etudiant'))
                                            ->where('situation', '=', 'retard')
                                            ->count()
                                            }}</span></h2>
                                    <p class="m-b-0">Non Justifier<span class="f-right">{{
                                             DB::table('absences')
                                            ->where('idEtudiant', '=', session('id_etudiant'))
                                            ->where('situation', '=', 'retard')->where('statut','=','non')
                                            ->count()
                                            }}</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="container bootstrap snippets bootdey px-0">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="card-title">Details Des Absences <span class="text-muted fw-normal ms-2">(8)</span>
                                </h5>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <table class="table user-list">
                                            <thead>
                                            <tr>

                                                <th><span>Date</span></th>
                                                <th><span>Matiére</span></th>
                                                <th class="text-center"><span>Situation</span></th>
                                                <th><span>Status</span></th>
                                                <th class="text-center">&nbsp;Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($absence as $abs)
                                            <tr>

                                                <td style="font-size: 14px">{{
                                                $date = \Carbon\Carbon::parse($abs->laDate)->format('d:F  H:00')
                                                }}</td>
                                                <td class="matier-td" style="width: 15%;">
                                                {{
                                                    DB::table('professeurs')
                                                    ->join('matieres', 'matieres.id_matiere', '=', 'professeurs.matiere')
                                                    ->where('professeurs.id_prof', '=', $abs->idProf)
                                                    ->select('matieres.libele')
                                                    ->value('libele')
                                                }}
                                                </td>
                                                <td class="statut-td">
                                                    {{strtoupper($abs->situation)}}
                                                </td>
                                                <td class="text-start">
                                                    @if($abs->statut == 'non')
                                                        <span class="label label-danger">Non justifié</span>
                                                    @else
                                                        <span class="label label-success">Justifié</span>
                                                    @endif

                                                </td>

                                                <td style="width: 10%;" class="text-center">
                                                    @if($abs->statut == 'non')
                                                    <a href="#" class="table-link  text-info" data-target="#quoteForm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top">
                                                        <span class="fa-stack px-2 py-0" onclick="dateAbsence('{{$abs->laDate}}')">
                                                            <i class="fa-solid fa-file-arrow-up fa-2x"></i>
                                                        </span>
                                                    </a>
                                                    @endif
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
                @if (session('success'))
                    <script>
                        iziToast.success({
                            title: 'OK',
                            message: '{{ session('success') }}',
                        });
                    </script>
                @endif
                <div class="modal fade" id="quoteForm" tabindex="-1" role="dialog" aria-labelledby="quoteForm" aria-hidden="true" >
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document"style="width: 500px">
                        <div class="modal-content p-md-3">
                            <div class="modal-header">
                                <h5 class="modal-title">Justification</h5>
                                <button class="close border-1 btn bg-transparent" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{url('/justifier-absence')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="dateAbsence" id="dateAbsence" class="form-control d-none"/>
                                    <div class="row">
                                        <div class="col-12 col-sm-4 d-flex">
                                            <div class="form-group local-forms ">
                                                <div class="image-frame ">
                                                    <img id="preview" src=" " alt="" width="400" height="100">
                                                    <input type="file" name="img" class="form-control" onchange="previewImage(event)" required>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="form-group col-lg-12">
                                            <label class="font-weight-bold text-small" for="description">Description</label>
                                            <input class="form-control" id="description" type="text" name="description"  required="" />
                                        </div>--}}

                                        <div class="form-group col-lg-12 d-flex justify-content-end">
                                            <button class="btn btn-primary " type="submit" name="submit" style="box-shadow: 0 3px 2px rgb(12 218 144 / 20%);"><i class='bx bx-save' style='color:#f3f3f3'  ></i> Envoyer</button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    function dateAbsence(dateAbs){
                                        const laDate = document.getElementById('dateAbsence');
                                        laDate.value = dateAbs;
                                        console.log(laDate.value);
                                    }
                                    function previewImage(event) {
                                        var input = event.target;
                                        var preview = document.getElementById('preview');
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                preview.setAttribute('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection
