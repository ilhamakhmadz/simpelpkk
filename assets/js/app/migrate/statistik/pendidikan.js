$(document).ready(function () {
  // $('#kec_id').change(function() {
  //     $('#kd_kecamatan').val($('#kec_id').val());
  // });
  $("select[name=kec_id]").on("change", function () {
    $("select[name=Kd_Desa]").empty();
    $("select[name=Kd_Desa]").select2({
      ajax: {
        url:
          site_url +
          "api/frontend/wilayah/desa?desaId=" +
          $("select[name=kec_id]").val(),
        dataType: "json",
        data: function (param) {
          return {
            delay: 0.3,
            q: param.term,
          };
        },
        processResults: function (data) {
          return {
            results: $.map(data.items || data, function (obj) {
              return {
                id: obj.Kd_Desa,
                text: obj.text,
              };
            }),
          };
        },
        cache: false,
        minimumInputLength: 3,
      },
    });
  });

  $("select[name=Kd_Desa]").on("change", function () {
    window.location.href =
      site_url +
      "migration/statistikPendidikan?desaId=" +
      $("select[name=Kd_Desa]").val();
  });
});
$(document).ready(function () {
	$('#pendidikan').DataTable();
	$('#pendidikan_ditempuh').DataTable();
});
