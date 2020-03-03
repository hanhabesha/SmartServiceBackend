<div class="wrapper">
    @if (auth()->user()->userType==1)
          @include('layouts.navbars.sidebarSubAdmin');

    @else
          @include('layouts.navbars.sidebar');

    @endif
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    <div class="content">
        <div class="col-sm-9">
                @include('common.message');
        </div>
    @yield('content')
    </div>
    @include('layouts.footers.auth')
  </div>
</div>
