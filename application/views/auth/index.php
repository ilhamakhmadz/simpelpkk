							<div class="card">
								<div class="card-body p-12">
									<div class="row mb-12">
                                        <table id="dataTable_user" class="table table-striped table-row-bordered gy-5 gs-7">
                                            <thead>
                                                <tr>
													<th>Last Login</th>
													<th><?php echo lang('full_name'); ?></th>
													<th><?php echo lang('username'); ?></th>
													<th><?php echo lang('level_user'); ?></th>
													<th><?php echo lang('role_user'); ?></th>
													<th style="width:220px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        
<?php $this->load->view('delete-modal'); ?>

<script>

function deleteItem($id) {

toastr.options = {
	"closeButton": true,
	"debug": false,
	"newestOnTop": false,
	"progressBar": false,
	"positionClass": "toast-top-right",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "100",
	"hideDuration": "1000",
	"timeOut": 0,
	"extendedTimeOut": 0,
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut",
	"tapToDismiss": false
  };

toastr.warning("Yakin akan menghapus data<br /><br /><a id='close-toastr' onclick='window.deleteYes("+$id+")' type='button' class='btn btn-outline-light btn-sm'>Yes</a>", "Hapus Data")
$('body').on('click', 'a#close-toastr', function () {
	$(this).closest('.toast').remove();
});
// alert('deasdajkd');
// swal({
//         title: "Apakah Anda Yakin?",
//         text: "Setelah dihapus, Data hanya dapat dipulihkan di database!!",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//     })
//     .then((willDelete) => {
//         if (willDelete) {
//             swal("Data berhasil dihapus!", {
//                 icon: "success",
//             });

//             window.location = site_url + "api/master/Api_kecamatan/delete/" + $id;
//         } else {
//             swal("Data tidak berhasil dihapus!");
//         }
//     });

}
var the_table;

$(document).ready(function() {
	the_table = $("#dataTable_user").DataTable({
		responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        stateSave: true,
            "ajax": {
                "url": "<?php echo site_url('api/user/index'); ?>",
                "type": "POST"
            },
			"columns": [
				{ "data": "last_login",
                    "render": function (data, type, row, meta) {
                        if(data == null){
                            return "<i>Belum Pernah Login</i>";
                        }else{
                            return data + "<br /><i>" +moment(data).fromNow()+ "</i>";
                        }
                    }
                },
				{ "data": "first_name",
				  "render": function(data, type, row, meta) {
						return data +' ' + row.last_name;
					}
				},
				{
					"data": "username",
				},
				{ "data": "level_id",
                    "render": function(data, type, row, meta) {
                            if(data == 1){
                                return 'Super Admin';
                            }else if(data == 2){
                                return 'Kabupaten';
                            }else if(data == 3){
                                return 'Kecamatan';
                            }else if(data == 4){
                                return 'Desa';
                            }else if(data == 5){
                                return 'Dusun';
                            }else if(data == 6){
                                return 'RW';
                            }else if(data == 7){
                                return 'RT';
                            }
                        } 
                },
				{ "data": "name" },
				{
					"data": "id",
					"orderable": false,
					"render": function(data, type, row, meta) {
                        if(row.level_id == <?php echo $this->session->userdata('level_id') ?>){
                            return "";
                        }else{
                            return '<a href="'+site_url+'auth/user/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 ">\n\
                            <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\n\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\n\
                            </svg></span></a>\n\
                            <a href="'+site_url+'auth/login/auto_login/' + row.username + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n\
                                <rect x="0" y="0" width="24" height="24"/>\n\
                                <rect fill="#000000" opacity="0.3" transform="translate(9.000000, 12.000000) rotate(-270.000000) translate(-9.000000, -12.000000) " x="8" y="6" width="2" height="12" rx="1"/>\n\
                                <path d="M20,7.00607258 C19.4477153,7.00607258 19,6.55855153 19,6.00650634 C19,5.45446114 19.4477153,5.00694009 20,5.00694009 L21,5.00694009 C23.209139,5.00694009 25,6.7970243 25,9.00520507 L25,15.001735 C25,17.2099158 23.209139,19 21,19 L9,19 C6.790861,19 5,17.2099158 5,15.001735 L5,8.99826498 C5,6.7900842 6.790861,5 9,5 L10.0000048,5 C10.5522896,5 11.0000048,5.44752105 11.0000048,5.99956624 C11.0000048,6.55161144 10.5522896,6.99913249 10.0000048,6.99913249 L9,6.99913249 C7.8954305,6.99913249 7,7.89417459 7,8.99826498 L7,15.001735 C7,16.1058254 7.8954305,17.0008675 9,17.0008675 L21,17.0008675 C22.1045695,17.0008675 23,16.1058254 23,15.001735 L23,9.00520507 C23,7.90111468 22.1045695,7.00607258 21,7.00607258 L20,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.000000, 12.000000) rotate(-90.000000) translate(-15.000000, -12.000000) "/>\n\
                                <path d="M16.7928932,9.79289322 C17.1834175,9.40236893 17.8165825,9.40236893 18.2071068,9.79289322 C18.5976311,10.1834175 18.5976311,10.8165825 18.2071068,11.2071068 L15.2071068,14.2071068 C14.8165825,14.5976311 14.1834175,14.5976311 13.7928932,14.2071068 L10.7928932,11.2071068 C10.4023689,10.8165825 10.4023689,10.1834175 10.7928932,9.79289322 C11.1834175,9.40236893 11.8165825,9.40236893 12.2071068,9.79289322 L14.5,12.0857864 L16.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.500000, 12.000000) rotate(-90.000000) translate(-14.500000, -12.000000) "/>\n\
                            </g>\n\
                            </svg></span>\n\
                            </a>\n\
                            <a href="#" onclick="deleteItem(' + row.id + ')" class="btn btn-icon btn-light-google me-5 ">\n\
                            <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\n\
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\n\
                                    <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>\n\
                                </g>\n\
                            </svg></span>\n\
                            </a>';
                        }
						
					}
				}
			]
        });

});

function deleteYes($id) {
                    toastr.clear();
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "100",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      };
                
                    toastr.success("Berhasil Menghapus data", "Hapus Data");
                
                    window.location = site_url + "auth/user/delete/" + $id;
                }
// return '<a href="<?php echo site_url('auth/user/delete/') ?>/' + row.id + '" title="Delete" data-button="delete"><i class="fa fa-trash"></i></a>';
</script>