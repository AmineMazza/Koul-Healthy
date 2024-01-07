@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<title>LineCommandes</title>

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >
            
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4"><span class="text-muted fw-light">LineCommandes / </span>Tous les LineCommandes</h4>
      
                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                      <h5 class="card-header">LineCommandes</h5>
                      <div class="table-responsive text-nowrap">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>qte_commandée</th>
                              <th>Price_total_commande</th>
                              <th>produit_id</th>
                              <th>commande_id</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            @foreach ($LineCommandes as $LineCommande)
                                    <tr>
                                        <td>{{$LineCommande->id}}</td>
                                        <td>{{$LineCommande->qte_commandée}} Produits</td>
                                        <td>{{$LineCommande->Price_total_commande}} Dh</td>
                                        <td>{{$LineCommande->produit_id}}</td>
                                        <td>{{$LineCommande->commande_id}}</td>
                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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







{{-- <x-master title="Mon Profile"><h3>Profiles</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    @foreach ($profiles as $profile)
        <x-profile-card :profile="$profile" />
    @endforeach
    </div>
{{ $profiles->links() }}
</x-master> --}}