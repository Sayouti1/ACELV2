@extends('Admin.admin')

@section('title', 'Nouveau professeur')

@section('AjouterProfesseurActive', 'active')


@section('the-home-content')


    <style>
        .schedule-table table thead tr {
            background: #9bbef2;
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
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Géres Les Emplois Du Temps</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Classes / </li>
                            <li class="breadcrumb-active">Emplois Du Temps</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-group-form">
            <div class="row">


                <div class="col-lg-5 col-md-5">
                    <div class="form-group">
                        <select name="niveau" class="form-control" onchange="getGroups()">
                            <option value="hidden-opt" disabled selected hidden>Sélectionez Un Niveaux</option>
                            @foreach ($listeNiveau as $niv)
                                <option value="{{ $niv->id_niveau }}">
                                    {{ $niv->libele }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="form-group">
                        <select class="form-control" id="group">
                            <option value="">--Sélectionez Un Group--</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Recherche</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="emploi" id="emploi">

        </div>





        <div id="but-div" class="modif-butt d-flex justify-content-center align-items-center my-2 d-none">
            @csrf
            <a href="{{ url('/Modifier_Emploi_Du_Temps') }}" class="btn btn-lg btn-primary">Modifier</a>
        </div>

    </div>

    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function getGroups() {
            var level_id = document.querySelector('select[name="niveau"]').value;
            var group_select = document.getElementById('group');

            // Clear existing options
            group_select.innerHTML = '<option value="">--Sélectionez Un Group--</option>';

            $.ajax({
                url: "/get-groups-by-level/" + level_id,
                type: "GET",
                success: function(response) {
                    // Use the parsed response directly
                    var groups = response;
                    console.log(groups);
                    for (var i = 0; i < groups.length; i++) {
                        var option = document.createElement('option');
                        option.text = groups[i].libele;
                        option.value = groups[i].id_group;
                        group_select.add(option);
                    }
                },
                error: function(xhr) {
                    // Handle the error if the request fails
                    console.log(xhr.responseText);
                }
            });
        }
    </script>


    <script>
        // Send Ajax request to get groups
        // var xhr = new XMLHttpRequest();
        // xhr.open('GET', '/get-groups-by-level/' + level_id, true);
        // xhr.onload = function() {
        //     if (xhr.status === 200) {
        //         var groups = JSON.parse(xhr.responseText);
        //         for (var i = 0; i < groups.length; i++) {
        //             var option = document.createElement('option');
        //             option.text = groups[i].label;
        //             option.value = groups[i].id;
        //             group_select.add(option);
        //         }
        //     } else {
        //         console.log(level_id);
        //         console.log('Error getting groups');
        //     }
        // };
        // xhr.send();

        $(document).ready(function() {
            $('#group').change(function() {
                var selectedGroup = $(this).val();
                $.ajax({
                    url: '/emploi_temps/' + selectedGroup,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        console.log('helloooooooooooooooooooooooo');
                        console.log(response.timetable);
                        $('#emploi').html(response);
                        $('#but-div').removeClass('d-none');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

    {{-- <script>
        const selectElement = document.querySelector('#nivaux-select');
        const emploiElement = document.querySelector('#emploi');

        selectElement.addEventListener('change', (event) => {
            const selectedOption = event.target.options[event.target.selectedIndex];
            const optgroupLabel = selectedOption.parentNode.label;
            const optionText = selectedOption.textContent;
            selectElement.firstElementChild.textContent = optgroupLabel + ' - ' + optionText;
        });
    </script> --}}

@endsection
