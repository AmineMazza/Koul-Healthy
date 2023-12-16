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
            <th>Adresse_Livraision</th>
            <th>Tel</th>
            <th>Ville</th>
            <th>email</th>
        </tr>
       
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{Str::limit($user->name,15)}}</td>
                <td>{{Str::limit($user->Adresse_Livraision,50)}}</td>
                <td>{{$user->Tel}}</td>
                <td>{{$user->Ville}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
    </table>
    {{-- {{$users->links()}} --}}
</body>
</html>
