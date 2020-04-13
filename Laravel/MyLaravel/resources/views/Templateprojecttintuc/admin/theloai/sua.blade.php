@if(session('thongbaosua'))
   {{ session('thongbaosua') }}
@endif

@if(count($errors) > 0)
   @foreach($errors->all() as $err)
       {{ $err }}
   @endforeach
@endif

<!-- action="admin/theloai/sua/{{ $theloai->id }}" -->
<form method="post">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Sửa Tên</label>
	<input type="text" name="ten" value="<?= $theloai->ten ?>">
	<input type="hidden" name="id" value="<?= $theloai->id ?>">
	<input type="submit" name="submit" value="Submit">
</form>