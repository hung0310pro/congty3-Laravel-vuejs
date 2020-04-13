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

<form method="post" action="{!! route('themuser') !!}">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Name</label>
	<input type="text" name="name">
	<label>Email</label>
	<input type="text" name="email">
	<label>level 1</label>
	<input type="radio" name="level" value="1">
	<label>level 2</label>
	<input type="radio" name="level" value="2">
	<label>Password</label>
	<input type="password" name="password">
	<label>Repassword</label>
	<input type="password" name="repassword">
	<input type="submit" name="submit" value="Submit">
</form>


<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.js"></script>
<table id="bang1" class="table table-bordered table-striped table-hover text-center">
    <thead>
	    <tr>
	        <th>STT</th>
	        <th>Tên</th>
	        <th>Email</th>
	        <th>Level</th>
	    </tr>
    </thead>
    <tbody>
    	<?php $a = 0; ?>
    	<?php foreach ($listUser1 as $user) { ?>
    		<?php $a++; ?>
		    <tr>
		        <td><?= $a ?></td>
		        <td><?= $user->name ?></td>
		        <td><?= $user->email ?></td>
		        <td>
		        	<?php if($user->level == 1) : ?>
		        	  Vip
		        	<?php else : ?>
		        	  Thường
		        	<?php endif; ?>     	
		        </td>
		        <td><a href="sua/<?= $user->id ?>">Sửa</a></td>
		        <td><a href="xoa/<?= $user->id ?>">Xóa</a></td>
		    </tr>
		<?php } ?>    
    </tbody>
</table>
