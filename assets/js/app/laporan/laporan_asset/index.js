function format ( d ) {
    var date = new Date(d.tahun_mutasi);
    var month = date.getMonth() + 1;
    var tanggal = date.getDate() + "-" + month + "-" +  date.getFullYear() ;
    // `d` is the original data object for the row
    if(d.jenis_mutasi == null){
        return '<h3>Data Kosong</h3>'
    }else{
        return '<h3>Tanggal Penghapusan</h3>'+
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="table table-bordered dataTable no-footer">'+
            '<tr>'+
                '<td>Jenis Penghapusan:</td>'+
                '<td>'+d.jenis_mutasi+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Tanggal Penghapusan:</td>'+
                '<td>'+tanggal+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Keterangan:</td>'+
                '<td>'+d.keterangan_mutasi+'</td>'+
            '</tr>'+
        '</table>';
    }

}
    var the_table;
    $(window).load(function () {

        $('#dataTable_Desa tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = the_table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    });

    function deleteItem($id){

		swal({
				title: "Apakah Anda Yakin?",
				text: "Setelah dihapus, Data hanya dapat dipulihkan di database!!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					swal("Data berhasil dihapus!", {
					icon: "success",
					});

					window.location = site_url + "api/perencanaan/renstra/Api_visi/delete/" + $id;
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

	}

        $('select[name=kec_id]').on('change', function() {
            $('select[name=Kd_Desa]').empty();
            $('select[name=Kd_Desa]').select2({
            ajax: {
                url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kec_id]').val(),
                dataType: 'json',
                data: function(param) {
                return {
                    delay: 0.3,
                    q: param.term
                }
                },
                processResults: function(data) {
                return {
                    results: $.map(data.items || data, function(obj) {
                    return {
                        id: obj.Kd_Desa,
                        text: obj.text,
                    }
                    })
                }
                },
                cache: false,
                minimumInputLength: 3,

            }
            });
        });


        $( document ).ready(function() {
        $('select[name=Kd_Desa]').empty();
            $('select[name=Kd_Desa]').select2({
            ajax: {
                url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kec_id]').val(),
                dataType: 'json',
                data: function(param) {
                return {
                    delay: 0.3,
                    q: param.term
                }
                },
                processResults: function(data) {
                return {
                    results: $.map(data.items || data, function(obj) {
                    return {
                        id: obj.Kd_Desa,
                        text: obj.text,
                    }
                    })
                }
                },
                cache: false,
                minimumInputLength: 3,

            }
            });
        });


