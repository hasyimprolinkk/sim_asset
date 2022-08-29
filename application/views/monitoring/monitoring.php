
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Monitoring
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Monitoring</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
		<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= count($asset); ?></h3>

              <p>Total Asset</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('asset'); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= count($pemakaian); ?></sup></h3>

              <p>Total Pemakaian</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('pemakaian'); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= count($pengadaan); ?></h3>

              <p>Total Rencana Pengadaan Asset</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('pengadaan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->


      <div class="row">
      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= count($pengelolaan); ?></h3>

              <p>Total Pengelolaan Asset</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('pengelolaan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= count($penghapusan); ?></h3>

              <p>Total Penghapusan Asset</p>
            </div>
            <div class="icon">
              <i class="ion ion-delete"></i>
            </div>
            <a href="<?= base_url('penghapusan'); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= count($users); ?></sup></h3>

              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('users'); ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- PEMAKAIAN ASSET -->
      <div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Monitoring pemakaian asset hari ini</h3>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table class="table table-bordered table-striped">
	              	<thead>
		                <tr>
		                  <th>#</th>
		                  <th>Nama Asset</th>
		                  <th>Tanggal Input</th>
		                  <th>Penginput</th>
		                  <th>Tujuan Pemakaian</th>
		                  <th>Tanggal Pemakaian</th>
		                  <th>Status</th>
						          <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
						if ($pakai != null) {
	                	foreach ($pakai as $u) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $u['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($u['created_at']); ?></td>
		                		<td><?= $u['nama_user']; ?></td>
		                		<td><?= $u['tujuan_pemakaian']; ?></td>
		                		<td><?= indo_date($u['tanggal_pemakaian']); ?></td>
		                		<td><?= $u['status']; ?></td>
                        <td>
								<a href="<?= base_url('pemakaian'); ?>" class="btn btn-primary btn-xs "><i class="fa fa-eye"></i> detail</a>
                        </td>
		                	</tr>
		                <?php endforeach; 
						} else {
						?>
							<tr>
								<td colspan="8" style="text-align: center;">Data Tidak Ada</td>
							</tr>
						<?php } ?>
	                </tbody>
	              </table>
	            </div>
	        </div>
		</div>
    <!-- END OF PEMAKAIAN ASSET -->

    <!-- PENGADAAN ASSET -->
    <div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Monitoring Pengadaan Asset hari ini</h3>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table class="table table-bordered table-striped">
	              	<thead>
		                <tr>
		                  <th>#</th>
		                  <th>Nama Asset</th>
		                  <th>Tanggal Input</th>
		                  <th>Penginput</th>
		                  <th>Jumlah Pengadaan</th>
		                  <th>Tujuan Pengadaan</th>
		                  <th>Total Harga</th>
		                  <th>Status</th>
						          <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
						if ($pengada != null) {
	                	foreach ($pengada as $p) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $p['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($p['created_at']); ?></td>
		                		<td><?= $p['nama_user']; ?></td>
		                		<td><?= $p['jumlah']; ?></td>
		                		<td><?= $p['tujuan_pengadaan']; ?></td>
		                		<td><?= $p['total_harga']; ?></td>
		                		<td><?= $p['status']; ?></td>
                        <td>
								<a href="<?= base_url('pengadaan'); ?>" class="btn btn-primary btn-xs "><i class="fa fa-eye"></i> detail</a>
                        </td>
		                	</tr>
		                <?php endforeach; 
						} else {
							?>
								<tr>
									<td colspan="9" style="text-align: center;">Data Tidak Ada</td>
								</tr>
							<?php } ?>
	                </tbody>
	              </table>
	            </div>
	        </div>
		</div>
    <!-- ENDOF PENGADAAN ASSET -->
    
    <!-- PENGELOLAAN ASSET -->
    <div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Monitoring Pengelolaan Asset hari ini</h3>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table class="table table-bordered table-striped">
	              	<thead>
		                <tr>
		                  <th>#</th>
		                  <th>Nama Asset</th>
		                  <th>Tanggal Input</th>
		                  <th>Penginput</th>
		                  <th>Tujuan Pengelolaan</th>
		                  <th>Status</th>
						          <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
						if($kelola != null) {
	                	foreach ($kelola as $p) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $p['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($p['created_at']); ?></td>
		                		<td><?= $p['nama_user']; ?></td>
		                		<td><?= $p['tujuan_pengelolaan']; ?></td>
		                		<td><?= $p['status']; ?></td>
                        <td>
								<a href="<?= base_url('pengelolaan'); ?>" class="btn btn-primary btn-xs "><i class="fa fa-eye"></i> detail</a>

                        </td>
		                	</tr>
		                <?php endforeach; 
						} else {
							?>
								<tr>
									<td colspan="8" style="text-align: center;">Data Tidak Ada</td>
								</tr>
							<?php } ?>
	                </tbody>
	              </table>
	            </div>
	        </div>
		</div>
    <!-- END OF PENGELOLAAN ASSET -->

    <!-- PENGHAPUSAN ASSET -->
    <div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Monitoring Penghapusan Asset hari ini</h3>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table class="table table-bordered table-striped">
	              	<thead>
		                <tr>
		                  <th>#</th>
		                  <th>Nama Asset</th>
		                  <th>Tanggal Input</th>
		                  <th>Penginput</th>
		                  <th>Tujuan Penghapusan</th>
		                  <th>Status</th>
						          <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
						if($hapus != null){
	                	foreach ($hapus as $p) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $p['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($p['created_at']); ?></td>
		                		<td><?= $p['nama_user']; ?></td>
		                		<td><?= $p['tujuan_penghapusan']; ?></td>
		                		<td><?= $p['status']; ?></td>
                        <td>
                          <a href="<?= base_url('penghapusan'); ?>" class="btn btn-primary btn-xs tombol-delete"><i class="fa fa-eye"></i> detail</a>
                        </td>
		                	</tr>
		                <?php endforeach; 
						} else {
							?>
								<tr>
									<td colspan="8" style="text-align: center;">Data Tidak Ada</td>
								</tr>
							<?php } ?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
	        </div>
	  <!-- /.box -->
		</div>
    <!-- END OF PENGHAPUSAN ASSET -->

    </section>
    <!-- /.content -->


  
