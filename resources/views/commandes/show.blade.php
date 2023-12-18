@extends('Dashboard.ElementsFix')
@include('Dashboard.navbar')

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >
                <h1 class="text-center">Tous les commandes</h1>
            
                <table class="table-auto">

                    <tr>
                        <th>Id</th>
                        <th>date_commande</th>
                        <th>statut_commande</th>
                    </tr>
                    @foreach ($commandes as $commande)
                        <tr>
                            <td>{{$commande->id}}</td>
                            {{-- pour limiter la longueur de la description à 100 caractères --}}
                            <td>{{$commande->date_commande}}</td>
                            <td>{{$commande->statut_commande}}</td>
                        </tr>
                    @endforeach
                </table>
                {{-- {{$products->links()}} --}}
        </div>
    </div>    
</div>







{{-- <x-master title="Mon Profile"><h3>Profiles</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    @foreach ($profiles as $profile)
        <x-profile-card :profile="$profile" />
    @endforeach
    </div>
{{ $profiles->links() }}
</x-master> --}}