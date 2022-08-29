    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
      	<li class=""><i class="fa fa-user"></i> Profile</li>
        <li class="active"><i class="fa fa-user-plus"></i> Edit Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
	
    	<div class="row">
    		<div class="col-lg">
    			<div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Edit Profile</h3>
		              <div class="pull-right">

					  </div>
		            </div>

		            <?= $this->session->userdata('error_upload'); ?>
					
					<div class="col-md-4 col-md-offset-1">
						<br>
						<img src="<?= base_url('uploads/users/'.$edit_user['image']) ?>" width="300" alt="Image">
					</div>

					<div class="col-md-6">
			            <?= form_open_multipart(); ?>
			              <div class="box-body">

			              	<input type="hidden" name="id_user" value="<?= encrypt_url($edit_user['id_user']); ?>">

			                <div class="form-group <?= form_error('nama') ? 'has-error' : null; ?>">
			                  <label for="nama">Nama*</label>
			                  <input type="text" name="nama" class="form-control" id="nama" value="<?= $edit_user['nama']; ?>">
			                  <?= form_error('nama'); ?>
			                </div>

							<div class="form-group <?= form_error('email') ? 'has-error' : null; ?>">
			                  <label for="email">Email*</label>
			                  <input type="text" name="email" class="form-control" id="email" value="<?= $edit_user['email']; ?>">
			                  <?= form_error('email'); ?>
			                </div>

							<div class="form-group <?= form_error('jabatan') ? 'has-error' : null; ?>">
			                  <label for="jabatan">Jabatan*</label>
			                  <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $edit_user['jabatan']; ?>">
			                  <?= form_error('jabatan'); ?>
			                </div>

			                <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
			                  <label for="username">Username*</label>
			                  <input type="text" name="username" class="form-control" id="username" value="<?= $edit_user['username']; ?>">
			                  <?= form_error('username'); ?>
			                </div>

			                <div class="form-group <?= form_error('password1') ? 'has-error' : null; ?>">
			                  <label for="password1">Password</label><small> (Kosongkan jika tidak ingin diubah)</small>
			                  <input type="password" name="password1" class="form-control" id="password1">
			                  <?= form_error('password1'); ?>
			                </div>

			                <div class="form-group <?= form_error('password2') ? 'has-error' : null; ?>">
			                  <label for="password2">Confirm Password</label>
			                  <input type="password" name="password2" class="form-control" id="password2">
			                  <?= form_error('password2'); ?>
			                </div>

							<div class="form-group <?= form_error('no_hp') ? 'has-error' : null; ?>">
			                  <label for="no_hp">Nomor HP*</label>
			                  <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $edit_user['no_hp']; ?>">
			                  <?= form_error('no_hp'); ?>
			                </div>

			                <div class="form-group <?= $this->session->userdata('error_upload') ? 'has-error' : null; ?>">
			                  <label for="image">Image</label>
			                  <input type="file" name="image" class="form-control">
							  <small class="text-danger">ukuran max 2MB and reolusi max 2000 x 2000 px</small><br>
							  <small class="text-danger">*biarkan kosong jika tidak ingin mengubahnya</small>
			                </div>

			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Simpan</button>
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