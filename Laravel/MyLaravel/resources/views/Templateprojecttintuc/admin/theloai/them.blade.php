@if(session('thongbao'))
   {{ session('thongbao') }}
@endif

@if(count($errors) > 0)
   @foreach($errors->all() as $err)
       {{ $err }}
   @endforeach
@endif

<form method="post" action="{!! route('themtheloai') !!}">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Thêm Tên</label>
	<input type="text" name="ten">
	<input type="submit" name="submit" value="Submit">
</form>