<div class="row">
    <div class="col-lg-12">
       <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('info') ?>"></div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3><b>DATA BUKU</b></h3>

            </div><br>&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-primary btntambahBuku" data-toggle="modal" data-target="#modalBuku">
              <i class="fa fa-plus-circle  "></i> Tambah Buku
          </button>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tahun</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($buku as $b): ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $b->buku_judul ?></td>
                                    <td><?php echo $b->buku_penulis ?></td>
                                    <td><?php echo $b->buku_tahun ?></td>
                                    <td>
                                        <?php if ($b->buku_status == "1") : ?>
                                            <?php echo "Tersedia" ?>
                                            <?php elseif ($b->buku_status == "2") : ?>
                                                <?php echo "Dipinjam" ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btnubahBuku" title="Ubah" data-id="<?php echo $b->buku_id ?>" data-toggle="modal" data-target="#modalBuku" >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            &nbsp;
                                            <a onclick="return confirm('Hapus Data ?')" class="btn btn-danger" title="Hapus" href="<?php echo base_url('admin/buku_hapus/'.$b->buku_id); ?>">
                                                <i class="fa fa-trash-o"></i>
                                            </a>

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

    <!-- Modal -->
<div class="modal fade" id="modalBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h1 class="modal-title text-primary" id="modalBukuLabel"><b>Tambah Anggota Baru</b></h1>
        
      </div>
      <div class="modal-body">
        <div class="panel-body">
                <form  id="form" action="<?php echo base_url('admin/buku_add_act') ?>" method="POST">
                    <div class="form-group">
                        <label for="buku_judul">Judul Buku </label>
                        <input type="hidden" name="buku_id" id="buku_id" >
                        <input type="text" class="form-control" id="buku_judul" name="buku_judul" autofocus placeholder="Judul Buku" required>
                    </div>
                    <div class="form-group">
                        <label for="buku_penulis">Penulis</label>
                        <input type="text" class="form-control" id="buku_penulis" name="buku_penulis" placeholder="Penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="buku_tahun">Tahun Terbit</label>
                        <input type="text" class="form-control" id="buku_tahun" name="buku_tahun" placeholder="Tahun Terbit" required>
                    </div>
                    <div class="form-group">
                        <label for="buku_status">Status Buku</label>
                        <select class="form-control" name="buku_status" id="buku_status">
                            <option value="1">Tersedia</option>
                            <option value="2">Dipinjam</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                </form>
            </div>
      </div>
      
    </div>
  </div>
</div>