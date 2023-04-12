@extends('Professeur.AcceuilProf')
@section('EmploiActive', 'active')
@section('title', 'Emploi du temps')

@section('the-home-content')

    <style>
        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .fa-2x {
            font-size: 2em;
        }

        .table-billing-history th,
        .table-billing-history td {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            padding-left: 1.375rem;
            padding-right: 1.375rem;
        }

        .table> :not(caption)>*>*,
        .dataTable-table> :not(caption)>*>* {
            padding: 0.75rem 0.75rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .border-start-primary {
            border-left-color: #0061f2 !important;
        }

        .border-start-secondary {
            border-left-color: #0061f2 !important;
        }

        .border-start-success {
            border-left-color: #0061f2 !important;
        }

        .border-start-lg {
            border-left-width: 0.25rem !important;
        }

        .h-100 {
            height: 100% !important;
        }
    </style>
    <style>
        .schedule-table table thead tr {
            background: #86d4f5;
        }

        .schedule-table table thead th {
            padding: 10px 18px;
            color: #fff;
            text-align: center;
            font-size: 20px;
            font-weight: 800;
            position: relative;
            border: 0;
        }

        .schedule-table table thead th:before {
            content: "";
            width: 3px;
            height: 35px;
            background: rgba(255, 255, 255, 0.2);
            position: absolute;
            right: -1px;
            top: 50%;
            transform: translateY(-50%);
        }

        .schedule-table table thead th.last:before {
            content: none;
        }

        .schedule-table table tbody td {
            vertical-align: middle;
            border: 1px solid #e2edf8;
            font-weight: 500;
            padding: 15px;
            text-align: center;
        }

        .schedule-table table tbody td.day {
            font-size: 22px;
            font-weight: 600;
            background: #f0f1f3;
            border: 1px solid #e4e4e4;
            position: relative;
            transition: all 0.3s linear 0s;
            min-width: 140px;
        }

        .schedule-table table tbody td.active {
            position: relative;
            z-index: 10;
            transition: all 0.3s linear 0s;
            min-width: 140px;
        }

        .schedule-table table tbody td.active h4 {
            font-weight: 700;
            color: #000;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .schedule-table table tbody td.active p {
            font-size: 16px;
            line-height: normal;
            margin-bottom: 0;
        }

        .schedule-table table tbody td .hover h4 {
            font-weight: 700;
            font-size: 20px;
            color: #ffffff;
            margin-bottom: 5px;
        }

        .schedule-table table tbody td .hover p {
            font-size: 16px;
            margin-bottom: 5px;
            color: #ffffff;
            line-height: normal;
        }

        .schedule-table table tbody td .hover span {
            color: #ffffff;
            font-weight: 600;
            font-size: 18px;
        }

        .schedule-table table tbody td.active::before {
            position: absolute;
            content: "";
            min-width: 100%;
            min-height: 100%;
            transform: scale(0);
            top: 0;
            left: 0;
            z-index: -1;
            border-radius: 0.25rem;
            transition: all 0.3s linear 0s;
        }

        .schedule-table table tbody td .hover {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 120%;
            height: 120%;
            transform: translate(-50%, -50%) scale(0.8);
            z-index: 99;
            background: #86d4f5;
            border-radius: 0.25rem;
            padding: 15px 0;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s linear 0s;
        }

        .schedule-table table tbody td.active:hover .hover {
            transform: translate(-50%, -50%) scale(1);
            visibility: visible;
            opacity: 1;
        }

        .schedule-table table tbody td.day:hover {
            background: #86d4f5;
            color: #fff;
            border: 1px solid #86d4f5;
        }

        @media screen and (max-width: 1199px) {
            .schedule-table {
                display: block;
                width: 100%;
                overflow-x: auto;
            }

            .schedule-table table thead th {
                padding: 25px 40px;
            }

            .schedule-table table tbody td {
                padding: 20px;
            }

            .schedule-table table tbody td.active h4 {
                font-size: 18px;
            }

            .schedule-table table tbody td.active p {
                font-size: 15px;
            }
            .schedule-table table tbody td.day {
                font-size: 20px;
            }

            .schedule-table table tbody td .hover {
                padding: 15px 0;
            }

            .schedule-table table tbody td .hover span {
                font-size: 17px;
            }
        }

        @media screen and (max-width: 991px) {
            .schedule-table table thead th {
                font-size: 18px;
                padding: 20px;
            }

            .schedule-table table tbody td.day {
                font-size: 18px;
            }

            .schedule-table table tbody td.active h4 {
                font-size: 17px;
            }
        }

        @media screen and (max-width: 767px) {
            .schedule-table table thead th {
                padding: 15px;
            }

            .schedule-table table tbody td {
                padding: 15px;
            }

            .schedule-table table tbody td.active h4 {
                font-size: 16px;
            }

            .schedule-table table tbody td.active p {
                font-size: 14px;
            }

            .schedule-table table tbody td .hover {
                padding: 10px 0;
            }

            .schedule-table table tbody td.day {
                font-size: 18px;
            }

            .schedule-table table tbody td .hover span {
                font-size: 15px;
            }
        }

        @media screen and (max-width: 575px) {
            .schedule-table table tbody td.day {
                min-width: 135px;
            }
        }

        .card-style1 {
            box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
        }

        .border-0 {
            border: 0 !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
        }

        section {
            padding: 40px 0;
            overflow: hidden;
            background: #fff;
        }

        .mb-2-3,
        .my-2-3 {
            margin-bottom: 2.3rem;
        }

        .section-title {
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .text-primary {
            color: #ceaa4d !important;
        }

        .text-secondary {
            color: #15395A !important;
        }

        .font-weight-600 {
            font-weight: 600;
        }

        .display-26 {
            font-size: 1.3rem;
        }

        @media screen and (min-width: 992px) {
            .p-lg-7 {
                padding: 4rem;
            }
        }

        @media screen and (min-width: 768px) {
            .p-md-6 {
                padding: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {
            .p-sm-2-3 {
                padding: 2.3rem;
            }
        }

        .p-1-9 {
            padding: 1.9rem;
        }

        .bg-secondary {
            background: #15395A !important;
        }

        @media screen and (min-width: 576px) {

            .pe-sm-6,
            .px-sm-6 {
                padding-right: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {

            .ps-sm-6,
            .px-sm-6 {
                padding-left: 3.5rem;
            }
        }

        .pe-1-9,
        .px-1-9 {
            padding-right: 1.9rem;
        }

        .ps-1-9,
        .px-1-9 {
            padding-left: 1.9rem;
        }

        .pb-1-9,
        .py-1-9 {
            padding-bottom: 1.9rem;
        }

        .pt-1-9,
        .py-1-9 {
            padding-top: 1.9rem;
        }

        .mb-1-9,
        .my-1-9 {
            margin-bottom: 1.9rem;
        }
        @media (min-width: 992px) {
            .d-lg-inline-block {
                display: inline-block !important;
            }
        }

        .rounded {
            border-radius: 0.25rem !important;
        }

        #nivaux-select {
            font-size: 16px;
            padding: 8px;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        #nivaux-select optgroup {
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }

        #nivaux-select option {
            font-size: 16px;
            color: #555;
        }

        #nivaux-select option:checked {
            background-color: #e6f2ff;
        }
    </style>

    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header px-4">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Emploi du temps</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Professeur / </li>
                            <li class="breadcrumb-active"> Emploi du temps</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row  px-4">
            <div class="col-lg-4 mb-4">
                <!-- Billing card 1-->
                <div class="card h-100 border-start-lg border-start-primary">
                    <div class="card-body">
                        <div class="small text-muted">Nombre total de groupes par semaine</div>
                        <div class="h3">{{$nbrGroupe}} Groupes</div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <!-- Billing card 2-->
                <div class="card h-100 border-start-lg border-start-secondary">
                    <div class="card-body">
                        <div class="small text-muted">Nombre total de séances par semaine</div>
                        <div class="h3">{{$nbrSeance}} Séances</div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <!-- Billing card 3-->
                <div class="card h-100 border-start-lg border-start-success">
                    <div class="card-body">
                        <div class="small text-muted">Nombre total d'heures de cours par semaine</div>
                        <div class="h3 d-flex align-items-center">{{$nbrSeance*1.5}} Heures</div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <div class="row justify-content-center text-center mb-2">
                <div class="col-xl-6 col-lg-8 col-sm-10">
                    <h2 class="font-weight-bold">Emploi du temps</h2>

                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="schedule-table">
                        <!-- resources/views/timetable/index.blade.php -->
                        <table class="table bg-white">
                            <thead>
                                <tr style="font-family: 'Poppins', sans-serif">
                                    <th></th>
                                    <th class="seance-1">8:30 - 10:00</th>
                                    <th class="seance-2">10:30 - 12:30</th>
                                    <th class="seance-3">14:30 - 16:00</th>
                                    <th class="seance-4">16:30 - 18:00</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($days as $day)
                                    <tr>
                                        <td class="day">{{ $day }}</td>
                                        <td class="active" data-day="{{ $day }}" data-session="1">
                                            @if ($timetable[$day][1] != '')
                                                {!! $timetable[$day][1] !!}
                                                <p>8:30 - 10:00</p>
                                            @endif
                                        </td>
                                        <td class="active" data-day="{{ $day }}" data-session="2">
                                            @if ($timetable[$day][2] != '')
                                                {!! $timetable[$day][2] !!}
                                                <p>10:30 - 12:00</p>
                                            @endif
                                        </td>
                                        <td class="active" data-day="{{ $day }}" data-session="3">
                                            @if ($timetable[$day][3] != '')
                                                {!! $timetable[$day][3] !!}
                                                <p>14:30 - 16:00</p>
                                            @endif
                                        </td>
                                        <td class="active" data-day="{{ $day }}" data-session="4">
                                            @if ($timetable[$day][4] != '')
                                                {!! $timetable[$day][4] !!}
                                                <p>16:30 - 18:00</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>




                        {{-- <table class="table bg-white">
            <thead>
                <tr>
                    <th></th>
                    <th class="seance-1">8:30 - 10::00</th>
                    <th class="seance-2">10:30 - 12:30</th>
                    <th></th>
                    <th class="seance-3">14:30 - 16:00</th>
                    <th class="seance-4" class="last">16:30 - 18:00</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="day">Lundi</td>
                    <td class="active" data-day="monday" data-session="1">
                        <h4>aLGORITHMS</h4>
                        <p>8:30 - 10::00</p>
                        <div class="hover">
                            <h4>Weight Loss</h4>
                            <p>10 am - 11 am</p>
                            <span>Wayne Ponce</span>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="active" data-day="monday" data-session="3">
                        <h4>JAVA</h4>
                        <p>14:30 - 16:00</p>
                        <div class="hover">
                            <h4>Boxing</h4>
                            <p>05 pm - 046am</p>
                            <span>Charles King</span>
                        </div>
                    </td>
                    <td class="active" data-day="monday" data-session="3">
                        <h4>JAVA</h4>
                        <p>16:30 - 18:00</p>
                        <div class="hover">
                            <h4>Boxing</h4>
                            <p>05 pm - 046am</p>
                            <span>Charles King</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="day">Mardi</td>
                    <td></td>
                    <td class="active">
                        <h4>ENGLISH</h4>
                        <p>11 am - 12 pm</p>
                        <div class="hover">
                            <h4>Cycling</h4>
                            <p>11 am - 12 pm</p>
                            <span>Tabitha Potter</span>
                        </div>
                    </td>
                    <td class="active">
                        <h4>Karate</h4>
                        <p>03 pm - 05 pm</p>
                        <div class="hover">
                            <h4>Karate</h4>
                            <p>03 pm - 05 pm</p>
                            <span>Lester Gray</span>
                        </div>
                    </td>
                    <td></td>
                    <td class="active">
                        <h4>Crossfit</h4>
                        <p>07 pm - 08 pm</p>
                        <div class="hover">
                            <h4>Crossfit</h4>
                            <p>07 pm - 08 pm</p>
                            <span>Candi Yip</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="day">Mercredi</td>
                    <td class="active">
                        <h4>Spinning</h4>
                        <p>10 am - 11 am</p>
                        <div class="hover">
                            <h4>Spinning</h4>
                            <p>10 am - 11 am</p>
                            <span>Mary Cass</span>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="active">
                        <h4>Bootcamp</h4>
                        <p>05 pm - 06 pm</p>
                        <div class="hover">
                            <h4>Bootcamp</h4>
                            <p>05 pm - 06 pm</p>
                            <span>Brenda Mastropietro</span>
                        </div>
                    </td>
                    <td class="active">
                        <h4>Boxercise</h4>
                        <p>07 pm - 08 pm</p>
                        <div class="hover">
                            <h4>Boxercise</h4>
                            <p>07 pm - 08 pm</p>
                            <span>Marlene Bruce</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="day">Jeudi</td>
                    <td class="active">
                        <h4>Body Building</h4>
                        <p>10 am - 12 pm</p>
                        <div class="hover">
                            <h4>Body Building</h4>
                            <p>10 am - 12 pm</p>
                            <span>Brenda Hester</span>
                        </div>
                    </td>
                    <td></td>
                    <td class="active">
                        <h4>Dance</h4>
                        <p>03 pm - 05 pm</p>
                        <div class="hover">
                            <h4>Dance</h4>
                            <p>03 pm - 05 pm</p>
                            <span>Brian Ashworth</span>
                        </div>
                    </td>
                    <td></td>
                    <td class="active">
                        <h4>Health</h4>
                        <p>07 pm - 08 pm</p>
                        <div class="hover">
                            <h4>Health</h4>
                            <p>07 pm - 08 pm</p>
                            <span>Mark Croteau</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="day">Vendredi</td>
                    <td></td>
                    <td class="active">
                        <h4>Bootcamp</h4>
                        <p>11 am - 12 pm</p>
                        <div class="hover">
                            <h4>Bootcamp</h4>
                            <p>1 am - 12 pm</p>
                            <span>Elisabeth Schreck</span>
                        </div>
                    </td>
                    <td></td>
                    <td class="active">
                        <h4>Boday Building</h4>
                        <p>05 pm - 06 pm</p>
                        <div class="hover">
                            <h4>Boday Building</h4>
                            <p>05 pm - 06 pm</p>
                            <span>Edward Garcia</span>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table> --}}
                    </div>
                </div>
            </div>
        </div>


    @endsection
