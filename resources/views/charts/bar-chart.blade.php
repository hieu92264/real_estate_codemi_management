<div class="container mt-5">
    <div class="col-sm-12">
        <h4 class="mb-4 centered-title">Xu hướng giao dịch bất động sản trong khoảng giá</h4>
        <x-filters />
        <div class="bg-light rounded h-100 p-4" style="max-width: 750px; height: auto; margin: auto">
            <canvas id="barchart"></canvas>
        </div>
        @if (isset($barChartData))
            <script>
                $(document).ready(function() {
                    var ctx = $('#barchart')[0].getContext('2d');
                    var chartData = @json($barChartData);
                    var values = chartData.map(function(item) {
                        return item.value;
                    });


                    var barChart = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: ['Dưới 500 triệu', '500 - 800 triệu', '800 triệu - 1 tỷ', '1 - 2 tỷ',
                                '2 - 3 tỷ', '3 - 5 tỷ', '5 - 7 tỷ', 'Trên 7 tỷ'
                            ],
                            datasets: [{
                                label: "Bất động sản",
                                data: values,
                                backgroundColor: "rgba(255, 0, 0, .7)"
                            }]
                        },
                        options: {
                            responsive: true,
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

    {{-- col-xl-6 --}}
