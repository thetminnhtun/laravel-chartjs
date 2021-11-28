<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Chartjs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <style>
        .container {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div>
            <h1>Users Report</h1>

            <select onchange="updateDays(this.value)">
                <option value="7" selected>Last 7 days</option>
                <option value="30">Last 30 days</option>
                <option value="365">Last 365 days</option>
                <option value="">Lifetime</option>
            </select>

            <select onchange="updateType(this.value)">
                <option value="bar" selected>Bar Chart</option>
                <option value="line">Line Chart</option>
            </select>
        </div>

        <div style="width: 600px; height: 400px;">
            <canvas id="user-chart" width="300" height="200"></canvas>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>

</html>