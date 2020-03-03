
@extends('layouts.app', ['activePage' => 'menu-management', 'titlePage' => __('Menu Management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Menu') }}</h4>
                <p class="card-category"> {{ __('Here you can manage Menu') }}</p>
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
                    <a href="{{ route('menu.create') }}" class="btn btn-sm btn-primary">{{ __('Add Item') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                       <th>
                        {{ __('Item Id') }}
                      </th>
                        <th>
                          {{ __('Name') }}
                      </th>
                       <th>
                        {{ __('Type') }}
                      </th>
                       <th>
                        {{ __('price') }}
                      </th>
                      <th>
                        {{ __('Description') }}
                      </th>
                     <th>
                        {{ __('availability') }}
                      </th>
                       <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($MenuItems as $item)
                        <tr>
                          <td>
                            {{ $item->itemId }}
                          </td>
                          <td>
                          <button class="btn btn-primary btn-link"  data-toggle="modal" data-target="#{{$item['itemId']}}">{{ $item->name}}</button>

                          </td>
                          <td>
                            {{ $item['itemsGroup']['name']}}
                          </td>
                            <td>
                            {{ $item->price }}
                          </td>
                          <td>
                              {!!$item->description!!}
                          </td>
                          <td>
                              @if($item->availability==1)
                            <form action="{{ route('menu.availability', $item) }}" method="post">
                              @csrf
                              @method('put')
                              <input type="hidden" name="availability" value="0"/>
                              <input type="hidden" name="itemId" value="{{$item->itemId}}">
                              <button type="submit" class="btn btn-sm btn-success">Avialbable</button>
                            </form>
                              @else
                              <form action="{{ route('menu.availability', $item) }}" method="post">
                              @csrf
                              @method('put')
                              <input type="hidden" name="availability" value="1"/>
                              <input type="hidden" name="itemId" value="{{$item->itemId}}">
                                <button type="submit" class="btn btn-sm btn-warning">UnAvialbable</button>
                            </form>
                            @endif
                            </td>
                          <td class="td-actions text-right">
                            <form action="{{ route('menu.destroy', $item) }}" method="post">
                                  @csrf
                                  <input type="hidden" name="_method" value="DELETE">
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('menu.edit', $item) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Item?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form> </td>
                              <td>
                              <div class="modal fade" id="{{$item['itemId']}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">{{$item['name']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="card mb-3">
  <img class="card-img-top" src="{{asset('Storage/Images/MenuItem/')}}/{{$item['picture']}}" alt="Card image cap">
  <div class="card-body">
  <h4 class="card-title">{{$item['name']}}</h4>
    <p class="card-text">{!!$item['description']!!}</p>
 <ul class="list-group list-group-flush">
 <li class="list-group-item">price: {{$item['price']}} Birr</li>
 </ul>
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
