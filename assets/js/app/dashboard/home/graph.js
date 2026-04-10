// var laki;
$(document).ready(function() {
    // $.ajax({
    //     type: 'GET',
    //     url: site_url + 'api/dashboard/Api_home/get_lp',
    //     dataType: 'json',
    //     data: { get_param: 'value' },
    //     success: function(e) {
    //         // var json = e;
    //         // console.log(e.perempuan);

    //         // // $('#cand').html(data);
    //         // $(json).each(function(i, val) {
    //         //     $.each(val, function(k, v) {
    //         //         // dataSet.unshift(parseInt(v));

    //         //     });
    //         // });
    //     }
    // });

});

var jsonfile = {
    "jsonarray": [{
        "perempuan": $('#perempuan').val(),
        "laki": $('#laki').val()
    }]
};

var perempuan = jsonfile.jsonarray.map(function(e) {
    return e.perempuan;
});
var laki = jsonfile.jsonarray.map(function(e) {
    return e.laki;
});;

var ctx = document.getElementById('kt_stats_widget_1_chart');

// Define colors
var primaryColor = KTUtil.getCssVariableValue('--bs-primary');
var dangerColor = KTUtil.getCssVariableValue('--bs-danger');
var successColor = KTUtil.getCssVariableValue('--bs-success');
var warningColor = KTUtil.getCssVariableValue('--bs-warning');
var infoColor = KTUtil.getCssVariableValue('--bs-info');

// Define fonts
var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

// Chart labels
const labels = ['Perempuan', 'Laki-Laki'];

const dataSet = [perempuan, laki];




// Chart data
// const data = {
//     labels: labels,
//     datasets: [
//         { data: dataSet }
//     ],
//     backgroundColor: [
//         KTUtil.getCssVariableValue("--bs-success"), KTUtil.getCssVariableValue("--bs-warning")
//     ]
// };
var e = KTUtil.getCssVariableValue("--bs-gray-200"),
    a = KTUtil.getCssVariableValue("--bs-gray-800");
// Chart config
const config = {
        type: "doughnut",
        data: {
            labels: labels,
            datasets: [{
                data: dataSet,
                backgroundColor: [
                    successColor, warningColor
                ]
            }],

        },
        options: {
            chart: {
                fontFamily: "inherit"
            },
            cutout: "75%",
            cutoutPercentage: 75,
            responsive: !0,
            maintainAspectRatio: !1,
            title: {
                display: !1,
                text: "Technology"
            },
            animation: {
                animateScale: !0,
                animateRotate: !0
            },
            tooltips: {
                enabled: !0,
                intersect: !1,
                mode: "nearest",
                bodySpacing: 5,
                yPadding: 10,
                xPadding: 10,
                caretPadding: 0,
                displayColors: !1,
                backgroundColor: e,
                bodyFontColor: a,
                cornerRadius: 4,
                footerSpacing: 0,
                titleSpacing: 0
            },
            plugins: {
                legend: {
                    display: !1
                }
            }
        }
    }
    //     type: 'pie',
    //     data: data,
    //     options: {
    //         plugins: {
    //             title: {
    //                 display: false,
    //             }
    //         },
    //         responsive: true,
    //     },
    //     defaults: {
    //         global: {
    //             defaultFont: fontFamily
    //         }
    //     }
    // };



// console.log(dataSet);

// Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
var myChart = new Chart(ctx, config);