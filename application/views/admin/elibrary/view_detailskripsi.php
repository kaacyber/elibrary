<link rel="stylesheet" href="<?=base_url();?>konten/jqueryui/jquery-ui.min.css"/>
<link rel="stylesheet" href="<?=base_url();?>konten/jqueryui/themes/overcast/jquery-ui.min.css"/>
<script src="<?=base_url();?>konten/jqueryui/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
    $("#tukarphoto").click(function(e){
        e.preventDefault();
        $("#file").trigger('click');
    });
    
    $("#file").change(function(){
        var photo=$(this).val();
        if(photo=="")
        {
            return false;
        }else{
            $("#formphoto").trigger('submit');
        }
    });
    
    if($(".tanggal").length)
	{
		$(".tanggal").datepicker({
			dateFormat: "yy-mm-dd",
			showAnim:"slide",
			changeMonth: true,
			changeYear: true,
			yearRange:'c-70:c+10',
		});
	}
    
    $("#formphoto").submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?=base_url();?>profil/uploadphoto',
            type: 'POST',
            dataType:'JSON',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                
            },
            success: function (x) {
              if(x.status=="ok")
              {
              	reload_avatar(x.url);
			  	$("#photo").attr('src',x.url);			  	
			  	alert(x.message);
			  }else{
			  	alert(x.message);
			  }			  
            }
        });
     
          return false;
    });
});

function reload_avatar(img)
{
	$(".image_avatar").attr("src",img);
	
}
</script>
<div class="col-md-3">
	<form id="formphoto">
      <div class="thumbnail">                        
        <img alt="" id="photo" src="<?=user_avatar();?>"/>
        <span id="tukarphoto" style="margin-top: 5px" class="btn btn-link">Cover Buku</span>
        <input type="file" name="file" id="file" style="display: none;"/>
      </div>
    </form>
</div>

<?php
echo validation_errors();
echo form_open_multipart(base_url(akses().'/elibrary/addbpenelitian'),array('class'=>'form-horizontal'));
?>

<?php
        if(!empty($data))
        {
            foreach($data as $row)
            {
            ?>
                       
<div class="col-md-9">
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Nama Penulis</label>
    <div class="col-md-6">
      <input readonly="true" type="text" name="nama" id="" class="form-control " required="" autocomplete="" placeholder="Nama Penulis" value="<?=$row->nama;?>"/>  
    </div>
</div>
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Instansi</label>
    <div class="col-md-6">
        <input readonly="true" type="text" name="instansi" id="" class="form-control " required="" autocomplete="" placeholder="Instansi" value="<?=$row->instansi;?>"/>        
    </div>
</div>
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Judul Penelitian</label>
    <div class="col-md-6">
        <input readonly="true" type="text" name="jskripsi" id="" class="form-control " required="" autocomplete="" placeholder="Judul Skripsi" value="<?=$row->jskripsi;?>"/>     
    </div>
</div>
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Tahun</label>
    <div class="col-md-6">
        <input readonly="true" type="number" name="tahun" id="" class="form-control " required="" autocomplete="" placeholder="Tahun" value="<?=$row->tahun;?>"/>     
    </div>
</div>
</div>
 <?php
        }
    }
        ?>