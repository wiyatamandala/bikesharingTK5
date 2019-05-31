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
<form id="tambahPengguna" enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/sepeda/update" onsubmit="return validasi_input(this);">
    <input name="auto_id" id="auto_id" class="form-control" type="hidden" value="<?php echo $auto_id;?>">

<?php if (isset($error)): ?>
     <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

    



    <div class="row">
        <div class="col-md-6 col">
            
            <div class="form-group">
                <label class="control-label col-md-3">Merk</label>
                <div class="col-md-4">
                    <input name="merk" id="merk" placeholder="Merk" class="form-control" type="text" value = "<?php echo $merk;?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Jenis</label>
                <div class="col-md-4">
                    <input name="jenis" id="jenis" placeholder="Jenis" class="form-control" type="text" value = "<?php echo $jenis;?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Status</label>
                <div class="col-md-4">
                    <select name="status" id="status" class="form-control" required onclick="ltarik()" >
                        <option value="<?php echo $status;?>">
                            <?php 
                                if($status == 't')
                                    { echo 'Ya';}
                                else
                                    { echo 'Tidak';}
                            ?>                             
                        </option>
                        <option value="true">Tersedia</option>
                        <option value="false">Tidak Tersedia</option>
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Stasiun</label>
                <div class="col-md-4">
                    <?php
                            echo "<select name='id_stasiun2' id='id_stasiun2' required>
                                <option value='$id_stasiun2'>$namaStasiun</option>";
                                foreach ($id_stasiun1->result() as $row_stasiun) {  
                                    echo "<option value='".$row_stasiun->id_stasiun."'>".$row_stasiun->nama."</option>";
                                }
                            echo"</select>";
                    ?>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Penyumbang</label>
                <div class="col-md-5">
                    <?php
                            echo "<select name='id_penyumbang2' id='id_penyumbang2' required>
                                <option value='$id_penyumbang2'>$id_penyumbang2</option>";
                                foreach ($id_penyumbang1->result() as $row_penyumbang) {  
                                    echo "<option value='".$row_penyumbang->no_kartu."'>".$row_penyumbang->no_kartu."</option>";
                                }
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