google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawProdutosBarChart);
google.charts.setOnLoadCallback(drawClientesBarChart);

function drawProdutosBarChart() {
    
    var data = google.visualization.arrayToDataTable(["-produtos-"]);

        var options = {
            title: "Top 3 produtos",
            legend:{position:'none'}        
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("divGrafico2"));
        chart.draw(data, options);
}

function drawClientesBarChart() {
    
    var data = google.visualization.arrayToDataTable(["-clientes-"]);

        var options = {
            title: "Top 3 clientes",
            legend:{position:'none'}        
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("divGrafico3"));
        chart.draw(data, options);
}




