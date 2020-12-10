<?php echo $this->session->flashdata('upload'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800 mb-4"><?= $product['judul']; ?></h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a
				href="<?= base_url(); ?>administrator/products"
				class="btn btn-info"
				><i class="fa fa-chevron-left"></i> Back</a
			>
		</div>
		<div class="card-body">
            <?php echo $this->session->flashdata('failed'); ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url(); ?>assets/img/product/<?= $product['img']; ?>" class="card-img-top">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title"><?= $this->config->item('currency'); ?><?= rupiah($product['harga']) ?></h5>
                        <table>
                            <tr>
                                <td>Kategori</td>
                                <td>: <?= $product['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td>: <?= $product['stock']; ?></td>
                            </tr>
                            <tr>
                                <td>Kondisi</td>
                                <?php if($product['kondisi'] == 1){ ?>
                                    <td>: New</td>
                                <?php }else{ ?>
                                    <td>: Second</td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>: <?= $product['berat']; ?> gram</td>
                            </tr>
                            <tr>
                                <td class="pr-3">Tanggal Input</td>
                                <td>: <?= $product['tanggal_submit']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <?php if($product['terbit'] == 1){ ?>
                                    <td>: Publish</td>
                                <?php }else{ ?>
                                    <td>: Draft</td>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> 
            <div class="row mt-3">
                <div class="container description-product-detail">
                    <strong><h4>Deskripsi</h4></strong>
                    <p><?= nl2br($product['deskripsi']); ?></p>
                </div>
            </div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
