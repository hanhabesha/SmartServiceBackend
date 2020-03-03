  <table class="table">
                    <thead class=" text-primary">
                       <th>
                        {{ __('Happy Hour Id') }}
                      </th>
                        <th>
                          {{ __('Item Name') }}
                      </th>
                      <th>
                          {{ __('Discount Percent') }}
                      </th>
                      <th>
                         {{ __('Range') }}
                      </th>
                       <th>
                        {{ __('Description') }}
                      </th>
                       <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>

                      @foreach($HappyHourItem as $item)
                        @if($item->isValid)

                        <tr>
                          <td>
                            {{ $item->itemId}}
                          </td>
                          <td>
                           {{ $item['menuItems']['name']}}
                          </td>
                          <td>
                           {{ $item->discountPercent}} %
                          </td>
                          <td>
                            <div id="myFlipper" class="flipper"
                                data-reverse="true"
                                data-datetime="2020-01-01 00:00:00"
                                data-template="ddd|HH|ii|ss"
                                data-labels="Days|Hours|Minutes|Seconds">
                            </div>
                            <?php
                             $diff= Carbon\Carbon::parse($item->end)->diffInSeconds($item->start)
                             ?>
                          </td>
                          <td>
                            {!!$item->description!!}
                          </td>
                          <td>
                              {{-- {{$item}} --}}
                              <form action="{{ route('happyHourItem.destroy', $item) }}" method="post">
                                  @csrf
                                  <input type="hidden" name="_method" value="DELETE">
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('happyHourItem.edit', $item) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Item?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>

                          </td>
                        </tr>
                             @endif
                             @endforeach
                    </tbody>
                  </table>
