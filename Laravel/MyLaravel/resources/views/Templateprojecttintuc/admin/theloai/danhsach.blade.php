@if(session('thongbaoxoa'))
   {{ session('thongbaoxoa') }}
@endif

@if(session('loithongbaoxoa'))
   {{ session('loithongbaoxoa') }}
@endif


<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.js"></script>
<table id="bang1" class="table table-bordered table-striped table-hover text-center">
    <thead>
	    <tr>
	        <th>STT</th>
	        <th>Tên</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	        <th>Sửa</th>
	        <th>Xóa</th>
	    </tr>
    </thead>
    <tbody>
    	<?php $a = 0; ?>
    	<?php foreach ($listTheloai as $theloai) { ?>
    		<?php $a++; ?>
		    <tr>
		        <td><?= $a ?></td>
		        <td><?= $theloai->ten ?></td>
		        <td><?= $theloai->created_at ?></td>
		        <td><?= $theloai->updated_at ?></td>
		        <td><a href="sua/<?= $theloai->id ?>">Sửa</a></td>
		        <td><a href="xoa/<?= $theloai->id ?>">Xóa</a></td>
		    </tr>
		<?php } ?>    
    </tbody>
</table>
