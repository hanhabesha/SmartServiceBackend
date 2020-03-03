   <form method="post" action="{{ route('happyHourMenu.store') }}" id="formByMenu" autocomplete="off" class="form-horizontal" novalidate>
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Happy Hour') }}</h4>
                <p class="card-category">Happy Hour by Menu</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('happyHour.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Starts') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('startByMenu') ? ' has-danger' : '' }} input-group">
                      <input class="form-control{{ $errors->has('startByMenu') ? ' is-invalid' : '' }}" name="start" id="startByMenu" type="datetime-local" placeholder="{{ __('Starts') }}" value="{{ old('startByMenu') }}" required="true" aria-required="true"/>
                      @if ($errors->has('startByMenu'))
                        <span id="startByMenu-error" class="error text-danger" for="input-startByMenu">{{ $errors->first('startByMenu') }}</span>
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
                    <div class="form-group{{ $errors->has('endByMenu') ? ' has-danger' : '' }} input-group">
                      <input class="form-control{{ $errors->has('endByMenu') ? ' is-invalid' : '' }}" name="end" id="endByMenu" type="datetime-local" placeholder="{{ __('Ends') }}" value="{{ old('endByMenu') }}"/>
                      @if ($errors->has('endByMenu'))
                        <span id="endByMenu-error" class="error text-danger" for="input-endByMenu">{{ $errors->first('endByMenu') }}</span>
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
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} description" rows="5" name="descriptionByMenu" id="input-description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required></textarea>
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
