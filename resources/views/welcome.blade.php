@extends('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<div class="layout-page">
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y"Body - >
            <!-- Body Content -->
            <div class="row ">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title"> Bienvenue chez 
                        <span style="color: rgb(0, 255, 85);">Koul</span>
                        <span style="color: #fc5c11;">Healthy</span></h5>
                        <p class="mb-4">
                        Vous avez réalisé <span class="fw-medium">62% </span> de ventes en plus aujourd'hui.
                        </p>
                    </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img
                        src="../assets/img/logo-koulHealty/chef-dr-le-menu-restaurant-logo-ou-étiquette-de-la-nourriture-illustration-vecteur-du-service-alimentaire-vec.jpg"
                        height="190"
                        alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="logo-koulHealty/chef-dr-le-menu-restaurant-logo-ou-étiquette-de-la-nourriture-illustration-vecteur-du-service-alimentaire-vec.jpg" />
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
            <!-- Total Revenue -->
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                    <h5 class="card-header m-0 me-2 pb-3">Revenu total</h5>
                    <div id="totalRevenueChart" class="px-2"></div>
                    </div>
                    <div class="col-md-4">
                    <div class="card-body">
                        <div class="text-center">
                        <div class="dropdown">
                            <button
                            class="btn btn-sm btn-outline-primary dropdown-toggle"
                            type="button"
                            id="growthReportId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            2023
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                            <a class="dropdown-item" href="javascript:void(0);">2023</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div id="growthChart"></div>
                    <div class="text-center fw-medium pt-3 mb-2">62% Croissance de votre restaurant</div>

                    <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                        <div class="d-flex">
                        <div class="me-2">
                            <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                        </div>
                        <div class="d-flex flex-column">
                            <small>2023</small>
                            <h6 class="mb-0">10.000 DH</h6>
                        </div>
                        </div>
                        <div class="d-flex">
                        <div class="me-2">
                            <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                        </div>
                        <div class="d-flex flex-column">
                            <small>2022</small>
                            <h6 class="mb-0">4.000 DH</h6>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- / Body Content -->
        </div>
    </div> 
</div>     
