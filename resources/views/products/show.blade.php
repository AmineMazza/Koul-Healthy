@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<title>Détails Produit</title>

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >   

    <h1>Détails du Produit {{ $product->title }}</h1>
    {{-- <p><strong>Image :</strong> --}}
        @if ($product->image)
            @foreach (json_decode($product->image) as $image)
                <img style="width: 380px; height: 270px; border-radius: 5%;" src="{{ asset('storage/' . $image) }}">
            @endforeach
        @endif
    </p>
        <p><strong>Nom :</strong> {{ $product->title }}</p>
        <p><strong>Description :</strong> {{ $product->description }}</p>
        <p><strong>Prix :</strong> {{ $product->price }}</p>
    <a href="{{ route('products.index') }}">Retour à la Liste des Produits</a>
        </div>
    </div>
</div>
