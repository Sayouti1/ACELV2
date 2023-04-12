@extends('Professeur.AcceuilProf')
@section('CoursActive', 'active')
@section('title', 'List Des étudiant')



@section('the-home-content')


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
    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header px-4">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Cours</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Professeur / </li>
                            <li class="breadcrumb-active">Modifier Les Cours</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-content container note-has-grid">
            <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
                <li class="nav-item">
                    <a href="javascript:void(0)"
                        class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active"
                        id="all-category" >
                        <i class="icon- layers mr-1"></i><span class="d-none d-md-block">Cours</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)"
                        class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2"
                        id="note-important"> <i class="icon-briefcase mr-1"></i><span
                            class="d-none d-md-block">Exercices</span></a>
                </li>
                <li class="nav-item ajouter-btn">
                    <a href="javascript:void(0)" class="nav-link btn-primary rounded-pill d-flex align-items-center px-3"
                        id="add-notes"> <i class="icon-note m-1"></i><span
                            class="d-none d-md-block font-14">Ajouter</span></a>
                </li>
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

        </div>

        <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form  method="post" action="{{ route('saveCoursExercices') }}" enctype="multipart/form-data">
                    @csrf
                <div class="modal-content border-0">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title text-white">Ajouter un<span id="typeFichier1"> cours</span></h5>
                        <button type="button" class="close text-white" id="x-button" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="row d-flex justify-content-center mt-1">
                        <div class="col-md-4"> Niveau :
                            <select class="form-select" name="niveau" onchange="getGroups()">
                                @foreach ($listeNiveau as $niv)
                                    <option value="{{ $niv->id_niveau }}">{{ $niv->libele }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4" style="height: 15px">
                            Groupe :
                            <select class="form-select" id="group" name="groupe">
                                <option value="">--Groupe--</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <form id="add-notes-form">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="note-title">
                                                <label>Titre Du<span id="typeFichier"> Cours</span></label>
                                                <input type="text" id="note-has-title" class="form-control" name="title" maxlength="30" placeholder="Title" required/>
                                            </div>
                                        </div>
                                        <input type="text" name="Id" id="Id" style="visibility: hidden">
                                        <div class="col-md-12 mb-3">
                                            <div class="note-description">
                                                <label>Description</label>
                                                <textarea id="note-has-description" name="description" class="form-control" maxlength="200" placeholder="Description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="image-group-container">
                                                <label for="photo" class="photo-label">Images</label>
                                                <input type="file" class="form-control-file" id="real-file" name="photo" hidden="hidden" accept="image/*" multiple required>
                                                <button type="button" id="custom-button" class="custom-button">Sélectionner</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-n-save" class="float-left btn btn-success" style="display: none;">Save</button>
                        <button id="btn-n-discard" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button id="btn-n-add" type="submit"  class="btn btn-info" disabled="disabled">Ajouter</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
        @if (session('successdelete'))
            <script>
                iziToast.warning({
                    title: 'OK',
                    message: '{{ session('successdelete') }}',
                });
            </script>
        @endif
        @if (session('successExer'))
            <script>
                iziToast.warning({
                    title: 'OK',
                    message: '{{ session('successExer') }}',
                });
            </script>
        @endif
        @if (session('success'))
            <script>
                iziToast.success({
                    title: 'OK',
                    message: '{{ session('success') }}',
                });
            </script>
        @endif


    </div>
    <script>
        function getGroups() {
            var level_id = document.querySelector('select[name="niveau"]').value;
            var group_select = document.getElementById('group');

            // Clear existing options
            group_select.innerHTML = '<option value="">--Groupe--</option>';

            $.ajax({
                url: "/get-groups-by-levels/" + level_id,
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


        function loadCours() {
            $.ajax({
                url: '/get-cours-exercices',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#note-full-container').empty();
                    $.each(data, function(index, card) {

                        var cardHtml = '<div class="col-md-4 single-note-item all-category note-social" style="">' +
                            '<div class="card card-body">' +
                            '<span class="side-stick"></span>' +
                            '<h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Change a Design">' + card.nom + ' <i class="point fa fa-circle ml-1 font-10"></i></h5>' +
                            '<p class="note-date font-12 text-muted">' + card.dateMiseEnLigne + '</p>' +
                            '<div class="note-content">' +
                            '<p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">' + card.descripiton + '</p>' +
                            '</div>' +
                            '<div class="d-flex align-items-center">' +
                            '<span class="mr-1" onclick="deleteCours('+card.id+')"><i class="fa fa-trash remove-note"></i></span>' +
                            '<div class="ml-auto">' +
                            '<div class="category-selector btn-group"></div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $('#note-full-container').append(cardHtml);
                    });
                }
            });
        }
        function loadExercices() {
            $.ajax({
                url: '/get-exercices-cours',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#note-full-container').empty();
                    $.each(data, function(index, card) {
                        var cardHtml = '<div class="col-md-4 single-note-item all-category note-important" style="">' +
                            '<div class="card card-body">' +
                            '<span class="side-stick"></span>' +
                            '<h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Change a Design">' + card.titre + ' <i class="point fa fa-circle ml-1 font-10"></i></h5>' +
                            '<p class="note-date font-12 text-muted">' + card.dateMiseEnLigne + '</p>' +
                            '<div class="note-content">' +
                            '<p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">' + card.descripiton + '</p>' +
                            '</div>' +
                            '<div class="d-flex align-items-center">' +
                            '<span class="mr-1" onclick="deleteExercice('+card.id+')"><i class="fa fa-trash remove-note"></i></span>' +
                            '<div class="ml-auto">' +
                            '<div class="category-selector btn-group"></div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $('#note-full-container').append(cardHtml);
                    });
                }
            });
        }

        function deleteCours(id){
                if (confirm("Voulez vous Supprimer le cours ?")) {
                    window.location.href = "{{ url('/deleteCours/') }}" +"/"+ id;
                }
        }
        function deleteExercice(id){
            if (confirm("Voulez vous Supprimer l'exercice ?")) {
                window.location.href = "{{ url('/deleteExercice/') }}" +"/"+ id;
            }
        }
    </script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        const realFileBtn = document.getElementById("real-file");
        const customBtn = document.getElementById("custom-button");
        const customTxt = document.getElementById("custom-text");

        customBtn.addEventListener("click", function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener("change", function() {
            if (realFileBtn.value) {
                customTxt.innerHTML = realFileBtn.value.match(
                    /[\/\\]([\w\d\s\.\-\(\)]+)$/
                )[1];
            } else {
                customTxt.innerHTML = "No file chosen, yet.";
            }
        });
    </script>


    <script>

        $(document).ready(function() {
            loadCours();
        });
        $(function() {
            $('.note-link').click(function() {
                $('.note-link').removeClass('active');
                $(this).addClass('active');
                if ($(this).attr('id') == 'all-category') {
                    loadCours();
                }
                else if ($(this).attr('id') == 'note-important') {
                    // Make another Ajax request to retrieve important cards
                    loadExercices();
                }
            });

            function removeNote() {
                $(".remove-note").off('click').on('click', function(event) {
                    event.stopPropagation();
                    $(this).parents('.single-note-item').remove();
                })
            }

            function favouriteNote() {
                $(".favourite-note").off('click').on('click', function(event) {
                    event.stopPropagation();
                    $(this).parents('.single-note-item').toggleClass('note-favourite');
                })
            }

            function addLabelGroups() {
                $('.category-selector .badge-group-item').off('click').on('click', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var getclass = this.className;
                    var getSplitclass = getclass.split(' ')[0];
                    if ($(this).hasClass('badge-business')) {
                        $(this).parents('.single-note-item').removeClass('note-social');
                        $(this).parents('.single-note-item').removeClass('note-important');
                        $(this).parents('.single-note-item').toggleClass(getSplitclass);
                    } else if ($(this).hasClass('badge-social')) {
                        $(this).parents('.single-note-item').removeClass('note-business');
                        $(this).parents('.single-note-item').removeClass('note-important');
                        $(this).parents('.single-note-item').toggleClass(getSplitclass);
                    } else if ($(this).hasClass('badge-important')) {
                        $(this).parents('.single-note-item').removeClass('note-social');
                        $(this).parents('.single-note-item').removeClass('note-business');
                        $(this).parents('.single-note-item').toggleClass(getSplitclass);
                    }
                });
            }

            // var $btns = $('.note-link').click(function() {
            //     if (this.id == 'all-category') {
            //         var $el = $('.' + this.id).fadeIn();
            //         $('#note-full-container > div').not($el).hide();
            //     }
            //     if (this.id == 'important') {
            //         var $el = $('.' + this.id).fadeIn();
            //         $('#note-full-container > div').not($el).hide();
            //     } else {
            //         var $el = $('.' + this.id).fadeIn();
            //         $('#note-full-container > div').not($el).hide();
            //     }
            //     $btns.removeClass('active');
            //     $(this).addClass('active');
            // })

            $('#add-notes').on('click', function(event) {
                var activeID = $('.nav-item .active').attr('id');
                console.log(activeID);
                Id.value = activeID;
                if(activeID == "note-important"){
                    typeFichier1.innerHTML = " Exercice";
                    typeFichier.innerHTML = " Exercice";

                }

                $('#addnotesmodal').modal('show');
                $('#btn-n-save').hide();
                $('#btn-n-add').show();
            })

            $('#btn-n-discard').on('click', function(event) {
                $('#addnotesmodal').modal('hide');

            })

            $('#x-button').on('click', function(event) {
                $('#addnotesmodal').modal('hide');

            })
            // Button add
            // $("#btn-n-add").on('click', function(event) {
            //     event.preventDefault();
            //     /* Act on the event */
            //     var today = new Date();
            //     var dd = String(today.getDate()).padStart(2, '0');
            //     var mm = String(today.getMonth()); //January is 0!
            //     var yyyy = today.getFullYear();
            //     var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
            //         "Nov", "Dec"
            //     ];
            //     today = dd + ' ' + monthNames[mm] + ' ' + yyyy;
            //
            //     var $_noteTitle = document.getElementById('note-has-title').value;
            //     var $_noteDescription = document.getElementById('note-has-description').value;
            //
            //     $html = '<div class="col-md-4 single-note-item all-category"><div class="card card-body">' +
            //         '<span class="side-stick"></span>' +
            //         '<h5 class="note-title text-truncate w-75 mb-0" data-noteHeading="' + $_noteTitle +
            //         '">' + $_noteTitle + '<i class="point fa fa-circle ml-1 font-10"></i></h5>' +
            //         '<p class="note-date font-12 text-muted">' + today + '</p>' +
            //         '<div class="note-content">' +
            //         '<p class="note-inner-content text-muted" data-noteContent="' + $_noteDescription +
            //         '">' + $_noteDescription + '</p>' +
            //         '</div>' +
            //         '<div class="d-flex align-items-center">' +
            //         '<span class="mr-1"><i class="fa fa-star favourite-note"></i></span>' +
            //         '<span class="mr-1"><i class="fa fa-trash remove-note"></i></span>' +
            //         '<div class="ml-auto">' +
            //         '<div class="category-selector btn-group">' +
            //         '<a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">' +
            //         '<div class="category">' +
            //         '<div class="category-business"></div>' +
            //         '<div class="category-social"></div>' +
            //         '<div class="category-important"></div>' +
            //         '<span class="more-options text-dark"><i class="icon-options-vertical"></i></span>' +
            //         '</div>' +
            //         '</a>' +
            //         '<div class="dropdown-menu dropdown-menu-right category-menu">' +
            //         '<a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business</a>' +
            //         '<a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social</a>' +
            //         '<a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important</a>' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>' +
            //         '</div></div> ';
            //
            //     $("#note-full-container").prepend($html);
            //     $('#addnotesmodal').modal('hide');
            //
            //     removeNote();
            //     favouriteNote();
            //     addLabelGroups();
            // });

            $('#addnotesmodal').on('hidden.bs.modal', function(event) {
                event.preventDefault();
                document.getElementById('note-has-title').value = '';
                document.getElementById('note-has-description').value = '';
            })

            removeNote();
            favouriteNote();
            addLabelGroups();

            $('#btn-n-add').attr('disabled', 'disabled');
        })

        $('#note-has-title').keyup(function() {
            var empty = false;
            $('#note-has-title').each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });

            if (empty) {
                $('#btn-n-add').attr('disabled', 'disabled');
            } else {
                $('#btn-n-add').removeAttr('disabled');
            }
        });
    </script>

@endsection
