<div>
  <header id="header" class="header d-flex align-items-center {{ request()->routeIs('indexPage') ? 'fixed' : 'sticky' }}-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('indexPage') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ url(env('ASSETS_LP_URL') . '/img/mnata_nobg_md.png') }}">
        <!-- <h1 class="sitename">MNATA</h1> -->
      </a>

      @if(request()->routeIs('indexPage')==true)
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('indexPage') }}#hero">Home</a></li>
          <li><a href="{{ route('indexPage') }}#about">About</a></li>
          <li><a href="{{ route('indexPage') }}#services">Services</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @endif

      <a class="btn-getstarted" wire:navigate href="{{ route('jobsPage') }}">Jobs</a>

    </div>
  </header>
</div>