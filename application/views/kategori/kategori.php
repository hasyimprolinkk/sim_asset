    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Kategori Data</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-users"></i> Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Tabel Kategori</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('kategori/addkategori'); ?>" class="btn btn-primary btn-flat">
					  	<i class="fa fa-plus"> Add Kategori</i>
					  </a>
				  </div>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table id="example1" class="table table-bordered table-striped">
	              	<thead>
		                <tr>
		                  <th>#</th>
		                  <th>Nama Kategori</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
	                	foreach ($kategori as $c) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $c['nama']; ?></td>
		                		<td style="width: 160px">
									<a href="<?= base_url('kategori/update/'. encrypt_url($c['id_kategori'])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> update</a>
									<a href="<?= base_url('kategori/delete/'. encrypt_url($c['id_kategori'])); ?>" class="btn btn-danger btn-xs tombol-delete" ><i class="fa fa-trash-o"></i> delete</a>
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