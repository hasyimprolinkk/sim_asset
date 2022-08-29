    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>User Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-user"></i> Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Users Table</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('users/adduser'); ?>" class="btn btn-primary btn-flat">
					  	<i class="fa fa-user-plus"> Tambah User</i>
					  </a>
				  </div>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table id="example1" class="table table-bordered table-striped">
	              	<thead>
		                <tr>
		                  <th>#</th>
		                  <th>Username</th>
		                  <th>Nama</th>
		                  <th>Nomor HP</th>
		                  <th>Level</th>
		                  <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
	                	foreach ($users as $u) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $u['username']; ?></td>
		                		<td><?= $u['nama']; ?></td>
		                		<td><?= $u['no_hp']; ?></td>
		                		<td>
		                			<span class="badge <?= $u['username'] == 'admin' ? 'btn-warning' : ''; ?>">
		                			<?= $u['level'] == 1 ? "Admin" : "Petugas"; ?>
		                			</span>		
		                		</td>
		                		<td style="width: 160px">
		                			<?php if ($u['username'] != "admin") : ?>
										<a href="<?= base_url('users/update/'. encrypt_url($u['id_user'])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> update</a>
										<a href="<?= base_url('users/delete/'. encrypt_url($u['id_user'])); ?>" class="btn btn-danger btn-xs tombol-delete"><i class="fa fa-trash-o"></i> delete</a>
									<?php endif; ?>
		                		</td>
		                	</tr>
		                <?php endforeach; ?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
	        </div>
	  <!-- /.box -->
		</div>

    </section>
    <!-- /.content -->