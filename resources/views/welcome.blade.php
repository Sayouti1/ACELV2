{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accel - Inscription Ouverte</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300;1,400&display=swap" rel="stylesheet">
    <script src="{{ asset('js/preinscr.js') }}" defer></script>
</head>

<body>
    <div class="header">
        <div class="alert alert-primary mb-0" role="alert">
            <div class="alert-container">
                <p class="m-0 alert-p">
                    Appelez-nous! <span><i class="fa-solid fa-phone "></i><a class="alert-link"
                            href="tel:+(212) 639884170"> +(212) 639884170</a></span> | <a class="alert-link"
                        href="mailto:accel.info@gmail.com">accel.info@gmail.com</a>
                </p>

                <div class="m-0 special">
                    Inscription Ouverte! Places limitées disponibles.
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="navbar-container">
                <a class="navbar-brand" href="#">
                    <img class="Logo" src="{{asset('images/AccelLogo4.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navvar-ulcontainer collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-ul navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                L’établissement
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Notre Program</a></li>
                                <li><a class="dropdown-item" href="#">Gallerie</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Localisation</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">S'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin') }}">Se connecter</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide mb-0">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/slide-image-2.png') }}" class="d-block w-100 h-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slider-image1.png') }}" class="d-block w-100 h-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="header-bottom-band">
            <div class="header-band-container">
                <div class="text-container">
                    <p class="header-band-text">
                        <em class="header-band-em-text">
                            Inscrivez-vous maintenant!
                        </em>
                        <br>
                        Inscription Ouverte! Places limitées disponibles.
                    </p>
                </div>
                <div class="inscrivez-vous-butt-container">
                    <div class="inscrivez-vous-inside-container">
                        <a class="inscrivez-vous-a" href="">Inscrivez-vous!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="program-container">
            <div class="rows">
                <div class="col-md-12">
                    <h2>Notre <strong>Programs</strong></h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="col-1 feature-box-icon">
                                    <i class="fa-solid fa-circle-check fa-2x"></i>
                                </div>
                                <div class="col-10 program-box-info">
                                    <h4>Programme D'études</h4>
                                    <p>Notre école primaire offre un programme d'études complet et équilibré comprenant
                                        les arts du langage,
                                        les mathématiques, les sciences, les études sociales et l'éducation physique,
                                        afin de permettre à nos élèves
                                        de développer une gamme étendue de compétences et de connaissances.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="col-1 feature-box-icon">
                                    <i class="fa-solid fa-circle-check fa-2x"></i>
                                </div>
                                <div class="col-10 program-box-info">
                                    <h4>Structure</h4>
                                    <p>Notre programme scolaire primaire est conçu pour offrir un environnement
                                        d'apprentissage structuré et stimulant.
                                        Les élèves sont regroupés par niveau, ce qui leur permet de travailler avec des
                                        camarades de leur âge et de leur niveau de compétence.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="col-1 feature-box-icon">
                                    <i class="fa-solid fa-circle-check fa-2x"></i>
                                </div>
                                <div class="col-10 program-box-info">
                                    <h4>Programmes Spéciaux</h4>
                                    <p>Notre école propose des programmes spéciaux pour aider les élèves à se
                                        développer,
                                        y compris la musique, des clubs après l'école et des sorties culturelles pour
                                        une expérience
                                        éducative hors de la salle de classe.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rows">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h4><i><i class="fa-solid fa-dollar-sign"></i></i> Frais & Informations</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 righthello frais-container">
                                <h2>Preschool Monthly Tuition</h2>
                                <ul class="primaire-frais">
                                    <li data-apear-animation="fadeInUp"
                                        class="appear-animation fadeInUp appear-animation-visible">
                                        <div class="row frais-row">
                                            <div class="classes-id left-frais-cont col-7 row">
                                                <div class="clases-id-left ">
                                                    <img class="class-id-img" src="frais-color-1-1.png"
                                                        alt="">
                                                </div>
                                                <div class="clases-id-right col-4">
                                                    <!-- <img src="final-countour-frais-2.png" alt=""> -->
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-apear-animation="fadeInUp"
                                        class="appear-animation fadeInUp appear-animation-visible">
                                        <div class="row frais-row">
                                            <div class="classes-id left-frais-cont col-7">
                                                <div class="clases-id-left ">
                                                    <img class="class-id-img" src="frais-color-1-1.png"
                                                        alt="">
                                                    <p><Strong>1</Strong> hello there</p>
                                                </div>
                                                <div class="clases-id-right col-4">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 righthello">
                                <h2>Accel FAQ's</h2>

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                <i class="fas fa-plus float-right "></i>
                                                Le déjeuner et la collation sont-ils inclus ?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Oui, Accel sert tous les jours un déjeuner et une collation
                                                l'après-midi. Notre déjeuner comprend un plat principal et un
                                                accompagnement, et une option végétarienne est disponible. Notre
                                                collation de l'après-midi varie, un menu des prochaines collations est
                                                affiché à notre réception.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Combien d'élèves y a-t-il dans une salle de classe ?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>À notre école, nous accordons une grande importance à la qualité de
                                                    l'enseignement et à l'attention individuelle portée à chaque élève.
                                                    Pour cette raison, nous limitons le nombre d'élèves dans chaque
                                                    classe.</p>
                                                <p>En général, nous avons une moyenne de 20 à 25 élèves par classe, ce
                                                    qui permet à nos enseignants de mieux répondre aux besoins et aux
                                                    défis de chaque élève.</p>
                                                <p>Nous sommes convaincus que des classes de petite taille favorisent
                                                    l'interaction et la participation des élèves, ainsi que la création
                                                    d'un environnement d'apprentissage sûr et stimulant.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Quelle est la philosophie éducative de Pipster Prep ?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Les membres du personnel de Pipster Prep suivent à la fois une
                                                    approche centrée sur l'étudiant et une approche constructiviste de
                                                    l'apprentissage.</p>

                                                <p>Une approche centrée sur l'étudiant est axée sur les besoins, les
                                                    capacités, les intérêts et les styles d'apprentissage de chaque
                                                    élève. Notre journée est structurée de manière à ce que les
                                                    enseignants puissent passer du temps en tête-à-tête avec les élèves
                                                    et en petits groupes tout au long de la journée et adapter
                                                    l'enseignement aux objectifs d'apprentissage individuels de chaque
                                                    élève.</p>

                                                <p>L'approche constructiviste de l'apprentissage est la conviction que
                                                    les élèves apprennent en s'engageant activement dans les leçons et
                                                    les activités. Nous croyons que les élèves devraient passer une
                                                    grande partie de la journée à s'engager activement dans des
                                                    activités de leur choix.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Proposez-vous un service de transport scolaire pour les élèves ?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Oui, nous proposons un service de transport scolaire pour les élèves.
                                                    Nous travaillons en étroite collaboration avec des prestataires de
                                                    transport de confiance pour fournir un service sûr et fiable pour
                                                    les élèves.</p>

                                                <p>Le service de transport scolaire est disponible pour tous les élèves
                                                    inscrits dans notre école qui en ont besoin. Nous offrons des
                                                    itinéraires de transport en fonction des zones de résidence des
                                                    élèves et des besoins individuels.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
    </style>
    <div class="pre-inscri mb-5 pb-5">
        <div class="pre-inscri-container">
            <div class="pre-inscri-upperpart row text text-center">
                <h1 style="font-family: 'Prompt', sans-serif;">        Pré Inscription --}}
{{--<span class="fs-4 fw-semibold">2023-2024</span>--}}{{--
 </h1>
            </div>
            <div class="pre-inscri-formpart">
                <form action="#" class="form" id="pre-form">
                    <!-- Progress bar -->
                    <div class="progressbar">
                        <div class="progress" id="progress"></div>
                        <div class="progress-step progress-step-active" data-title="Informations Enfant"></div>
                        <div class="progress-step" data-title="Informations sur le père/tuteur"></div>
                    </div>
                    <!-- End progress bar -->
                    <div class="form-step form-step-active">
                        <div class="input-group row">
                            <div class="a-label-and-input a-label-and-input-1 col-md-6">
                                <label for="pre-inscri-nom">Nom <span class="etoile">*</span></label>
                                <input type="text" name="pre-inscri-nom" required="">
                            </div>
                            <div class="a-label-and-input a-label-and-input-2 col-md-6">
                                <label for="pre-inscri-prenom">Prénom <span class="etoile">*</span></label>
                                <input type="text" name="pre-inscri-prenom" required="">
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="pre-inscri-date-nai">Date de naissance <span class="etoile">*</span></label>
                            <select name="pre-inscri-month" id="" required="">
                                <option value="" class="placeholder">MM</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <span class="slash">/</span>
                            <select name="pre-inscri-day" id="" required="">
                                <option value="" class="placeholder">JJ</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <span class="slash">/</span>
                            <select name="pre-inscri-year" id="" required="">
                                <option value="" class="placeholder" selected="" disabled="">AAAA
                                </option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                            </select>
                        </div>
                        <div class="input-group row">
                            <div class="a-label-and-input col-12">
                                <label for="x-ecole">Ecole fréquentée actuellement <span
                                        class="etoile">*</span></label>
                                <input type="text" name="x-ecole" required="">
                            </div>
                        </div>
                        <div class="input-group row">
                            <div class="a-label-and-input a-label-and-input-1 col-md-6">
                                <label for="lieu-nai">Lieu de naissance <span class="etoile">*</span></label>
                                <input type="text" name="lieu-nai" required="">
                            </div>
                            <div class="a-label-and-input a-label-and-input-2 col-md-6">
                                <label for="classe-envisagée">Classe envisagée <span class="etoile">*</span></label>
                                <input type="text" name="classe-envisagée" required="">
                            </div>
                        </div>
                        <a href="#pre-form" class="pre-inscri-next-butt" id="pre-next">Suivant</a>
                    </div>
                    <div class="form-step">
                        <div class="input-group row">
                            <div class="a-label-and-input a-label-and-input-1 col-md-6">
                                <label for="pre-inscri-nom-parent">Nom Parent<span class="etoile">*</span></label>
                                <input type="text" name="pre-inscri-nom-parent" required="">
                            </div>
                            <div class="a-label-and-input a-label-and-input-2 col-md-6">
                                <label for="pre-inscri-prenom-parent">Prénom Parent<span
                                        class="etoile">*</span></label>
                                <input type="text" name="pre-inscri-prenom-parent" required="">
                            </div>
                        </div>
                        <div class="input-group row">
                            <div class="a-label-and-input a-label-and-input-1 col-md-6">
                                <label for="e-mail-parent">E-mail Parent <span class="etoile">*</span></label>
                                <input type="email" name="e-mail-parent" required="">
                            </div>
                            <div class="a-label-and-input a-label-and-input-2 col-md-6">
                                <label for="tel-parent">Téléphone Parent <span class="etoile">*</span></label>
                                <input type="tel" name="tel-parent" required="">
                            </div>
                        </div>
                        <div class="input-group row">
                            <div class="a-label-and-input a-label-and-input-1 col-md-6">
                                <label for="profession-parent">Profession Parent <span class="etoile">*</span></label>
                                <input type="text" name="profession-parent" required="">
                            </div>
                            <div class="a-label-and-input a-label-and-input-2 col-md-6">
                                <label for="prestations">Prestations Demandées <span class="etoile">*</span></label>
                                <ul>
                                    <li class="pre-li">
                                        <input class="pre-checkbox" type="checkbox" value="transport"
                                            name="check-transport">
                                        <label for="check-transport">Transport Scolaire</label>
                                    </li>
                                    <li class="pre-li">
                                        <input class="pre-checkbox" type="checkbox" value="transport"
                                            name="check-transport">
                                        <label for="cantine">Cantine</label>
                                    </li>
                                    <li class="pre-li">
                                        <input class="pre-checkbox" type="checkbox" value="transport"
                                            name="check-transport">
                                        <label for="Aucun">Aucun</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#pre-form" class="pre-inscri-prev-butt" id="pre-prev">Précédent</a>
                        <div class="submit-pre">
                            <input type="submit" name="submit" value="Envoyer" class="submit-pre-butt">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="contact-page mt-5 pt-4">
        <div class="contact-page-header">
            <div class="contact-page-header-container">
                <div class="contact-page-logo">
                    <img src="AccelLogo-contact.png" alt="">
                </div>
                <div class="contact-header">
                    <h1>Contact</h1>
                </div>
                <div class="contact-header-text">
                    <p>Des questions ? N’hésitez-pas à nous écrire!</p>
                </div>
            </div>
        </div>
        <div class="contact-page-body">
            <div class="cotact-body-container">
                <div class="left-part">
                    <div class="left-part-container">
                        <div class="left-part-elements">
                            <div class="firstline">
                                <div class="contact-element-line-one contact-elem-num1">
                                    <label for="nom">Nom <span class="etoile">*</span></label>
                                    <input type="text" name="Nom" id="nom">
                                </div>
                                <div class="contact-element-line-one contact-elem-num2">
                                    <label for="Prénom">Prénom</label>
                                    <input type="text" name="Prénom" id="Prénom">
                                </div>
                            </div>
                            <div class="secondline">
                                <div class="contact-element-line-two contact-elem-num1">
                                    <label for="email">Email <span class="etoile">*</span></label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <div class="contact-element-line-two contact-elem-num2">
                                    <label for="Téléphone">Téléphone <span class="etoile">*</span> </label>
                                    <input type="tel" name="Téléphone" id="Téléphone">
                                </div>
                            </div>
                            <div class="thirdline">
                                <div class="contact-element-line-three">
                                    <label for="sujet">Sujet</label>
                                    <input type="text" name="sujet" id="sujet">
                                </div>
                            </div>
                            <div class="fourthline">
                                <div class="contact-element-line-three">
                                    <label for="comment">Commentaire ou message <span class="etoile">*</span>
                                    </label>
                                    <textarea name="comment" id="comment" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="fifthline">
                                <div class="contact-submit-butt">
                                    <button type="submit" class="contact-submit">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-part">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3441.04078614841!2d-9.581870051542715!3d30.406584674320793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b696ddc99b19%3A0x559600239b0202af!2sAgadir%20Higher%20School%20of%20Technology!5e0!3m2!1sen!2sma!4v1675725058277!5m2!1sen!2sma"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>



    <footer>
        <div class="footer">
            <div class="footer-container">
                <div class="infos-line">
                    <div class="show-footer-infos">
                        © 2021 Accel&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Tous Droits
                        Réservés&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a class="footer-link" href="mailto:accel.info@gmail.com">
                            accel.info@gmail.com</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class="footer-link"
                            href="tel:06 39 88 41 70" target="_self">06 39 88 41 70</a>
                        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Une création de <a class="footer-link" href=""
                            target="_blank">YAA</a>
                    </div>
                </div>
                <div class="footer-social-media-icons">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>







    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script>
        $('.card-btn').click(function() {
            $(this).find('i').toggleClass('fas fa-plus fas fa-minus')
        });
    </script>


</body>

</html>
--}}
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accel - Inscription Ouverte</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300;1,400&display=swap" rel="stylesheet">
    <script src="{{ asset('js/preinscr.js') }}" defer></script>
