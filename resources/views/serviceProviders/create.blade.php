@extends('layouts.app', ['activePage' => 'serviceProvider-management', 'titlePage' => __('Service Providers Management')])
@section('content')
        <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <form method="post" action="{{ route('serviceProviders.store') }}" autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add ServiceProvider') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="row">
                    <div class="card-body col-md-9">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('serviceProviders.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Service Provider Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-name" type="text" placeholder="{{ __('serviceProviders Phone Number') }}" value="{{ old('phone') }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('serviceProviders Email') }}" value="{{ old('email') }}" required />
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
                        <option value="null">--Select--</option>
                        @foreach ($ServiceCatagories as $serviceCatagory)
                      <option value={{$serviceCatagory->serviceCatagoryId}}>{{$serviceCatagory['name']}}</option>
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
                      <input class="form-control{{ $errors->has('webLink') ? ' is-invalid' : '' }}" name="webLink" id="input-webLink" type="text" placeholder="{{ __('serviceProviders Website') }}" value="{{ old('webLink') }}" required />
                      @if ($errors->has('webLink'))
                        <span id="webLink-error" class="error text-danger" for="input-webLink">{{ $errors->first('webLink') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>
                  <div class="col-sm-9">
                      <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                          <span>Choose file</span>
                          {{-- <input type="file" id="logoPreview" name="logoPreview"> --}}
                       <input type="file"    name="logoPreview" onchange="readUrl(event);" id="logoPreview"/>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required rows="6"></textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-md-3">
                    <div>
                          <img id="logoPreviewPreview" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                    </div>
              </div>
              </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add serviceProviders') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
//     function readUrl(input){
//     console.log('yes');
// //   if(input.files && input.files[0]){
//         var reader=new FileReader();
//         reader.onload=function(e){
//             $('#logoPreviewPreview')
//             .attr('src');
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
//   }

var readUrl=function(event){
    var reader=new FileReader()
            reader.onload=function(){
                var output=document.getElementById('logoPreviewPreview');
                output.src=reader.result;
            };
        reader.readAsDataURL(event.target.files[0]);
    };
  </script>

@endsection
