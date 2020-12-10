<?php echo $this->session->flashdata('upload'); ?>
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h4 mb-2 text-gray-800 mb-4"><?= $package['judul']; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <p class="lead mb-0 pb-0">Products</p>
                </div>
                <div class="card-body">
                    <div class="row">
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
                                        <th>Gambar</th>
                                        <th>Product name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot></tfoot>
                                <tbody class="data-content">
                                    <?php $no = 1 ?>
                                    <?php foreach($packdata->result_array() as $data): ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><img src="<?= base_url(); ?>assets/img/product/<?= $data['img']; ?>" width="50"></td>
                                        <td><a href="<?= base_url(); ?>p/<?= $data['slug']; ?>" target="_blank" class="text-dark"><?= $data['judul']; ?></a></td>
                                        <td><a href="<?= base_url(); ?>administrator/delete_package_data/<?= $data['id_pp']; ?>/<?= $data['id_package'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $no++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <p class="lead mb-0 pb-0">Add Product</p>
                </div>
                <div class="card-body">
                    <form action="<?= base_url(); ?>administrator/package/<?= $package['id_package']; ?>" method="post">
                        <div class="form-group">
                            <select style="width: 100%;" name="product" id="selectProductForAddPackage" class="form-control" required>
                                <option></option>
                                <?php foreach($allproduct->result_array() as $d): ?>
                                    <?php $isada1 = $this->db->get_where('package_produk', ['id_produk' => $d['id_produk'], 'id_package' => $package['id_package']])->row_array(); ?>
                                    <?php if(!$isada1){ ?>
                                        <option value="<?= $d['id_produk'] ?>"><p style="color: black"><?= $d['judul']; ?></p></option>
                                    <?php }else{ ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="btn btn-sm btn-info" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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