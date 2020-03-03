<style>
.profileCard {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  padding: 5%;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 5px;
}



a {
  text-decoration: none;
  font-size: 5px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->

  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('SPprofile.index') }}">
          <div class="profileCard">
                <img src="{{asset('logo')}}/{{auth()->user()['serviceProvider']['logo'] }}" alt="John" style="width:100%">
          <h3>{{auth()->user()['serviceProvider']['name'].' '.auth()->user()['serviceProvider']['serviceCatagory']['name']}}</h3>
</div>
        </a>

      </li>

       <li class="nav-item{{ $activePage == 'customerOrders-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('customerOrders.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Customer Orders') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'menu-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('menu.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Menu') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'serviceProviders-profile-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('SPprofile.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('ServiceProviders Profile') }}</p>
        </a>
      </li>
       <li class="nav-item{{ $activePage == 'happyHour-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('happyHour.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Happy Hour') }}</p>
        </a>
      </li>
       <li class="nav-item{{ $activePage == 'tables-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('tables.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Tables') }}</p>
        </a>
      </li>
        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#profile" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Profile') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="profile">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'serviceProviders' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('SPprofile.index') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Service Provider Profile') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
