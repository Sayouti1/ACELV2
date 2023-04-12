@extends('Etudiant.Etudiant')

@section('title', 'Notes')

@section('MesNotesActive','active')

@section('the-home-content')

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

</style>
    <div class="page-header px-4 py-4">
        <div class="row align-items-center">
            <div class="col">
                    <h3 class="page-title">Mes notes</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Etudiant</li>
                    <li class="breadcrumb-item active">Mes Notes</li>
                </ul>
            </div>
        </div>
    </div>
<div class="container-fluid ms-md-3 mt-5 border  rounded align-items-center" style="background-color:#FFFFFF; width: 98%;height: 90%; padding-top: 10px; ">
    <div class="row mt-3 mb-3">
        <div class="col-8 text-start fs-3 text-muted" style="font-family:'Poppins', sans-serif ">Notes :</div>
        <div class="col-2"></div>
        <div class="col-2"></div>
    </div>

    {{--<table class="table  p-5 table-striped border table-responsive table-hover result-point">
        <thead class="bg-warning text-center point-table-head">
        <tr  style="font-family: 'Poppins', sans-serif;  font-weight: 400;">
            <th scope="col" class="text-center"
                style="
                      padding: 20px;
                      border: 1px solid #dedede;
                      color: #000;
                    ">Matiere</th>
            <th scope="col" class="text-center"
                style="
                      padding: 20px;
                      border: 1px solid #dedede;
                      color: #000;
                    ">Controle 1</th>
            <th scope="col" class="text-center"
                style="
                      padding: 20px;
                      border: 1px solid #dedede;
                      color: #000;
                    ">Controle 2</th>
            <th scope="col" class="text-center"
                style="
                      padding: 20px;
                      border: 1px solid #dedede;
                      color: #000;
                    ">Controle 3</th>
            <th scope="col" class="text-center"
                style="
                      padding: 20px;
                      border: 1px solid #dedede;
                      color: #000;
                    ">Controle 4</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($notes as $note)
            <tr style="font-family: 'Nunito', sans-serif;
                      padding: 10px 40px;
                      border: 1px solid #dedede;
                      text-align: left !important;
                    ">
                <th scope="row">{{$note->matiere}}</th>
                <td class="text-center" style="padding: 10px 40px; border: 1px solid #dedede">{{$note->controle1}}</td>
                <td class="text-center" style="padding: 10px 40px; border: 1px solid #dedede">{{$note->controle2}}</td>
                <td class="text-center" style="padding: 10px 40px; border: 1px solid #dedede">{{$note->controle3}}</td>
                <td class="text-center" style="padding: 10px 40px; border: 1px solid #dedede">{{$note->controle4}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>--}}

    <style>
        .content-info {
            background: #f9f9f9;
            padding: 40px 0;
            background-size: cover!important;
            background-position: top center!important;
            background-repeat: no-repeat!important;
            position: relative;
            padding-bottom:100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background: #f9f9f9;
        }


    </style>
    <section class="content-info" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
        <div class="container paddings-mini">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table-striped table-responsive table-hover" style="width: 100%;background: #fff;border: 1px solid #dedede;border-collapse: separate;border-spacing: 2px;
">
                        <thead class="point-table-head">

                        <tr style="font-family: 'Times New Roman',sans-serif; font-size: 18px">
                            <th class="text-left" style="padding: 20px; border: 1px solid #dedede;color: #000;">Matiere</th>
                            <th class="text-center" style="padding: 20px; border: 1px solid #dedede;color: #000;">Controle 1</th>
                            <th class="text-center" style="padding: 20px; border: 1px solid #dedede;color: #000;">Controle 2</th>
                            <th class="text-center" style="padding: 20px; border: 1px solid #dedede;color: #000;">Controle 3</th>
                            <th class="text-center" style="padding: 20px; border: 1px solid #dedede;color: #000;">Controle 4</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($notes as $note)
                        <tr>
                            <td class="text-left" style="padding: 10px 20px;border: 1px solid #dedede; text-align: left">{{$note->libele}}</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">{{$note->note1}}</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">{{$note->note2}}</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">{{$note->note3}}</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">{{$note->note4}}</td>
                        </tr>
                        @endforeach
                        {{--<tr>
                            <td class="text-left" style="padding: 10px 20px;border: 1px solid #dedede; text-align: left">Mathematique</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">16</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">12</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">14</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">9</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="padding: 10px 20px;border: 1px solid #dedede; text-align: left">Sport</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">15</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">13</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">11</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">11</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="padding: 10px 20px;border: 1px solid #dedede; text-align: left">English</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">19</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">18</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">16</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;"></td>
                        </tr>
                        <tr>
                            <td class="text-left" style="padding: 10px 20px;border: 1px solid #dedede; text-align: left">Histoire</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">15</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">13</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">17</td>
                            <td style="  padding: 10px 20px;border: 1px solid #dedede;">15</td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection
