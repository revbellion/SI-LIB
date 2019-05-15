
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" >
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a  href="<?php echo base_url(); ?>admin/dashboard"><i class=" fa fa-dashboard fa-fw "></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li >
                        <a class="" href="<?php echo base_url(); ?>admin/buku"><i class="fa fa-book"></i> Data Buku</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/anggota"><i class="fa fa-users"></i> Data Anggota</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a  href="<?php echo base_url(); ?>admin/transaksi"><i class=" glyphicon glyphicon-transfer   fa-fw "></i> Transaksi Peminjaman</a>
            </li>
            <li>
                <a  href="<?php echo base_url(); ?>admin/laporan"><i class=" fa fa-list-alt  fa-fw "></i> Laporan</a>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-gears fa-fw"></i> Pengaturan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <!-- <li>
                        <a href=""><i class="fa fa-user"></i> Users Profile</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url('login/ubah_password'); ?>"><i class="fa fa-lock"></i> Ganti Password </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('login/logout'); ?>"><i class="fa  fa-sign-out "></i> Logout</a>
                    </li>
                    
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <nav aria-label="breadcrumb">
                  

                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><?php echo $tab1; ?></li>
                      <li class="breadcrumb-item"><u style="color:#23527c;"><?php echo $tab2; ?></u></li>
                  </ol></nav>