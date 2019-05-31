<script type="text/javascript">
     

    function ltarik(){
       var klevel=document.getElementById("tambahPengguna").level.value;

      if (klevel=="admin")
        {
            $("#form-jabatan").slideDown("fast");
            $("#form-ttd").slideDown("fast");
        }

      
      else 
        {
            $("#form-jabatan").slideUp("fast");
            $("#form-ttd").slideUp("fast");    
        }
    }


    function validasi_input(form){
          if (form.kontak.value != ""){
          var x = (form.kontak.value);
          var status = true;
          var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
          for (i=0; i<=x.length-1; i++)
          {
          if (x[i] in list) cek = true;
          else if (x == "-") cek = true;
          else cek = false;
         status = status && cek;
          }
          if (status == false)
          {
          alert("No kontak harus angka!");
          form.kontak.focus();
          return false;
          }
          }
          return (true);
  }




</script>

<head>        
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/bootstrap.min.css" />      
        <link rel="<?php echo base_url();?>stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />        
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/fonts.googleapis.com.css" />
        <link rel="<?php echo base_url();?>stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
</head>

        
<body onLoad="ltarik()">
<form id="tambahPengguna" enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo base_url();?>admin/profilAdmin/update" onsubmit="return validasi_input(this);">

<?php if (isset($error)): ?>
     <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

    



    <div class="row">
        <div class="col-md-6 col">
            
            <div class="form-group">
                <label class="control-label col-md-3">NIP</label>
                <div class="col-md-4">
                    <input name="nip" id="nip" placeholder="NIP" class="form-control" type="text" value="<?php echo $nip; ?>" readonly required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Nama Lengkap</label>
                <div class="col-md-7">
                    <input name="nama" id="nama" placeholder="Nama" class="form-control" type="text" value="<?php echo $nama; ?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Username</label>
                <div class="col-md-5">
                    <input name="username" id="username" placeholder="Username" class="form-control" type="text" value="<?php echo $username; ?>" readonly required>
                    <span class="help-block"></span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3">No. Kontak</label>
                <div class="col-md-4">
                    <input name="kontak" id="kontak" placeholder="kontak" class="form-control"  value="<?php echo $kontak; ?>" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group" id="form-input"/>
            
             <label class="control-label col-md-3">Level</label>
                <div class="col-md-3">
                    <select name="level" id="level" class="form-control" required onclick="ltarik()" >
                        <option value="<?php echo $level; ?>"><?php echo $level; ?></option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                    <span class="help-block"></span>
                </div>
            
          </div>

          <div class="form-group" id="form-jabatan" style="display:none;"/>
            
                <label class="control-label col-md-3">Jabatan</label>
                <div class="col-md-7">
                    <input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control"  value="<?php echo $jabatan; ?>">
                    <span class="help-block"></span>
                </div>
            </div>

         <br>
            </div>
        


        </div>







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