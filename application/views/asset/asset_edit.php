    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		Asset
    		<small>User Admin</small>
    	</h1>
    	<ol class="breadcrumb">
    		<li class=""><i class="fa fa-user"></i> Asset</li>
    		<li class="active"><i class="fa fa-user-plus"></i> Update Asset</li>
    	</ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="row">
    		<div class="col-lg">
    			<div class="box box-primary">
    				<div class="box-header with-border">
    					<h3 class="box-title">Update Asset</h3>
    					<div class="pull-right">
    						<a href="<?= base_url('asset'); ?>" class="btn btn-warning btn-flat">
    							<i class="fa fa-undo"> Back</i>
    						</a>
    					</div>
    				</div>

    				<?= $this->session->userdata('error_upload'); ?>

    				<?php foreach ($asset as $a) : ?>

    				<div class="col-md-4 col-md-offset-1">
    					<br>
    					<img src="<?= base_url('uploads/asset/'.$a['gambar']) ?>" width="300" alt="Image">
    				</div>

    				<div class="col-md-6">

    					<?= form_open_multipart(); ?>

    					<div class="box-body">

    						<div class="form-group <?= form_error('nama_asset') ? 'has-error' : null; ?>">
    							<label for="nama_asset">Nama Asset*</label>
    							<input type="text" name="nama_asset" class="form-control" id="nama_asset"
    								value="<?= set_value('nama_asset', $a['nama_asset']); ?>">
    							<?= form_error('nama_asset'); ?>
    						</div>

    						<div class="form-group <?= form_error('id_jenis') ? 'has-error' : null; ?>">
    							<label for="id_jenis">Jenis Asset*</label>
    							<select name="id_jenis" class="form-control" id="id_jenis">
    								<option value="">-Pilih Jenis Asset-</option>
    								<?php foreach($jenis as $j) : ?>
    								<?php if(set_value('id_jenis', $a['id_jenis']) == $j['id_jenis']) : ?>
    								<option value="<?= $j['id_jenis'] ?>" selected><?= $j['nama'] ?></option>
    								<?php else : ?>
    								<option value="<?= $j['id_jenis'] ?>"><?= $j['nama'] ?></option>
    								<?php endif; ?>
    								<?php endforeach; ?>
    							</select>
    							<?= form_error('jenis'); ?>
    						</div>

    						<div class="form-group <?= form_error('id_kategori') ? 'has-error' : null; ?>">
    							<label for="id_kategori">Kategori Asset*</label>
    							<select name="id_kategori" class="form-control" id="id_kategori">
    								<option value="">-Pilih Kategori Asset-</option>
    								<?php foreach($kategori as $j) : ?>
    								<?php if(set_value('id_kategori', $a['id_kategori']) == $j['id_kategori']) : ?>
    								<option value="<?= $j['id_kategori'] ?>" selected><?= $j['nama'] ?></option>
    								<?php else : ?>
    								<option value="<?= $j['id_kategori'] ?>"><?= $j['nama'] ?></option>
    								<?php endif; ?>
    								<?php endforeach; ?>
    							</select>
    							<?= form_error('jenis'); ?>
    						</div>

    						<div class="form-group <?= form_error('harga') ? 'has-error' : null; ?>">
    							<label for="harga">Harga Asset*</label>
    							<input type="text" name="harga" class="form-control" id="harga" value="<?= set_value('harga', $a['harga']); ?>">
    							<?= form_error('harga'); ?>
    						</div>

    						<div class="form-group <?= form_error('deskripsi') ? 'has-error' : null; ?>">
    							<label for="deskripsi">Deskripsi*</label>
    							<textarea name="deskripsi" class="form-control"
    								id="deskripsi"><?= set_value('deskripsi', $a['deskripsi']); ?></textarea>
    							<?= form_error('deskripsi'); ?>
    						</div>

    						<div class="form-group <?= form_error('kondisi') ? 'has-error' : null; ?>">
    							<label for="kondisi">Kondisi*</label>
    							<input type="text" name="kondisi" class="form-control" id="kondisi"
    								value="<?= set_value('kondisi', $a['kondisi']); ?>">
    							<?= form_error('kondisi'); ?>
    						</div>

							<div class="form-group <?= form_error('nopol') ? 'has-error' : null; ?>">
    							<label for="nopol">Nopol*</label>
    							<input type="text" name="nopol" class="form-control" id="nopol"
    								value="<?= set_value('nopol', $a['nopol']); ?>">
    							<?= form_error('nopol'); ?>
    						</div>

							<div class="form-group <?= form_error('km') ? 'has-error' : null; ?>">
    							<label for="km">KM *</label>
    							<input type="number" name="km" class="form-control" id="km"
    								value="<?= set_value('km', $a['km']); ?>">
    							<?= form_error('km'); ?>
    						</div>

    						<div
    							class="form-group <?= $this->session->userdata('error_upload') ? 'has-error' : null; ?>">
    							<label for="gambar">Gambar</label>
    							<input type="file" name="gambar" class="form-control">
    							<small class="text-danger">max ukuran 2MB and max resolusi 2000 x 2000 px</small>
    						</div>

    					</div>
    					<!-- /.box-body -->

    					<div class="box-footer">
    						<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send-o"></i>
    							Update</button>
    						<div class="pull-right">
    							<button type="reset" class="btn"><i class="fa fa-recycle"></i> Reset</button>
    						</div>
    					</div>
    					<?= form_close(); ?>
    				</div>

    				<?php endforeach; ?>

    			</div>
    		</div>
    	</div>


    </section>
    <!-- /.content -->

	<script>
		var rupiah = document.getElementById("harga");
		rupiah.addEventListener("keyup", function(e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, "Rp. ");
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
		}

	</script>