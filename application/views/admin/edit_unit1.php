<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit Data Unit1</h3>


    <?php foreach ($unit1 as $un1): ?>

        <form method="post" action="<?php echo base_url().'admin/data_unit1/update' ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $un1->nama; ?>">
            </div>
            <div class="form-group">
                <label>jenis</label>
                <input type="hidden" name="id_unit" class="form-control" value="<?php echo $un1->id_unit; ?>">
                <input type="text" name="jenis" class="form-control" value="<?php echo $un1->jenis; ?>">
            </div>
            <div class="form-group">
                <label>merek</label>
                <input type="text" name="merk" class="form-control" value="<?php echo $un1->merk; ?>">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo $un1->kategori; ?>">
            </div>
            <button type="submit" class="btn btn-success btn-sm mt-3"> Simpan</button>
        </form>

        <?php endforeach; ?>
</div>