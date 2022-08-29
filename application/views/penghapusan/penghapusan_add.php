    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penghapusan
        <small>Penghapusan</small>
      </h1>
      <ol class="breadcrumb">
      	<li class=""><i class="fa fa-asset"></i> Penghapusan</li>
        <li class="active"><i class="fa fa-asset-plus"></i> Tambah Penghapusan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="row">
    		<div class="col-lg">
    			<div class="box box-primary">
		            <div class="box-header with-border mb-2">
		              <h3 class="box-title">Tambah Penghapusan</h3>
		              <div class="pull-right">
						  <a href="<?= base_url('penghapusan'); ?>" class="btn btn-warning btn-flat">
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
										<option value="<?= $a['id_asset'] ?>" selected><?= $a['nama_asset'] . ' > ' . $a['nopol'] ?></option>
									<?php else : ?>
										<option value="<?= $a['id_asset'] ?>"><?= $a['nama_asset'] . ' > ' . $a['nopol'] ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
			                  </select>
			                  <?= form_error('id_asset'); ?>
			                </div>
							
							<div class="form-group <?= form_error('tujuan_penghapusan') ? 'has-error' : null; ?>">
								<label for="tujuan_penghapusan">Tujuan Penghapusan*</label>
								<textarea name="tujuan_penghapusan" class="form-control" id="tujuan_penghapusan"><?= set_value('tujuan_penghapusan'); ?></textarea>
								<?= form_error('tujuan_penghapusan'); ?>
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

