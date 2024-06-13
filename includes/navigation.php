

<header class="header" data-header>
    <div class="nav-container">

      <div class="overlay container-fluid" data-overlay></div>

      <a href="index.html" class="logo navbar-brand">
        ArtRegalia
      </a>

      <button class="nav-open-btn navbar-toggler" data-nav-open-btn aria-label="open menu">
        <i class="menu-outline fa-solid fa-bars-staggered navbar-toggler-icon"></i>
      </button>

      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="close menu">
          <i class="close-outline fa-solid fa-xmark"></i>
        </button>

        <a href="index.html" class="nav-logo">
          ArtRegalia
        </a>

        <ul class="navbar-list navbar-nav">

      

          <li class="navbar-item nav-item">
            <a href="index.html" class="navbar-links nav-link">Home</a>
          </li>



          <li class="navbar-item nav-item">
            <a href="Artists-page.html" class="navbar-links desk nav-link">Artists</a>
            <input type="checkbox" id="showArtists" class="dropdown-toggle">
            <label for="showArtists" class="navbar-links">Artists <i class="fa-solid fa-caret-down"></i></label>
            <ul class="drop-menu">
              <li><a class='dropdown-item' href='#'>Street Artist</a></li>
            </ul>
          </li>

          <li class="navbar-item nav-item">
            <a href="craft-page.html" class="navbar-links desk nav-link">Craftsmen</a>
            <input type="checkbox" id="showMega" class="dropdown-toggle">
            <label for="showMega" class="navbar-links">Craftsmen<i class="fa-solid fa-caret-down"></i></label>
            <div class="mega-box">
              <div class="content">
              
                <div class="row">
                <header>Bags</header>
                  <ul class="mega-links">
                    <li><a class="dropdown-item" href="#">beaded</a></li>    
                    <li><a class="dropdown-item" href="#">beaded</a></li>    
                    <li><a class="dropdown-item" href="#">beaded</a></li>    
                    <li><a class="dropdown-item" href="#">beaded</a></li>    
                    <li><a class="dropdown-item" href="#">beaded</a></li>    
                  </ul>
                </div>
              
              </div>
            </div>
          </li>

          <li class="navbar-item nav-item">
            <a href="shopall.html" class="navbar-links nav-link">Shop all</a>
          </li>

          <li class="navbar-item nav-item">
            <a href="shops.html" class="navbar-links nav-link">Shops</a>
          </li>

          <li class="navbar-item nav-item">
            <a href="community.html" class="navbar-links nav-link">Community</a>
          </li>

          <li class="navbar-item nav-item">
            <a href="about.html" class="navbar-links nav-link">About Us</a>
          </li>

          <li class="navbar-item nav-item">
            <a href="./admin/admin_home.html" class="navbar-links nav-link">Admin</a>
          </li>

        </ul>


        <ul class="nav-action-list navbar-nav me-2">

          <li class="nav-item">

            <button class="nav-action-btn srch-btn nav-link btn btn-link" id="searchButton">
              <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
              <span class="nav-action-text">Search</span>
            </button>
          </li>


          <li class="nav-item ms-2">
            <button class="nav-action-btn notify-btn nav-link btn btn-link ">
              <i class="fa-solid fa-inbox" aria-hidden="true"></i>
              <span class="icon-badge-btn">10</span>
              <span class="nav-action-text">Notifications</span>

              <data class="nav-action-badge-notify" value="12" aria-hidden="true">12</data>
            </button>
          </li>

          <li class="nav-item ms-2">
            <a href="cart.html" class="nav-action-btn nav-link">
              <i class="fa-solid fa-bag-shopping" aria-hidden="true"></i>
              <span class="icon-badge-btn">4</span>
              <data class="nav-action-text" value="400.00">Basket: <strong>400EGP</strong></data>

              <data class="nav-action-badge" value="4" aria-hidden="true">4</data>
            </a>
          </li>

          <li class="navbar-item side-profile nav-item me-auto">
            <a href="#" class="navbar-links desk nav-link">Profile</a>
            <i class="fa-solid fa-user desk" aria-hidden="true"></i>
            <input type="checkbox" id="showProfile" class="dropdown-toggle">
            <label for="showProfile" class="navbar-links"><i class="fa-solid fa-user" aria-hidden="true"></i>Profile <i
                class="fa-solid fa-caret-down"></i></label>
            <ul class="drop-menu profile">
              <li><a class="nav-link" href="./user-profile.html"><i class="fa-solid fa-user"></i>View Profile</a></li>
              <li><a class="nav-link" href="./wishlist.html"><i class="fa-solid fa-heart"></i>Wishlist</a></li>
              <li><a class="nav-link" href="help.html"><i class="fa-solid fa-circle-question"></i>Help</a></li>
              <li><a class="nav-link" href="settings.html"><i class="fa-solid fa-gears"></i>Settings</a></li>
            
              <li><a class="nav-link" href="login.html"><i class="fa-solid fa-lock"></i>Sign-in/Sign-up</a></li>
            </ul>
          </li>
        </ul>
        <div id="searchContainer" class="d-none">
          <input type="text" id="searchInput" class="form-control" placeholder="Search...">
          <button class="btn btn-link nav-close-search" id="closeSearchButton">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </nav>
    </div>
  </header>

  <script src="./javascript/search.js" charset="UTF-8"></script>
