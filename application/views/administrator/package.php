<?php echo $this->session->flashdata('upload'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800 mb-4">Product Package</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a
				href="#"
				class="btn btn-primary"
				data-toggle="modal"
				data-target="#addPackage"
				>Add Package</a
			>
		</div>
		<div class="card-body">
            <?php echo $this->session->flashdata('failed'); ?>
			<div class="table-responsive">
				<table
					class="table table-bordered"
					id="dataTable"
					width="100%"
					cellspacing="0"
				>
					<thead>
						<tr>
							<th>#</th>
							<th>Judul</th>
							<th>Slug</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot></tfoot>
					<tbody class="data-content">
                        <?php $no = 1 ?>
						<?php foreach($package->result_array() as $data): ?>
						<tr>
                            <td><?= $no ?></td>
                            <td><?= $data['judul']; ?></td>
                            <td><?= $data['slug']; ?></td>
                            <td>
								<a href="<?= base_url(); ?>administrator/package/<?= $data['id_package']; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
								<a href="<?= base_url(); ?>administrator/delete_package/<?= $data['id_package']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this package?')"><i class="fa fa-trash"></i></a>
							</td>
                        </tr>
                        <?php $no++ ?>
                        <?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Page Wrapper -->

<!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span style="color: gray">Copyright &copy; Your Website 2019</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<!-- Modal Add Package -->
<div
	class="modal fade"
	id="addPackage"
	tabindex="-1"
	role="dialog"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
				<button
					style="text-decoration-style: gray"
					type="button"
					class="close"
					data-dismiss="modal"
					aria-label="Close"
				>
					<span aria-hidden="true" style="color: gray">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form
					action="<?= base_url(); ?>administrator/package/add"
					method="post"
				>
					<div class="form-group">
						<label for="title">Nama Package</label>
						<input
							type="text"
							class="form-control"
							id="title"
							name="title"
							autocomplete="off"
							required
						/>
					</div>
					<button type="submit" class="btn btn-primary" >
					Add
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
