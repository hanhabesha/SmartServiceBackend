   <form method="post" action="{{ route('happyHourItemGroup.store') }}" id="formByGroup" autocomplete="off" class="form-horizontal" novalidate>
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Happy Hour') }}</h4>
                <p class="card-category">Happy Hour by group</p>
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
                    <div class="form-group{{ $errors->has('itemId') ? ' has-danger' : '' }}">
                     <select class="form-control" name="itemsGroupId" id="">
                        <option value="">--Select Item Group--</option>
                        @foreach ($ItemsGroups as $item)

                     <option value={{$item['itemsGroupId']}}>{{$item['name']}}</option>
                        @endforeach
                     </select>

                    </div>

                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Start') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('startByGroup') ? ' has-danger' : '' }} input-group">
                      <input class="form-control{{ $errors->has('startByGroup') ? ' is-invalid' : '' }}" name="start" id="startByGroup" type="datetime-local" placeholder="{{ __('startByGroups') }}" value="{{ old('startByGroup') }}" required="true" aria-required="true"/>
                      @if ($errors->has('startByGroup'))
                        <span id="startByGroup-error" class="error text-danger" for="input-startByGroup">{{ $errors->first('startByGroup') }}</span>
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
                    <div class="form-group{{ $errors->has('endByGroup') ? ' has-danger' : '' }} input-group">
                      <input class="form-control{{ $errors->has('endByGroupByGroup') ? ' is-invalid' : '' }}" name="end" id="endByGroup" type="datetime-local" placeholder="{{ __('Ends') }}" value="{{ old('endByGroup') }}"/>
                      @if ($errors->has('endByGroup'))
                        <span id="endByGroup-error" class="error text-danger" for="input-endByGroup">{{ $errors->first('endByGroup') }}</span>
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
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} description" rows="5" name="descriptionByGroup" id="input-description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required></textarea>
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
          </form>
