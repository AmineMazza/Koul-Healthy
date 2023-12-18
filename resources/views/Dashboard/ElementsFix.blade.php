{{-- <a class="nav-link active" href="{{ route('products.index') }}">Products</a>
<a class="nav-link" href="{{ route('users') }}">Users</a>
<a class="nav-link" href="{{ route('products') }}">Products from API</a> --}}

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Koul Healthy </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo-koulHealty/KoulHelthy.jpg') }}"" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
      
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('home.index') }}" class="app-brand-link">
              <!-- <link rel="logo" type="image" href="assets/img/logo-koulHealty/KoulHelthy.jpg" /> -->
              <img src="{{ asset('assets/img/logo-koulHealty/KoulHealthy.png') }}" style="height: 80px; width: 80px;" alt="">
              {{-- <span class="app-brand-text demo menu-text ms-2">Koul Healthy</span>  --}}
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-category-alt'></i>
                <div data-i18n="Layouts">Catégories</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Without menu">Catégorie 1</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Without navbar">Catégorie 2</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Container">Catégorie 3</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-bowl-rice'></i>
                <div data-i18n="Layouts">Produits</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('products.index') }}" class="menu-link">
                    <div data-i18n="Without menu">Tous les Produits</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Front Pages -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class='menu-icon tf-icons bx bxs-basket'></i>
                  <div data-i18n="Front Pages">Commandes</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{ route('commandes.index') }}" class="menu-link">
                      <div data-i18n="Checkout">Tous les commandes</div>
                    </a>
                  </li>
                </ul>
            </li>

            <!-- Users Pages -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-user'></i>
                <div data-i18n="Front Pages">Gérants</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('users') }}" class="menu-link">
                    <div data-i18n="Checkout">Les gérants de resto</div>
                  </a>
                </li>
              </ul>
          </li>

       
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
        <!-- Body Content -->
            {{-- <div class="container-xxl flex-grow-1 container-p-y"Body - >
              <div class="row ">
                </div>
            </div> --}}
        <!-- / Body Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
  