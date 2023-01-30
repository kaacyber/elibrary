<?php
echo validation_errors();
echo form_open(base_url(akses().'/elibrary/addjenisregulasi'),array('class'=>'form-horizontal'));
?>
<div class="form-group">
	<label class="col-sm-2 control-label" for="">Jenis Regulasi</label>
	<div class="col-md-7">
		<input type="text" name="jenis_regulasi" id="" class="form-control " autocomplete="off" placeholder="Jenis Regulasi" required="" value="<?php echo set_value('jenis_regulasi'); ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">&nbsp;</label>
	<div class="col-md-4">
		<button type="submit" class="btn btn-primary btn-flat">Tambah</button>
		<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
	</div>
</div>
<?php
echo form_close();
?>