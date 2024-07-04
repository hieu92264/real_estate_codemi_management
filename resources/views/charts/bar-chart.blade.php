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
            let chartData = @json($data);
            console.log(chartData);
             let ctx = document.getElementById('barchart').getContext('2d');
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: chartData.,
                            data: chartData.data,
                            backgroundColor: chartData.colors,
                            borderColor: chartData.colors,
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
        </script>
    @endif

</div>
