<link rel="stylesheet" href="<?=base_url();?>konten/jqueryui/jquery-ui.min.css"/>
<link rel="stylesheet" href="<?=base_url();?>konten/jqueryui/themes/overcast/jquery-ui.min.css"/>
<script src="<?=base_url();?>konten/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
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
});
</script>
<?php
echo validation_errors();
echo form_open(base_url(akses().'/pelamar/add'),array('class'=>'form-horizontal'));
?>
<div class="col-md-6">
<h3 class="heading-c">Biodata</h3>
<div class="form-group required">
	<label class="col-sm-3 control-label" for="">No KTP</label>
	<div class="col-md-5">
		<input type="text" name="nisn" id="" class="form-control " autocomplete="" placeholder="Nomor KTP" required="" value="<?php echo set_value('noktp'); ?>"/>
		<!--<small class="text-info">NOKTP akan menjadi password</small>-->
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-3 control-label" for="">Nama Peserta</label>
	<div class="col-md-9">
		<input type="text" name="nama" id="" class="form-control " autocomplete="" placeholder="Nama Siswa" required="" value="<?php echo set_value('nama'); ?>"/>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-3 control-label" for="">Gender</label>
	<div class="col-md-7">
		<?php
		$arr=array('pria','wanita');
		foreach($arr as $r)
		{
		?>
		<div class="radio">
			<label>
				<input type="radio" name="jk" value="<?=$r;?>"/> <?=ucfirst($r);?>
			</label>
		</div>		
		<?php
		}
		?>
	</div>
</div>

<div class="form-group required">
	<label class="col-sm-3 control-label" for="">Pendidikan Akhir</label>
	<div class="col-md-4">
		<select name="pendidikan" class="form-control" required="">
			<option>Pilih Pendidikan</option>
			<option value="sma">SMA</option>
			<option value="smk">SMK</option>
			<option value="diploma">DIPLOMA</option>
			<option value="sarjana">SARJANA</option>
		</select>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-3 control-label">Tempat Lahir</label>
	<div class="col-md-8">
		<input type="text" name="tempat" class="form-control" required="" placeholder="Tempat Lahir" value="<?=set_value('tempat');?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-3 control-label">Tanggal Lahir</label>
	<div class="col-md-8">
		<input type="text" name="tanggal" class="form-control tanggal" required="" placeholder="Tanggal Lahir" value="<?=set_value('tanggal');?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label" for="">Alamat</label>
	<div class="col-md-9">
		<textarea name="alamat" class="form-control"><?=set_value('alamat');?></textarea>
	</div>
</div>




<div class="form-group">
	<label class="col-sm-3 control-label">&nbsp;</label>
	<div class="col-md-6">
		<button type="submit" class="btn btn-primary btn-flat">Tambah</button>
		<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
	</div>
</div>

</div>
<?php
echo form_close();
?>