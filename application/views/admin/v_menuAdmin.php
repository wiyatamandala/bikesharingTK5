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
						<a href="<?php echo base_url();?>admin/homeAdmin">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Acara'){ echo '<li class="active open">';}else{ echo '<li>';}?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-calendar"></i>
							<span class="menu-text"> Acara </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if($sub_judul=='Tambah Acara'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/acara/tambah">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Acara
								</a>

								<b class="arrow"></b>
							</li>

							<?php if($sub_judul=='Daftar Acara'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/acara">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Acara
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<?php if($judul=='Petugas'){ echo '<li class="active open">';}else{ echo '<li>';}?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Petugas </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if($sub_judul=='Tambah Penugasan'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/petugas/tambah">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Penugasan
								</a>

								<b class="arrow"></b>
							</li>

							<?php if($sub_judul=='Daftar Penugasan'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/petugas">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Penugasan
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<?php if($judul=='Stasiun'){ echo '<li class="active open">';}else{ echo '<li>';}?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-exchange"></i>
							<span class="menu-text"> Stasiun </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if($sub_judul=='Tambah Stasiun'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/stasiun/tambah">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Stasiun
								</a>

								<b class="arrow"></b>
							</li>

							<?php if($sub_judul=='Daftar Stasiun'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/stasiun">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Stasiun
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<?php if($judul=='Sepeda'){ echo '<li class="active open">';}else{ echo '<li>';}?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-fighter-jet"></i>
							<span class="menu-text"> Sepeda </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if($sub_judul=='Tambah Sepeda'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/sepeda/tambah">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Sepeda
								</a>

								<b class="arrow"></b>
							</li>

							<?php if($sub_judul=='Daftar Sepeda'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/sepeda">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Sepeda
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<?php if($judul=='Voucher'){ echo '<li class="active open">';}else{ echo '<li>';}?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-tag"></i>
							<span class="menu-text"> Voucher </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if($sub_judul=='Tambah Voucher'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/voucher/tambah">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Voucher
								</a>

								<b class="arrow"></b>
							</li>

							<?php if($sub_judul=='Daftar Voucher'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>admin/voucher">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Voucher
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<?php if($judul=='Daftar Peminjaman'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>admin/peminjaman">
							<i class="menu-icon glyphicon glyphicon-list-alt"></i>
							<span class="menu-text"> Daftar Peminjaman </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Laporan'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>admin/laporan">
							<i class="menu-icon glyphicon glyphicon-file"></i>
							<span class="menu-text"> Daftar Laporan </span>
						</a>

						<b class="arrow"></b>
					</li>
					

					<li class="">
						<a href="<?php echo base_url();?>admin/homeAdmin/logout">
							<i class="menu-icon fa fa-power-off"></i>

							<span class="menu-text">
								Logout
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					
				</ul><!-- /.nav-list -->

