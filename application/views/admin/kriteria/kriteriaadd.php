<?php
echo validation_errors();
echo form_open(base_url(akses().'/kriteria/add'),array('class'=>'form-horizontal'));
?>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Kriteria</label>
	<div class="col-md-6">
		<input type="text" name="kriteria" id="" class="form-control " autocomplete="" placeholder="Nama Kriteria" required="" value="<?php echo set_value('kriteria'); ?>"/>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Jml-Point</label>
	<div class="col-md-2">
		<input type="number" name="jml_point" id="" class="form-control " required="" autocomplete="" placeholder="Jumlah Point" value="<?php echo set_value('jml_point'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Min-Value</label>
	<div class="col-md-2">
		<input type="number" name="min_value" id="" class="form-control " required="" autocomplete="" placeholder="Min Value" value="<?php echo set_value('min_value'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Max-Value</label>
	<div class="col-md-2">
		<input type="number" name="max_value" id="" class="form-control " required="" autocomplete="" placeholder="Max Value" value="<?php echo set_value('max_value'); ?>"/>		
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">&nbsp;</label>
	<div class="col-md-6">
		<button type="submit" class="btn btn-primary btn-flat">Tambah</button>
	</div>
</div>
<?php
echo form_close();
?>