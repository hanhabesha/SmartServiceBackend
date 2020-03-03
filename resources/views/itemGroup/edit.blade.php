@extends('layouts.app', ['activePage' => 'ItemsGroup-management', 'titlePage' => __('Item Group Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('ItemsGroup.store') }}" autocomplete="off" class="form-horizontal"  enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Item Group') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('ItemsGroup.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$ItemsGroup['name'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Group Image') }}</label>
                  <div class="col-sm-9">
                      <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                          <span>Choose file</span>
                          {{-- <input type="file" id="logoPreview" name="logoPreview"> --}}
                       <input type="file"   name="picturePreview" onchange="readUrl(event);" id="picturePreview"/>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" name="description" id="input-description" placeholder="{{ __('Description') }}" innerHTML="{{$ItemsGroup['description']}}" required>

                    {{$ItemsGroup['description']}}</textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                    <div>
                          <img src="{{asset('Storage/ItemsGroup/Picture')}}/{{$ItemsGroup['picture'] }}" id="logoPreviewPreview" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                    </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update Items Group') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
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
