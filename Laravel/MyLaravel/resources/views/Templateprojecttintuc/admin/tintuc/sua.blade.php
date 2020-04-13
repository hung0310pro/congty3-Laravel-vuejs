<form method="post">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<label>Tiêu Đề</label>
	<input type="text" name="tieude" value="<?= $tinTuc->tieude ?>">
	<label>Nội Dung</label>
	<input type="text" name="noidung" value="<?= $tinTuc->noidung ?>">
</form>

<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.js"></script>
<table id="bang1" class="table table-bordered table-striped table-hover text-center">
    <thead>
	    <tr>
	        <th>STT</th>
	        <th>Nội Dung</th>
	        <th>Của tin tức</th>
	        <th>Created At</th>
	    </tr>
    </thead>
    <tbody>
    	<?php $a = 0; ?>
    	<?php foreach ($tinTuc->TintuchasManyComment as $cmt) { ?>
    		<?php $a++; ?>
		    <tr>
		        <td><?= $a ?></td>
		        <td><?= $cmt->noidung ?></td>
		        <td><?= $cmt->CommenthasOneTintuc->tieude ?></td>
		        <td><?= $cmt->created_at ?></td>
		    </tr>
		<?php } ?>    
    </tbody>
</table>

<?php

// nếu như trang chỉ cần hiện số  lượng cmt mà k cần quan tâm tới nội dung thì dùng tk 2, còn nếu mà nó cần quan tâm tới nội dung thì dùng tk 1. Tuy nhiên tk 2 mà thêm get() thì nội dung in ra sẽ như tk 1

// $tinTuc->TintuchasManyComment()->get(); giống $tinTuc->TintuchasManyComment. in ra tất cả nội dung

echo "<pre>";
print_r($tinTuc->TintuchasManyComment->count()); // (1)
echo "</pre>";



echo "<pre>";
print_r($tinTuc->TintuchasManyComment()->count()); // (2)
echo "</pre>"

?>