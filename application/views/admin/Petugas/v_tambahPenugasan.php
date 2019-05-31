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
<form id="tambahPengguna" enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/petugas/simpan" onsubmit="return validasi_input(this);">

<?php if (isset($error)): ?>
     <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

    



    <div class="row">
        <div class="col-md-6 col">
            
            <div class="form-group">
                <label class="control-label col-md-3">Petugas</label>
                <div class="col-md-5">
                    <?php
                            echo "<select name='id_petugas1' id='id_petugas1' required>
                                <option value='' disabled selected>-Pilih Petugas-</option>";
                                foreach ($id_petugas1->result() as $row_petugas) {  
                                    echo "<option value='".$row_petugas->ktp."'>".$row_petugas->ktp."</option>";
                                }
                            echo"</select>";
                    ?>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Mulai</label>
                <div class="col-md-5">
                    <input name="start_datetime" id="start_datetime" placeholder="Tanggal Mulai" class="form-control" type="datetime-local" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Selesai</label>
                <div class="col-md-5">
                    <input name="end_datetime" id="end_datetime" placeholder="Tanggal Selesai" class="form-control" type="datetime-local" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Stasiun</label>
                <div class="col-md-4">
                    <?php
                            echo "<select name='id_stasiun1' id='id_stasiun1' required>
                                <option value='' disabled selected>-Pilih Stasiun-</option>";
                                foreach ($id_stasiun1->result() as $row_stasiun) {  
                                    echo "<option value='".$row_stasiun->id_stasiun."'>".$row_stasiun->nama."</option>";
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