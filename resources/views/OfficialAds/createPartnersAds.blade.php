@extends('layouts.app', ['activePage' => 'menu-management', 'titlePage' => __('Menu Management')])
@section('content')
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>

  <div class="content">
    <div class="container-fluid">
      <div class="row customContainerBox">
        <div class="col-md-12">
          <form method="post" action="{{ route('OfficialAds.store') }}" autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Partner name : {{$OfficialPartner['name']}}</h4>
                <p class="card-category"> {{ __('Here you can Add Ads') }}</p>
              </div>
                    <div class="card-body col-md-9">
                <div class="row ">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('OfficialAds.PartnersAd',$OfficialPartner['partnerId']) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Ads Title') }}" value="{{ old('title') }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
            <input name="partnerId" type="hidden" value="{{$OfficialPartner['partnerId']}}" required="true" aria-required="true"/>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Link') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="input-link" type="text" placeholder="{{ __('Rediret Link') }}" value="{{ old('link') }}" required="true" aria-required="true"/>
                      @if ($errors->has('link'))
                        <span id="link-error" class="error text-danger" for="input-link">{{ $errors->first('link') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('poster') }}</label>
                  <div class="col-sm-9">
                      <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                          <span>Choose file</span>
                          {{-- <input type="file" id="logoPreview" name="logoPreview"> --}}
                       <input type="file" name="posterPreview" onchange="readUrl(event);" id="poster"/>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" name="description" id="input-description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required></textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

               <div class="col-md-3">
                    <div>
                          <img id="posterPreview" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                    </div>
              </div>
              </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Item') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>

var readUrl=function(event){
    var reader=new FileReader()
            reader.onload=function(){
                var output=document.getElementById('posterPreview');
                output.src=reader.result;
            };
        reader.readAsDataURL(event.target.files[0]);
    };
  </script>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection
