@extends('Professeur.AcceuilProf')
@section('ListeEtudiantsActive', 'Active')
@section('title', 'List Des étudiant')



@section('the-home-content')

    <style>
        .compose-btn {
            margin-bottom: 1.875rem
        }

        .mail-important {
            color: #ffd200;
        }

        .unread .name,
        .unread .subject,
        .unread .mail-date {
            color: #000;
            font-weight: 600
        }

        .compose-btn a {
            font-weight: 600;
            padding: 8px 15px
        }

        .inbox-menu {
            display: inline-block;
            margin: 0 0 1.875rem;
            padding: 0;
            width: 100%
        }

        .inbox-menu li {
            display: inline-block;
            width: 100%;

        }

        li {
            list-style: none !important;
        }

        a {
            text-decoration: none;
        }

        .inbox-menu li+li {
            margin-top: 2px
        }

        .inbox-menu li a {
            color: #333;
            display: inline-block;
            padding: 10px 15px;
            width: 100%;
            text-transform: capitalize;
            -webkit-transition: .3s ease;
            -moz-transition: .3s ease;
            transition: .3s ease
        }

        .inbox-menu li a i {
            font-size: 16px;
            padding-right: 10px;
            color: #878787
        }

        .inbox-menu li a:hover,
        .inbox-menu li.active a,
        .inbox-menu li a:focus {
            background: rgba(33, 33, 33, .05)
        }
    </style>




    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Messages</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Professeur / </li>
                            <li class="breadcrumb-active">Mes messages</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="compose-btn w-100">
                    <a class="btn compose-btn btn-primary btn-block w-100">
                        Boîte de réception
                    </a>
                </div>
                <ul class="inbox-menu">
                    <li class="{{ Request::is('/Messages/Recu') ? 'active' : '' }}">
                        <a href="/Messages/Recu"><i class="fas fa-download"></i> Messages reçus <span
                                class="mail-count">({{ count($messages) }})</span></a>
                    </li>
                    <li class="{{ Request::is('/Messages/Envoyées') ? 'active' : '' }}">
                        <a href="/Messages/Envoyées"><i class="fas fa-paper-plane"></i> Messages envoyés </a>
                    </li>


                </ul>
            </div>
            <div class="col-lg-9 col-md-8 the-changed-div">
                <div class="card">
                    <div class="card-body">
                        <div class="email-header">
                            <div class="row">
                                <div class="col top-action-left">
                                    <div class="float-start">
                                        <div class="btn-group dropdown-action">
                                            <button type="button" class="btn btn-white dropdown-toggle"
                                                data-bs-toggle="dropdown">Sélectioner </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Tous les messages</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">lu</a>
                                                <a class="dropdown-item" href="#">Non lu</a>
                                            </div>
                                        </div>

                                        <div class="btn-group dropdown-action mail-search">
                                            <input type="text" placeholder="Recherche"
                                                class="form-control search-message">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto top-action-right">
                                    <div class="text-end">
                                        <button type="button" title="Refresh" data-bs-toggle="tooltip"
                                            class="btn btn-white d-none d-md-inline-block"><i
                                                class="fas fa-sync-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="email-content">
                            <div class="table-responsive">
                                <table class="table table-inbox table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="6">
                                                <input type="checkbox" class="checkbox-all">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message)
                                            <tr data-target="#quoteForm" data-toggle="modal" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                class="{{ $message->vu === 'non' ? 'unread clickable-row' : 'clickable-row' }}  ">
                                                <td>
                                                    <input type="checkbox" class="checkmail">
                                                </td>
                                                <td>
                                                </td>
                                                <td class="name">
                                                    {{ $message->sender_mail }}
                                                </td>
                                                <td class="subject">{{ $message->objet }}</td>
                                                <td></td>
                                                <td class="mail-date">
                                                    {{ date_format(date_create($message->date_envoi), 'M d') }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="email-content">
                            <div class="table-responsive">
                                <table class="table table-inbox table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="6">
                                                <input type="checkbox" class="checkbox-all">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="unread clickable-row">
                                            <td>
                                                <input type="checkbox" class="checkmail">
                                            </td>
                                            <td>
                                            </td>
                                            <td class="name">John Doe</td>
                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit</td>
                                            <td></td>
                                            <td class="mail-date">13:14</td>
                                        </tr>
                                        <tr class="unread clickable-row">
                                            <td>
                                                <input type="checkbox" class="checkmail">
                                            </td>
                                            <td>
                                            </td>
                                            <td class="name">John Doe</td>
                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit</td>
                                            <td></td>
                                            <td class="mail-date">13:14</td>
                                        </tr>
                                        <tr class="unread clickable-row">
                                            <td>
                                                <input type="checkbox" class="checkmail">
                                            </td>
                                            <td>
                                            </td>
                                            <td class="name">John Doe</td>
                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit</td>
                                            <td></td>
                                            <td class="mail-date">13:14</td>
                                        </tr>
                                        <tr class="unread clickable-row">
                                            <td>
                                                <input type="checkbox" class="checkmail">
                                            </td>
                                            <td>
                                            </td>
                                            <td class="name">John Doe</td>
                                            <td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit</td>
                                            <td></td>
                                            <td class="mail-date">13:14</td>
                                        </tr>
                                        <tr class="unread clickable-row">
                                            <td>
                                                <input type="checkbox" class="checkmail">
                                            </td>
                                            <td>
                                            </td>
                                            <td class="name">Envato Account</td>
                                            <td class="subject">Important account security update from Envato</td>
                                            <td></td>
                                            <td class="mail-date">8:42</td>
                                        </tr>
                                        <tr class="clickable-row">
                                            <td>
                                                <input type="checkbox" class="checkmail">
                                            </td>
                                            <td>
                                            </td>
                                            <td class="name">Twitter</td>
                                            <td class="subject">HRMS Bootstrap Admin Template</td>
                                            <td></td>
                                            <td class="mail-date">30 Nov</td>
                                        </tr>
                                        -
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quoteForm" tabindex="-1" role="dialog" aria-labelledby="quoteForm" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document"style="width: 500px">
            <div class="modal-content p-md-3">
                <div class="modal-header">
                    <h5 class="modal-title">Message</h5>
                    <button class="close border-1 btn bg-transparent" type="button" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <script>
                        function dateAbsence(dateAbs) {
                            const laDate = document.getElementById('dateAbsence');
                            laDate.value = dateAbs;
                            console.log(laDate.value);
                        }

                        function previewImage(event) {
                            var input = event.target;
                            var preview = document.getElementById('preview');
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.compose-btn').click(function() {
                var url = "{{ url('/compose-email') }}"; // Generate the URL for the route
                $('.the-changed-div').load(url); // Load the view HTML into the div
            });
        });
    </script>



@endsection
