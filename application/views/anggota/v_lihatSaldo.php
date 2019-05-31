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
<form id="tambahPengguna" enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo base_url();?>anggota/transaksi/simpan" onsubmit="return validasi_input(this);">

<?php if (isset($error)): ?>
     <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

    



    <div class="row">
        <div class="col-md-6 col">

            <div class="form-group">
                <label class="control-label col-md-4">Saldo ShareBike Pay</label>
                <div class="col-md-4">

                    <?php
                    foreach ($data->result() as $row){
                    ?>
                
                

                    <input class="form-control" type="number" value="<?php echo $row->saldo ; ?>" readonly required>
                    <span class="help-block"></span>

                    <?php }?>
                </div>
            </div>

         <br><br><br>
            </div>
        

        </div>







     <div class="form-group well">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="javascript:history.back()" class="btn btn-default"><i class="ace-icon fa fa-arrow-left icon-on-right bigger-110"></i> Back</a>
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