<div class="row">
    @foreach($mesCours as $cours)
    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 ">
        <div class="card border-0 bg-light rounded shadow">
            <div class="card-body p-4">
                <h5>{{$cours->libele}}</h5>
                <div class="mt-3">
                  <span class="text-muted d-block"> <a href="#" target="_blank" class="text-muted small">Mr. {{$cours->Proof}}</a></span>
                </div>
                <div class="mt-3">
                    <a class="btn btn-primary" onclick="CoursInfo({{$cours->id_prof}})">Consulter les
                        cours</a>
                </div>
            </div>
        </div>
    </div> @endforeach
        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 ">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <h5>Artisan</h5>
                    <div class="mt-3">
                        <span class="text-muted d-block"> <a href="#" target="_blank" class="text-muted small">Mr. Said Benalla</a></span>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-primary" onclick="CoursInfo(100)">Consulter les
                            cours</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 ">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <h5>Artisan</h5>
                    <div class="mt-3">
                        <span class="text-muted d-block"> <a href="#" target="_blank" class="text-muted small">Mr. Said Benalla</a></span>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-primary" onclick="CoursInfo(100)">Consulter les
                            cours</a>
                    </div>
                </div>
            </div>
        </div>
</div>
