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
                    <h5 class="card-header">Catégories</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Catégorie</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($categories as $category)
                                    <tr>
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
<form action="{{ route('categories.destroy', $category->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="dropdown-item">
        <i class="bx bx-trash me-1"></i>  Supprimer
    </button>
</form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>    
</div>
