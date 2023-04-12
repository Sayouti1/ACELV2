@extends('Etudiant.Etudiant')

@section('title', 'Acceuil')

@section('AcceuilActive','active')

@section('the-home-content')

    <style>
        .bg-light-gray {
            background-color: #f7f7f7;
        }
        .table-bordered thead td,
        .table-bordered thead th {
            border-bottom-width: 2px;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .bg-sky.box-shadow {
            box-shadow: 0px 5px 0px 0px #00a2a7;
        }

        .bg-orange.box-shadow {
            box-shadow: 0px 5px 0px 0px #af4305;
        }

        .bg-green.box-shadow {
            box-shadow: 0px 5px 0px 0px #4ca520;
        }

        .bg-yellow.box-shadow {
            box-shadow: 0px 5px 0px 0px #dcbf02;
        }

        .bg-pink.box-shadow {
            box-shadow: 0px 5px 0px 0px #e82d8b;
        }

        .bg-purple.box-shadow {
            box-shadow: 0px 5px 0px 0px #8343e8;
        }

        .bg-lightred.box-shadow {
            box-shadow: 0px 5px 0px 0px #d84213;
        }

        .bg-sky {
            background-color: #02c2c7;
        }

        .bg-orange {
            background-color: #e95601;
        }

        .bg-green {
            background-color: #5bbd2a;
        }

        .bg-yellow {
            background-color: #f0d001;
        }

        .bg-pink {
            background-color: #ff48a4;
        }

        .bg-purple {
            background-color: #9d60ff;
        }

        .bg-lightred {
            background-color: #ff5722;
        }

        .padding-15px-lr {
            padding-left: 15px;
            padding-right: 15px;
        }
        .padding-5px-tb {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .margin-10px-bottom {
            margin-bottom: 10px;
        }
        .border-radius-5 {
            border-radius: 5px;
        }

        .margin-10px-top {
            margin-top: 10px;
        }
        .font-size14 {
            font-size: 14px;
        }

        .text-light-gray {
            color: #d6d5d5;
        }
        .font-size13 {
            font-size: 13px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
    <div class="container-fluid pt-2" style="background-color:#FFFFFF; width: 98%;height: 90%; padding-top: 10px; font-family: 'Poppins', sans-serif;">
        <div class="text-center fs-4 fw-semibold  mt-3 border-bottom" style="font-family: Georgia, 'Times New Roman', Times, serif;">
            Emploi du temps :
        </div>
        <div class="row">
            <div class="timetable-img text-center">
                <img src="img/content/timetable.png" alt="" />
            </div>
            <div class="table-responsive p-2">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Heure</th>
                        <th class="text-uppercase">Lundi</th>
                        <th class="text-uppercase">Mardi</th>
                        <th class="text-uppercase">Mercredi</th>
                        <th class="text-uppercase">jeudi</th>
                        <th class="text-uppercase">Vendredi</th>
                        <th class="text-uppercase">Samedi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($emploi as $emp)
                        <tr>
                            <th scope="row">{{$emp->heure}}</th>
                            <td>
                    <span class="padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13 {{$emp->lundi == 'REPOS' ? 'bg-warning' : ($emp->lundi =='null' ? '' : 'bg-sky')}}">
        {{$emp->lundi}}
    </span>
                            </td> <td>
                  <span
                      class="padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13 {{$emp->mardi == 'REPOS' ? 'bg-warning' : ($emp->mardi =='null' ? '' : 'bg-sky')}}"
                  >{{$emp->mardi}}</span>
                            </td> <td>
                  <span
                      class="padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13 {{$emp->mercredi == 'REPOS' ? 'bg-warning' : ($emp->mercredi =='null' ? '' : 'bg-sky')}}"
                  >{{$emp->mercredi}}</span>
                            </td> <td>
                  <span
                      class="padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13 {{$emp->jeudi == 'REPOS' ? 'bg-warning' : ($emp->jeudi =='null' ? '' : 'bg-sky')}}"
                  >{{$emp->jeudi}}</span>
                            </td> <td>
                  <span
                      class="padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13 {{$emp->vendredi == 'REPOS' ? 'bg-warning' : ($emp->vendredi =='null' ? '' : 'bg-sky')}}"
                  >{{$emp->vendredi}}</span>
                            </td> <td>
                  <span
                      class="padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13 {{$emp->samedi == 'REPOS' ? 'bg-warning' : ($emp->samedi =='null' ? '' : 'bg-sky')}}"
                  >{{$emp->samedi}}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
