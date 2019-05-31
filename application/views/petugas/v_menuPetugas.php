<div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		<img class="img" src="<?php echo base_url('assets/images/sepeda.png');?>" style="width:170px; margin-top:10px; margin-left:10px; margin-right:10px; margin-bottom:10px;">
	</div>
	<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
		<img class="img" src="<?php echo base_url('assets/images/ugm.png');?>" style="width:35px; margin-top:1px; margin-left:1px; margin-right:1px; margin-bottom:1px;">
	</div>
</div>

<ul class="nav nav-list">
				<?php if($judul=='Dashboard'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/homePetugas">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Penugasan'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/petugas">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Daftar Penugasan </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Stasiun'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/stasiun">
							<i class="menu-icon fa fa-exchange"></i>
							<span class="menu-text"> Daftar Stasiun </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<?php if($judul=='Daftar Sepeda'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/sepeda">
							<i class="menu-icon fa fa-fighter-jet"></i>
							<span class="menu-text"> Daftar Sepeda </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Acara'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/acara">
							<i class="menu-icon fa fa-calendar"></i>
							<span class="menu-text"> Daftar Acara </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Laporan'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/laporan">
							<i class="menu-icon glyphicon glyphicon-file"></i>
							<span class="menu-text"> Daftar Laporan </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Peminjaman'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/peminjaman">
							<i class="menu-icon glyphicon glyphicon-list-alt"></i>
							<span class="menu-text"> Daftar Peminjaman </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Voucher'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>petugas/voucher">
							<i class="menu-icon glyphicon glyphicon-tag"></i>
							<span class="menu-text"> Daftar Voucher </span>
						</a>

						<b class="arrow"></b>
					</li>
					

					<li class="">
						<a href="<?php echo base_url();?>petugas/homePetugas/logout">
							<i class="menu-icon fa fa-power-off"></i>

							<span class="menu-text">
								Logout
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					
				</ul><!-- /.nav-list -->

