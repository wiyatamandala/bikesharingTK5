<head>        
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/bootstrap.min.css" />      
        <link rel="<?php echo base_url();?>stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />        
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/fonts.googleapis.com.css" />
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
</head>

<body>
<br>
             
             <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            

<!-- <form method="post" action="<?php echo base_url() ?>profilAdmin/upload_profil" enctype="multipart/form-data"> -->
<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/profilAdmin/upload_profil">
<input name="nip" id="nip" placeholder="NIP" class="form-control" type="hidden" value="<?php echo $nip; ?>" required>
    
    <div class="row">
        <div class="col-md-6 col">
            
            <div class="form-group">
                <label class="control-label col-md-3">Foto Profil</label>
                    <div class="col-xs-6">
                        <input type="file" name="profil" id="id-input-file-2" />
                         <span class="help-block"></span>
                    </div>
            </div>  
        </div>
    </div><br>

     <div class="form-group well">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-small"><i class="ace-icon fa fa-cloud-upload icon-on-right bigger-110"></i> Update</button>&nbsp;&nbsp;&nbsp;
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