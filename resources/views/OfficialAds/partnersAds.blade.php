@extends('layouts.app', ['activePage' => 'OfficialAds-management', 'titlePage' => __('Official Ads Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Partners Name : ' ) }}{{$Partner['name']}}</h4>
                <p class="card-category"> {{ __('Here you can Manage Ads') }}</p>
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
                    <a href="{{ route('OfficialAds.PartnersAd.create',$Partner['partnerId']) }}" class="btn btn-sm btn-primary">{{ __('Create Ads') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                       <th>
                        {{ __('Ad Id') }}
                      </th>
                        <th>
                          {{ __('Title') }}
                      </th>
                      <th>
                          {{ __('Link') }}
                      </th>
                        <th>
                          {{ __('status') }}
                      </th>
                      <th>
                          {{ __('Poster') }}
                      </th>
                        <th>
                          {{ __('Description') }}
                      </th>
                       <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($PartnersAd as $officialAd)
                        <tr>
                          <td>
                            {{ $officialAd->adsId}}
                          </td>
                          <td>
                           {{ $officialAd->title}}
                          </td>
                            <td>
                           {{ $officialAd->link}}
                          </td>
                            <td>
                           @if($officialAd->status==1)
                            <form action="{{ route('OfficialAds.status') }}" method="post">
                              @csrf
                              @method('put')
                              <input type="hidden" name="status" value="0"/>
                              <input type="hidden" name="adsId" value="{{$officialAd->adsId}}">
                              <button type="submit" class="btn btn-sm btn-success">Avialbable</button>
                            </form>
                              @else
                              <form action="{{ route('OfficialAds.status') }}" method="post">
                              @csrf
                              @method('put')
                              <input type="hidden" name="status" value="1"/>
                              <input type="hidden" name="adsId" value="{{$officialAd->adsId}}">
                                <button type="submit" class="btn btn-sm btn-warning">UnAvialbable</button>
                            </form>
                            @endif

                          </td>
                             <td>
                             <a href="{{ route('serviceCatagories.create') }}" class="btn btn-sm btn-primary btn-outline"  data-toggle="modal" data-target="#{{$officialAd->adsId}}poster">{{$officialAd->poster}}</a>
                          </td>
                          <td>
                              {!!$officialAd->description!!}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('OfficialAds.destroy', $officialAd->partnerId) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('OfficialAds.edit', $officialAd) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Partner?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>

                          </td>
                          <td>
                            <div class="col-md-12">
                                <div class="modal fade" id="{{$officialAd->adsId}}poster" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card shadow border-0">
                                                    <div class="card-header bg-transparent">
                                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="card-body px-lg-2 py-lg-2">
                                                       <img style="width:100%;height:100%" src="{{asset('storage')}}/Images/Official_Ads/posters/{{$officialAd->poster}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
