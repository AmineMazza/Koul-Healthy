<!-- resources/views/categories/edit.blade.php -->


@section('content')
    <h1> la Catégorie</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="titre">Titre</label>
        <input type="text" name="titre" value="{{ $category->titre }}" required>
        
        <label for="image">Image</label>
        <input type="file" name="image" value="{{ $category->image }}" required>
        
        <button type="submit">Enregistrer les Modifications</button>
    </form>
@endsection



