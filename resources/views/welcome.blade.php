@include('ElementsFix.Sidebar')
@include('ElementsFix.Navbar')

<title>Dashboard - Koul Healthy</title>

<head>
    <!-- Inclure Chart.js dans la section head -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

</head>

<div class="layout-page">
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Body Content -->
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title"> Bienvenue chez 
                                        <span style="color: rgb(0, 255, 85);">Koul</span>
                                        <span style="color: #fc5c11;">Healthy</span>
                                    </h5>
                                    <p class="mb-4">
                                        Notre application de suivi et de gestion a enregistré une augmentation des performances exceptionnelle
                                        <span class="fw-medium"></span>
                                    </p>
                                    <!-- Votre contenu spécifique ici -->
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="../assets/img/logo-koulHealty/chef-dr-le-menu-restaurant-logo-ou-étiquette-de-la-nourriture-illustration-vecteur-du-service-alimentaire-vec.jpg"
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
                            <!-- Votre contenu spécifique ici -->
                            <div id="categoryChartContainer">
                                <canvas id="categoryChart" width="300" height="300"></canvas>
                            </div>
                        </div>
                        <p class="mb-4 text-center">
                            Les statistiques des catégories-produits <span class="fw-medium"></span>
                        </p>
                        
                    </div>
                   
                </div>
            </div>
        </div>
       
    </div>

    <!-- Page JS -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

    <script>
        // Vérifier si les couleurs sont déjà stockées dans le stockage local
        var storedColors = localStorage.getItem('categoryColors');
        var colors = storedColors ? JSON.parse(storedColors) : [];
    
        var data = {
            labels: {!! $categoriesStats->pluck('category_name')->toJson() !!},
            datasets: [{
                data: {!! $categoriesStats->pluck('product_count')->toJson() !!},
                backgroundColor: generateColors(colors, {{ $categoriesStats->count() }}),
            }],
        };
    
        var options = {
            responsive: true,
            maintainAspectRatio: false,
        };
    
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('categoryChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options,
            });
        });
    
        function generateColors(existingColors, count) {
            var newColors = [];
    
            for (var i = 0; i < count; i++) {
                // Si une couleur existe déjà pour la catégorie, l'utiliser
                if (existingColors[i]) {
                    newColors.push(existingColors[i]);
                } else {
                    var color = getRandomColor();
                    newColors.push(color);
                }
            }
    
            // Stocker les nouvelles couleurs dans le stockage local
            localStorage.setItem('categoryColors', JSON.stringify(newColors));
    
            return newColors;
        }
    
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
    
    

</body>
</html>
