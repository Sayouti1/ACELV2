@extends('Professeur.AcceuilProf')
@section('AcceuilActive', 'active')
@section('title', 'List Des étudiant')

@section('the-home-content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Signika:wght@500;600&display=swap');
    </style>
    <div class="container" style="font-size: 1rem;
        font-weight: 500;
        color: #525f7f;
        background-color: #f8f9fe;">
        <p class="my-2 ms-3 text-center text-lg-start fs-2" style="font-family: 'Signika', sans-serif; ">
            Annonces :
        </p>
        <div id="carouselExampleAutoplaying" class="carousel slide m-0 p-0" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($annonces as $key => $an)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                        <img src="{{ asset('storage/images/annonces/'.$an->content) }}" class="d-block w-100" alt="{{$an->id}}" width="400" height="250">
                        <div class="carousel-caption d-none d-md-block">
                            <p>{{$an->laDate}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-4 " style="font-size: 1rem;
        font-weight: 400;
        color: #525f7f;
        background-color: #f8f9fe;
        font-family: Open Sans, sans-serif;">

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0" style="  position: relative;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          border: 1px solid rgba(0, 0, 0, 0.05);
          border-radius: 0.375rem;
          background-color: #fff;
          background-clip: border-box;
        "
                >
                    <div class="card-body" style="padding: 1.5rem; flex: 1 1 auto">
                        <div class="row">
                            <div class="col">
                                <h5
                                    class="card-title text-uppercase text-muted mb-0"
                                    style="
                  color: #8898aa !important;
                  font-family: inherit;
                  font-weight: 600;
                  line-height: 1.5;
                  margin-bottom: 0.5rem;
                  color: #32325d;
                  font-size: 0.8125rem;
                "
                                >
                                    Cours
                                </h5>
                                <span
                                    class="h2 font-weight-bold mb-0"
                                    style="
                  font-family: inherit;
                  font-weight: 600;
                  line-height: 1.5;
                  margin-bottom: 0.5rem;
                  color: #32325d;
                  font-size: 1.25rem;
                "
                                >{{
                            DB::table('cours')
                            ->select(DB::raw('count(*) as nbr'))
                            ->where('id_prof', '=', session('id_prof'))
                            ->value('nbr')}}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div
                                    class="icon icon-shape bg-danger text-white rounded-circle shadow"
                                    style="
                  display: inline-flex;
                  padding: 12px;
                  text-align: center;
                  border-radius: 50%;
                  align-items: center;
                  justify-content: center;
                  width: 4rem;
                  height: 4rem;
                ">
                                    <img src="{{asset('images/open-book.png')}}" style="width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/Prossefeur/Cours') }}">
                        <p
                            class="mt-3 mb-0 text-muted text-sm"
                            style="color: #8898aa !important; font-size: 0.875rem !important"
                        >
                            <span class="text-nowrap">Consulter mes cours</span>
                        </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0" style="  position: relative;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          border: 1px solid rgba(0, 0, 0, 0.05);
          border-radius: 0.375rem;
          background-color: #fff;
          background-clip: border-box;
        "
                >
                    <div class="card-body" style="padding: 1.5rem; flex: 1 1 auto">
                        <div class="row">
                            <div class="col">
                                <h5
                                    class="card-title text-uppercase text-muted mb-0"
                                    style="
                  color: #8898aa !important;
                  font-family: inherit;
                  font-weight: 600;
                  line-height: 1.5;
                  margin-bottom: 0.5rem;
                  color: #32325d;
                  font-size: 0.8125rem;
                "
                                >
                                    Devoir et Exercice
                                </h5>
                                <span
                                    class="h2 font-weight-bold mb-0"
                                    style="
                  font-family: inherit;
                  font-weight: 600;
                  line-height: 1.5;
                  margin-bottom: 0.5rem;
                  color: #32325d;
                  font-size: 1.25rem;
                "
                                >{{
                            DB::table('exercices')
                            ->select(DB::raw('count(*) as nbr'))
                            ->where('id_prof', '=', session('id_prof'))
                            ->value('nbr')}}</span
                                >
                            </div>
                            <div class="col-auto">
                                <div
                                    class="icon icon-shape bg-danger text-white rounded-circle shadow"
                                    style="
                  display: inline-flex;
                  padding: 12px;
                  text-align: center;
                  border-radius: 50%;
                  align-items: center;
                  justify-content: center;
                  width: 4rem;
                  height: 4rem;
                "
                                >
                                    <img src="{{asset('images/homework.png')}}" style="width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/Prossefeur/Cours') }}">
                        <p
                            class="mt-3 mb-0 text-muted text-sm"
                            style="color: #8898aa !important; font-size: 0.875rem !important"
                        >
                            <span class="text-nowrap">Consulter mes traveaux a faire</span>
                        </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0" style="  position: relative;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          border: 1px solid rgba(0, 0, 0, 0.05);
          border-radius: 0.375rem;
          background-color: #fff;
          background-clip: border-box;
        "
                >
                    <div class="card-body" style="padding: 1.5rem; flex: 1 1 auto">
                        <div class="row">
                            <div class="col">
                                <h5
                                    class="card-title text-uppercase text-muted mb-0"
                                    style="
                  color: #8898aa !important;
                  font-family: inherit;
                  font-weight: 600;
                  line-height: 1.5;
                  margin-bottom: 0.5rem;
                  color: #32325d;
                  font-size: 0.8125rem;
                "
                                >
                                    Notes
                                </h5>
                                <span
                                    class="h2 font-weight-bold mb-0"
                                    style="
                  font-family: inherit;
                  font-weight: 600;
                  line-height: 1.5;
                  margin-bottom: 0.5rem;
                  color: #32325d;
                  font-size: 1.25rem;
                "
                                >6</span
                                >
                            </div>
                            <div class="col-auto">
                                <div
                                    class="icon icon-shape bg-danger text-white rounded-circle shadow"
                                    style="
                  display: inline-flex;
                  padding: 12px;
                  text-align: center;
                  border-radius: 50%;
                  align-items: center;
                  justify-content: center;
                  width: 4rem;
                  height: 4rem;
                "
                                >
                                    <img src="{{asset('images/list.png')}}" style="width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>
                        <p
                            class="mt-3 mb-0 text-muted text-sm"
                            style="color: #8898aa !important; font-size: 0.875rem !important"
                        >
                            <span class="text-nowrap">Consulter mes notes</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
