@extends('layouts.app', ['activePage' => 'serviceProviders-management', 'titlePage' => __('Service Providers Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Service Providers') }}</h4>
                <p class="card-category"> {{ __('Here you can manage service Providers') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('PendingSPRequest.index') }}" class="btn btn-sm btn-primary">{{ __('Pending Service Providers') }}</a>
                    <a href="{{ route('serviceProviders.create') }}" class="btn btn-sm btn-primary">{{ __('Add Service Providers') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                       <th>
                        {{ __('Phone') }}
                      </th>
                      <th>
                        {{ __('Catagory') }}
                      </th>
                      <th>
                        {{ __('WebLink') }}
                      </th>
                      <th>
                        {{ __('Address') }}
                      </th>
                       <th>
                        {{ __('Location') }}

                      </th>

                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th>
                        {{ __('Admin') }}
                      </th>
                       <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($ServiceProviders as $serviceProvider)
                        <tr>
                          <td>
                            {{ $serviceProvider->name }}
                          </td>
                          <td>
                            {{ $serviceProvider->email }}
                          </td>
                          <td>
                            {{ $serviceProvider->phone }}
                          </td>
                          <td>
                            {{ $serviceProvider['serviceCatagory']['name'] }}
                          </td>
                            <td>
                            {{ $serviceProvider->webLink }}
                          </td>
                          <td>
                            {{ $serviceProvider['location']['city']}},{{$serviceProvider['location']['subCity'] }}
                          </td>
                          <td>
                          </td>
                          <td>
                            {{ $serviceProvider->created_at->format('Y-m-d') }}
                          </td>
                          <td>
                        @if ($serviceProvider['user']!='[]')
                            @foreach($serviceProvider['user'] as $user)
                            {{
                                $user['name'].','
                            }}
                            @endforeach
                              @else
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add') }}</a>
                              @endif
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('serviceProviders.destroy', $serviceProvider) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('serviceProviders.edit', $serviceProvider) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this $serviceProvider->name ?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>

                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
