@extends('Admin.admin')

@section('title', 'Paiement')

@section('PayementsActive','active')

@section('the-home-content')
<style>
.table-billing-history th, .table-billing-history td {
    padding-left: 1.375rem;
    padding-right: 1.375rem;
}
.table > :not(caption) > * > *, .dataTable-table > :not(caption) > * > * {
    padding: 0.75rem 0.75rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}

.border-start-primary {
    border-left-color: #0061f2 !important;
}
.border-start-secondary {
    border-left-color: #6900c7 !important;
}
.border-start-success {
    border-left-color: #00ac69 !important;
}
.border-start-lg {
    border-left-width: 0.25rem !important;
}
.h-100 {
    height: 100% !important;
}

.custab{
    border: 1px solid #ccc;
    padding: 2px;
    margin: 1% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
.btn-xs{
    --bs-btn-padding-y: .25rem;
    --bs-btn-padding-x: .5rem;
    --bs-btn-font-size: .75rem;
}
</style>

<div class="home-content px-3 pt-4 " id="myDiv" style="font-family:roboto,sans-serif;">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Paiement des salaires</h3>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        </div>
        <div class="d-none">
{{$currentMonth = Carbon\Carbon::now()->startOfMonth()}}</div>
        <div class="row">

        <div class="row custyle mx-2 ">
            <table class="table table-striped custab " id="paymentTable">
            <thead>
                <tr>
                    <th style="width: 20%;">Nom et Prenom</th>
                    <th>Portefeuille</th>
                    <th>Salaire</th>
                    <th>Mois</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
                    @foreach($salarie as $salarie)

                    <div class="d-none">
                       {{ $val = DB::table('history_paiement')
                        ->select('date_tansaction')
                        ->where('wallet', '=',$salarie->wallet)
                        ->orderBy('date_tansaction', 'desc')
                        ->limit(1)
                        ->value('date_transaction')}}
                @if(!$val)
                    {{$isBeforeCurrentMonth = true}}
                    @else
                        {{$isBeforeCurrentMonth = Carbon\Carbon::parse($val)->lt($currentMonth)}}
                    @endif
                    </div>
                    @if(!empty($salarie->wallet) and $isBeforeCurrentMonth)
                    <tr>
                        <td> {{$salarie->nom .' '. $salarie->prenom}}</td>
                        <td style="max-width: 5px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$salarie->wallet}} </td>
                        <td>{{$salarie->sallaire}}</td>
                        <td>{{now()->format('F')}}</td>
                        <td class="text-center"><a class='btn btn-success btn-xs' href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> Payer</a> </td>
                    </tr>
                    @endif
                @endforeach
            </table>

        </div>
            <script>
                const table = document.getElementById("paymentTable");
                const buttons = table.getElementsByClassName("btn-xs");
                var id;
                for (let i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener("click", function() {
                const row = this.parentNode.parentNode; // get the clicked row
                id = row.cells[1].innerHTML; // get the ID from the first cell
                montant.innerHTML=row.cells[2].innerHTML;
                beneficiaire.innerHTML = row.cells[1].innerHTML;
                console.log("Adresse row ID: " + id);
                });
                }

            </script>
    <div class="row mx-2 d-block justify-content-center">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Afficher l'historique
        </a>
        <div class="collapse" id="collapseExample">
            <div class="card card-body" style="background-color: #F9F9F9;">
{{--                <span class="font-monospace text-secondary" style=" font-size: 12px;line-height: 1.2;font-weight: 400;font-family: Arial, sans-serif;color: #333;">Prof : Ahmed ALami ,le </span>--}}
                <div class="card mb-4 mx2">
                    <div class="card-header">Historique des paiements</div>
                    <div class="card-body p-0">

                        <div class="table-responsive table-billing-history">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th class="border-gray-200" scope="col">Portefeuille</th>
                                    <th class="border-gray-200" scope="col">Date de transaction</th>
                                    <th class="border-gray-200" scope="col">Montant</th>
                                    <th class="border-gray-200" scope="col">TxID</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($historique as $transaction)
                                <tr>
                                    <td>{{$transaction->wallet}}</td>
                                    <td>{{$transaction->date_tansaction}}</td>
                                    <td>{{$transaction->montant}}</td>
                                    <td>
                                        <li class="list-inline-item">
                                            <a href="https://goerli.etherscan.io/tx/{{$transaction->tx_id}}" target="_blank" title="Voir" class="px-2 text-primary"><i class='bx bx-show' style='color:#038fff'  ></i></a>
                                        </li>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center" id="ale"><button class="btn btn-warning mt-1" id="btnMetamask" style="font-size: 0.875rem;padding: 0.25rem 0.5rem;">Connecter Metamask <img src="{{asset('images/metamask-icon.png')}}" style="height: 1.5rem;width: 1.5rem;"></button>
                </div>
                <div class="modal-body">
                     Montant :<span id="montant">6000</span><b style="color: goldenrod"> DH</b><br>
                    bénéficiaire : <span id="beneficiaire">0x65cbd565a6a7d</span>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnPayer">Payer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
      window.onload = () => { btnPayer.disabled = true;};

        var account;
        document.getElementById('btnMetamask').addEventListener('click',event =>{
            if (typeof window.ethereum === 'undefined'){
                const button = document.getElementById("btnMetamask");
                button.style.display = "block";
                // MetaMask is not installed
                alert("Metamask n'est pas installe");
            }
            else{
                ethereum.request({method:'eth_requestAccounts'}).then(accounts =>{
                    const button = document.getElementById("btnMetamask");
                    button.style.display = "none";
                    btnPayer.disabled = false;
                    account = accounts[0];
                    console.log(account);
                    accounts.forEach(function(str) {
                        console.log(str);
                    });

                    addresse.textContent = account;
                    ethereum.request({method: 'eth_getBalance',params: [account,'latest']}).then(result =>{
                        console.log(result);
                        let wei = parseInt(result,16);
                        let balance = wei/(10**18);
                        console.log("Your balance is : "+balance+" ETH");
                    });

                });
            }
        });

        document.getElementById('btnPayer').addEventListener('click',event =>{
            if (typeof window.ethereum !== 'undefined') {
                // MetaMask is installed and unlocked
                window.ethereum.on('networkChanged', function(networkId) {
                    console.log("MetaMask network changed:", networkId)
                })
                window.ethereum.on('accountsChanged', function(accounts) {
                    console.log("MetaMask accounts changed:", accounts)
                })
                let montantSpan = document.getElementById("montant");
                console.log("montatnt span"+montantSpan);
                let montantInt = parseInt(montantSpan.innerHTML);
                console.log("int"+montantInt);
                let montantusd = (montantInt/10)/2000;
                console.log("usd"+montantusd);
                let totalht =montantusd*(10**18);
                console.log("ht"+totalht);
                let totalttc = (totalht).toString(16);
                console.log("ttc"+totalttc);
                let transactionParam = {
                    to :'0x486bf32dabdD5AA632b10A0702C1e0c0e4942A9B',
                    from: account,
                    value: totalttc
                };


                ethereum.request({method: 'eth_sendTransaction',params:[transactionParam]}).then(txhash => {
                    console.log(txhash);

                    // Get the element with ID "ale"
                    const aleElement = document.getElementById("ale");

                    // Create a new spinner element with the desired HTML code
                    const spinnerElement = document.createElement("div");
                    spinnerElement.classList.add("spinner-border", "text-success");
                    spinnerElement.setAttribute("role", "status");

                    const visuallyHiddenElement = document.createElement("span");
                    visuallyHiddenElement.classList.add("visually-hidden");
                    visuallyHiddenElement.innerText = "Loading...";

                    spinnerElement.appendChild(visuallyHiddenElement);

                    // Append the spinner element to the ale element
                    aleElement.appendChild(spinnerElement);


                    checkTransactionconfirmation(txhash).then(r => {
                        aleElement.removeChild(spinnerElement);
                        let div = document.createElement("div");
                        div.className = "alert alert-success";
                        div.setAttribute("role", "alert");
                        div.innerHTML = "payer avec succes "+r+'<a href="https://goerli.etherscan.io/tx/'+txhash+'" target="_blank">Consulter</a>';
                        ale.appendChild(div);
                        btnPayer.disabled=true;

                        window.location.href = '/payementSuccess/' + beneficiaire.innerHTML + '/' + montant.innerHTML + '/' + txhash;
                    });
                });
            } else {
                // MetaMask is not installed
                alert("Metamask is not installed !!!");
            }

        });

        function checkTransactionconfirmation(txhash){
            let checkTransactionLoop = () =>{
                return ethereum.request({method: 'eth_getTransactionReceipt',params:[txhash]}).then(r => {
                    if(r != null) return 'confirmed';
                    else return checkTransactionLoop();
                });
            };

            return checkTransactionLoop();
        }
    </script>
</div>
@endsection
