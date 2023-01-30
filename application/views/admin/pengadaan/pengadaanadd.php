<?php
echo validation_errors();
echo form_open(base_url(akses().'/pengadaan/add'),array('class'=>'form-horizontal'));
?>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Jenis Pengadaan</label>
	<div class="col-md-6">
		<select name="beasiswa" class="form-control" required="">
			<option value="">--Pilih Jenis Pengadaan--</option>
			<?php
			if(!empty($jenis))
			{
				foreach($jenis as $rb)
				{
					echo '<option value="'.$rb->kd_tender.'">'.$rb->nama.'</option>';
				}
			}
			?>
		</select>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Nama Peserta</label>
	<div class="col-md-6">
		<input type="text" name="nama" id="" class="form-control " required="" autocomplete="" placeholder="Nama Peserta / Rekanan" value="<?php echo set_value('nama'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Alamat</label>
	<div class="col-md-6">
		<input type="text" name="alamat" id="" class="form-control " required="" autocomplete="" placeholder="Alamat Rekanan" value="<?php echo set_value('alamat'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Telepon</label>
	<div class="col-md-3">
		<input type="text" name="telp" id="" class="form-control " required="" autocomplete="" placeholder="Telepon" value="<?php echo set_value('telp'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Nilai Kontrak</label>
	<div class="col-md-2">
		<input type="text" name="n_kontrak" id="" class="form-control " required="" autocomplete="" placeholder="Nilai Kontrak" value="<?php echo set_value('n_kontrak'); ?>"/>		
	</div>
	<label class="col-sm-2 control-label" for="">Score :</label>
	<div class="col-md-2">
		<input type="text" name="score_n_kontrak" id="" class="form-control " required="" autocomplete="" placeholder="Score" value="<?php echo set_value('score_n_kontrak'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Pemenang Berulang</label>
	<div class="col-md-2">
		<input type="text" name="pem_ulang" id="" class="form-control " required="" autocomplete="" placeholder="Pemenang Berulang" value="<?php echo set_value('pem_ulang'); ?>"/>		
	</div>
	<label class="col-sm-2 control-label" for="">Score :</label>
	<div class="col-md-2">
		<input type="text" name="score_pem_ulang" id="" class="form-control " required="" autocomplete="" placeholder="Score" value="<?php echo set_value('score_pem_ulang'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Keberhasilan PP</label>
	<div class="col-md-2">
		<input type="text" name="keberhasilan_pp" id="" class="form-control " required="" autocomplete="" placeholder="Keb.Penananganan Proyek" value="<?php echo set_value('keberhasilan_pp'); ?>"/>		
	</div>
	<label class="col-sm-2 control-label" for="">Score :</label>
	<div class="col-md-2">
		<input type="text" name="score_keberhasilan_pp" id="" class="form-control " required="" autocomplete="" placeholder="Score" value="<?php echo set_value('score_keberhasilan_pp'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Pengalaman Bekerja</label>
	<div class="col-md-2">
		<input type="text" name="pengalaman_krj" id="" class="form-control " required="" autocomplete="" placeholder="Pengalaman Kerja" value="<?php echo set_value('pengalaman_krj'); ?>"/>		
	</div>
	<label class="col-sm-2 control-label" for="">Score :</label>
	<div class="col-md-2">
		<input type="text" name="score_pengalaman_krj" id="" class="form-control " required="" autocomplete="" placeholder="Score" value="<?php echo set_value('score_pengalaman_krj'); ?>"/>		
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