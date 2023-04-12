@extends('Admin.admin')

@section('title', 'Acceuil')
@section('AcceuilActive', 'active')

@section('the-home-content')

    <style>
        .card-body {
            position: relative;
            padding: 25px;
            flex: 1 1 auto;
            color: #333;
            font-family: roboto, sans-serif;
            font-size: 15px;
            line-height: 1.5;
        }

        h6 {
            margin: 0;
            font-weight: 400;
            font-size: 14px;
            color: #808191;
            line-height: 1.2;
            display: block;
            margin-bottom: 5px;
        }

        h3 {
            font-size: 22px;
            font-weight: 600;
            color: #000;
            margin-bottom: 0;
        }

        .card {
            background-color: #fff;
            border: 0;
            border-radius: 10px;
            box-shadow: 0 0 31px 3px rgba(44, 50, 63, .02);
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            margin-bottom: 30px;
        }
        a{
            text-decoration: none;
        }
    </style>

    <div class="home-content container-fluid px-4 pt-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <a href="{{url('/admin/preinscriptions')}}">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Préinscription</h6>
                                <h3>{{
                                    DB::table('preinscri')->count()
                                }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('images/dash-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Etudiants</h6>
                                <h3>{{\App\Models\Etudiant::count()}}+</h3>
                            </div>
                            <div class="db-icon text-end">
                                <img src="{{ asset('images/student.png') }}" class="w-50" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Professeur</h6>
                                <h3>{{\App\Models\Professeur::count()}}+</h3>
                            </div>
                            <div class="db-icon text-end">
                                <img src="{{ asset('images/teacher.png') }}" alt="Dashboard Icon" class="w-50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Notifications</h6>
                                <h3>20+</h3>
                            </div>
                            <div class="db-icon text-end">
                                <img src="{{ asset('images/notification.png') }}"class="w-50" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
