@extends('Admin.admin')

@section('title', 'Absences')

@section('AbsenceActive', 'active')

@section('the-home-content')
    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Gérer les absences</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Etudiants / </li>
                            <li class="breadcrumb-active">Absences des étudiants</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-group-form">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Chercher par ID ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Chercher par Nom ...">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Recherche</button>
                    </div>
                </div>
            </div>
        </div>
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
                                        <th>Class</th>
                                        <th>Telephone</th>
                                        <th>Situation</th>
                                        <th>Date</th>
                                        <th class="text-end">Justifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($absence as $abs)
                                    <tr>
                                        <td>{{$abs->id_etudiant}}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                {{$abs->nom}}
                                            </h2>
                                        </td>

                                        <td>{{ DB::table('niveaux')
                                           ->where('id_niveau', $abs->id_niveau)
                                           ->value('libele').' '.DB::table('groupe')
                                           ->where('id_group', $abs->id_group)
                                           ->value('libele')
                                         }}</td>
                                        <td>{{$abs->telephone}}</td>
                                        <td>{{$abs->situation}}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s.u', $abs->laDate)->format('Y-m-d H:i') }}</td>

                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="javascript:;" data-target="#quoteForm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" onclick="justifier({{$abs->id_etudiant}},'{{$abs->laDate}}','{{$abs->justifiant}}')" style="color:green"
                                                    class="btn btn-sm bg-success-light me-2">
                                                    <i class="fa-regular fa-square-check"></i>
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
                <script>
                    function justifier(id,date,phot){
                    var img= document.getElementById('preview');
                    img.src = "{{ asset('storage/images/absences/')}}"+phot;
                    }
                </script>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quoteForm" tabindex="-1" role="dialog" aria-labelledby="quoteForm" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document"style="width: 500px">
            <div class="modal-content p-md-3">
                <div class="modal-header">
                    <h5 class="modal-title">Justification</h5>
                    <button class="close border-1 btn bg-transparent" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/justifier-absence')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="dateAbsence" id="dateAbsence" class="form-control d-none"/>
                        <div class="row">
                            <div class="col-12 col-sm-4 d-flex">
                                <div class="form-group local-forms ">
                                    <div class="image-frame ">

                                        <img id="preview" src="" alt="" width="400" height="100">
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group col-lg-12">
                                <label class="font-weight-bold text-small" for="description">Description</label>
                                <input class="form-control" id="description" type="text" name="description"  required="" />
                            </div>--}}

                            <div class="form-group col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary " type="submit" name="submit" style="box-shadow: 0 3px 2px rgb(12 218 144 / 20%);"><i class='bx bx-save' style='color:#f3f3f3'  ></i> Accepter</button>
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

@endsection
