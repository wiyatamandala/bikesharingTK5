<body>

								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="profil" width="180" height="180" alt="User's Avatar" src="<?php echo base_url();?>assets/upload/profil/<?php echo $profil; ?>" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right ">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<span class="white"><?php echo $nama; ?></span>
														</a>

														
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											

											
										</div>

											<div class="col-xs-12 col-sm-9">
											<div>&nbsp;&nbsp;&nbsp;
												<span class="profile-picture">
													<img id="ttd" width="100" height="100" alt="User's Signature" src="<?php echo base_url();?>assets/upload/ttd/<?php echo $ttd; ?>" />
												</span>

												
											</div>

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> NIP </div>

													<div class="profile-info-value">
														<span><?php echo ucfirst($this->session->userdata('id_pengguna')); ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Nama Lengkap </div>

													<div class="profile-info-value">
														<span><?php echo $nama; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Username </div>

													<div class="profile-info-value">
														<span><?php echo ucfirst($this->session->userdata('username')); ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> No. Kontak </div>

													<div class="profile-info-value">
														<span><?php echo $kontak; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Jabatan </div>

													<div class="profile-info-value">
														<span><?php echo $jabatan; ?></span>
													</div>
												</div>

											</div>

											<div class="space-20"></div>

											

												<div class="clearfix form-actions">
													<div class="col-md-offset-3 col-md-9">
														<a href="<?php echo base_url()?>admin/profilAdmin/edit/<?php echo $this->session->userdata('id_pengguna'); ?>" class="btn btn-app btn-success btn-xs" title="Update Informasi">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
															Edit
														</a>&nbsp; &nbsp;

														<a href="<?php echo base_url()?>admin/profilAdmin/editPassword/<?php echo $this->session->userdata('id_pengguna'); ?>" class="btn btn-app btn-inverse btn-xs" title="Ganti Passowrd">
															<i class="ace-icon fa fa-lock bigger-120"></i>
															Pass
														</a>&nbsp; &nbsp;

														<a href="<?php echo base_url()?>admin/profilAdmin/updateProfile/<?php echo $this->session->userdata('id_pengguna'); ?>" class="btn btn-app btn-primary btn-xs" title="Ganti Foto Profil">
															<i class="ace-icon glyphicon glyphicon-user bigger-120"></i>
															Picture
														</a>&nbsp; &nbsp;

														<a href="<?php echo base_url()?>admin/profilAdmin/updateTtd/<?php echo $this->session->userdata('id_pengguna'); ?>" class="btn btn-app btn-yellow btn-xs" title="Update Tanda Tangan">
															<i class="ace-icon glyphicon glyphicon-pencil bigger-120"></i>
															TTD
														</a>
													</div>
												</div>
											
										</div>
									</div>
								</div>

</body>

