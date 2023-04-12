@extends('Etudiant.Etudiant')

@section('title', 'Acceuil')

@section('TraveauxAFaireActive','active')

@section('the-home-content')

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    .btn.btn-primary{
        min-width: 50vw;
    }
</style>
    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 0;
        }

        .card {
            margin-bottom: 30px;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.57rem;
        }

        .note-has-grid .nav-link {
            padding: .5rem
        }

        .note-has-grid .single-note-item .card {
            border-radius: 10px
        }

        .note-has-grid .single-note-item .favourite-note {
            cursor: pointer
        }

        .note-has-grid .single-note-item .side-stick {
            position: absolute;
            width: 3px;
            height: 35px;
            left: 0;
            background-color: rgba(82, 95, 127, .5)
        }

        .note-has-grid .single-note-item .category-dropdown.dropdown-toggle:after {
            display: none
        }

        .note-has-grid .single-note-item .category [class*=category-] {
            height: 15px;
            width: 15px;
            display: none
        }

        .note-has-grid .single-note-item .category [class*=category-]::after {
            content: "\f0d7";
            font: normal normal normal 14px/1 FontAwesome;
            font-size: 12px;
            color: #fff;
            position: absolute
        }

        .note-has-grid .single-note-item .category .category-business {
            background-color: rgba(44, 208, 126, .5);
            border: 2px solid #2cd07e
        }

        .note-has-grid .single-note-item .category .category-social {
            background-color: rgba(44, 171, 227, .5);
            border: 2px solid #2cabe3
        }

        .note-has-grid .single-note-item .category .category-important {
            background-color: rgba(255, 80, 80, .5);
            border: 2px solid #ff5050
        }

        .note-has-grid .single-note-item.all-category .point {
            color: rgba(82, 95, 127, .5)
        }

        .note-has-grid .single-note-item.note-business .point {
            color: rgba(44, 208, 126, .5)
        }

        .note-has-grid .single-note-item.note-business .side-stick {
            background-color: rgba(44, 208, 126, .5)
        }

        .note-has-grid .single-note-item.note-business .category .category-business {
            display: inline-block
        }

        .note-has-grid .single-note-item.note-favourite .favourite-note {
            color: #ffc107
        }

        .note-has-grid .single-note-item.note-social .point {
            color: rgba(44, 171, 227, .5)
        }

        .note-has-grid .single-note-item.note-social .side-stick {
            background-color: rgba(44, 171, 227, .5)
        }

        .note-has-grid .single-note-item.note-social .category .category-social {
            display: inline-block
        }

        .note-has-grid .single-note-item.note-important .point {
            color: rgb(255, 0, 0)
        }

        .note-has-grid .single-note-item.note-important .side-stick {
            background-color: rgb(255, 0, 0)
        }

        .note-has-grid .single-note-item.note-important .category .category-important {
            display: inline-block
        }

        .note-has-grid .single-note-item.all-category .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite .more-options {
            display: block
        }

        .note-has-grid .single-note-item.all-category.note-business .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite.note-business .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite.note-important .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite.note-social .more-options,
        .note-has-grid .single-note-item.all-category.note-important .more-options,
        .note-has-grid .single-note-item.all-category.note-social .more-options {
            display: none
        }

        @media (max-width:767.98px) {
            .note-has-grid .single-note-item {
                max-width: 100%
            }
        }

        @media (max-width:991.98px) {
            .note-has-grid .single-note-item {
                max-width: 216px
            }
        }

        .ajouter-btn {
            float: right !important;
            margin-left: auto;
        }
    </style>
