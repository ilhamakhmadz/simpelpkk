$(document).ready(function() {
    var perempuanVal = parseInt($('#perempuan').val()) || 0;
    var lakiVal = parseInt($('#laki').val()) || 0;

    var jsonfile = {
        "jsonarray": [{
            "perempuan": perempuanVal,
            "laki": lakiVal
        }]
    };

    var perempuan = jsonfile.jsonarray.map(function(e) {
        return e.perempuan;
    });
    var laki = jsonfile.jsonarray.map(function(e) {
        return e.laki;
    });

    var ctx = document.getElementById('kt_stats_widget_1_chart');
    if (!ctx) return;

    // Define colors
    var primaryColor = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue('--bs-primary') : '#0095e8';
    var dangerColor = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue('--bs-danger') : '#f1416c';
    var successColor = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue('--bs-success') : '#50cd89';
    var warningColor = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue('--bs-warning') : '#ffc700';
    var infoColor = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue('--bs-info') : '#7239ea';

    // Define fonts
    var fontFamily = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue('--bs-font-sans-serif') : 'Poppins';

    // Chart labels
    const labels = ['Perempuan', 'Laki-Laki'];
    const dataSet = [perempuan, laki];

    var eColor = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue("--bs-gray-200") : '#eff2f5',
        aColor = typeof KTUtil !== 'undefined' ? KTUtil.getCssVariableValue("--bs-gray-800") : '#181c32';

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
                backgroundColor: eColor,
                bodyFontColor: aColor,
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
    };

    var myChart = new Chart(ctx, config);
});