<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img
            src="{{ asset('/storage/assets/logo/logo1672518180.png') }}" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img
            src="{{ asset('/storage/assets/logo/faviconV2.png') }}" alt="logo" /></a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
        </li>
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                aria-expanded="false">
                <div class="nav-profile-img">
                    <img src="{{ asset('/storage/assets/logo/faviconV2.png') }}" alt="image">
                    <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                    <p class="mb-1 text-black">{{ Str::ucfirst(Auth::user()->name ?? 'Admin') }}</p>
                </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                    </a>
                </form>
            </div>
        </li>

    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
    </button>
</div>
