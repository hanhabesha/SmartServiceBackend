@extends('layouts.app', ['activePage' => 'happyHour-management', 'titlePage' => __('Happy Hour Management')])
@section('content')
        <script src="{{ asset('countDown') }}/jquery.flipper-responsive.js"></script>
<script src="{{ asset('countDown') }}/jquery.flipper-responsive.js"></script>
        {{-- <script>
  jQuery(function($){
    $('#myFlipper').flipper('init');
  });
</script> --}}

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
 <div class="card">

   <div class="card-header">
                <h4 class="card-title">{{ __('Happy Hour Options') }}</h4>
                <p class="card-category">Select Happy hour option</p>
              </div>
              <div class="card-body">
                  <div class="btn-group btn-group-justified">
                    <a href="#formByItem" class="btn btn-primary">By Item</a>
                    <a href="#formByGroup" class="btn btn-primary">By Group </a>
                    <a href="#formByMenu" class="btn btn-primary">By Menu</a>
                </div>
              </div>
 </div>
       @include('happyHour.by.byItem')
       @include('happyHour.by.byGroup')
    @if (auth()->user()['serviceProvider']['happyHourMenu'])

    @endif
       @include('happyHour.by.byMenu')
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'descriptionByGroup' );
        CKEDITOR.replace( 'descriptionByItem' );
    CKEDITOR.replace( 'descriptionByMenu' );

</script>
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script>
$(document).ready(function(){
        console.log('uye');

    $(".hHItemTommorow").click(function(){
        console.log("yes");
        var dateTime=new Date();
        dateTime.setDate(dateTime.getDate()	+1);
        var tommorow=dateTime.toISOString();
        $('#startByItem').val(tommorow.substring(0,tommorow.length-1));
        $('#startByGroup').val(tommorow.substring(0,tommorow.length-1));
        $('#startByMenu').val(tommorow.substring(0,tommorow.length-1));
        console.log(dateTime);

    });
     $(".hHItemToday").click(function(){
            console.log('yes');
            var dateTime=new Date().toISOString();
            $('#startByItem').val(dateTime.substring(0,dateTime.length-1));
            $('#startByGroup').val(dateTime.substring(0,dateTime.length-1));                    $('#startByMenu').val(dateTime.substring(0,dateTime.length-1));

            console.log(dateTime);
        });
        check=0;
          $(".cbItemId").click(function(){
            var selected=new Array();
                 $("input:checkbox.cbItemId:checked").map(function(){

                        selected.push(this.value);
                        console.log(check++);
                    });
                    $("#input-itemId").val(selected);

          });

});
</script>
{{-- <script>
    $(document).ready(function(){
        $('button').click(function(){
            console.log('yes');
            var dateTime=new Date().toISOString();
            $('#start').val(dateTime.substring(0,dateTime.length-1));
            console.log(dateTime);
        });
    });

    var dateTime=new Date());
    dateTime.setDate(dateTime.getDate()+1);
     $('#start').val(dateTime.substring(0,dateTime.length-1));
}
</script> --}}

@endsection


