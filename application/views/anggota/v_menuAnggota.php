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
						<a href="<?php echo base_url();?>anggota/homeAnggota">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Stasiun'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>anggota/stasiun">
							<i class="menu-icon fa fa-exchange"></i>
							<span class="menu-text"> Daftar Stasiun </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Sepeda'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>anggota/sepeda">
							<i class="menu-icon fa fa-fighter-jet"></i>
							<span class="menu-text"> Daftar Sepeda </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Peminjaman'){ echo '<li class="active open">';}else{ echo '<li>';}?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-list-alt"></i>
							<span class="menu-text"> Peminjaman </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if($sub_judul=='Buat Peminjaman'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>anggota/peminjaman/tambah">
									<i class="menu-icon fa fa-caret-right"></i>
									Buat Peminjaman
								</a>

								<b class="arrow"></b>
							</li>

							<?php if($sub_judul=='Daftar Peminjaman'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>anggota/peminjaman">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Peminjaman
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<?php if($judul=='Transaksi'){ echo '<li class="active open">';}else{ echo '<li>';}?>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Transaksi </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if($sub_judul=='TopUp Sharebike Pay'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>anggota/transaksi/tambah">
									<i class="menu-icon fa fa-caret-right"></i>
									TopUp Sharebike Pay
								</a>

								<b class="arrow"></b>
							</li>

							<?php if($sub_judul=='Riwayat Transaksi'){ echo '<li class="active">';}else{ echo '<li>';}?>
								<a href="<?php echo base_url();?>anggota/transaksi">
									<i class="menu-icon fa fa-caret-right"></i>
									Riwayat Transaksi
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<?php if($judul=='Daftar Acara'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>anggota/acara">
							<i class="menu-icon fa fa-calendar"></i>
							<span class="menu-text"> Daftar Acara </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($judul=='Daftar Voucher'){ echo '<li class="active">';}else{ echo '<li>';}?>
						<a href="<?php echo base_url();?>anggota/voucher">
							<i class="menu-icon glyphicon glyphicon-tag"></i>
							<span class="menu-text"> Daftar Voucher </span>
						</a>

						<b class="arrow"></b>
					</li>
					

					<li class="">
						<a href="<?php echo base_url();?>anggota/homeAnggota/logout">
							<i class="menu-icon fa fa-power-off"></i>

							<span class="menu-text">
								Logout
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					
				</ul><!-- /.nav-list -->

