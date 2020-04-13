@if(session('thongbao'))
   {{ session('thongbao') }}
@endif

@if(session('thongbaoloi'))
   {{ session('thongbaoloi') }}
@endif

@if(count($errors) > 0)
   @foreach($errors->all() as $err)
       {{ $err }}
   @endforeach
@endif

<form method="post">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Sửa Tên</label>
	<input type="text" name="ten" value="<?= $loaitin->ten ?>">
	<label>Sửa Thể Loại</label>
	<select name="theloaiid">
		<option value="0">Vui Lòng chọn thể loại</option>
		<?php foreach($listTheloai as $theloai) : ?>
			<option 
             <?php
             if($loaitin->id_theloai == $theloai->id){
             	echo "selected";
             }
             ?>
			value="<?= $theloai->id ?>"><?= $theloai->ten ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="id" value="<?= $loaitin->id ?>">
	<input type="submit" name="submit" value="Submit">
</form>


