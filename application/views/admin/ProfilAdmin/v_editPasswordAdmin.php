<head>        
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/bootstrap.min.css" />      
        <link rel="<?php echo base_url();?>stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />        
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/fonts.googleapis.com.css" />
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
</head>

        
<body onLoad="ltarik()">
<form id="tambahPengguna" class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/profilAdmin/updatePassword">
  
    <div class="row">
        <div class="col-md-6 col">
                                

            <div class="form-group">
                <label class="control-label col-md-3">Username</label>
                <div class="col-md-5">
                    <input name="username" id="username" placeholder="Username" class="form-control" type="text" value="<?php echo $username; ?>" readonly required>
                    <span class="help-block"></span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3">Password Lama</label>
                <div class="col-md-5">
                    <input name="password" id="password" placeholder="Password Lama" class="form-control" type="password" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Password Baru</label>
                <div class="col-md-5">
                    <input name="passbaru" id="passbaru" placeholder="Password Baru" class="form-control" type="password" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Konfirmasi Password</label>
                <div class="col-md-5">
                    <input name="passbaru1" id="passbaru1" placeholder="Ulangi Password Baru" class="form-control" type="password" required>
                    <span class="help-block"></span>
                </div>
            </div>


         <br>
            </div>
        


        </div>


        <div class="form-group well">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-small"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
        <?php 
            $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
        ?>
        <a href="javascript:history.back()" class="btn btn-default"><i class="ace-icon fa fa-arrow-left icon-on-right bigger-110"></i> Kembali</a>
    </div>

</form>


    <script type="text/javascript">

        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                    no_file:'No File ...',
                    btn_choose:'Choose',
                    btn_change:'Change',
                    droppable:false,
                    onchange:null,
                    thumbnail:false //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
                });

        </script>

</body>