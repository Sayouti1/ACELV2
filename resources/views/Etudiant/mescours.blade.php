@extends('Etudiant.Etudiant')

@section('title', 'Acceuil')

@section('AcceuilActive','active')

@section('the-home-content')

    <div class="container-fluid row mb-3" id="bar"></div>
<div class="container-fluid my-1 border rounded-start-1 pt-2" id="panecours" style="background-color: #FFFFFF; height: 100vh; font-family: 'Poppins', sans-serif;" >
    <div class="row">
        @foreach ($mesCours as $cours)
            <div class="col-sm-6 mb-sm-0" >
                <div class="card bg-c-green order-card" style="font-size: 26px; border-radius: 5px; -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16); box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16); border: none; margin-bottom: 30px; -webkit-transition: all 0.3s ease-in-out; transition: all 0.3s ease-in-out; background: linear-gradient(45deg, #4099ff, #73b4ff); color: #fff;">
                    <div class="card-block" style="padding: 25px; text-align: right;">
                        <h2 class="m-b-20">{{$cours->matiere}}</h2>
                        <h6 style="cursor: pointer;"><span onclick="getCours(this.id)" id="{{ $cours->matiere }}" style="font-size: 18px;">Consulter</span></h6>
                    </div>
                </div>

            </div>

        @endforeach
    </div>
</div>
<div class="container border rounded-1" id="tbl" style="visibility: hidden;">
    <p class="text text-start row border ps-2" style="background-color: #f5f5f5">Cours</p>
    <table class="table table-striped" style="background-color: #FAFAFA;">
        <thead>
        <tr>
            <th scope="col">Num</th>
            <th scope="col">Cours</th>
            <th scope="col">Date de mise en ligne</th>
            <th scope="col">Lien</th>
        </tr>
        </thead>
        <tbody id="coursTable">
        </tbody>
    </table>
</div>

<script>
    window.addEventListener('load', function() {tbl.style.visibility='hidden';
    });

    // function toggleAlignTop(card) {
    //     // Remove the "align-top" class from all cards
    //     var cards = document.getElementsByClassName("card");
    //     if(bar.children.length < 4){
    //
    //         for (var i = 0; i < cards.length; i++) {
    //             const colDiv = document.createElement('div');
    //             colDiv.className = 'col';
    //             colDiv.appendChild(cards[i]);
    //             bar.appendChild(colDiv);
    //
    //             console.log(i);
    //         }
    //         let x=0;
    //         while (panecours.firstChild) {
    //             panecours.removeChild(panecours.firstChild);
    //         }
    //
    //         panecours.appendChild(tbl);
    //         tbl.style.visibility='visible';
    //     }
    //
    // }

    function getCours(name) {
        var cards = document.getElementsByClassName("card");
        if(bar.children.length < 4){

            for (var i = 0; i < cards.length; i++) {
                const colDiv = document.createElement('div');
                colDiv.className = 'col';
                colDiv.appendChild(cards[i]);
                bar.appendChild(colDiv);

                console.log(i);
            }
            let x=0;
            while (panecours.firstChild) {
                panecours.removeChild(panecours.firstChild);
            }

            panecours.appendChild(tbl);
            tbl.style.visibility='visible';
        }


        axios.get('/etudiant/get-cours', {
            params: {
                name: name
            }
        })
            .then(function (response) {
                const cours = response.data;
                var tableHtml='';
                for (let i = 0; i < cours.length; i++) {
                    tableHtml+= ' <tr><th scope="row">'+cours[i].courID+'</th><td>'+cours[i].nom+'</td><td>'+cours[i].dateMiseEnLigne+'</td> <td><a href="'+cours[i].lien+'"  target="_blank">Voir le cours</a></td> </tr>';

                    // tableHtml += '<tr><td>' + cours[i].nom + '</td><td>' + cours[i].dateMiseEnLigne + '</td><td>' + cours[i].lien + '</td></tr>';
                }
                // Set the HTML of the table element
                coursTable.innerHTML = tableHtml;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

</script>

@endsection
