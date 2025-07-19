<div id="chart" wire:ignore class="bg-white font-poppins p-6 rounded-lg"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    let chartInstance = null;

    document.addEventListener('livewire:init', () => {
        Livewire.on('render-chart', (event) => {
            const chartData = event.chartData;

            const options = {
                series: chartData,
                chart: {
                    type: 'area',
                    stacked: false,
                    height: 375,
                    zoom: {
                        type: 'x',
                        enabled: true,
                        autoScaleYaxis: true
                    },
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'poppins',
                },
                dataLabels: {
                    enabled: false
                },
                markers: {
                    size: 0
                },
                title: {
                    text: 'Sales Over Time',
                    align: 'left',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        fontFamily: 'poppins'
                    }
                },
                legend: {
                    fontFamily: 'poppins'
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.5,
                        opacityTo: 0,
                        stops: [0, 90, 100]
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            fontFamily: 'poppins'
                        },
                        formatter: function(val) {
                            return '₱' + val.toLocaleString('en-PH', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        },
                    },
                },
                xaxis: {
                    type: 'datetime',
                    labels: {
                        style: {
                            fontFamily: 'poppins'
                        }
                    }
                },
                tooltip: {
                    shared: true,
                    style: {
                        fontFamily: 'poppins'
                    },
                    y: {
                        formatter: function(val) {
                            return '₱' + val.toLocaleString('en-PH', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        },
                    }
                }
            };

            if (chartInstance) chartInstance.destroy();

            chartInstance = new ApexCharts(document.querySelector("#chart"), options);
            chartInstance.render();
        });
    });
</script>
