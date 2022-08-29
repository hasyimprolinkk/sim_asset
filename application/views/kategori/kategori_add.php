    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Data Kategori</small>
      </h1>
      <ol class="breadcrumb">
      	<li class=""><i class="fa fa-users"></i> Kategori</li>
        <li class="active"><i class="fa fa-plus"></i> Add Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="row">
    		<div class="col-lg">
    			<div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Add Kategori</h3>
		              <div class="pull-right">
						  <a href="<?= base_url('kategori'); ?>" class="btn btn-warning btn-flat">
						  	<i class="fa fa-undo"> Kembali</i>
						  </a>
					  </div>
		            </div>
					
					<div class="col-md-6 col-md-offset-3">

			            <form action="<?= base_url('kategori/addkategori'); ?>" method="post">
			              <div class="box-body">

			                <div class="form-group <?= form_error('name') ? 'has-error' : null; ?>">
			                  <label for="name">Nama*</label>
			                  <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>" autofocus>
			                  <?= form_error('name'); ?>
			                </div>


			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Simpan</button>
			                <div class="pull-right">
			                	<button type="reset" class="btn"><i class="fa fa-recycle"></i> Reset</button>
			                </div>
			              </div>

			        	</form>
		            </div>
			            
		        </div>
    		</div>
    	</div>

    </section>
    <!-- /.content -->