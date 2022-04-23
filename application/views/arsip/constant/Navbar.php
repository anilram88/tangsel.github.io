<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3><?php echo $level ?> Menu</h3>
        <ul class="nav side-menu">
            <?php if($_SESSION['level']=="Admin"){ ?>
                <li><a href="<?php echo site_url('arsip/Cadmin/tampil_user'); ?>"><i class="fa fa-users"></i>Master User</a></li>
            <li><a><i class="fa fa-edit"></i> Master Arsip <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo site_url('arsip/Carsip');?>">Data Arsip</a></li>
                    <li><a href="<?php echo site_url('arsip/Carsip/index_kategori');?>">Kategori Pilihan</a></li>
                </ul>
            </li>
            <?php } if($_SESSION['level']=="User"){ ?>
            <li><a href="<?php echo site_url('arsip/Carsip'); ?>"><i class="fa fa-edit"></i> Data Arsip <span class=""></span></a></li>
            <?php } ?>
            <li><a href="<?php echo site_url('arsip/Claporan'); ?>"><i class="fa fa-bar-chart-o"></i> Laporan <span class=""></span></a></li>
        </ul>
        </li>
    </ul>
    </div>
</div>
<!-- /sidebar menu -->