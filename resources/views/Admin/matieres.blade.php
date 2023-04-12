@extends('Admin.admin')

@section('title', 'Matieres')
@section('MatiereActive', 'active')

@section('the-home-content')
    <div class="container pt-4">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
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
                        <form method="post" action="{{ url('ajouterMatiere') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title">
                                        <span>Ajouter une matiere</span>
                                    </h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label
                                        >Matiere ID
                                            <span class="login-danger">*</span></label
                                        >
                                        <input type="text" name="matiereID" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="form-group local-forms">
                                        <label
                                        >Matiere
                                            <span class="login-danger">*</span></label
                                        >
                                        <input type="text" name="matiere" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">
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
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Matieres</h3>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped"
                            >
                                <thead class="student-thread">
                                <tr>
                                    <th>Matiere ID</th>
                                    <th>Matiere</th>
                                    <th>Enseignants</th>
                                    <th class="text-end">Nombre Classes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($matieres as $matiere)
                                <tr>
                                    <td>{{$matiere->id_matiere}}</td>
                                    <td>
                                        <h2>
                                            <a><span class="badge badge-soft-success mb-0">{{$matiere->libele}}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{ $matiere->count }}</td>
                                    <td class="text-end">
                                        {{
                                            DB::table('emploi_temps')
                                            ->select(DB::raw('count(distinct(cast(id_group as varchar) + cast(id_niveau as varchar))) as count'))
                                            ->where('id_matiere', '=', $matiere->id_matiere)
                                            ->get()
                                            ->first()
                                            ->count
                                        }}
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
@endsection
