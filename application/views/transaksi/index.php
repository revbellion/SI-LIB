<div class="row">
    <div class="col-lg-12">
        <?php if ($this->session->flashdata('info')): ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('info'); ?>
            </div>
        <?php endif ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3><b>Transaksi</b></h3>

            </div><br>&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-center btn btn-primary " href="<?php echo base_url('admin/transaksi_add') ?>"><i class=" fa fa-plus-circle  " ></i> Transaksi Baru</a>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Anggota</th>
                                <th>Buku</th>
                                <th>Tgl. Pinjam</th>            
                                <th>Tgl. Kembali</th>
                                <th>Tarif</th>
                                <th>Denda / Hari</th>
                                <th>Tgl. Dikembalikan</th>
                                <th>Total Denda</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            <?php foreach ($transaksi as $t): ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl)); ?></td>
                                    <td><?php echo $t->anggota_nama ?></td>
                                    <td><?php echo $t->buku_judul ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl_pinjam)); ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl_kembali)); ?></td>
                                    <td><?php echo "Rp.".number_format($t->transaksi_harga,'2').",-"; ?></td>
                                    <td><?php echo "Rp.".number_format($t->transaksi_denda,'2').",-"; ?></td>
                                    <td>
                                        <?php if ($t->transaksi_dikembalikan == "0000-00-00"): ?>
                                            <?php echo "-"; ?>
                                            <?php else: ?>
                                                <?php echo date('d/m/Y',strtotime($t->transaksi_tgl_pinjam)); ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo "Rp.".number_format($t->transaksi_totaldenda).",-" ; ?>
                                        </td>
                                        <td>
                                            <?php if ($t->transaksi_status == 1): ?>
                                                <?php echo "Selesai"; ?>
                                                <?php else: ?>
                                                    <?php echo "-"; ?>
                                                <?php endif ?>

                                            </td>
                                            <td>
                                                <?php if ($t->transaksi_status == 1): ?>
                                                    <?php echo "-" ?>
                                                    <?php else: ?>
                                                        <a title="Transaksi Selesai" class="btn btn-sm btn-success" href="<?php echo base_url('admin/transaksi_selesai/').$t->transaksi_id ?>"><i class="fa fa-check"></i> Transaksi Selesai</a>
                                                        <a onclick="return confirm('Hapus Transaksi ??')" title="Batalkan Transaksi" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi_hapus/').$t->transaksi_id ?>"><i class="fa fa-times"></i> Batalkan Transaksi</a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>