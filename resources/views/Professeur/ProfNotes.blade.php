@extends('Professeur.AcceuilProf')
@section('NotesActive', 'active')
@section('title', 'List Des étudiant')



@section('the-home-content')

    <style>
        .insert-student-notes-btn {
            float: right;
        }

        .project-list-table {
            border-collapse: separate;
            border-spacing: 0 12px
        }

        .project-list-table tr {
            background-color: #fff;


        }

        .table-nowrap td,
        .table-nowrap th {
            white-space: nowrap;
        }

        .table-borderless>:not(caption)>*>* {
            border-bottom-width: 0;
        }

        .table>:not(caption)>*>* {
            padding: 0.75rem 0.75rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .avatar-sm {
            height: 2rem;
            width: 2rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }

        img,
        svg {
            vertical-align: middle;
        }

        a {
            color: #3b76e1;
            text-decoration: none;
        }

        .badge-soft-danger {
            color: #f56e6e !important;
            background-color: rgba(245, 110, 110, .1);
        }

        .badge-soft-success {
            color: #63ad6f !important;
            background-color: rgba(99, 173, 111, .1);
        }

        .badge-soft-primary {
            color: #3b76e1 !important;
            background-color: rgba(59, 118, 225, .1);
        }

        .badge-soft-info {
            color: #57c9eb !important;
            background-color: rgba(87, 201, 235, .1);
        }

        .avatar-title {
            align-items: center;
            background-color: #3b76e1;
            color: #fff;
            display: flex;
            font-weight: 500;
            height: 100%;
            justify-content: center;
            width: 100%;
        }

        .bg-soft-primary {
            background-color: rgba(59, 118, 225, .25) !important;
        }
    </style>

    <div class="home-content container-fluid  px-4 pt-4">
        <div class="page-header px-4">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Notes</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Professeur / </li>
                            <li class="breadcrumb-active">Modifier Les Notes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="student-group-form px-3">
            <div class="row">
                {{--<div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Chercher par Nom ...">
                    </div>
                </div>--}}
                <div class="col-lg-3 col-md-6">
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
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <select class="form-control" id="group">
                            <option value="">--Sélectionez Un Group--</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Afficher</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="table-responsive">

                            <table id=""
                                class="table project-list-table table-nowrap align-middle table-borderless">
                                <thead>
                                    <tr class="my-2">

                                        <th scope="col">Id</th>
                                        <th scope="col">Etudiant</th>
                                        <th scope="col">Note 1</th>
                                        <th scope="col">Note 2</th>
                                        <th scope="col">Note 3</th>
                                        <th scope="col">Note 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $notes = array() @endphp
                                @foreach($students as $stu)
                                  @php
                                    $notes[$stu->id_etudiant]['note1'] = $stu->note1;
                                    $notes[$stu->id_etudiant]['note2'] = $stu->note2;
                                    $notes[$stu->id_etudiant]['note3'] = $stu->note3;
                                    $notes[$stu->id_etudiant]['note4'] = $stu->note4;
                                    @endphp                                    <tr>
                                        <td>{{ $stu->id_etudiant }}</td>
                                        <td>{{ DB::table('etudiants')
                                        ->select(DB::raw("CONCAT(nom, ' ', prenom) as full_name"))
                                        ->where('id_etudiant', '=', $stu->id_etudiant)
                                        ->value('full_name') }}</td>
                                        <td contenteditable="true" >{{$stu->note1}}</td>
                                        <td contenteditable="true" >{{$stu->note2}}</td>
                                        <td contenteditable="true" >{{$stu->note3}}</td>
                                        <td contenteditable="true" >{{$stu->note4}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                // Set the maximum value for all <td> elements
                const maxNote = 20;

                // Get all <td> elements with contenteditable="true"
                const notes = document.querySelectorAll('td[contenteditable="true"]');

                // Add an event listener to each <td> element
                notes.forEach(note => {
                    note.addEventListener('input', function() {
                        // Get the current value of the <td> element
                        let value = parseInt(note.textContent);

                        // Check if the value is greater than the maximum value
                        if (value > maxNote) {
                            // If the value is greater than the maximum value, set it to the maximum value
                            note.textContent = maxNote;

                        }
                    });
                });



            </script>
            <div class="col-lg-2 insert-student-notes-btn">
                <div class="Annuler d-inline">
                    <button type="btn" class="btn btn-danger">Annuler</button>
                </div>
                <div class="insert d-inline">
                    <button type="btn" class="btn btn-primary">Enregister</button>
                </div>
                <script>
                    const saveBtn = document.querySelector('.insert button');
                    saveBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        askConfirmation();
                    });
                    function askConfirmation(){
                        iziToast.question({
                            timeout: 20000,
                            close: false,
                            overlay: true,
                            displayMode: 'once',
                            id: 'question',
                            zindex: 999,
                            title: 'Notes',
                            message: 'Sauvegarder les notes ?',
                            position: 'center',
                            buttons: [
                                ['<button><b>Oui</b></button>', function (instance, toast) {
                                    const tableRows = document.querySelectorAll('tbody tr');
                                    const notes = {};
                                    tableRows.forEach(row => {
                                        const id = row.cells[0].textContent;
                                        const note1 = row.cells[2].textContent;
                                        const note2 = row.cells[3].textContent;
                                        const note3 = row.cells[4].textContent;
                                        const note4 = row.cells[5].textContent;
                                        notes[id] = {
                                            note1: note1,
                                            note2: note2,
                                            note3: note3,
                                            note4: note4
                                        };
                                    });
                                    $.ajax({
                                        url: "{{ route('save_notes') }}",
                                        type: "POST",
                                        dataType: "json",
                                        data: {
                                            "_token": "{{ csrf_token() }}",
                                            "notes": notes
                                        },
                                        success: function(response) {
                                            console.log(response);
                                        },
                                        error: function(xhr, status, error) {
                                            console.log(xhr.responseText);
                                        }
                                    });
                                    iziToast.success({
                                        title: 'OK',
                                        message: 'Notes ont ete enregistres',
                                    });
                                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                                }, true],
                                ['<button>Annuler</button>', function (instance, toast) {

                                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                                }],
                            ],
                            onClosing: function(instance, toast, closedBy){
                                console.info('Closing | closedBy: ' + closedBy);
                            },
                            onClosed: function(instance, toast, closedBy){
                                console.info('Closed | closedBy: ' + closedBy);
                            }
                        });
                    }
                </script>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#notes-table').DataTable();
        })
    </script>

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
@endsection
