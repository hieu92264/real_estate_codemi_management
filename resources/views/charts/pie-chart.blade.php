<div class="container mt-5">
    <div class="col-sm-12">
        <h4 class="mb-4 centered-title">Thống kê theo trạng thái bất động sản</h4>
        <div class="bg-light rounded h-100 p-4" style="max-width: 500px; margin :auto ">
            <canvas id="pie-chart"></canvas>
        </div>
    </div>
    @if (isset($pieChartData))
        <script>
            $(document).ready(function() {
                var ctx5 = document.getElementById('pie-chart').getContext('2d');
                var chartData5 = @json($pieChartData);
                var values = chartData5.map(function(item) {
                    return item.value;
                });
                var labels = chartData5.map(function(item) {
                    return item.label;
                });
                var colors = [];
                var count = 7;
                labels.forEach(element => {
                    colors.push("rgba(235, 22, 22, 0." + count + ")");
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
