<?php echo $this->session->flashdata('upload'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800 mb-4">Kategori Data</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a
				href="#"
				class="btn btn-primary"
				data-toggle="modal"
				data-target="#addCategory"
				>Add Category</a
			>
		</div>
		<div class="card-body">
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
							<th>Icon</th>
							<th>Nama</th>
                            <th>Slug</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tfoot></tfoot>
					<tbody class="data-content">
                        <?php $no = 1 ?>
						<?php foreach($getCategories->result_array() as $data): ?>
						<tr>
                            <td><?= $no ?></td>
                            <td><img style="width: 50px" src="<?= base_url(); ?>assets/img/icon/<?= $data['icon']; ?>"></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['slug']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?= $data['id_kategori']; ?>" ><i class="fa fa-pen"></i></a>
                                <a href="<?= base_url() ;?>administrator/deleteKategori/<?= $data['id_kategori']; ?>" onclick="return confirm('Are you sure you want to delete a category? All products in this category will be deleted as well')" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $no++ ?>

                        <!-- Modal Edit Category -->
						<div
							class="modal fade"
							id="edit<?= $data['id_kategori']; ?>"
							tabindex="-1"
							role="dialog"
							aria-labelledby="exampleModalLabel"
							aria-hidden="true"
						>
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit Kategory Category</h5>
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
											action="<?= base_url(); ?>administrator/edit_kategori/<?= $data['id_kategori']; ?>"
											method="post"
											enctype="multipart/form-data"
										>
											<div class="form-group">
												<label for="name">Kategori Nama</label>
												<input
													type="text"
													class="form-control"
													id="name"
													name="name"
													autocomplete="off"
													required
													value="<?= $data['nama'] ?>"
												/>
											</div>
											<div class="form-group">
												<label for="icon">Old Icon</label>
												<input
													type="hidden"
													name="oldIcon"
													value="<?= $data['icon'] ?>"
												/>	
						                        <img src="<?= base_url(); ?>assets/img/icon/<?= $data['icon']; ?>" style="width: 150px">
											</div>
											<div class="form-group">
												<label for="icon">New Icon</label>
												<input
													type="file"
													name="icon"
													id="icon"
													class="form-control"
												/>	
											</div>
											<button type="submit" class="btn btn-primary" id="btnAddCategory">
											Edit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>

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

<!-- Modal Add Category -->
<div
	class="modal fade"
	id="addCategory"
	tabindex="-1"
	role="dialog"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
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
					action="<?= base_url(); ?>administrator/kategori"
					method="post"
					enctype="multipart/form-data"
				>
					<div class="form-group">
						<label for="name">Kategori Nama</label>
						<input
							type="text"
							class="form-control"
							id="name"
							name="name"
							autocomplete="off"
							required
						/>
					</div>
					<div class="form-group">
						<label for="icon">Kategori Icon</label>
						<input
							type="file"
							class="form-control"
							required
							name="icon"
							id="icon"
						/>
						<small id="iconHelp" class="form-text text-muted"
							>Recommended icon size 100x100 px</small
						>
					</div>
					<button type="submit" class="btn btn-primary" id="btnAddCategory">
					Add
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
