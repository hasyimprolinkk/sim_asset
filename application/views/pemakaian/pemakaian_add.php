    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemakaian
        <small>Pemakaian</small>
      </h1>
      <ol class="breadcrumb">
      	<li class=""><i class="fa fa-asset"></i> Pemakaian</li>
        <li class="active"><i class="fa fa-asset-plus"></i> Tambah Pemakaian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="row">
    		<div class="col-lg">
    			<div class="box box-primary">
		            <div class="box-header with-border mb-2">
		              <h3 class="box-title">Tambah Pemakaian</h3>
		              <div class="pull-right">
						  <a href="<?= base_url('pemakaian'); ?>" class="btn btn-warning btn-flat">
						  	<i class="fa fa-undo"> Kembali</i>
						  </a>
					  </div>
		            </div>

		            <?= $this->session->userdata('error_upload'); ?>
					
					<div class="col-md-6 col-md-offset-3">

			            <?= form_open(); ?>
			            
			              <div class="box-body">

							<div class="form-group <?= form_error('id_asset') ? 'has-error' : null; ?>">
			                  <label for="id_asset">Asset*</label>
			                  <select name="id_asset" class="form-control" id="id_asset">
			                  	<option value="">-Pilih Asset-</option>
								<?php foreach($asset as $a) : ?>
									<?php if(set_value('id_asset') == $a['id_asset']) : ?>
										<option value="<?= $a['id_asset'] ?>" selected><?= $a['nama_asset'] . ' - ' . $a['nopol'] ?></option>
									<?php else : ?>
										<option value="<?= $a['id_asset'] ?>"><?= $a['nama_asset'] . ' - ' . $a['nopol'] ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
			                  </select>
			                  <?= form_error('id_asset'); ?>
			                </div>

							<div class="form-group <?= form_error('tujuan_pemakaian') ? 'has-error' : null; ?>">
			                  <label for="tujuan_pemakaian">Tujuan Pemakaian*</label>
			                  <input type="text" name="tujuan_pemakaian" class="form-control" id="tujuan_pemakaian" value="<?= set_value('tujuan_pemakaian'); ?>">
			                  <?= form_error('tujuan_pemakaian'); ?>
			                </div>

							<div class="form-group <?= form_error('tanggal_pemakaian') ? 'has-error' : null; ?>">
			                  <label for="tanggal_pemakaian">Tanggal Pemakaian*</label>
			                  <input type="date" name="tanggal_pemakaian" class="form-control" id="tanggal_pemakaian" value="<?= set_value('tanggal_pemakaian'); ?>">
			                  <?= form_error('tanggal_pemakaian'); ?>
			                </div>

							<div class="form-group <?= form_error('deskripsi') ? 'has-error' : null; ?>">
							  <label for="deskripsi">Deskripsi*</label>
							  <textarea name="deskripsi" class="form-control" id="deskripsi"><?= set_value('deskripsi'); ?></textarea>
			                  <?= form_error('deskripsi'); ?>
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
