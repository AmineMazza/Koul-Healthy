<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <h1 class="text-center">Products Page</h1>

    <table class="table-auto">

        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>prix</th>
        </tr>
       
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                {{-- pour limiter la longueur de la description à 100 caractères --}}
                <td>{{Str::limit($product->title,20)}}</td>
                <td>{{Str::limit($product->description,100)}}</td>
                <td>{{$product->price}}</td>
            </tr>
        @endforeach
    </table>
    {{$products->links()}}
</body>
</html>

{{-- <x-master title="Mon Profile"><h3>Profiles</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    @foreach ($profiles as $profile)
        <x-profile-card :profile="$profile" />
    @endforeach
    </div>
{{ $profiles->links() }}
</x-master> --}}