<div class="container mt-5">
    <div class="col-sm-12">
        <h4 class="mb-4">Thống kê theo trạng thái bất động sản</h4>
        <div class="bg-light rounded h-100 p-4">
            <canvas id="pie-chart"
                style="display: block; box-sizing: border-box; height: 186.4px; width: 186.8px;"></canvas>
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
                labels.forEach(element => {
                    var count = 7;
                    colors.push("rgba(0, 156, 255, ." + count + ")");
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
