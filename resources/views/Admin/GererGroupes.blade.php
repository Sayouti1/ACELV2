<style>
    .hide-btn {
        display: none;
    }

    .group-div:hover .hide-btn {
        display: flex;
    }

    .card-body button {
        top: 45%;
    }
</style>

<section class="py-6 bg-light-primary">
    <div class="container">
        <div class="buttons-groupes d-flex justify-content-between">
            <div class="px-xl-3">
                <button class="btn btn-block btn-secondary" id="retour">
                    <i class="fa-solid fa-angle-left"></i>
                    <span>Retour</span>
                </button>
            </div>
            <div class="col-lg-2">
                <div class="search-student-btn">
                    <a href="{{ url('/AjouterUnGroupe') }}" type="btn" class="btn btn-primary">Ajouter Un Group</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center mb-4">
            <div class="col-xl-6 col-lg-8 col-sm-10">
                <h2 class="font-weight-bold">Gérer niveaux et groupes </h2>
                <p class="text-muted mb-0">Veuillez sélectionner l'un des six niveaux disponibles ci-dessous pour
                    afficher et gérer les groupes correspondants :</p>
            </div>
        </div>

        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 text-center justify-content-center px-xl-6 aos-init aos-animate"
            data-aos="fade-up">
            @foreach ($groups as $grp)
                <div class="col my-3">
                    <div class="card  niveau-div group-div border-hover-primary hover-scale">
                        <div class="card-body">
                            <div class="text-primary mb-5">
                                <svg width="60" height="60" viewBox="0 0 24 24" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                            fill="currentColor" opacity="0.3"></path>
                                        <path
                                            d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                            fill="currentColor"></path>
                                        <rect fill="currentColor" opacity="0.3" x="10" y="9"
                                            width="7" height="2" rx="1"></rect>
                                        <rect fill="currentColor" opacity="0.3" x="7" y="9"
                                            width="2" height="2" rx="1"></rect>
                                        <rect fill="currentColor" opacity="0.3" x="7" y="13"
                                            width="2" height="2" rx="1"></rect>
                                        <rect fill="currentColor" opacity="0.3" x="10" y="13"
                                            width="7" height="2" rx="1"></rect>
                                        <rect fill="currentColor" opacity="0.3" x="7" y="17"
                                            width="2" height="2" rx="1"></rect>
                                        <rect fill="currentColor" opacity="0.3" x="10" y="17"
                                            width="7" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </div>
                            <h6 class="font-weight-bold mb-3">Groupe {{DB::table('groupe')->where('id_group', $grp->id_group)->value('libele')}}</h6>
                            <p class="text-muted mb-0">Ce Group compte un total de 53 élèves.
                            </p>

                            <button class="btn btn-primary position-absolute mx-3  start-0 hide-btn " onclick="getListe({{$id_niveau}},{{$grp->id_group}})">Afficher
                                La Liste</button>
                            <button class="btn btn-primary position-absolute mx-3  end-0 hide-btn">Modifier
                                Emploi</button>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>




<script>
    $(document).ready(function() {
        $('#retour').click(function() {
            console.log("helllo");
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

    });
    function getListe(idniveau,idgroup) {

        // Use the route() function to generate a URL with the two variables as query parameters
        var url = "{{ route('getlistEtudiant') }}?idGroup=" + idgroup + "&idNiveau=" + idniveau;

        // Redirect the user to the new URL
        window.location.href = url;
    }
</script>
