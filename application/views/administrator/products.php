<?php echo $this->session->flashdata('upload'); ?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Products</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="<?= base_url(); ?>administrator/product/add" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>Judul</th>
                      <th>Harga</th>
                      <th>Stock</th>
                      <th>Kategori</th>
                      <th style="width: 130px">Tanggal Input</th>
                      <th>Status</th>
                      <th style="width: 87px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                      foreach ($getProducts->result_array() as $data) {
                     ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><img style="width: 50px" src="<?= base_url(); ?>assets/img/product/<?= $data['productsImg']; ?>"><small><a href="<?= base_url(); ?>administrator/product/add-img/<?= $data['productsId']; ?>" target="_blank" class="btn-block mt-2">Other Image</a></small></td>
                      <td><?= $data['productsTitle']; ?></td>
                      <td><?= $data['productsPrice']; ?></td>
                      <td><?= $data['productsStock']; ?></td>
                      <td><?= $data['categoriesName']; ?></td>
                      <td><?= $data['productsDate']; ?></td>
                      <?php if($data['productsPublish'] == 1){ ?>
                        <td>Publish</td>
                      <?php }else{ ?>
                        <td>Draft</td>
                      <?php } ?>
                      <td>
                          <a href="<?= base_url() ;?>administrator/product/<?= $data['productsId']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                          <a href="<?= base_url() ;?>administrator/product/<?= $data['productsId']; ?>/edit" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>
                          <a href="<?= base_url() ;?>administrator/delete_product/<?= $data['productsId']; ?>" onclick="return confirm('Are you sure you want to delete the product?')" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    <?php 
                      $no++;
                      } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
