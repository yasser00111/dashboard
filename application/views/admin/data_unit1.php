<div class="container fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus fa-sm"></i>Tambah data </button>
 
<a href="<?= site_url('admin/import/create') ?>" class="btn btn-sm btn-primary mb-3">Import</a>
<a href="<?= site_url('admin/import/export') ?>" class="btn btn-sm btn-primary mb-3">Export</a>
<!-- <table class="table table-bordered table-striped"> -->

    <table class="table wy-table-bordered">
        <tr>
            <div>data unit 1</div>
            <th>No</th>
            <th>Nama</th>
            <th>jenis</th>
            <th>Merek</th>
            <th>kategori</th>
            <th colspan="3">AKSI</th>
        </tr>
	<?php 
		$no =1;
		foreach($unit1  as $un1):?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $un1->nama ?></td>
			<td><?php echo $un1->jenis ?></td>
			<td><?php echo $un1->merk ?></td>
			<td><?php echo $un1->kategori ?>
			<td><div class="btn btn-success btn sm"><i class="fas fa-search-plus"></i></div></td>
			<td><?php echo anchor('admin/data_unit1/edit/'. $un1->id_unit,'<div class="btn btn-success btn sm "><i class="fas fa-edit"></i</div>') ?></td>
			<td><?php echo anchor ('admin/data_unit1/hapus/'. $un1->id_unit,'<div class="btn btn-danger btn sm"><i class="fas fa-trash"></i></div>') ?></td>
			</td>
		</tr>


<?php endforeach; ?>
    </table>
</div>


	
<div class="modal fade" id="tambah" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel">form input Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
</div>
	<div class="modal-body" >
	<form action="<?php echo base_url(). 'admin/data_unit1/tambah'; ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama </label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group">
					<label>jenis</label>
					<input type="text" name="jenis" class="form-control">
				</div>
				<!-- <div class="form-group">
					<label>Kategori</label>
					<select class="form-control" name="kategori">
						<option>elektronik</option>
						<option>pakaian pria</option>
						<option>pakaian wanita</option>
						<option>pakaian anak-anak</option>
						<option>pakaian olahraga</option>
					</select> -->
					<div class="form-group">
					<label>Merek</label>
					<input type="text" name="merk" class="form-control">
				</div>
        <div class="form-group">
					<label>Kategori</label>
					<input type="text" name="kategori" class="form-control">
				</div>
        
	</div>
	<div class="modal-footer">
		<button type="button"class=" btn btn-secondary "data-dismiss="modal">Close</button>
		<button type="submit"class=" btn btn-primary" >simpan</button>
				</div>
			</div>
		</div>
		</form> 
	</div>
