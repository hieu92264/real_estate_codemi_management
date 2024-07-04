<div class="container">
    <div class="card">
        <div class="card-body">
            <x-filters />
        </div>
        <div class="card-body">
            <canvas id="barchart" width="800" height="400"></canvas>
        </div>
    </div>
    @if (isset($data))
        <script>
            $(document).ready(function () {
                var ctx = $('#barchart')[0].getContext('2d');
                var chartData = @json($data);
                var labels = chartData.map(function(item) {
                    return 'Range ' + item.label;
                });
                var values = chartData.map(function(item) {
                    return item.value;
                });
                var barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Số lượng bất động sản',
                            data: values,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    @endif

</div>
