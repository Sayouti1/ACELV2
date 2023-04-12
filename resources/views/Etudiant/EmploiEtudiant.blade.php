@extends('Etudiant.Etudiant')

@section('title', 'Mon Emploi Du Temps')

@section('MonEmploiDuTempsActive', 'active')

@section('the-home-content')

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
    <div class="home-content px-3 pt-4" id="myDiv" style="font-family:roboto,sans-serif;">
        <div class="content container-fluid">
            <div class="main-wrapper">
                <div class="page-wrapper">
                    <div class="content container-fluid">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Mon Emploi Du Temps</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">Etudiants</li>
                                        <li class="breadcrumb-item active">Emploi Du Temps</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="container px-0">
                            <div class="row justify-content-center text-center mb-2">
                                <div class="col-xl-6 col-lg-8 col-sm-10">
                                    <h2 class="font-weight-bold">Emploi du temps</h2>
                                    <p class="text-muted mb-0"> Retrouvez ici tous les horaires de vos cours pour ne rien
                                        manquer de votre journée de classes.</p>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-12">
                                    <div class="schedule-table">
                                        <!-- resources/views/timetable/index.blade.php -->
                                        <table class="table bg-white">
                                            <thead>
                                            <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
