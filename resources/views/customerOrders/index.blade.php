
@extends('layouts.app', ['activePage' => 'customerOrders-management', 'titlePage' => __('Customer Order Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Customer Orders') }}</h4>
                <p class="card-category"> {{ __('Here you can manage customer orders') }}</p>
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
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">

                        <th>
                          {{ __('Order Id') }}
                      </th>
                       <th>
                          {{ __('Customer Id') }}
                      </th>
                      <th>
                          {{ __('Quantity') }}
                      </th>
                       <th>
                          {{ __('Table No') }}
                      </th>
                       <th>
                          {{ __('Item') }}
                      </th>
                       <th>
                          {{ __('Description') }}
                      </th>
                       <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach(auth()->user()->serviceProvider['customerOrders'] as $item)
                        <tr>
                          <td>
                            {{ $item->orderId}}
                          </td>
                          <td>
                           {{ $item->userId}}
                          </td>
                           <td>
                           {{ $item->quantity}}
                          </td>
                        <td>
                           {{ $item['table']['tableNumber']}}
                          </td>
                        <td>
                           {{ $item['item']['name']}}
                          </td>
                            <td>
                           {{ $item['description']}}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('tables.destroy', $item) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('tables.edit', $item) }}" data-original-title="" title="">
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
