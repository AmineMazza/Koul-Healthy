<!-- resources/views/categories/edit.blade.php -->

@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(to right, #4CAF50, #FFA500); color: white; text-align: center;">
                        <h4 class="mb-0" style="color: white;">Modification d'une Catégorie</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="titre" class="form-label">Catégorie</label>
                                <input type="text" class="form-control" id="titre" name="titre" value="{{ $category->titre }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Image actuelle      </label>
                                <img src="{{ asset($category->image) }}" alt="Image actuelle" style="max-width: 100%;" class="mx-auto d-block">
                            </div>
                            
                            <div class="mb-3">
                                <label for="new_image" class="form-label">Nouvelle Image</label>
                                <input type="file" class="form-control" id="new_image" name="new_image">
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
