<header class="header" data-header>
    <div class="container">

        <a href="#" class="logo">
            <img src="{{ asset('frontend/FullLogo_Transparent.png') }}" width="119" height="37" alt="Wren logo">
        </a>

        <nav class="navbar" data-navbar>

            <div class="navbar-top">
                <a href="#" class="logo">
                    <img src="{{ asset('frontend/IconOnly_Transparent.png') }}" width="119" height="37"
                        alt="Wren logo">
                </a>

                <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
            </div>

            <ul class="navbar-list">

                <li>
                    <a href="{{ route('frontend.index') }}" class="navbar-link hover-1" data-nav-toggler>Home</a>
                </li>

                <li>
                    <a href="{{ route('frontend.categories') }}" class="navbar-link hover-1"
                        data-nav-toggler>Categories</a>
                </li>

                <li>
                    <a href="{{ route('frontend.posts') }}" class="navbar-link hover-1" data-nav-toggler>Recent
                        Posts</a>
                </li>
                <li>
                    <label for="" style="vertical-align: -11px;">Dark Mode</label>
                    <input type="checkbox" hidden="hidden" id="username">
                    <label class="switch" for="username"></label>
                </li>



            </ul>

            <div class="navbar-bottom">
                {{-- 
          <div class="profile-card">
            <img src="./assets/images/author-1.png" width="48" height="48" alt="Steven" class="profile-banner">

            <div>
              <p class="card-title">Hello Steven !</p>

              <p class="card-subtitle">
                You have 3 new messages
              </p>
            </div>
          </div> --}}

                <ul class="link-list">

                    {{-- <li>
              <a href="#" class="navbar-bottom-link hover-1">Profile</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Articles Saved</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Add New Post</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">My Likes</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Account Setting</a>
            </li> --}}

                    <li>

                        @if (auth()->check())
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn btn-primary">Log out</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="logout-btn btn-primary">Login</a>
                        @endif
                    </li>

                </ul>

            </div>

            <p class="copyright-text">

            </p>

        </nav>
        @if (auth()->check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Log out</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        @endif

        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
            <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
        </button>

    </div>
</header>
