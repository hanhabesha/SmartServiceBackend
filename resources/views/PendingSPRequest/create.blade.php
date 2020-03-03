<!--author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Service Providers Registration</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sports Camp Registration Form a Flat Responsive Widget,Login form widgets, Sign up Web 	forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{ asset('SPRegistration') }}/css/jquery-ui.css"/>
<link href="{{ asset('SPRegistration') }}/css/style.css" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-css-->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- //css files -->
</head>
<body>
	<h1>Service Providers Registration</h1>
<div class="w3l-main">
	<div class="w3l-from">
        <form action="{{ route('PendingSPRequest.store') }}"  method="post" enctype="multipart/form-data">
                @csrf
                @include('common.message');

			<div class="w3l-user">
				<label class="head">Name<span class="w3l-star"> * </span></label>
				<input type="text" name="name" placeholder="Service Providers Name" required="true">
			</div>
			<div class="w3l-mail">
				<label class="head">Email<span class="w3l-star"> * </span></label>
				<input type="email" name="email" placeholder="Email" required="true">
			</div>
			<div class="clear"></div>
			<div class="w3l-details1">
				<div class="w3l-num">
					<label class="head">Phone Number<span class="w3l-star"> * </span></label>
					<input type="text"  name="phone" placeholder="Service Providers Phone Number" required="">
				</div>
				<div class="w3l-sym">
					<label class="head">Web Link<span class="w3l-star"> * </span></label>
					<input type="text" name="webLink" placeholder="Service Providers Website" required="">
			</div>
			<div class="clear"></div>
			<div class="gender">
				<label class="head">Service Catagory<span class="w3l-star"> * </span></label>
                    <select class="form-control{{ $errors->has('serviceCatagoryId') ? ' is-invalid' : '' }}" name="serviceCatagoryId" id="">
                        <option value="null">--Select--</option>
                        @foreach ($ServiceCatagories as $serviceCatagory)
                        <option value={{$serviceCatagory->serviceCatagoryId}}>{{$serviceCatagory['name']}}</option>
                        @endforeach
                    </select>
			</div>
			<div class="w3l-options2">
			<label class="head">Logo<span class="w3l-star"> * </span></label>
				<input type="file" class="form-control" name="logoPreview" onchange="readUrl(event);" id="logoPreview" required="">
            </div>
			<div class="clear"></div>
            </div>
            <div class="card" style="max-width: 200px">
                 <img id="logoPreviewPreview" class="card-img-top" src="{{asset('Images/empty-photo.jpg')}}" alt="Card image"></div>

			<div class="w3l-num">
					<label class="head">City<span class="w3l-star"> * </span></label>
					<input type="text"  name="city" placeholder="City ex Addis Ababa" required="">
				</div>
			<div class="w3l-sym">
					<label class="head">Sub City<span class="w3l-star"> * </span></label>
					<input type="text" name="subCity" placeholder="Sub City ex Jemo" required="">
			</div>
			<div class="clear"></div>
			<div class="w3l-num">
					<label class="head">Latitude</label>
					<input type="text"  name="lat" placeholder="ex 8.9806" required="">
				</div>
			<div class="w3l-options2">
				<label class="head">Longtude</label>
				<input type="text" class="form-control" name="lng" placeholder="ex 38.7578" required="">
			</div>
			<div class="clear"></div>

			<div class="w3l-rem">
				<div class="w3l-right">
					<label class="w3l-set2">Description</label>
					<textarea name="description"></textarea>
				</div>
					<input class="btn btn-primary" type="submit" name="submit" value="Register"/>
			</div>
			<div class="clear"></div>
		</form>
	</div>
</div>
	<footer>&copy; 2018 Sports Camp Registration Form. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a>
	</footer>
	<!-- Default-JavaScript --> <script type="text/javascript" src="{{ asset('SPRegistration') }}/js/jquery-2.1.4.min.js"></script>

<!-- Calendar -->
<script src="{{ asset('SPRegistration') }}/js/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker,#datepicker1" ).datepicker();
		});
	</script>
<!-- //Calendar -->
 <script>
var readUrl=function(event){
    var reader=new FileReader()
            reader.onload=function(){
                var output=document.getElementById('logoPreviewPreview');
                output.src=reader.result;
            };
        reader.readAsDataURL(event.target.files[0]);
    };
  </script>
</body>
</html>
