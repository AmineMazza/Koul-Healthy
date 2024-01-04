<!-- resources/views/categories/index.blade.php -->

@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<title>Catégories</title>

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Catégories / </span>Toutes les catégories</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Catégories
                        <a href="categories/create" class="btn btn-danger">Ajouter</a>
                        <button id="deleteSelectedButton" class="btn btn-delete" style="display: none;">
                            <i class="bx bx-trash me-1"></i> Supprimer les éléments sélectionnés
                        </button>
                    </h5>
                    

                    <div class="table-responsive text-nowrap">
                        <form id="deleteSelectedForm" action="{{ route('categories.bulkDelete') }}" method="post">
                            @csrf
                            @method('DELETE')

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-start">
                                            <label for="selectAllCheckbox" class="checkbox-label">
                                                <input type="checkbox" id="selectAllCheckbox">
                                                <span class="checkbox-custom"></span>
                                            </label>
                                        </th>                      
                                        <th>Catégorie</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selectedCategories[]" value="{{ $category->id }}">
                                            </td>
                                            <td>{{ $category->titre }}</td>
                                            <td>
                                                <img src="{{ asset($category->image) }}" alt="{{ $category->titre }}" style="max-width: 100px; max-height: 100px;">
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <!-- Modifier -->
                                                        <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">
                                                            <i class="bx bx-edit-alt me-1"></i> Modifier
                                                        </a>
                                                        
                                                        <!-- Supprimer -->
                                                        <a href="javascript:void(0);" class="dropdown-item delete-single" data-id="{{ $category->id }}">
                                                            <i class="bx bx-trash me-1"></i>  Supprimer
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>    
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectAllCheckbox = document.getElementById('selectAllCheckbox');
        const deleteSelectedButton = document.getElementById('deleteSelectedButton');
        const checkboxes = document.querySelectorAll('input[name="selectedCategories[]"]');
        const deleteSingleButtons = document.querySelectorAll('.delete-single');

        // Écouter le changement de la case à cocher de sélection générale
        selectAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            updateDeleteButtonVisibility();
        });

        // Écouter le changement de chaque case à cocher individuelle
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                updateDeleteButtonVisibility();
            });
        });

        // Écouter le clic sur les boutons de suppression individuels
        deleteSingleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-id');
                document.querySelector('input[name="selectedCategories[]"][value="' + categoryId + '"]').checked = true;
                updateDeleteButtonVisibility();
            });
        });

        // Fonction pour mettre à jour la visibilité du bouton de suppression en fonction de la sélection
        function updateDeleteButtonVisibility() {
            const atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            deleteSelectedButton.style.display = atLeastOneChecked ? 'inline-block' : 'none';
        }

        // Écouter le clic sur le bouton de suppression général
        deleteSelectedButton.addEventListener('click', function() {
            document.getElementById('deleteSelectedForm').submit();
        });
    });
</script>
