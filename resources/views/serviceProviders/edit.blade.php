@extends('layouts.app', ['activePage' => 'serviceProvider-management', 'titlePage' => __('Service Providers Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('serviceProviders.update',$serviceProvider)}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Service Provider Profile') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="row customContainerBox">
                    <div class="card-body col-md-9">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Service Provider Name') }}" value="{{ $serviceProvider['name'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-name" type="text" placeholder="{{ __('serviceProviders Phone Number') }}" value="{{ $serviceProvider['phone'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('phone'))
                        <span id="phone-error" class="error text-danger" for="input-name">{{ $errors->first('phone') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('serviceProviders Email') }}" value="{{ $serviceProvider['email'] }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Service Catagory') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('serviceCatagoryId') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('serviceCatagoryId') ? ' is-invalid' : '' }}" name="serviceCatagoryId" id="">
                        <option value=null>--Select ServiceProvider--</option>
                        @foreach ($ServiceCatagories as $serviceCatagory)
                      <option <?php $serviceProvider['serviceCatagoryId']==$serviceCatagory['serviceCatagoryId']? print 'selected' :''?>

                       value={{$serviceCatagory->serviceCatagoryId}}>{{$serviceCatagory['name']}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('serviceCatagoryId'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('serviceCatagoryId') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Web Link') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('webLink') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('webLink') ? ' is-invalid' : '' }}" name="webLink" id="input-webLink" type="text" placeholder="{{ __('serviceProviders Website') }}" value="{{ $serviceProvider['webLink'] }}" required />
                      @if ($errors->has('webLink'))
                        <span id="webLink-error" class="error text-danger" for="input-webLink">{{ $errors->first('webLink') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required rows="6">
                    {{$serviceProvider['description']}}
                    </textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>




              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
              </div>
            </div>
          </form>
             </div>
      </div>
  </div>
@endsection