<div class="container-fluid ms-md-3 mt-5 border  rounded align-items-center" style="background-color:#FFFFFF; width: 98%;height: 90%; padding-top: 10px;">
   {{-- <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8 text-center fs-3 border-bottom" style="font-family: 'Poppins', sans-serif;">Traveaux a faire</div>
        <div class="col-2"></div>
    </div>
    <div class="row mt-2 d-flex justify-content-center">
        <div class="col m-5 mt-2 text-center bg-info">
        </div>
    </div>
    @php
        $count = 1;
    @endphp
    @foreach($devoirs as $dev)
        <div class="row mt-2 d-block justify-content-center">
            <p class="text-center">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample{{$count}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$count}}">
                    {{$dev->groupe}}
                </a>
            </p>
            <div class="collapse" id="collapseExample{{$count}}">
--}}{{--                <div class="card card-body" style="background-color: #F9F9F9;">--}}{{--
--}}{{--                    <span class="font-monospace text-secondary" style=" font-size: 12px;line-height: 1.2;font-weight: 400;font-family: Arial, sans-serif;color: #333;">Prof : Ahmed ALami ,le {{$dev->dateMiseEnLigne}} :</span> {{$dev->contenue}}--}}{{--
--}}{{--                </div>--}}{{--

                <div class="card shaodw-lg card-1" style="background-color: #3D5AFE !important; color: white;">
                    <div class="card-header pt-2 pb-0 ml-auto border-0">

                        Le : {{$dev->dateMiseEnLigne}}
                    </div>
                    <div class="card-body d-flex pt-3">
                        <div class="row no-gutters justify-content-start flex-sm-row flex-column">
                            <div class="col-md-3 text-center">
                                <h5 class="text fs-5 fw-semibold" style="margin-bottom: 0;">{{$dev->groupe}}</h5>
                                <img class="irc_mi img-fluid mr-0" src="https://cdn4.iconfinder.com/data/icons/logistics-delivery-2-5/64/137-512.png" width="100" height="100">
                            </div>
                            <div class="col-md-9">
                                <div class="card border-0" style="background-color: #3D5AFE !important; color: white;">
                                    <div class="card-body">

                                        <p class="card-text" style="font-size: 13px;"><p>{{$dev->contenue}} sfsdfsdfsdfsfsfsdfsdfsdfsdfsdfdsfsdfs dsfdsf  sf sdfdsf sd fds fds fdsfsd</p></p>
                                        <!-- <button type="button" class="btn btn-primary btn-round-lg btn-lg" style="border-radius: 22.5px; background-color: #eee; color: #3D5AFE; font-size: 14px; font-weight: 600; letter-spacing: 0.9px; padding: 8px 20px 8px 20px !important; border: 1px solid #fff; outline: none !important; box-shadow: none !important;">Import my data</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @php
            $count++;
        @endphp
    @endforeach--}}
    <div class="page-content container note-has-grid">
        <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
            @foreach($matieres as $key => $matiere)
                <li class="nav-item mx-1">
                    <a href="javascript:void(0)"
                       class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2{{ $loop->first ? ' active' : '' }}"
                       id="{{$matiere->id_matiere}}" >
                        <i class="icon-layers mr-1"></i><span class="d-none d-md-block">{{$matiere->libele}}</span>
                    </a>
                </li>
            @endforeach
           {{-- <li class="nav-item">
                <a href="javascript:void(0)"
                   class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2"
                   id="note-important"> <i class="icon-briefcase mr-1"></i><span
                        class="d-none d-md-block">Exercices</span></a>
            </li>--}}
        </ul>
        <div class="tab-content bg-transparent">
            <div id="note-full-container" class="note-has-grid row">


                {{-- @foreach($cours as $cour)
                 <div class="col-md-4 single-note-item all-category note-social" style="">
                     <div class="card card-body">
                         <span class="side-stick"></span>
                         <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Change a Design">{{$cour->nom}} <i class="point fa fa-circle ml-1 font-10"></i></h5>
                         <p class="note-date font-12 text-muted">{{$cour->dateMiseEnLigne}}</p>
                         <div class="note-content">
                             <p class="note-inner-content text-muted"
                                 data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                 {{$cour->descripiton}}</p>
                         </div>
                         <div class="d-flex align-items-center">
                             <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                             <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                             <div class="ml-auto">
                                 <div class="category-selector btn-group">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach--}}
                {{-- <div class="col-md-4 single-note-item all-category note-business" style="">
                     <div class="card card-body">
                         <span class="side-stick"></span>
                         <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Give review for foods">Give
                             review for foods <i class="point fa fa-circle ml-1 font-10"></i></h5>
                         <p class="note-date font-12 text-muted">18 December 2020</p>
                         <div class="note-content">
                             <p class="note-inner-content text-muted"
                                 data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                 Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</p>
                         </div>
                         <div class="d-flex align-items-center">
                             <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                             <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                             <div class="ml-auto">
                                 <div class="category-selector btn-group">


                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 single-note-item all-category note-important" style="">
                     <div class="card card-body">
                         <span class="side-stick"></span>
                         <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Give salary to employee">Give
                             salary to employee <i class="point fa fa-circle ml-1 font-10"></i></h5>
                         <p class="note-date font-12 text-muted">15 Fabruary 2020</p>
                         <div class="note-content">
                             <p class="note-inner-content text-muted"
                                 data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                 Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</p>
                         </div>
                         <div class="d-flex align-items-center">
                             <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                             <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                             <div class="ml-auto">
                                 <div class="category-selector btn-group">


                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>--}}
            </div>
        </div>

        <!-- Modal Add notes -->
<script>
    $(document).ready(function() {
        var activeLink = document.querySelector('.nav-link.active');
        var activeLinkId = activeLink.getAttribute('id');
        $.ajax({
            url: '/etudiant/exercices/'+activeLinkId, // replace with the actual URL of your Laravel route
            type: 'GET', // replace with the appropriate HTTP method
            success: function(response) {
                $('#note-full-container').html(
                    response); // Replace the content of the div with the AJAX response
                console.log('Successss');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $(function() {
        $('.note-link').click(function() {
            $('.note-link').removeClass('active');
            $(this).addClass('active');
            var id = $(this).attr('id');
            $.ajax({
                url: '/etudiant/exercices/'+id, // replace with the actual URL of your Laravel route
                type: 'GET', // replace with the appropriate HTTP method
                success: function(response) {
                    $('#note-full-container').html(
                        response); // Replace the content of the div with the AJAX response
                    console.log('Successss');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

    </div>

</div>
@endsection
