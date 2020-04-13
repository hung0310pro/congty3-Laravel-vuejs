@if(session('thongbao'))
   {{ session('thongbao') }}
@endif

@if(session('loithongbao'))
   {{ session('loithongbao') }}
@endif

@if(count($errors) > 0)
   @foreach($errors->all() as $err)
       {{ $err }}
   @endforeach
@endif

<form method="post" action="{!! route('dangnhap') !!}">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Email</label>
	<input type="text" name="email">
	<label>Password</label>
	<input type="password" name="password">
	<input type="submit" name="submit" value="Submit">
</form>