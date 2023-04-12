

    <style>
        body{
            background:#eee;

        }

    </style>
    <div class="container py-5">
        <div class="row text-center">
            <!-- Team item-->
            @foreach($CoursInfo as $info)
            <div class="col-xl-3 col-sm-6 mb-5">

                <div class="bg-white rounded shadow-sm py-2 px-4">
                    <div class="text fs-5 fw-semibold">{{$info->nom}}</div>
                    <hr>
                    <p style="font-size: 12px">{{$info->descripiton}}</p>
                    <hr>

                    <img src="{{ asset('storage/images/coursEtExercices/'.$info->lien )}}" width="200" height="250">
                    <hr>
                    <a href="{{ asset('storage/images/coursEtExercices/'.$info->lien )}}" download>
                         <div style="margin-top: -10px; padding-top: -15px;"><i class="fa-solid fa-download"></i></div>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- End-->
        </div>
    </div>
