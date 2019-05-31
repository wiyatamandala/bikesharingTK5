<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Bike Sharing Application</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h3><span class="white" id="id-text2">Depok Bike Sharing</span></h3>
								<h4 id="id-company-text" style="color: orange;">Application</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box 
								<?php if($status=='login'){ echo 'visible';}else{ echo '';}?> 
								widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
										<div class="center">
										<img width="150" height="150" src="<?php echo base_url('assets/images/sepeda.png') ?>">
										</div>
											<h6 class="header blue lighter bigger" align="center">
												Masukkan No. KTP dan Email Anda
											</h6>

											<div class="space-6"></div>

											<?php echo form_open(base_url('login/proses'), 'class="login-form" '); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="nomorKTP" id="nomorKTP" class="form-control" placeholder="No. KTP"  required />
															<i class="ace-icon fa fa-credit-card"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
															<?php
															$info = $this->session->flashdata('info');
															if(!empty($info))
															{
																echo $info;
															}
															?>

															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" name="submit" id="submit" class="width-35 pull-right btn btn-sm btn-success" value="Login">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								

								<div id="signup-box" class="signup-box  
								<?php if($status=='login'){ echo '';}else{ echo 'visible';}?> 
								widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Form Pendaftaran Pengguna
											</h4>

											<div class="space-6"></div>
											<p> Masukkan data diri anda: </p>

											<?php echo form_open(base_url('login/register'), 'class="login-form" '); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select name="role" id="role" class="form-control" placeholder="Role">
								                                <option value="">-- Pilih Role --</option>
								                                <option value="Petugas">Petugas</option>
								                                <option value="Anggota">Anggota</option>
								                            </select>
								                            <i class="ace-icon fa fa-cogs"></i>
								                        </span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="nomorKTP" id="nomorKTP" class="form-control" placeholder="No. KTP" required="" />
															<i class="ace-icon fa fa-credit-card"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="namaLengkap" id="namaLengkap" class="form-control" placeholder="Nama Lengkap" required="" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input placeholder="Tanggal Lahir" class="form-control" type="text" onfocus="(this.type='date')" name="tglLahir" id="tglLahir" required=""> 
															<i class="ace-icon fa fa-calendar"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="nomorTelepon" id="nomorTelepon" class="form-control" placeholder="Nomor Telepon" />
															<i class="ace-icon fa fa-book"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<textarea name="alamat" id="alamat" style="height:95px;" placeholder="Alamat.." class="form-control" ></textarea>
															<i class="ace-icon fa fa-home"></i>
														</span>
													</label>

													<!-- <?php if(isset($msg) || validation_errors() !== ''): ?>
									                <div class="alert alert-warning alert-dismissible">
									                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
									                    <?= validation_errors();?>
									                    <?= isset($msg)? $msg: ''; ?>
									                </div>
									                <?php endif; ?> -->
									                <?php
															$info = $this->session->flashdata('info');
															if(!empty($info))
															{
																echo $info;
															}
													?>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="submit" name="submit" id="submit" class="width-65 pull-right btn btn-sm btn-success" value="Login">
															<span class="bigger-110">Register</span>


															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="<?php echo base_url('login') ?>" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
