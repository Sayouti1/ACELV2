<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('images/a.png')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
          integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
          integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/testsidebar.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
          integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <title>@yield('title', 'Admin Page')</title>
    {{--    <script src="testsidebar.js" defer></script> --}}
</head>

<body>
<div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
            <h1 class="fs-4 px-2 me-2 user-name">Yassine Mafamane</h1>
            <button class="btn d-md-none d-block close-btn px-1 py-0" style="color: #333333;"><i
                    class="fa-solid fa-bars-staggered"></i></button>
        </div>

        <ul class="list-unstyled px-2">
            <li class="@yield('AcceuilActive', '')"><a href="{{ url('/admin') }}"
                                                       class="text-decoration-none px-3 py-2 d-block">
                    <i class="fa-solid fa-house mx-2"></i>
                    Accueil</a>
            </li>

            <li class=""><a href="{{ url('/AjouterEtudiant') }}"
                                                               class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-users-gear mx-2"></i>
                    Etudiants</a>
                <ul>
                    <li class="sub-menu @yield('AjouterEtudiantActive', '')"><a class="text-decoration-none px-3 py-2 d-block"
                                            href="{{ url('/AjouterEtudiant') }}">Ajouter un
                            étudiants</a>
                    </li>
                    <li class="sub-menu @yield('ListeEtudiantsActive', '')"><a class="text-decoration-none px-3 py-2 d-block"
                                            href="{{ url('/list-etudiants') }}">List des
                            étudiants</a></li>
                </ul>
            </li>

            <li class=""><a href="{{ route('professeur.index') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-chalkboard-user mx-2"></i>
                    Professeurs</a>
                <ul>
                    <li class="sub-menu @yield('AjouterProfesseurActive', '')"><a class="text-decoration-none px-3 py-2 d-block "
                                            href="{{ url('/AjouterProfesseur') }}">Ajouter un
                            professeur</a>
                    </li>
                    <li class="sub-menu @yield('ListeProfesseursActive', '')"><a class="text-decoration-none px-3 py-2 d-block"
                                            href="{{ url('/listeProfesseurs') }}">List des
                            professeurs</a></li>
                </ul>
            </li>
            {{--<li class=""><a href="{{ url('/listeProfesseurs') }}"
                                                       class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-user-large mx-2"></i>
                    Parents</a></li>--}}
            <li class=" @yield('GererNiveauxActive', '')"><a href="{{ url('/GererNiveaux') }}"
                            class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-server mx-2"></i>
                    Niveaux</a></li>
            <li class="@yield('MatiereActive', '')"><a href="{{url('/matieres')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-book mx-2"></i> Matières</a></li>
            <li class="@yield('EmploiActive', '')"><a href="{{url('/Gérer-Emploi')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-calendar-days mx-2"></i> Emploi du temps</a></li>
            <li class="@yield('AbsenceActive', '')"><a href="{{url('/admin/Absences')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-regular fa-file-lines mx-2"></i> Absence</a></li>
            {{--<li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-people-roof mx-2"></i> Salles</a></li>--}}
            <li class="@yield('PayementsActive', '')"><a href="{{ url('/payement') }}"
                                                         class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-money-check-dollar mx-2"></i> Paiement</a></li>
        </ul>
        <hr class="h-color mx-2">

        <ul class="list-unstyled px-2">
            <li class=""><a href="{{url('/Admin/Messagerie')}}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-bell mx-2"></i> Messagerie</a></li>
            <li class="@yield('NotificationsActive', '')"><a href="{{ url('/notifications') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fa-solid fa-gears mx-2"></i> Paramètres</a></li>
        </ul>

    </div>

    <div class="content" style="height: 100vh; overflow-y: scroll;">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                    <a class="navbar-brand fs-4" href="#">Yassine Mafamane</a>
                    <button class="btn px-1 py-0 open-btn me-2"><i class="fa-solid fa-bars-staggered"></i>
                    </button>
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <style>
                        .btnDeconnexion {
                            background-color: #fff;
                            border: 0 solid #e2e8f0;
                            border-radius: 1.5rem;
                            box-sizing: border-box;
                            color: #0d172a;
                            cursor: pointer;
                            display: inline-block;
                            font-family: "Basier circle",-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                            font-size: 0.8rem;
                            font-weight: 500;
                            line-height: 1;
                            padding: 0.8rem 1rem;
                            text-align: center;
                            text-decoration: none #0d172a solid;
                            text-decoration-thickness: auto;
                            transition: all .1s cubic-bezier(.4, 0, .2, 1);
                            box-shadow: 0px 1px 2px rgba(166, 175, 195, 0.25);
                            user-select: none;
                            -webkit-user-select: none;
                            touch-action: manipulation;
                        }

                        .btnDeconnexion:hover {
                            background-color: #1e293b;
                            color: #fff;
                        }
                    </style>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <!-- HTML !-->
                                    <button class="btnDeconnexion" role="button">Deconnexion</button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('the-home-content')

    </div>
</div>

{{--    <script src="js/bootstrap.bundle.min.js"></script> --}}
{{--    <script src="js/all.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    const file = document.querySelector("#real-file")
    file.addEventListener("change", function () {
        const reader = new FileReader()
        reader.addEventListener("load", () => {
            document.querySelector("#image").src = reader.result
        })
        reader.readAsDataURL(this.files[0]);
        reader.onload = () => {
            image.src = reader.result;
            image.style.maxWidth = '100%';
            image.style.maxHeight = '100%';
        };
    })
</script>
<script>
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");

    customBtn.addEventListener("click", function () {
        realFileBtn.click();
    });

    realFileBtn.addEventListener("change", function () {
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
    $(".sidebar ul li").on('click', function () {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    });

    $(".open-btn").on('click', function () {
        $('.sidebar').addClass('active');
    });

    $(".close-btn").on('click', function () {
        $('.sidebar').removeClass('active');
    })
</script>
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"
        integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"
        integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
