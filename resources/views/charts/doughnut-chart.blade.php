<div class="container mt-5">
    <div class="col-sm-12">
        <h4 class="mb-4 centered-title">Doughnut Chart</h4>
        <div class="bg-light rounded h-100 p-4" style="max-width: 600px; margin: auto">
            <canvas id="doughnut-chart"></canvas>
        </div>
    </div>
    @if (isset($doughnutChartData))
        <script>
            $(document).ready(function() {
                var ctx5 = document.getElementById('doughnut-chart').getContext('2d');
                var chartData5 = @json($doughnutChartData);
                var values = chartData5.map(function(item) {
                    return item.value;
                });
                var labels = chartData5.map(function(item) {
                    return item.label;
                });
                var colors = [];
                labels.forEach(element => {
                    var count = 7;
                    colors.push("rgba(235, 22, 22, ." + count + ")");
                    count--;
                });
                var pieChart = new Chart(ctx5, {
                    type: "pie",
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: colors
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            });
        </script>
    @endif
</div>

<script>
    // var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
    // var myChart6 = new Chart(ctx6, {
    //     type: "doughnut",
    //     data: {
    //         labels: ["Italy", "France", "Spain", "USA", "Argentina"],
    //         datasets: [{
    //             backgroundColor: [
    //                 "rgba(235, 22, 22, .7)",
    //                 "rgba(235, 22, 22, .6)",
    //                 "rgba(235, 22, 22, .5)",
    //                 "rgba(235, 22, 22, .4)",
    //                 "rgba(235, 22, 22, .3)"
    //             ],
    //             data: [55, 49, 44, 24, 15]
    //         }]
    //     },
    //     options: {
    //         responsive: true
    //     }
    // });
</script>
