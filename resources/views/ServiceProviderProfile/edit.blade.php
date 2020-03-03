@extends('layouts.app', ['activePage' => 'serviceProviders-profile-management', 'titlePage' => __('Service Providers Management')])
@section('content')
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>

   <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('SPprofile.update',auth()->user()['serviceProvider'])}}" autocomplete="off" class="form-horizontal">
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
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Service Provider Name') }}" value="{{ auth()->user()['serviceProvider']['name'] }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-name" type="text" placeholder="{{ __('serviceProviders Phone Number') }}" value="{{ auth()->user()['serviceProvider']['phone'] }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('serviceProviders Email') }}" value="{{ auth()->user()['serviceProvider']['email'] }}" required />
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
                      <option <?php auth()->user()['serviceProvider']['serviceCatagoryId']==$serviceCatagory['serviceCatagoryId']? print 'selected' :''?>

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
                      <input class="form-control{{ $errors->has('webLink') ? ' is-invalid' : '' }}" name="webLink" id="input-webLink" type="text" placeholder="{{ __('serviceProviders Website') }}" value="{{ auth()->user()['serviceProvider']['webLink'] }}" required />
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
                    {{auth()->user()['serviceProvider']['description']}}
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
       <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('SPprofile.updateLocation',auth()->user()['serviceProvider'])}}" autocomplete="off" class="form-horizontal">
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
                  <label class="col-sm-2 col-form-label">{{ __('City') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" id="input-city" type="text" placeholder="{{ __('City') }}" value="{{ auth()->user()['serviceProvider']['location']['city'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('city'))
                        <span id="city-error" class="error text-danger" for="input-city">{{ $errors->first('city') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Sub City') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('subCity') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('subCity') ? ' is-invalid' : '' }}" name="subCity" id="input-subCity" type="text" placeholder="{{ __('Sub City') }}" value="{{ auth()->user()['serviceProvider']['location']['subCity'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('subCity'))
                        <span id="subCity-error" class="error text-danger" for="input-subCity">{{ $errors->first('subCity') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Location Cordinates') }}</label>
                  <div class="row col-sm-9">
                    <div class="col-sm-6 form-group{{ $errors->has('lat') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('lat') ? ' is-invalid' : '' }}" name="lat" id="input-lat" type="text" placeholder="{{ __('Latitude ') }}" value="{{ auth()->user()['serviceProvider']['location']['lat'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('lat'))
                        <span id="closingHour-lat" class="error text-danger" for="input-lat">{{ $errors->first('lat') }}</span>
                      @endif
                    </div>
                     <div class="col-sm-6 form-group{{ $errors->has('lng') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="lng" id="input-lng" type="text" placeholder="{{ __('Longitude') }}" value="{{ auth()->user()['serviceProvider']['location']['lng'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('lng'))
                        <span id="lng-error" class="error text-danger" for="input-lng">{{ $errors->first('lng') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Openinig Hour') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('open') ? ' has-danger' : '' }}">

                      <input class="form-control{{ $errors->has('openningHour') ? ' is-invalid' : '' }}" name="openningHour" id="input-openningHour" type="time" placeholder="{{ __('Opening Hour') }}" value="{{ auth()->user()['serviceProvider']['openningHour'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('openningHour'))
                        <span id="openningHour-error" class="error text-danger" for="input-openningHour">{{ $errors->first('openningHour') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Closing Hour') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('closingHour') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('closingHour') ? ' is-invalid' : '' }}" name="closingHour" id="input-closingHour" type="time" placeholder="{{ __('Closing Hour') }}" value="{{ auth()->user()['serviceProvider']['openningHour'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('closingHour'))
                        <span id="closingHour-error" class="error text-danger" for="input-closingHour">{{ $errors->first('closingHour') }}</span>
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
        <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('SPprofile.updateLogo') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change Logo') }}</h4>
                <p class="card-category">{{ __('You can change logo here') }}</p>
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
                  <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>
                  <div class="col-sm-9">
                      <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                          <span>Choose file</span>
                       <input type="file"    name="logoPreview" onchange="readUrl(event);"/>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group">
                        <img src="{{asset('logo')}}/{{ auth()->user()['serviceProvider']['logo']}}" id="logoPreview" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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
//             $('#logoPreview')
//             .attr('src');
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
//   }

var readUrl=function(event){
    var reader=new FileReader()
            reader.onload=function(){
                var output=document.getElementById('logoPreview');
                output.src=reader.result;
            };
        reader.readAsDataURL(event.target.files[0]);
    };
  </script>

@endsection