</head>

<body>
<div class="header">
    <div class="alert alert-primary mb-0" role="alert">
        <div class="alert-container">
            <p class="m-0 alert-p">
                Appelez-nous! <span><i class="fa-solid fa-phone "></i><a class="alert-link"
                                                                         href="tel:+(212) 639884170"> +(212) 639884170</a></span> | <a class="alert-link"
                                                                                                                                       href="mailto:accel.info@gmail.com">accel.info@gmail.com</a>
            </p>

            <div class="m-0 special">
                Inscription Ouverte! Places limitées disponibles.
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="navbar-container">
            <a class="navbar-brand" href="#">
                <img class="Logo" src="{{ asset('images/AccelLogo4FINAL.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navvar-ulcontainer collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-ul navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            L’établissement
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Notre Program</a></li>
                            <li><a class="dropdown-item" href="#">Gallerie</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Localisation</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Se connecter</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    @if(session('preinSuccess'))
        <script>
            iziToast.success({
                title: 'OK',
                message: '{{ session('preinSuccess') }}',
            });
        </script>
    @endif
    <div id="carouselExampleIndicators" class="carousel slide mb-0">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slide-image-2.png') }}" class="d-block w-100 h-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slider-image1.png') }}" class="d-block w-100 h-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="header-bottom-band">
        <div class="header-band-container">
            <div class="text-container">
                <p class="header-band-text">
                    <em class="header-band-em-text">
                        Inscrivez-vous maintenant!
                    </em>
                    <br>
                    Inscription Ouverte! Places limitées disponibles.
                </p>
            </div>
            <div class="inscrivez-vous-butt-container">
                <div class="inscrivez-vous-inside-container">
                    <a class="inscrivez-vous-a" href="">Inscrivez-vous!</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">

    <div class="program-container">
        <div class="rows">
            <div class="col-md-12">
                <h2>Notre <strong>Programs</strong></h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="col-1 feature-box-icon">
                                <i class="fa-solid fa-circle-check fa-2x"></i>
                            </div>
                            <div class="col-10 program-box-info">
                                <h4>Programme D'études</h4>
                                <p>Notre école primaire offre un programme d'études complet et équilibré comprenant
                                    les arts du langage,
                                    les mathématiques, les sciences, les études sociales et l'éducation physique,
                                    afin de permettre à nos élèves
                                    de développer une gamme étendue de compétences et de connaissances.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="col-1 feature-box-icon">
                                <i class="fa-solid fa-circle-check fa-2x"></i>
                            </div>
                            <div class="col-10 program-box-info">
                                <h4>Structure</h4>
                                <p>Notre programme scolaire primaire est conçu pour offrir un environnement
                                    d'apprentissage structuré et stimulant.
                                    Les élèves sont regroupés par niveau, ce qui leur permet de travailler avec des
                                    camarades de leur âge et de leur niveau de compétence.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="col-1 feature-box-icon">
                                <i class="fa-solid fa-circle-check fa-2x"></i>
                            </div>
                            <div class="col-10 program-box-info">
                                <h4>Programmes Spéciaux</h4>
                                <p>Notre école propose des programmes spéciaux pour aider les élèves à se
                                    développer,
                                    y compris la musique, des clubs après l'école et des sorties culturelles pour
                                    une expérience
                                    éducative hors de la salle de classe.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rows">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <h4><i><i class="fa-solid fa-dollar-sign"></i></i> Frais & Informations</h4>
                </div>
                <div class="panel-body">
                    <div class="row mx-0">
                        <div class="col-md-6 righthello frais-container">
                            <h2 class="my-0">Frais mensuel</h2>
                            <ul class="primaire-frais">
                                <li data-apear-animation="fadeInUp"
                                    class="appear-animation fadeInUp appear-animation-visible my-2"
                                    style="height: 16%">
                                    <img src="{{ asset('images/FINALCP.png') }}"
                                         style="max-height: 100%; max-width: 100%; min-height: 100%; min-width: 100%;"
                                         alt="">
                                </li>
                                <li data-apear-animation="fadeInUp"
                                    class="appear-animation fadeInUp appear-animation-visible my-2"
                                    style="height: 16%"">
                                <img src="{{ asset('images/FINALCE1.png') }}"
                                     style="max-height: 100%; max-width: 100%; min-height: 100%; min-width: 100%;"
                                     alt="">
                                </li>
                                <li data-apear-animation="fadeInUp"
                                    class="appear-animation fadeInUp appear-animation-visible my-2"
                                    style="height: 16%"">
                                <img src="{{ asset('images/FINALCE2.png') }}"
                                     style="max-height: 100%; max-width: 100%; min-height: 100%; min-width: 100%;"
                                     alt="">
                                </li>
                                <li data-apear-animation="fadeInUp"
                                    class="appear-animation fadeInUp appear-animation-visible my-2"
                                    style="height: 16%"">
                                <img src="{{ asset('images/FINALCM1.png') }}"
                                     style="max-height: 100%; max-width: 100%; min-height: 100%; min-width: 100%;"
                                     alt="">
                                </li>
                                <li data-apear-animation="fadeInUp"
                                    class="appear-animation fadeInUp appear-animation-visible my-2"
                                    style="height: 16%"">
                                <img src="{{ asset('images/pricessscm2.png') }}"
                                     style="max-height: 100%; max-width: 100%; min-height: 100%; min-width: 100%;"
                                     alt="">
                                </li>
                                <li data-apear-animation="fadeInUp"
                                    class="appear-animation fadeInUp appear-animation-visible my-2"
                                    style="height: 16%"">
                                <img src="{{ asset('images/FINAL6EME.png') }}"
                                     style="max-height: 100%; max-width: 100%; min-height: 100%; min-width: 100%;"
                                     alt="">
                                </li>
                                <li data-apear-animation="fadeInUp"
                                    class="appear-animation fadeInUp appear-animation-visible my-2"
                                    style="height: 16%"">
                                <div class="row frais-row">
                                    <div class="classes-id left-frais-cont col-7">
                                        <div class="clases-id-left ">
                                            <img class="class-id-img" src="frais-color-1-1.png"
                                                 alt="">
                                            <p><Strong>1</Strong> hello there</p>
                                        </div>
                                        <div class="clases-id-right col-4">
                                        </div>
                                    </div>
                                </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 righthello righthellotwo">
                            <h2>Accel FAQ's</h2>

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                            <i class="fas fa-plus float-right "></i>
                                            Le déjeuner et la collation sont-ils inclus ?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                         aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Oui, Accel sert tous les jours un déjeuner et une collation
                                            l'après-midi. Notre déjeuner comprend un plat principal et un
                                            accompagnement, et une option végétarienne est disponible. Notre
                                            collation de l'après-midi varie, un menu des prochaines collations est
                                            affiché à notre réception.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                            Combien d'élèves y a-t-il dans une salle de classe ?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                         aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>À notre école, nous accordons une grande importance à la qualité de
                                                l'enseignement et à l'attention individuelle portée à chaque élève.
                                                Pour cette raison, nous limitons le nombre d'élèves dans chaque
                                                classe.</p>
                                            <p>En général, nous avons une moyenne de 20 à 25 élèves par classe, ce
                                                qui permet à nos enseignants de mieux répondre aux besoins et aux
                                                défis de chaque élève.</p>
                                            <p>Nous sommes convaincus que des classes de petite taille favorisent
                                                l'interaction et la participation des élèves, ainsi que la création
                                                d'un environnement d'apprentissage sûr et stimulant.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                            Quelle est la philosophie éducative de Pipster Prep ?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                         aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Les membres du personnel de Pipster Prep suivent à la fois une
                                                approche centrée sur l'étudiant et une approche constructiviste de
                                                l'apprentissage.</p>

                                            <p>Une approche centrée sur l'étudiant est axée sur les besoins, les
                                                capacités, les intérêts et les styles d'apprentissage de chaque
                                                élève. Notre journée est structurée de manière à ce que les
                                                enseignants puissent passer du temps en tête-à-tête avec les élèves
                                                et en petits groupes tout au long de la journée et adapter
                                                l'enseignement aux objectifs d'apprentissage individuels de chaque
                                                élève.</p>

                                            <p>L'approche constructiviste de l'apprentissage est la conviction que
                                                les élèves apprennent en s'engageant activement dans les leçons et
                                                les activités. Nous croyons que les élèves devraient passer une
                                                grande partie de la journée à s'engager activement dans des
                                                activités de leur choix.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                            Proposez-vous un service de transport scolaire pour les élèves ?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                         aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Oui, nous proposons un service de transport scolaire pour les élèves.
                                                Nous travaillons en étroite collaboration avec des prestataires de
                                                transport de confiance pour fournir un service sûr et fiable pour
                                                les élèves.</p>

                                            <p>Le service de transport scolaire est disponible pour tous les élèves
                                                inscrits dans notre école qui en ont besoin. Nous offrons des
                                                itinéraires de transport en fonction des zones de résidence des
                                                élèves et des besoins individuels.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="pre-inscri">
    <div class="pre-inscri-container " style="margin-bottom: 120px">
        <div class="pre-inscri-upperpart mx-auto">
            <h1 class="" style="margin-left: 120px">Pré Inscription</h1>
        </div>
        <div class="pre-inscri-formpart">
            <form action="{{url('/preinscription')}}" method="post" class="form" id="pre-form">
                @csrf
                <!-- Progress bar -->
                <div class="progressbar">
                    <div class="progress" id="progress"></div>
                    <div class="progress-step progress-step-active" data-title="Informations Enfant"></div>
                    <div class="progress-step" data-title="Informations sur le père/tuteur"></div>
                </div>
                <!-- End progress bar -->
                <div class="form-step form-step-active">
                    <div class="input-group row">
                        <div class="a-label-and-input a-label-and-input-1 col-md-6">
                            <label for="pre-inscri-nom">Nom <span class="etoile">*</span></label>
                            <input type="text" name="pre-inscri-nom" required>
                        </div>
                        <div class="a-label-and-input a-label-and-input-2 col-md-6">
                            <label for="pre-inscri-prenom">Prénom <span class="etoile">*</span></label>
                            <input type="text" name="pre-inscri-prenom" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="pre-inscri-date-nai">Date de naissance <span class="etoile">*</span></label>
                        <select name="pre-inscri-month" id="" required>
                            <option value="" class="placeholder">MM</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <span class="slash">/</span>
                        <select name="pre-inscri-day" id="" required>
                            <option value="" class="placeholder">JJ</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <span class="slash">/</span>
                        <select name="pre-inscri-year" id="" required>
                            <option value="" class="placeholder" selected="" disabled="">AAAA
                            </option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                            <option value="1929">1929</option>
                            <option value="1928">1928</option>
                            <option value="1927">1927</option>
                            <option value="1926">1926</option>
                            <option value="1925">1925</option>
                            <option value="1924">1924</option>
                            <option value="1923">1923</option>
                            <option value="1922">1922</option>
                            <option value="1921">1921</option>
                            <option value="1920">1920</option>
                        </select>
                    </div>
                    <div class="input-group row">
                        <div class="a-label-and-input col-12">
                            <label for="x-ecole">Ecole fréquentée actuellement <span
                                    class="etoile">*</span></label>
                            <input type="text" name="x-ecole" >
                        </div>
                    </div>
                    <div class="input-group row">
                        <div class="a-label-and-input a-label-and-input-1 col-md-6">
                            <label for="lieu-nai">Lieu de naissance <span class="etoile">*</span></label>
                            <input type="text" name="lieu-nai" required="">
                        </div>
                        <div class="a-label-and-input a-label-and-input-2 col-md-6">
                            <label for="classe-envisagée">Classe envisagée <span class="etoile">*</span></label>
                            <select name="niveau" class="form-control" style="width: 300px">
                                <option value="1">
                                    CP
                                </option>
                                <option value="2">
                                    CE1
                                </option>
                                <option value="3">
                                    CE2
                                </option>
                                <option value="4">
                                    CM1
                                </option>
                                <option value="5">
                                    CM2
                                </option>
                                <option value="6">
                                    6 EME
                                </option>
                            </select>
{{--                            <input type="text" name="classe-envisagée" required="">--}}
                        </div>
                    </div>
                    <a href="#pre-form" class="pre-inscri-next-butt" id="pre-next">Suivant</a>
                </div>
                <div class="form-step">
                    <div class="input-group row">
                        <div class="a-label-and-input a-label-and-input-1 col-md-6">
                            <label for="pre-inscri-nom-parent">Nom Parent<span class="etoile">*</span></label>
                            <input type="text" name="pre-inscri-nom-parent" required="">
                        </div>
                        <div class="a-label-and-input a-label-and-input-2 col-md-6">
                            <label for="pre-inscri-prenom-parent">Prénom Parent<span
                                    class="etoile">*</span></label>
                            <input type="text" name="pre-inscri-prenom-parent" required="">
                        </div>
                    </div>
                    <div class="input-group row">
                        <div class="a-label-and-input a-label-and-input-1 col-md-6">
                            <label for="e-mail-parent">E-mail Parent <span class="etoile">*</span></label>
                            <input type="email" name="e-mail-parent" required="">
                        </div>
                        <div class="a-label-and-input a-label-and-input-2 col-md-6">
                            <label for="tel-parent">Téléphone Parent <span class="etoile">*</span></label>
                            <input type="tel" name="tel-parent" required="">
                        </div>
                    </div>
                    <div class="input-group row">
                        <div class="a-label-and-input a-label-and-input-1 col-md-6">
                            <label for="profession-parent">Profession Parent <span class="etoile">*</span></label>
                            <input type="text" name="profession-parent" required="">
                        </div>
                        <div class="a-label-and-input a-label-and-input-2 col-md-6">
                            <label for="prestations">Prestations Demandées <span class="etoile">*</span></label>
                            <ul>
                                <li class="pre-li">
                                    <input class="pre-checkbox" type="checkbox" value="transport"
                                           name="check-transport">
                                    <label for="check-transport">Transport Scolaire</label>
                                </li>
                                <li class="pre-li">
                                    <input class="pre-checkbox" type="checkbox" value="transport"
                                           name="check-transport">
                                    <label for="cantine">Cantine</label>
                                </li>
                                <li class="pre-li">
                                    <input class="pre-checkbox" type="checkbox" value="transport"
                                           name="check-transport">
                                    <label for="Aucun">Aucun</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="#pre-form" class="pre-inscri-prev-butt" id="pre-prev">Précédent</a>
                    <div class="submit-pre">
                        <input type="submit" name="submit" value="Envoyer" class="submit-pre-butt">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="contact-page">
    <div class="contact-page-header">
        <div class="contact-page-header-container">
            <div class="contact-page-logo">
                <img src="AccelLogo-contact.png" alt="">
            </div>
            <div class="contact-header">
                <h1>Contact</h1>
            </div>
            <div class="contact-header-text">
                <p>Des questions ? N’hésitez-pas à nous écrire!</p>
            </div>
        </div>
    </div>
    <div class="contact-page-body">
        <div class="cotact-body-container">
            <div class="left-part">
                <div class="left-part-container">
                    <div class="left-part-elements">
                        <div class="firstline">
                            <div class="contact-element-line-one contact-elem-num1">
                                <label for="nom">Nom <span class="etoile">*</span></label>
                                <input type="text" name="Nom" id="nom">
                            </div>
                            <div class="contact-element-line-one contact-elem-num2">
                                <label for="Prénom">Prénom</label>
                                <input type="text" name="Prénom" id="Prénom">
                            </div>
                        </div>
                        <div class="secondline">
                            <div class="contact-element-line-two contact-elem-num1">
                                <label for="email">Email <span class="etoile">*</span></label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="contact-element-line-two contact-elem-num2">
                                <label for="Téléphone">Téléphone <span class="etoile">*</span> </label>
                                <input type="tel" name="Téléphone" id="Téléphone">
                            </div>
                        </div>
                        <div class="thirdline">
                            <div class="contact-element-line-three">
                                <label for="sujet">Sujet</label>
                                <input type="text" name="sujet" id="sujet">
                            </div>
                        </div>
                        <div class="fourthline">
                            <div class="contact-element-line-three">
                                <label for="comment">Commentaire ou message <span class="etoile">*</span>
                                </label>
                                <textarea name="comment" id="comment" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="fifthline">
                            <div class="contact-submit-butt">
                                <button type="submit" class="contact-submit">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-part">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3441.04078614841!2d-9.581870051542715!3d30.406584674320793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b696ddc99b19%3A0x559600239b0202af!2sAgadir%20Higher%20School%20of%20Technology!5e0!3m2!1sen!2sma!4v1675725058277!5m2!1sen!2sma"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>



<footer>
    <div class="footer">
        <div class="footer-container">
            <div class="infos-line">
                <div class="show-footer-infos">
                    © 2021 Accel&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Tous Droits
                    Réservés&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a class="footer-link" href="mailto:accel.info@gmail.com">
                        accel.info@gmail.com</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class="footer-link"
                                                                                        href="tel:06 39 88 41 70" target="_self">06 39 88 41 70</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Une création de <a class="footer-link" href=""
                                                                            target="_blank">YAA</a>
                </div>
            </div>
            <div class="footer-social-media-icons">
                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>







<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
<script>
    $('.card-btn').click(function() {
        $(this).find('i').toggleClass('fas fa-plus fas fa-minus')
    });
</script>


</body>

</html>
