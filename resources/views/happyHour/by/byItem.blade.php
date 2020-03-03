   <form method="post" action="{{ route('happyHourItem.store') }}" id="formByItem" autocomplete="off" class="form-horizontal" novalidate>
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Happy Hour') }}</h4>
                <p class="card-category">Happy Hour by item</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('happyHour.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Item Id') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('itemId') ? ' has-danger' : '' }} input-group">

                        <input class="form-control{{ $errors->has('itemId') ? ' is-invalid' : '' }}" id="input-itemId" type="text" placeholder="{{ __('Item Id') }}" value="{{ old('itemId') }}" required="true" aria-required="true" aria-describedby="basic-addon2" disabled/>
                        @if ($errors->has('itemId'))
                        <span id="name-error" class="error text-danger" for="input-itemId">{{ $errors->first('itemId') }}</span>
                      @endif
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_MenuItems">
<i class="material-icons">list</i>                </button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Starts') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('startByItem') ? ' has-danger' : '' }} input-group">
                      <input class="form-control{{ $errors->has('endByItem') ? ' is-invalid' : '' }}" name="start" id="startByItem" type="datetime-local" placeholder="{{ __('Starts') }}" value="{{ old('startByItem') }}" required="true" aria-required="true"/>
                      @if ($errors->has('startByItem'))
                        <span id="startByItem-error" class="error text-danger" for="input-startByItem">{{ $errors->first('startByItem') }}</span>
                      @endif
                     <div class="input-group-btn">
                       <button  type="button" class="btn btn-info hHItemToday">Now</button>
                       <button  type="button" class="btn btn-info hHItemTommorow">Tommorow</button>
                    </div>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Ends') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('startByItem') ? ' has-danger' : '' }} input-group">
                      <input class="form-control{{ $errors->has('endByItem') ? ' is-invalid' : '' }}" name="end" id="endByItem" type="datetime-local" placeholder="{{ __('Ends') }}" value="{{ old('endByItem') }}"/>
                      @if ($errors->has('endByItem'))
                        <span id="endByItem-error" class="error text-danger" for="input-endByItem">{{ $errors->first('endByItem') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Discount Percent') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('discountPercent') ? ' has-danger' : '' }} input-group" aria-describedby="basic-addon2">
                      <input class="form-control{{ $errors->has('discountPercent') ? ' is-invalid' : '' }} discountPercent" name="discountPercent" id="discountPercent" type="number"  value="{{ old('discountPercent') }}" required="true" aria-required="true"/>
                       <span class="input-group-addon" id="basic-addon2">%</span>
                      @if ($errors->has('discountPercent'))
                        <span id="discountPercent-error" class="error text-danger" for="input-discountPercent">{{ $errors->first('discountPercent') }}</span>
                      @endif
                    </div>

                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                        <textarea class="description form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" name="descriptionByItem" id="input-description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required></textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Happy Hour') }}</button>
              </div>
            </div>

<div class="modal fade" id="modal_MenuItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <div class="text-muted text-center mt-1 mb-2"><h3>{{auth()->user()['serviceProvider']['name']." ".auth()->user()['serviceProvider']['serviceCatagory']['name']}}</h3></div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table">
                                                    <thead class="alert alert-primary">
                                                        <th>Id</th>
                                                        <th>Name</th>

                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($organizedMenuItems as $ItemGroup)
                                                            <tr>
                                                                <th>
                                                                   <h4><p  class="badge badge-primary">{{$ItemGroup->name}}</p></h4>
                                                                </th>
                                                            </tr>
                                                            @foreach ($ItemGroup->menu_items as $item)
                                                                <tr>
                                                                    <td>{{$item->itemId}}</td>
                                                                    <td>{{$item->name}}</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                            <input class="form-check-input cbItemId" type="checkbox" name="itemIds[]" value="{{$item->itemId}}">
                                                                                <span class="form-check-sign">
                                                                                    <span class="check"></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach

                                                    </tbody>
                                                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 </form>
<script>

</script>
