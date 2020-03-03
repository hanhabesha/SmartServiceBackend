@extends('layouts.app', ['activePage' => 'menu-management', 'titlePage' => __('Menu Management')])
@section('content')
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
  <div class="content">
    <div class="container-fluid">
      <div class="row customContainerBox">
        <div class="col-md-12">
          <form method="post" action="{{ route('menu.update',$MenuItem['itemId']) }}" autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Item') }}</h4>
                <p class="card-category"></p>
              </div>
                    <div class="card-body col-md-9">
                <div class="row ">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Item Name') }}" value="{{ $MenuItem['name'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="text" placeholder="{{ __('Price  with ETB') }}"  value="{{ $MenuItem['price'] }}" required="true" aria-required="true"/>
                      @if ($errors->has('price'))
                        <span id="price-error" class="error text-danger" for="input-name">{{ $errors->first('price') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Group') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('itemsGroupId') ? ' has-danger' : '' }}">
                      <select class="form-control {{ $errors->has('itemsGroupId') ? ' is-invalid' : '' }}" name="itemsGroupId" id="input-MenuItemGroup" required>
                       <option>--select group--</option>
                        @foreach ($ItemsGroup as $itemsGroup)
                       <option <?php $itemsGroup['itemsGroupId']==$MenuItem['itemsGroupId']? print 'selected' :''?> value={{$itemsGroup['itemsGroupId']}}>{{$itemsGroup['name']}}</option>
                        @endforeach
                       </select>
                      @if ($errors->has('itemsGroupId'))
                        <span id="itemsGroupId-error" class="error text-danger" for="input-itemsGroupId">{{ $errors->first('itemsGroupId') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('picture') }}</label>
                  <div class="col-sm-9">
                      <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                          <span>Choose file</span>
                          {{-- <input type="file" id="logoPreview" name="logoPreview"> --}}
                       <input type="file" name="picturePreview" onchange="readUrl(event);" id="picture"/>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" name="description" id="input-description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required>{{$MenuItem['description']}}</textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

               <div class="col-md-3">
                    <div>
                    <img id="picturePreview" src="{{asset('Storage/Images/MenuItem/')}}/{{$MenuItem['picture']}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                    </div>
              </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update Item') }}</button>
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
                var output=document.getElementById('picturePreview');
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
