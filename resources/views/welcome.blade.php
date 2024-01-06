@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<title>Dashboard - Koul Healthy</title>
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
                                Votre application de suivi et de gestion a enregistré une augmentation des performances exceptionnelle <span class="fw-medium"></span>
                            </p>
                            <!-- code CA-->
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
                            
                            </div>
                            <div id="growthChart"></div>
                            <div class="text-center fw-medium pt-3 mb-2">
                                <div class="col-md-12 mb-4">
                                    <div class="row mx-auto">
                                        @php
                                            $colors = ['#4CAF50', '#689F38', '#8BC34A', '#FF9800', '#FF5722', '#FFA726', '#FB8C00', '#E65100', '#D84315', '#BF360C'];
                                            $colorIndex = 0;
                                        @endphp
                                
                                        @foreach($categoriesStats as $category)
                                            <div class="col-md-4 mb-4">
                                                <div class="card" style="width: 80%; height: 80px; overflow: hidden;">
                                                    <div class="card-body" style="background: linear-gradient(to right, {{ $colors[$colorIndex] }}, {{ $colors[$colorIndex + 1] }}); padding: 1rem;">
                                                        <h6 class="card-text text-dark" style="font-size: 1.2rem;">{{ $category->category_name }}</h6>
                                                        <p class="card-text text-white" style="font-size: 1rem;">{{ $category->product_count }} Produits</p>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            @php
                                                // Increment the color index, and reset to 0 if it exceeds the array length
                                                $colorIndex += 2;
                                                if ($colorIndex >= count($colors) - 1) {
                                                    $colorIndex = 0;
                                                }
                                            @endphp
                                        @endforeach
                                    </div>
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

   <!-- Page JS -->
     
