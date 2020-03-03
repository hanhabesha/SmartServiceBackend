@extends('layouts.app', ['activePage' => 'happyHour-management', 'titlePage' => __('Happy Hour Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Happy Hour') }}</h4>
                <p class="card-category"> {{ __('Here you can Happy Hour') }}</p>
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
                    <a href="{{ route('happyHour.create') }}" class="btn btn-sm btn-primary">{{ __('Add Happy Hour') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
<label class="bg-info text-white">Happy Hour By Item</label>
                @include('happyHour.tableContent.tableByItem')
                <label class="bg-info text-white">Happy Hour By Group</label>

                @include('happyHour.tableContent.tableByGroup')
<label class="bg-info text-white">Happy Hour By Menu</label>

                @include('happyHour.tableContent.tableByMenu')

                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
