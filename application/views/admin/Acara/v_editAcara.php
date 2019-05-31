<head>

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker3.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

</head> 


<body>
<form id="tambahAcara" enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/acara/update" onsubmit="return validasi_input(this);">
    <input name="auto_id" id="auto_id" class="form-control" type="hidden" value="<?php echo $auto_id;?>" readonly>

<?php if (isset($error)): ?>
     <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

    



    <div class="row">
        <div class="col-md-6 col">
            
            <div class="form-group">
                <label class="control-label col-md-3">Judul</label>
                <div class="col-md-4">
                    <input name="title" id="title" placeholder="Judul" class="form-control" type="text"  value="<?php echo $title;?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Deskripsi</label>
                <div class="col-md-7">
                    <input name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" type="text" value="<?php echo $deskripsi;?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Gratis</label>
                <div class="col-md-3">
                    <select name="is_free" id="is_free" class="form-control" required onclick="ltarik()" >
                        <option value="<?php echo $is_free;?>">
                            <?php 
                                if($is_free == 't')
                                    { echo 'Ya';}
                                else
                                    { echo 'Tidak';}
                            ?>
                            <!-- <?php echo $is_free;?> -->
                                
                        </option>
                        <option value="true">Ya</option>
                        <option value="false">Tidak</option>
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3">Tanggal Mulai</label>
                <div class="col-md-4">
                    <input name="tanggalMulai" id="tanggalMulai" placeholder="Tanggal Mulai" class="form-control" type="date" value="<?php echo $tanggalMulai;?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Selesai</label>
                <div class="col-md-4">
                    <input name="tanggalSelesai" id="tanggalSelesai" placeholder="Tanggal Selesai" class="form-control" type="date" value="<?php echo $tanggalSelesai;?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Stasiun</label>
                <div class="col-md-4">
                    <?php
                            echo "<select name='id_stassiun2' id='id_stasiun2' required>
                                <option value='$id_stasiun2' disabled selected>$namaStasiun</option>";
                            echo"</select>";
                    ?>
                    <span class="help-block"></span>
                </div>
            </div>

         <br><br><br>
            </div>
        

        </div>







     <div class="form-group well">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-small"><i class="glyphicon glyphicon-hdd"></i> Submit</button>&nbsp;&nbsp;&nbsp;
        <?php 
            $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
        ?>
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