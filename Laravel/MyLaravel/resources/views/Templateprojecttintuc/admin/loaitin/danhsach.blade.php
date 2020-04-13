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
	        <th>Thể Loại Id</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	        <th>Sửa</th>
	        <th>Xóa</th>
	    </tr>
    </thead>
    <tbody>
    	<?php $a = 0; ?>
    	<?php foreach ($listDanhSach as $loaitin) { ?>
    		<?php $a++; ?>
		    <tr>
		        <td><?= $a ?></td>
		        <td><?= $loaitin->ten ?></td>
		        <td><?= $loaitin->id_theloai ?></td>
		        <td><?= $loaitin->created_at ?></td>
		        <td><?= $loaitin->updated_at ?></td>
		        <td><a href="sua/<?= $loaitin->id ?>">Sửa</a></td>
		        <td><a href="xoa/<?= $loaitin->id ?>">Xóa</a></td>
		    </tr>
		<?php } ?>    
    </tbody>
</table>

<?php foreach ($listDanhSach as $loaitin) { ?>
	<?php
	// cái này hay
	$loaitins = $loaitin->LoaiTinhasManyTintuc->where('id_loaitin',3)->sortByDesc('created_at');
	$tin1 = $loaitins->shift();

	// lấy list loại tin của thể loại mà có id = 3 và order theo ngày tạo tin tức.
	// $tin1 = $loaitins->shift(); đoạn này là lấy list tin tức đầu tiên của mảng $loaitins và dữ liệu trả về là dạng mảng, khi đó trong mảng $loaitins sẽ chỉ còn (n - 1) phần tử trong mảng
	?>
<?php foreach($loaitins as $tt) : ?>
	<?php
	echo "<pre>";
	print_r($tt->tieude);
	echo "</pre>";
	?>

<?php endforeach; ?>	

<?php } ?>    
