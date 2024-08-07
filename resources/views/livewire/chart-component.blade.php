<div>
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        @if (empty($jobRequests))
        <p>No Application yet</p>
        @else
        <div>
            <canvas id="myChart" style="max-width: 500px;"></canvas>
        </div>
        <div id="chart-legend" style="text-align: center; margin-top: 20px;"></div>
        <!-- Load Chart.js from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        document.addEventListener('livewire:initialized', function() {
            const ctx = document.getElementById('myChart').getContext('2d');

            // Access Livewire data
            const jobRequests = @json($jobRequests);

            if (jobRequests.length > 0) {
                const labels = jobRequests.map(item => item.job);
                const requests = jobRequests.map(item => item.requests);
                const backgroundColors = jobRequests.map(item => item.backgroundColor);

                const chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Job Applications',
                            data: requests,
                            backgroundColor: backgroundColors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false // Hide the default legend
                            }
                        }
                    },
                    plugins: [{
                        id: 'custom-legend',
                        afterUpdate: function(chart) {
                            const legendContainer = document.getElementById('chart-legend');
                            const ul = document.createElement('ul');
                            const datasets = chart.data.datasets;
                            datasets.forEach((dataset, i) => {
                                dataset.data.forEach((value, j) => {
                                    const li = document.createElement('li');
                                    li.style.listStyleType = 'none';
                                    li.style.display = 'inline-block';
                                    li.style.marginRight = '10px';
                                    li.innerHTML = `
                                                            <span style="background-color:${dataset.backgroundColor[j]};width:10px;height:10px;display:inline-block;"></span>
                                                            <span style="color:#333;font-size:14px;">${chart.data.labels[j]}</span>
                                                        `;
                                    ul.appendChild(li);
                                });
                            });
                            legendContainer.innerHTML = '';
                            legendContainer.appendChild(ul);
                        }
                    }]
                });
            }
        });
        </script>
    </div>
</div>
@endif