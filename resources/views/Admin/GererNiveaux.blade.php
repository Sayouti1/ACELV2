@extends('Admin.admin')

@section('title', 'Gérer Les Niveaux')

@section('GererNiveauxActive', 'active')

@section('the-home-content')

    <style>
        .niveau-div {
            cursor: pointer;
        }

        .niveau-div:hover {
            background-color: #b6f1ff
        }
    </style>

    <div class="home-content container-fluid  px-4 pt-4" id="home-content">

    </div>

    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $.ajax({
                url: '/Niveaux', // Replace with the URL of your server-side script
                method: 'GET',
                success: function(response) {
                    $('#home-content').html(
                        response); // Replace the content of the div with the AJAX response
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>


@endsection
