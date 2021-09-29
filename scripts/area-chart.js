google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawAreaChart);
            
    function drawAreaChart() 
    {
        var data = google.visualization.arrayToDataTable(["-valores-"]);
        var options = { title: 'Receita do período',
                        hAxis: {title: 'Periodo',  titleTextStyle: {color: '#333'}},
                        vAxis: {minValue: 0} ,
                        legend:{position:'none'}                                                                                  
                };
            
                var chart = new google.visualization.AreaChart(document.getElementById('divGrafico1'));
                chart.draw(data, options);
    }

