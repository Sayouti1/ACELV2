@extends('Admin.admin')
@section('title', 'Notifications')
@section('NotificationsActive', 'active')
@section('the-home-content')

<div class="main-wrapper">
    <style>
        .carousel-item img {
            max-width: 100%;
            max-height: 100%;
        }


    </style>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Notifications</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title">
                                            <span>Annonces actives</span>
                                        </h5>
                                    </div>
                                    <div id="carouselExampleAutoplaying" class="carousel slide m-0 p-0" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($annonces as $key => $an)
                                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                                    <img src="{{ asset('storage/images/annonces/'.$an->content) }}" class="d-block w-100" alt="{{$an->id}}" width="400" height="200">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <img src="{{ asset('images/trash-bin.png')}}" width="40" height="40" onclick="deleteAnnonce({{$an->id}})">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <script>
                                            function deleteAnnonce(id) {
                                                if (confirm("Are you sure you want to delete this item?")) {
                                                    window.location.href = "{{ url('/deleteAnnonces/') }}" +"/"+ id;
                                                }
                                            }
                                        </script>
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
                                <hr>
                            @if (session('success'))
                                <script>
                                    iziToast.success({
                                        title: 'OK',
                                        message: '{{ session('success') }}',
                                    });
                                </script>
                            @endif
                            @if (session('successdelete'))
                                <script>
                                    iziToast.warning({
                                        title: 'OK',
                                        message: '{{ session('successdelete') }}',
                                    });
                                </script>
                            @endif
                            <div class="col-12">
                                <h6 class="fw-light">
                                    <span class="text-primary-emphasis
                                    " type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Ajouter Annonce</span>
                                </h6>
                            </div>
                            <form class="collapse collapse-horizontal" id="collapseWidthExample" method="post" action="{{ url('/publierAnnonce') }}" enctype="multipart/form-data">
                                  @csrf
                                    <div class="row" id="roww">

                                        <div class="col-12 col-sm-4 d-flex ">
                                            <div class="form-group local-forms ">
                                                <div class="image-frame ">
                                                    <img id="preview" src=" " alt="" width="700" height="150">
                                                    <input type="file" name="img" class="form-control" onchange="previewImage(event)" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary ">
                                                    Publier
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
