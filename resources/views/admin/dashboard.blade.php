@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard Overview')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Welcome to the Admin Dashboard</h2>
        <p class="mt-2 text-gray-600">This is your main admin area.</p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div class="bg-slate-50 p-6 rounded shadow mt-6">
            <h2 class="text-lg font-semibold mb-4">Sales Overview</h2>
            <canvas id="salesChart" class="w-full h-64"></canvas>
        </div>

        <div class="bg-slate-50 p-6 rounded shadow mt-6">
            <h2 class="text-lg font-semibold mb-4">Sales Overview</h2>
            <canvas id="salesChartLine" class="w-full h-64"></canvas>
        </div>

    </div>

    <div class="bg-white p-6 rounded shadow mt-6">
        <p>
            <input type="text" id="nepali-datepicker" placeholder="Select Nepali Date" />
        </p>
    </div>


    <script src="{{ asset("assets/js/nepali.datepicker.v5.0.6.min.js") }}"
        type="text/javascript"></script>
    <script>
        var mainInput = document.getElementById("nepali-datepicker");

        /* Initialize Datepicker with options */
        mainInput.NepaliDatePicker();
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const ctxLine = document.getElementById('salesChartLine').getContext('2d');

        // Line Chart Configuration
        const salesChartLine = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales',
                    data: [120, 150, 180, 200, 170, 220],
                    backgroundColor: 'rgba(59, 130, 246, 0.5)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
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


        // Pie Chart Configuration

        const config = {
            type: 'pie',
            data: {
                labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
                datasets: [{
                    label: 'Dataset 1',
                    data: [10, 20, 30, 40, 50],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(54, 162, 235, 0.5)'
                    ],

                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Pie Chart'
                    }
                }
            },
        };

        const salesChart = new Chart(ctx, config);
    </script>
@endsection
