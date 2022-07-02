<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="shadow-lg rounded-lg overflow-hidden">
    <div class="py-3 px-5 bg-gray-50">Line chart</div>
    <canvas class="p-10" id="chartLine"></canvas>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart line -->
<script>
    const labels = [
        @foreach($analyticsData as $data)
            {!! '"'. $data['date'] .'", ' !!}
        @endforeach
    ];
    const data = {
        labels: labels,
        datasets: [
            {
                label: "Visiteurs",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [
                    @foreach ($analyticsData as $data)
                        {{ $data['visitors'] .', ' }}
                    @endforeach
                ],
            },
        ],
    };

    const configLineChart = {
        type: "line",
        data,
        options: {},
    };

    var chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
    );
</script>
<div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
    <table class="table-auto">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Visitors</th>
            <th>Page Title</th>
            <th>Page Views</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 0;
        @endphp
        @foreach ($analyticsData as $data)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $data['date'] }}</td>
                <td>{{ $data['visitors'] }}</td>
                <td>{{ $data['pageTitle'] }}</td>
                <td>{{ $data['pageViews'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
