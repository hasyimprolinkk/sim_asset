    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengadaan
        <small>Pengadaan</small>
      </h1>
      <ol class="breadcrumb">
      	<li class=""><i class="fa fa-asset"></i> Pengadaan</li>
        <li class="active"><i class="fa fa-asset-plus"></i> Tambah Pengadaan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="row">
    		<div class="col-lg">
    			<div class="box box-primary">
		            <div class="box-header with-border mb-2">
		              <h3 class="box-title">Tambah Pengadaan</h3>
		              <div class="pull-right">
						  <a href="<?= base_url('pengadaan'); ?>" class="btn btn-warning btn-flat">
						  	<i class="fa fa-undo"> Kembali</i>
						  </a>
					  </div>
		            </div>

		            <?= $this->session->userdata('error_upload'); ?>
					
					<div class="col-md-6 col-md-offset-3">

			            <?= form_open(); ?>
			            
			              <div class="box-body">

							<div class="form-group <?= form_error('nama_asset') ? 'has-error' : null; ?>">
			                  <label for="nama_asset">Nama Asset*</label>
			                  <input type="text" name="nama_asset" class="form-control" id="nama_asset" value="<?= set_value('nama_asset'); ?>">
			                  <?= form_error('nama_asset'); ?>
			                </div>
							
							<div class="form-group <?= form_error('jumlah') ? 'has-error' : null; ?>">
							  <label for="jumlah">Jumlah Pengadaan*</label>
							  <input type="number" name="jumlah" class="form-control" id="jumlah" value="<?= set_value('jumlah'); ?>">
							  <?= form_error('jumlah'); ?>
							</div>

							<div class="form-group <?= form_error('total_harga') ? 'has-error' : null; ?>">
							  <label for="total_harga">Total Harga Pengadaan*</label>
							  <input type="text" name="total_harga" class="form-control" id="total_harga" value="<?= set_value('total_harga'); ?>">
							  <?= form_error('total_harga'); ?>
							</div>

							<div class="form-group <?= form_error('tujuan_pengadaan') ? 'has-error' : null; ?>">
							  <label for="tujuan_pengadaan">Tujuan Pengadaan*</label>
							  <textarea name="tujuan_pengadaan" class="form-control" id="tujuan_pengadaan"><?= set_value('tujuan_pengadaan'); ?></textarea>
			                  <?= form_error('tujuan_pengadaan'); ?>
							</div>

			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" name="submit" value="formsave" class="btn btn-success"><i class="fa fa-send-o"></i> Simpan</button>
			                <button type="submit" name="submit" value="formsavenew" class="btn btn-primary"><i class="fa fa-send-o"></i> Simpan & Tambah</button>
			                <div class="pull-right">
			                	<button type="reset" class="btn"><i class="fa fa-recycle"></i> Reset</button>
			                </div>
			              </div>
			            <?= form_close(); ?>
		            </div>
			            
		        </div>
    		</div>
    	</div>

    </section>
    <!-- /.content -->

	<script>
		var rupiah = document.getElementById("total_harga");
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