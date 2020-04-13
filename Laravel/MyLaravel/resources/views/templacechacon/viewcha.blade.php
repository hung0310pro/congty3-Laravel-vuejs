<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<!-- call header -->
			<!-- include('header') -->
		</div>
		<div id="content">
			@section('sidebar')
				Đây là phần của trang cha
			@show

			@yield('noidung'); <!-- nội dung riêng của từng trang viewcon -->
		</div>
		<div id="footer">

		</div>
	</div>
</body>
</html>