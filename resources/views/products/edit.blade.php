@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<title>Modifier Produit</title>

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >   


    <h1>Modifier le Produit {{ $product->title }}</h1>

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('get')
        <div class="mb-3">
            <label for="title" class="form-label" >titre</label>
            <input type="text" class="form-control" value="{{ $product->title }}" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control"  id="description" name="description">{{ $product->description }}
            </textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" step="0.01" class="form-control"  value="{{ $product->price }}" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" />
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        
    </form>
    <a href="{{ route('products.index') }}">Retour à la Liste des Produits</a>
        </div>
    </div>
</div>


