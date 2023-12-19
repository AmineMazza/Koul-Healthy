@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<div class="layout-page"> 
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gérants / </span>Tous les gérants de restaurants</h4>
  
                <!-- Basic Bootstrap Table -->
                <div class="card">
                  <h5 class="card-header">Gérants</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>tel</th>
                          <th>email</th>
                          <th>role</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            @if($user->role=='GérantResto')
                                <tr>
                                <td>{{Str::limit($user->name,20)}}</td>
                                <td>{{$user->tel}}</td>
                                <td> {{$user->email}}</td>
                                <td><span class="badge bg-label-primary me-1"> {{$user->role}}</span></td>
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
                            @endif     
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

