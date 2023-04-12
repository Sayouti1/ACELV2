<div class="card">
    <div class="card-body">
        <form action="{{ url('/send-message') }}" method="get">
            @csrf

            <div class="form-group">
                <input type="email" name="target_mail" placeholder="À" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="objet" placeholder="Objet" class="form-control">
            </div>

            <div class="form-group">
                <textarea name="the_message" rows="10" class="form-control" placeholder="Enter votre message"></textarea>
            </div>

            <div class="form-group mb-0">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane m-r-5"></i>
                        <span>Envoyer</span></button>

                    <button class="btn btn-danger m-l-5" type="button"> <i
                            class="far fa-trash-alt m-r-5"></i><span>Annuler</span></button>
                </div>
            </div>
        </form>
    </div>
</div>
