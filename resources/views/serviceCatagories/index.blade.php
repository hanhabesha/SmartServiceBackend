
@extends('layouts.app', ['activePage' => 'menu-management', 'titlePage' => __('Menu Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Menu') }}</h4>
                <p class="card-category"> {{ __('Here you can manage Service Catagory') }}</p>
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
                    <a href="{{ route('serviceCatagories.create') }}" class="btn btn-sm btn-primary">{{ __('Add Service Catagory') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                       <th>
                        {{ __('Group Id') }}
                      </th>
                        <th>
                          {{ __('Name') }}
                      </th>
                       <th>
                        {{ __('Description') }}
                      </th>
                       <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($ServiceCatagories as $ServiceCatagory)
                        <tr>
                          <td>
                            {{ $ServiceCatagory->serviceCatagoryId}}
                          </td>
                          <td>
                           {{ $ServiceCatagory->name}}
                          </td>
                          <td>
                          <p>{!!$ServiceCatagory->description!!}</p>
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('serviceCatagories.destroy', $ServiceCatagory) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('serviceCatagories.edit', $ServiceCatagory) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Item?") }}') ? this.parentElement.submit() : ''">
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
