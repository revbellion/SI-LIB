<div class="row">
    <div class="col-lg-12">
       <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('info') ?>"></div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3><b>DATA ANGGOTA</b></h3>

            </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="button" class="btn btn-primary btntambahAnggota" data-toggle="modal" data-target="#modalAnggota">
              <i class="fa fa-plus-circle  "></i> Tambah Anggota
          </button>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>No HP.</th>
                                <th>No KTP.</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($anggota as $a): ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $a->anggota_nama ?></td>
                                    <td><?php echo $a->anggota_alamat ?></td>
                                    <td>
                                        <?php if ($a->anggota_jk == "1"): ?>
                                            <?php echo "Laki-Laki" ?>
                                            <?php else: ?>
                                            <?php echo "Perempuan" ?>
                                        <?php endif ?>
                                    </td>
                                    <td><?php echo $a->anggota_hp ?></td>
                                    <td><?php echo $a->anggota_ktp ?></td>
                                    <td>
                                        <a class="btn btn-warning tampilmodalUbah" title="Ubah" data-id="<?php echo $a->anggota_id ?>" data-toggle="modal" data-target="#modalAnggota" >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger tombol-hapus" title="Hapus" href="<?php echo base_url('admin/anggota_hapus/'.$a->anggota_id); ?>">
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h1 class="modal-title text-primary" id="modalAnggotaLabel"><b>Tambah Anggota Baru</b></h1>
        
      </div>
      <div class="modal-body">
        <div class="panel-body">
                <form id="form" action="<?php echo base_url('admin/anggota_add_act') ?>" method="POST">
                    <div class="form-group">
                        <label for="anggota_nama">Nama Lengkap </label>
                        <input type="hidden" name="anggota_id" id="anggota_id" >
                        <input type="text" class="form-control" id="anggota_nama" name="anggota_nama" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="anggota_alamat">Alamat</label>
                        <textarea class="form-control" id="anggota_alamat" name="anggota_alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="anggota_jk">Jenis Kelamin</label>
                        <select class="form-control" name="anggota_jk" id="anggota_jk">
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anggota_hp">No. HP</label>
                        <input type="text" value="+628" maxlength="14" class="form-control" id="anggota_hp" name="anggota_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="anggota_ktp">No. KTP</label>
                        <input type="text" maxlength="16" class="form-control" id="anggota_ktp" name="anggota_ktp" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block tombol"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                </form>
            </div>
      </div>
      
    </div>
  </div>
</div>