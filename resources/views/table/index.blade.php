
@extends('layouts.app', ['activePage' => 'tables-management', 'titlePage' => __('Table Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Table') }}</h4>
                <p class="card-category"> {{ __('Here you can manage your Tables') }}</p>
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
                    <a href="{{ route('serviceCatagories.create') }}" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal-form">{{ __('Add Table') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                       <th>
                        {{ __('Id') }}
                      </th>
                        <th>
                          {{ __('Table Number') }}
                      </th>
                       <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach(auth()->user()->serviceProvider['tables'] as $item)
                        <tr>
                          <td>
                            {{ $item->tableId}}
                          </td>
                          <td>
                           {{ $item->tableNumber}}
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
<div class="col-md-4">
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card shadow border-0">
                    <div class="card-header bg-transparent">
                        <div class="text-muted text-center mt-1 mb-2    "><h3>Add</h3></div>
                    </div>
                    <div class="card-body px-lg-2 py-lg-2">
                        <form method="post" action="{{ route('tables.store') }}" autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Table Number" name="tableNumber" type="text" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
