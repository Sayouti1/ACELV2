@foreach($exercices as $exercice)
<div class="col-md-4 single-note-item all-category note-important" style="">
    <div class="card card-body border" style=" box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
        <span class="side-stick"></span>
        <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Give salary to employee">{{$exercice->titre}}<i class="point fa fa-circle ml-1 font-10"></i></h5>
        <p class="note-date font-12 text-muted">{{$exercice->dateMiseEnLigne}}</p>
        <div class="note-content">
            <p class="note-inner-content text-muted"
               data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">{{$exercice->descripiton}}</p>
        </div>
        <hr>
        <img src="{{ asset('storage/images/coursEtExercices/'.$exercice->lien )}}" width="90%" height="300px">
        <hr><div style="margin-top: -10px; padding-top: -15px;">
        <a href="{{ asset('storage/images/coursEtExercices/'.$exercice->lien )}}" download>
            <i class="fa-solid fa-download"></i></a></div>

    </div>
</div>
@endforeach
