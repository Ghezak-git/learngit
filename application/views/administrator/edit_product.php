<?php echo $this->session->flashdata('upload'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800 mb-4">Edit Product</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="<?= base_url(); ?>administrator/products" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancel</a>
		</div>
		<div class="card-body">
			<?php echo $this->session->flashdata('failed'); ?>
			<form action="<?= base_url(); ?>administrator/product/<?= $product['productId'] ?>/edit" method="post" enctype="multipart/form-data">
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="title">Title</label>
							<input
								type="text"
								class="form-control"
								id="title"
								name="title"
								placeholder="Fill in the Product Title"
								autocomplete="off"
                                required
                                value="<?= $product['judul'] ?>"
							/>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="price">Price</label>
							<input
								type="text"
								class="form-control input-money"
								id="price"
								name="price"
								placeholder="Product Price"
								autocomplete="off"
                                required
                                value="<?= $product['harga'] ?>"
							/>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="stock">Stock</label>
							<input
								type="number"
								class="form-control"
								id="stock"
								name="stock"
								placeholder="Stock of Product"
								autocomplete="off"
                                required
                                value="<?= $product['stock'] ?>"/>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="cat">Category</label>
							<select class="form-control" id="cat" name="category" >
								<option value="<?= $product['id_kategori'] ?>"><?= $product['nama'] ?></option>
								<?php foreach($categories->result_array() as $c): ?>
								<option value="<?= $c['id_kategori'] ?>"><?= $c['nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="condit">Condition</label>
							<select class="form-control" id="condit" name="condit">
								<?php if($product['kondisi'] == 1){ ?>
                                    <option value="1">New</option>
								    <option value="2">Second</option>
                                <?php }else{ ?>
								    <option value="2">Second</option>
                                    <option value="1">New</option>
                                <?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="weight">Weight</label>
							<input
								type="number"
								class="form-control"
								id="weight"
								name="weight"
								placeholder="Product Weight (in grams)"
								autocomplete="off"
                                required
                                value="<?= $product['berat'] ?>"/>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="img">Main Photo</label>
							<input
								type="file"
								name="img"
								id="img"
								class="form-control"/>
						</div>
						<label>Old photo</label>
                        <img src="<?= base_url(); ?>assets/img/product/<?= $product['img']; ?>" style="width: 150px">
                        <input type="hidden" name="oldImg" value="<?= $product['img']; ?>">
                    </div>
                    <div class="col-md-6">
						<div class="form-group">
							<label for="status">Status</label>
							<select class="form-control" id="status" name="status">
								<?php if($product['terbit'] == 1){ ?>
                                    <option value="1">Publish</option>
								    <option value="2">Draft</option>
                                <?php }else{ ?>
								    <option value="2">Draft</option>
                                    <option value="1">Publish</option>
                                <?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea
						class="form-control"
						id="description"
						name="description"
						rows="7"
					><?= $product['deskripsi']; ?></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Upload Product</button>
			</form>
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