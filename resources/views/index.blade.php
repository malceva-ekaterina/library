<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);
         function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Месяц', 'Кол-во выдачи'],
          ["{{ $startDate->translatedFormat('F') }}", {{ $threeMonthsAgo }}],
          ["{{ $middleDate->translatedFormat('F') }}", {{ $twoMonthsAgo }}],
          ["{{ $endDate->translatedFormat('F') }}", {{ $thisMonths }}],
        ]);

        var options = {
            title: 'Статистика по выдачи в течении 3 месяца',
            width: 900,
            legend: { position: 'none' },
            chart: { title: 'Статистика по выдачи в течении 3 месяца'},
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                0: { side: 'top' } // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'name');
            data.addColumn('number', 'count_of_books');
            data.addRows([
            ['Доступных книг для выдачи', {{$availableBooks}}],
            ['Невозращеных книг', {{ $unreturnedBooks }}]
            ]);

            // Set chart options
            var options = {'title':'Соотношение невозращеных книг к доступным для выдачи',
                        'width':500,
                        'height':400};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <x-header></x-header>
    <main>
         <div id="chart_div"></div>
         <br>
         <div id="top_x_div" style="width: 900px; height: 500px;"></div>
    </main>
</body>
</html>
