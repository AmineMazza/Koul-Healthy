@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<div class="content-wrapper">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 offset-md-1"> <!-- Ajout de la classe offset-md-1 pour décaler vers la droite -->
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(to right, #4CAF50, #FFA500); color: white; text-align: center;">
                        <h4 class="mb-0" style="color: white;">Enregistrement d'une Catégorie</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de la catégorie" />
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" />
                                <small class="form-text text-muted">Formats autorisés : jpeg, png, jpg, gif. Taille maximale : 2048 KB.</small>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ route('categories.index') }}">Retour à la Liste des Catégories</a>
            </div>
        </div>
    </div>
</div>
