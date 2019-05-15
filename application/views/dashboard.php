
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo $this->m_library->get_data('buku')->num_rows(); ?>
                        </div>
                        <div>Total Buku</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('admin/buku') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users  fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo $this->m_library->get_data('anggota')->num_rows(); ?>
                            
                        </div>
                        <div>Total Anggota</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('admin/anggota') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-transfer   fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php $id = $this->session->userdata('id'); ?>
                            <?php echo $this->db->query("SELECT * from transaksi where transaksi_karyawan='$id' ")->num_rows(); ?>
                            
                        </div>
                        <div>Total Transaksi</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('admin/transaksi') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check   fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo $this->db->query("SELECT * from transaksi where transaksi_karyawan='$id' and transaksi_status=1 ")->num_rows(); ?>
                            
                        </div>
                        <div>Transaksi Selesai</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('admin/transaksi') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-book fa-fw"></i> Buku Terbaru
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php foreach ($buku as $b ): ?>

                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <i class="fa fa-book"></i> <?php echo $b->buku_judul ?> 
                            
                            <p class="badge badge-danger">
                                <?php if ($b->buku_status == "1"): ?>
                                    <?php echo "Tersedia" ?>
                                    <?php else: ?>
                                        <?php echo "Dipinjam" ?><?php endif ?>
                                    </p>

                                </a>

                            </div>
                        <?php endforeach ?>

                        <!-- /.list-group -->
                        <a href="<?php echo base_url('admin/buku') ?>" class="btn btn-default btn-block">Lihat Semua Buku</a>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
            <div class="col-lg-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <i class="glyphicon glyphicon-transfer   fa-fw"></i> Peminjaman Terakhir
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="list-group">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tgl. Transaksi</th>
                                            <th>Tgl. Pinjam</th>
                                            <th>Tgl. Kembali</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        <?php foreach ($transaksi as $t): ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl)) ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl_pinjam)) ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($t->transaksi_tgl_kembali)) ?></td>
                                                <td><?php echo "Rp.".number_format($t->transaksi_harga) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.list-group -->
                        <a href="<?php echo base_url('admin/transaksi') ?>" class="btn btn-default btn-block">Lihat Semua Transaksi</a>
                    </div>

                    <!-- /.panel-body -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <i class="fa fa-user fa-fw"></i> Anggota Terbaru
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="list-group"><?php foreach ($anggota as $a ): ?>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-user fa-fw"></i><?php echo $a->anggota_nama ?>

                            <p class="badge badge-danger">
                                <?php if ($a->anggota_jk == "1"): ?>
                                    <?php echo "L" ?>
                                    <?php else: ?>
                                        <?php echo "P" ?><?php endif ?>
                                    </p>


                                </a>
                            <?php endforeach ?>
                        </div>
                        <!-- /.list-group -->
                        <a href="<?php echo base_url('admin/anggota') ?>" class="btn btn-default btn-block">Lihat Semua Anggota</a>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>

            
        </div>
        <hr>
        <div class="row">
            

        </div>