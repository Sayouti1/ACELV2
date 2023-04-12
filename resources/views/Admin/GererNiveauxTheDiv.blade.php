<section class="py-6 bg-light-primary">
    <div class="container">

        <div class="row justify-content-center text-center mb-4">
            <div class="col-xl-6 col-lg-8 col-sm-10">
                <h2 class="font-weight-bold">Gérer niveaux et groupes </h2>
                <p class="text-muted mb-0">Veuillez sélectionner l'un des six niveaux disponibles ci-dessous pour
                    afficher et gérer les groupes correspondants :</p>
            </div>
        </div>

        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 text-center justify-content-center px-xl-6 aos-init aos-animate"
            data-aos="fade-up">
            <div class="col my-3">
                <div class="card  niveau-div border-hover-primary hover-scale" id="niveau-div" data-level-id="1">
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
                        <h6 class="font-weight-bold mb-3">Cours Préparatoire (CP)</h6>
                        <p class="text-muted mb-0">Ce niveau compte un total de {{ DB::table('class')
            ->select(DB::raw('count(*) as nbr'))
            ->where('id_niveau', '=', 1)
            ->value('nbr')}} élèves, répartis en {{DB::table('class')
            ->select(DB::raw('count(distinct id_group) as nbr'))
            ->where('id_niveau', '=', 1)
            ->value('nbr')}} groupes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col my-3">
                <div class="card  niveau-div border-hover-primary hover-scale" id="niveau-div" data-level-id="2">
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
                        <h6 class="font-weight-bold mb-3">Cours Élémentaire 1 (CE1)</h6>
                        <p class="text-muted mb-0">Ce niveau compte un total de {{ DB::table('class')
            ->select(DB::raw('count(*) as nbr'))
            ->where('id_niveau', '=', 2)
            ->value('nbr')}} élèves, répartis en {{DB::table('class')
            ->select(DB::raw('count(distinct id_group) as nbr'))
            ->where('id_niveau', '=', 2)
            ->value('nbr')}} groupes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col my-3">
                <div class="card  niveau-div border-hover-primary hover-scale" id="niveau-div" data-level-id="3">
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
                        <h6 class="font-weight-bold mb-3">Cours Élémentaire 2 (CE2)</h6>
                        <p class="text-muted mb-0">Ce niveau compte un total de {{ DB::table('class')
            ->select(DB::raw('count(*) as nbr'))
            ->where('id_niveau', '=', 3)
            ->value('nbr')}} élèves, répartis en {{DB::table('class')
            ->select(DB::raw('count(distinct id_group) as nbr'))
            ->where('id_niveau', '=', 3)
            ->value('nbr')}} groupes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col my-3">
                <div class="card  niveau-div border-hover-primary hover-scale" id="niveau-div" data-level-id="4">
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
                        <h6 class="font-weight-bold mb-3">Cours Moyen 1 (CM1)</h6>
                        <p class="text-muted mb-0">Ce niveau compte un total de {{ DB::table('class')
            ->select(DB::raw('count(*) as nbr'))
            ->where('id_niveau', '=', 4)
            ->value('nbr')}} élèves, répartis en {{DB::table('class')
            ->select(DB::raw('count(distinct id_group) as nbr'))
            ->where('id_niveau', '=', 4)
            ->value('nbr')}} groupes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col my-3">
                <div class="card  niveau-div border-hover-primary hover-scale" id="niveau-div" data-level-id="5">
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
                        <h6 class="font-weight-bold mb-3">Cours Moyen 2 (CM2)</h6>
                        <p class="text-muted mb-0">Ce niveau compte un total de {{ DB::table('class')
            ->select(DB::raw('count(*) as nbr'))
            ->where('id_niveau', '=', 5)
            ->value('nbr')}} élèves, répartis en {{DB::table('class')
            ->select(DB::raw('count(distinct id_group) as nbr'))
            ->where('id_niveau', '=', 5)
            ->value('nbr')}} groupes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col my-3">
                <div class="card  niveau-div border-hover-primary hover-scale" id="niveau-div" data-level-id="6">
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
                        <h6 class="font-weight-bold mb-3">6ème Année</h6>
                        <p class="text-muted mb-0">Ce niveau compte un total de {{ DB::table('class')
            ->select(DB::raw('count(*) as nbr'))
            ->where('id_niveau', '=', 6)
            ->value('nbr')}} élèves, répartis en {{DB::table('class')
            ->select(DB::raw('count(distinct id_group) as nbr'))
            ->where('id_niveau', '=', 6)
            ->value('nbr')}} groupes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <script>
    $(document).ready(function() {
        $('#niveau-div').click(function() {
            console.log("helllo");
            $.ajax({
                url: '/Gérer-Niveaux/Groupes', // Replace with the URL of your server-side script
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
</script> --}}

<script>
    $(document).ready(function() {
        $('.niveau-div').click(function() {
            var levelId = $(this).data('level-id');
            console.log(levelId);
            getGroups(levelId);
        });

        function getGroups(level_id) {
            // Send an AJAX request to retrieve the associated groups from the database using Laravel
            $.ajax({
                url: "/groups/" + level_id,
                type: "GET",
                success: function(response) {
                    // You can access the IDs of the groups in the response variable


                    // Update the home content with the response data
                    $('#home-content').html(response);
                },
                error: function(xhr) {
                    // Handle the error if the request fails
                    console.log(xhr.responseText);
                }
            });
        }
    });
</script>
