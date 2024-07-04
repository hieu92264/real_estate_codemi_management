<div class="container mt-5">
    <div class="col-sm-12 col-xl-6">
        <h6 class="mb-4">Thống kê bất động sản theo giá</h6>
            <x-filters />
        <div class="bg-light rounded h-100 p-4">
            <canvas id="barchart" width="1652" height="826"
                style="display: block; box-sizing: border-box; height: 413px; width: 826px;"></canvas>
        </div>
    </div>
    @if (isset($data))
        <script>
            $(document).ready(function() {
                var ctx = $('#barchart')[0].getContext('2d');
                var chartData = @json($data);
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
                                backgroundColor: "rgba(0, 156, 255, .7)"
                            }
                        ]
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
