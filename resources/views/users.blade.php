<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <h1 class="text-center">Users Page</h1>

    <table class="table-auto">

        <tr>
            <th>Id</th>
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
                    <td>{{$user->id}}</td>
                    <td>{{Str::limit($user->name,15)}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{Str::limit($user->address,50)}}</td>
                </tr>
            @endif     
        @endforeach


   
        
    </table>
    {{-- {{$users->links()}} --}}
</body>
</html>
