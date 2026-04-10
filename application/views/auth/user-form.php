<style>
	.select2-container--default .select2-selection--single .select2-selection__rendered {
   		color: #444;
		line-height: 22px;
	}
	.select2-container .select2-selection--single {
		box-sizing: border-box;
		cursor: pointer;
		display: block;
		height: 37px;
		user-select: none;
		-webkit-user-select: none;
	}

</style>
<div class="card">
        <div class="row mb-12">
                <div class="content fs-6 d-flex flex-column-fluid" id="kt_content" data-select2-id="select2-data-kt_content">
							<!--begin::Container-->
							<div class="container" data-select2-id="select2-data-13-guag">
								<!--begin::Profile Account-->
								<div class="card" data-select2-id="select2-data-12-xgkw">
										<form class="form-horizontal box" method="post">
											
											<fieldset>
												<?php echo $form->fields(); ?>
											</fieldset>
											<?php
                                            echo form_actions(array(
                                                array(
                                                    'id' => 'save-button',
                                                    'value' => lang('save'),
                                                    'class' => 'btn-primary'
                                                )
                                            ));
												?>
										</form>
										</div>
								<!--end::Profile Account-->
							</div>
							<!--end::Container-->
						</div>
					</div>
				</div>



<script>
	$( document ).ready(function() {
		$('#kab_id').prop( "disabled", true );
		$('#kec_id').prop( "disabled", true );
		$('#desa_id').prop( "disabled", true );
		$('#dusun').prop( "disabled", true );
		$('#rt').prop( "disabled", true );
		$('#rw').prop( "disabled", true );
		$('#level_id').change(function() {
			if($('#level_id').val() == "2"){
				$('#kec_id').prop( "disabled", true );
				$('#desa_id').prop( "disabled", true );
				$('#dusun').prop( "disabled", true );
				$('#rt').prop( "disabled", true );
				$('#rw').prop( "disabled", true );
			}else if($('#level_id').val() == "3"){
				$('#kec_id').prop( "disabled", false );
				$('#desa_id').prop( "disabled", true );
				$('#dusun').prop( "disabled", true );
				$('#rt').prop( "disabled", true );
				$('#rw').prop( "disabled", true );
			}else if($('#level_id').val() == "4"){
				$('#kec_id').prop( "disabled", false );
				$('#desa_id').prop( "disabled", false );
				$('#dusun').prop( "disabled", true );
				$('#rt').prop( "disabled", true );
				$('#rw').prop( "disabled", true );
			}else if($('#level_id').val() == "5"){
				$('#kec_id').prop( "disabled", false );
				$('#desa_id').prop( "disabled", false );
				$('#dusun').prop( "disabled", false );
				$('#rt').prop( "disabled", true );
				$('#rw').prop( "disabled", true );
			}else if($('#level_id').val() == "6"){
				$('#kec_id').prop( "disabled", false );
				$('#desa_id').prop( "disabled", false );
				$('#dusun').prop( "disabled", false );
				$('#rw').prop( "disabled", false );
				$('#rt').prop( "disabled", true );
			}else if($('#level_id').val() == "7"){
				$('#kec_id').prop( "disabled", false );
				$('#desa_id').prop( "disabled", false );
				$('#dusun').prop( "disabled", false );
				$('#rw').prop( "disabled", false );
				$('#rt').prop( "disabled", false );
			}
		});
	});

	$(document).ready(function() {
		$('#petugas_di').select2();
	});

	$('select[name=kec_id]').on('change', function() {
		$.ajax({  
           type: "GET",  
           url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kec_id]').val(),  
           data: "{}",  
           success: function (data) {  
			var s = '<option value="-1">Pilih Desa</option>';
               for (var i = 0; i < data.length; i++) {  
                   s += '<option value="' + data[i].Kd_Desa + '">' + data[i].text + '</option>';  
               }  
               $("#desa_id").html(s);  
           }  
       	});  
	});
	$('select[name=desa_id]').on('change', function() {
		$.ajax({  
           type: "GET",  
           url: site_url + 'api/wilayah/dusun?kec=' + $('select[name=kec_id]').val() + '&desa=' + $('select[name=desa_id]').val(),  
           data: "{}",  
           success: function (data) {  
				var s = '<option value="-1">Pilih Dusun</option>';
               for (var i = 0; i < data.length; i++) {  
                   s += '<option value="' + data[i].dusun + '">' + data[i].text + '</option>';  
               }  
               $("#dusun").html(s);  
           }  
       	});  
	});

	$('select[name=dusun]').on('change', function() {
		$.ajax({  
           type: "GET",  
           url: site_url + 'api/wilayah/rw?kec=' + $('select[name=kec_id]').val() + '&desa=' + $('select[name=desa_id]').val()+ '&dusun=' + $('select[name=dusun]').val(),  
           data: "{}",  
           success: function (data) {  
				var s = '<option value="-1">Pilih RW</option>';
               for (var i = 0; i < data.length; i++) {  
                   s += '<option value="' + data[i].rw + '">' + data[i].text + '</option>';  
               }  
               $("#rw").html(s);  
           }  
       	});  
	});

	$('select[name=rw]').on('change', function() {
		// console.log('api/wilayah/rw?kec=' + $('select[name=kec_id]').val() + '&desa=' + $('select[name=desa_id]').val()+ '&dusun=' + $('select[name=dusun]').val());
		$.ajax({  
           type: "GET",  
           url: site_url + 'api/wilayah/rt?kec=' + $('select[name=kec_id]').val() + '&desa=' + $('select[name=desa_id]').val()+ '&dusun=' + $('select[name=dusun]').val()+ '&rw=' + $('select[name=rw]').val(),  
           data: "{}",  
           success: function (data) {  
				var s = '<option value="-1">Pilih RT</option>';
               for (var i = 0; i < data.length; i++) {  
                   s += '<option value="' + data[i].rt + '">' + data[i].text + '</option>';  
               }  
               $("#rt").html(s);  
           }  
       	});  
	});
	



</script>