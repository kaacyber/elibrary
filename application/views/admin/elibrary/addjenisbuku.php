<?php
echo validation_errors();
echo form_open(base_url(akses().'/elibrary/addjenisbuku'),array('class'=>'form-horizontal'));
?>
<div class="form-group">
	<label class="col-sm-2 control-label" for="">Jenis Buku</label>
	<div class="col-md-7">
		<input type="text" name="jenis_buku" id="" class="form-control " autocomplete="off" placeholder="Jenis Buku" required="" value="<?php echo set_value('jenis_buku'); ?>"/>
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