<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}" />
    <script src="{{ asset('js/admin.js') }}" defer></script>
  </head>
  <body>
    <header class="header">
      <div class="header__container">
        <img  alt="" class="header__img" style="opacity: 0" />

        <a href="#" class="header__logo"></a>

        <div class="header__search">
          <input type="search" placeholder="Search" class="header__input" />
          <i class="bx bx-search header__icon"></i>
        </div>

        <div class="header__toggle">
          <i class="bx bx-menu" id="header-toggle"></i>
        </div>
      </div>
    </header>
    <!-- navbar -->
    <div class="nav" id="navbar">
      <nav class="nav__container">
        <div>
          <a href="/admin/dashboard" class="nav__link nav__logo">
            <i class="bx bxs-disc nav__icon"></i>
            <span class="nav__logo-name">XYZ</span>
          </a>

          <div class="nav__list">
            <div class="nav__items">
              <h3 class="nav__subtitle">Profile</h3>

              <a href="/" class="nav__link">
                <i class="bx bx-home nav__icon"></i>
                <span class="nav__name">Home</span>
              </a>
        
              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class='bx bx-checkbox-square nav__icon'></i>
                  <span class="nav__name">Product</span>
                  <i
                    class="bx bx-chevron-down nav__icon nav__dropdown-icon"
                  ></i>
                </a>

                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="/admin/dashboard/products" class="nav__dropdown-item">All Products</a>
                    <a href="/admin/dashboard/product/create" class="nav__dropdown-item">create</a>
                    {{-- <a href="" class="nav__dropdown-item">Accounts</a> --}}
                  </div>
                </div>
              </div>
          
              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class='bx bx-shape-circle nav__icon'></i>
                  <span class="nav__name">Order</span>
                  <i
                    class="bx bx-chevron-down nav__icon nav__dropdown-icon"
                  ></i>
                </a>

                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="/admin/dashboard/orders" class="nav__dropdown-item">All Orders</a>
                    <a href="/admin/dashboard/transactions" class="nav__dropdown-item">Transactions</a>
                    {{-- <a href="" class="nav__dropdown-item">Accounts</a> --}}
                  </div>
                </div>
              </div>

              <a href="/admin/dashboard/users" class="nav__link">
                <i class="bx bx-user nav__icon"></i>
                <span class="nav__name">User</span>
              </a>

              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class='bx bxs-category-alt nav__icon'></i>
                  <span class="nav__name">Category</span>
                  <i
                    class="bx bx-chevron-down nav__icon nav__dropdown-icon"
                  ></i>
                </a>

                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="/admin/dashboard/categories" class="nav__dropdown-item">All Categories</a>
                    <a href="/admin/dashboard/category" class="nav__dropdown-item">Create</a>
                    {{-- <a href="" class="nav__dropdown-item">Accounts</a> --}}
                  </div>
                </div>
              </div>


      

            <div class="nav__items">
              <h3 class="nav__subtitle">Menu</h3>

              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class="bx bx-bell nav__icon"></i>
                  <span class="nav__name">Notifications</span>

                  <i
                    class="bx bx-chevron-down nav__icon nav__dropdown-icon"
                  ></i>
                </a>

                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="" class="nav__dropdown-item">Blocked</a>
                    <a href="" class="nav__dropdown-item">Silenced</a>
                    <a href="" class="nav__dropdown-item">Publish</a>
                    <a href="" class="nav__dropdown-item">Program</a>
                  </div>
                </div>
              </div>

              <a href="/admin/dashboard/manage-role/" class="nav__link">
                <i class="bx bx-compass nav__icon"></i>
                <span class="nav__name">Handle Roles</span>
              </a>

              <a href="#" class="nav__link">
                <i class="bx bx-bookmark nav__icon"></i>
                <span class="nav__name">Saved</span>
              </a>
            </div>
          </div>
        </div>

        <a href="/logout" class="nav__link nav__logout">
          <i class="bx bx-log-out nav__icon"></i>
          <span class="nav__name">Logout</span>
        </a>
      </nav>
    </div>

    <!-- end -->
    <!-- cotent -->
    <main>
      @yield('content')
    </main>
  </body>
</html>