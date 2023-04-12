@extends('Etudiant.Etudiant')

@section('title', 'Cours')

@section('MesCoursActive', 'active')

@section('the-home-content')
    <style>
        .shadow {
            box-shadow: 0 0 3px rgb(53 64 78 / 20%) !important;
        }

        .rounded {
            border-radius: 5px !important;
        }

        .bg-light {
            background-color: #f7f8fa !important;
        }

        .bg-primary,
        .btn-primary,
        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.focus,
        .btn-outline-primary:not(:disabled):not(.disabled):active,
        .badge-primary,
        .nav-pills .nav-link.active,
        .pagination .active a,
        .custom-control-input:checked~.custom-control-label:before,
        #preloader #status .spinner>div,
        .social-icon li a:hover,
        .back-to-top:hover,
        .back-to-home a,
        ::selection,
        #topnav .navbar-toggle.open span:hover,
        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots.clickable .owl-dot:hover span,
        .watch-video a .play-icon-circle,
        .sidebar .widget .tagcloud>a:hover,
        .flatpickr-day.selected,
        .flatpickr-day.selected:hover,
        .tns-nav button.tns-nav-active,
        .form-check-input.form-check-input:checked {
            background-color: #6dc77a !important;
        }

        .badge {
            padding: 5px 8px;
            border-radius: 3px;
            letter-spacing: 0.5px;
            font-size: 12px;
        }

        .btn-primary,
        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.focus,
        .btn-outline-primary:not(:disabled):not(.disabled):active {
            box-shadow: 0 3px 7px rgb(109 199 122 / 50%) !important;
        }

        .btn-primary,
        .btn-outline-primary,
        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.focus,
        .btn-outline-primary:not(:disabled):not(.disabled):active,
        .bg-soft-primary .border,
        .alert-primary,
        .alert-outline-primary,
        .badge-outline-primary,
        .nav-pills .nav-link.active,
        .pagination .active a,
        .form-group .form-control:focus,
        .form-group .form-control.active,
        .custom-control-input:checked~.custom-control-label:before,
        .custom-control-input:focus~.custom-control-label::before,
        .form-control:focus,
        .social-icon li a:hover,
        #topnav .has-submenu.active.active .menu-arrow,
        #topnav.scroll .navigation-menu>li:hover>.menu-arrow,
        #topnav.scroll .navigation-menu>li.active>.menu-arrow,
        #topnav .navigation-menu>li:hover>.menu-arrow,
        .flatpickr-day.selected,
        .flatpickr-day.selected:hover,
        .form-check-input:focus,
        .form-check-input.form-check-input:checked,
        .container-filter li.active,
        .container-filter li:hover {
            border-color: #6dc77a !important;
        }

        .bg-primary,
        .btn-primary,
        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.focus,
        .btn-outline-primary:not(:disabled):not(.disabled):active,
        .badge-primary,
        .nav-pills .nav-link.active,
        .pagination .active a,
        .custom-control-input:checked~.custom-control-label:before,
        #preloader #status .spinner>div,
        .social-icon li a:hover,
        .back-to-top:hover,
        .back-to-home a,
        ::selection,
        #topnav .navbar-toggle.open span:hover,
        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots.clickable .owl-dot:hover span,
        .watch-video a .play-icon-circle,
        .sidebar .widget .tagcloud>a:hover,
        .flatpickr-day.selected,
        .flatpickr-day.selected:hover,
        .tns-nav button.tns-nav-active,
        .form-check-input.form-check-input:checked {
            background-color: #6dc77a !important;
        }

        .btn {
            padding: 8px 20px;
            outline: none;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            font-weight: 600;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #6dc77a !important;
            border: 1px solid #6dc77a !important;
            color: #fff !important;
            box-shadow: 0 3px 7px rgb(109 199 122 / 50%);
        }

        a {
            text-decoration: none;
        }
    </style>
    <div class="home-content px-3 pt-4" id="myDiv" style="font-family:roboto,sans-serif;">
        <div class="container-fluid row mb-3 " id="bar">
            <div class="content container-fluid">
                <div class="page-header px-4">
                    <div class="row align-items-center">
                        <div class="col"><a href="{{url('/etudiant/mescours')}}">
                            <h3 class="page-title">Mes Cours</h3></a>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Etudiant</li>
                                <li class="breadcrumb-item active">Mes Cours</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <section class="py-6 bg-light-primary">
                    <div class="container">
                        <div class="row justify-content-center text-center mb-2">
                            <div class="col-xl-6 col-lg-8 col-sm-10">
                                <h2 class="font-weight-bold">Liste des Cours</h2>
                                <p class="text-muted mb-0"> Veuillez choisir une matière pour accéder à vos cours.</p>
                            </div>
                        </div>

                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                              rel="stylesheet" />
                        <div class="container pt-4 " id="containercours">

                            <!--end row-->


                            <!--end row-->
                        </div>
                    </div>
                </section>
            </div>
            <script>
                console.log('heiwhiei');
                $(document).ready(function() {

                    $.ajax({
                        url: '/etudiant/courslist', // Replace with the URL of your server-side script
                        method: 'GET',
                        success: function(response) {
                            $('#containercours').html(
                                response); // Replace the content of the div with the AJAX response
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
                function CoursInfo(id) {
                    $.ajax({
                        url: '/etudiant/coursInfo/'+id, // replace with the actual URL of your Laravel route
                        type: 'GET', // replace with the appropriate HTTP method
                        success: function(response) {
                            $('#containercours').html(
                                response); // Replace the content of the div with the AJAX response
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }

            </script>
        </div>
    </div>
@endsection
