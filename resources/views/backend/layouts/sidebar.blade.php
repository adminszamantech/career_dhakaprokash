<ul class="nav">
    <li class="nav-item nav-profile">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <div class="nav-profile-image">
                <img src="{{ asset('/storage/assets/logo/faviconV2.png') }}" alt="profile" />
                <span class="login-status online"></span>
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ Str::ucfirst(Auth::user()->name ?? '') }}</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://www.dhakaprokash24.com/">
            <span class="menu-title">Go to news</span>
            <i class="mdi mdi-newspaper menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
            aria-controls="ui-basic">
            <span class="menu-title">Applications</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('applicants') }}">Applicants</a>
                </li>
            </ul>
        </div>
    </li>
</ul>
