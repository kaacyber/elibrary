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
echo form_open_multipart(base_url(akses().'/elibrary/addbuku'),array('class'=>'form-horizontal'));
?>

<?php
        if(!empty($data))
        {
            foreach($data as $row)
            {
            ?>
                       
<div class="col-md-9">
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Jenis Buku</label>
    <div class="col-md-6">
      <input readonly="true" type="text" name="jenis_buku" id="" class="form-control " required="" autocomplete="" placeholder="Jenis Buku" value="<?=$row->jenis_buku;?>"/>  
    </div>
</div>
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Judul Buku</label>
    <div class="col-md-6">
        <input readonly="true" type="text" name="jbuku" id="" class="form-control " required="" autocomplete="" placeholder="Judul Buku" value="<?=$row->jbuku;?>"/>        
    </div>
</div>
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Pengarang</label>
    <div class="col-md-6">
        <input readonly="true" type="text" name="pengarang" id="" class="form-control " required="" autocomplete="" placeholder="Pengarang" value="<?=$row->pengarang;?>"/>     
    </div>
</div>
<div class="form-group required">
    <label class="col-sm-2 control-label" for="">Keterangan</label>
    <div class="col-md-6">
        <input readonly="true" type="text" name="ket" id="" class="form-control " required="" autocomplete="" placeholder="Keteragan Lainnya" value="<?=$row->ket;?>"/>     
    </div>
</div>
</div>
 <?php
        }
    }
        ?>