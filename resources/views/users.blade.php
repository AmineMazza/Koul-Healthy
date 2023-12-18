@extends('Dashboard.ElementsFix')
@include('Dashboard.navbar')

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >
            <h1 class="text-center">Les gérants de restaurants</h1>

            <table class="table-auto">

                <tr>
                    <th>name</th>
                    <th>Role</th>
                    <th>email</th>
                    <th>Tel</th>
                    <th>Ville</th>
                    <th>Adresse_Livraision</th>
                </tr>
                
                @foreach ($users as $user)
                    @if($user->role=='GérantResto')
                        <tr>
                        <!-- Affiche du contenu réservé aux administrateurs -->
                            <td>{{Str::limit($user->name,20)}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->tel}}</td>
                            <td>{{$user->city}}</td>
                            <td>{{Str::limit($user->address,30)}}</td>
                        </tr>
                    @endif     
                @endforeach


        
                
            </table>
            {{-- {{$users->links()}} --}}
        </div>
    </div>    
</div>

