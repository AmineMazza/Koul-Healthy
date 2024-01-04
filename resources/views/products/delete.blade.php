@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

{{-- <title>Ajouter Produit</title> --}}

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >  

<h1>Supprimer le produit {{ $product->title }}</h1>

<form action="{{ route('product.delete', $product->id) }}" method="post">
  @csrf
  @method('delete')

  <p>Êtes-vous sûr de vouloir supprimer ce produit ?</p>

  {{-- <input type="submit" value="Supprimer"> --}}
  <button type="submit" class="btn btn-primary">Supprimer</button>

</form>

        </div>
    </div>
</div>