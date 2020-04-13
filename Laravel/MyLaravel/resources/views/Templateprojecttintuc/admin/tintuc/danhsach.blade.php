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
	        <th>Tiêu Đề</th>
	        <th>Nội Dung</th>
	        <th>Hình Ảnh</th>
	        <th>Loại Tin</th>
	        <th>Sửa</th>
	        <th>Xóa</th>
	    </tr>
    </thead>
    <tbody>
    	<?php $a = 0; ?>
    	<?php foreach ($listTinTuc as $tintuc) { ?>
    		<?php $a++; ?>
		    <tr>
		        <td><?= $a ?></td>
		        <td><?= $tintuc->tieude ?></td>
		        <td><?= $tintuc->noidung ?></td>
		        <td><img width="100" height="100" src="{{ asset('/img/') }}/<?= $tintuc->hinhanh ?>"></td>
		        <td><?= $tintuc->TintucHasOneLoaitin->LoaiTinHasOneTheLoai->ten ?></td>
		        <td><a href="sua/<?= $tintuc->id ?>">Sửa</a></td>
		        <td><a href="xoa/<?= $tintuc->id ?>">Xóa</a></td>
		    </tr>
		<?php } ?>    
    </tbody>
</table>

{!! $listTinTuc->links() !!}

<!-- // thêm biến vào chỗ phân trang -->
<!-- {!! $listTinTuc->appends(['sort'=>'votes'])->links() !!} -->
