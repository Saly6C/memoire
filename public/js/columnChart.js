var array = document.getElementById('array').value;
var consultationArray = JSON.parse(array);
      
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    
        var data = new google.visualization.DataTable(consultationArray);
        
        data.addColumn('string', 'Service');
        data.addColumn('number', 'nombre');
        data.addColumn({type: 'string', role: 'style'});
        
        for (let index = 0; index < consultationArray.length; index++) {
            var couleur;
            var randomColor = '#'+Math.floor(Math.random()*16777215).toString(16);

            switch (index) {
                case 0: 
                    couleur = "#1a3f60"
                    break;
                case 1: 
                    couleur = "#DC3912"
                    break;
                case 2: 
                    couleur = "#e5e4e2"
                    break;
                default: 
                    couleur = randomColor
                    break;
            }
            
            data.addRows([
                [consultationArray[index].nomService, parseInt(consultationArray[index].nombre), couleur]
            ]);
        }
        
        var options = {
            title: "Nombre de consultations par service",
            // width: 
            height: 300,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
            titleTextStyle: { 
                fontSize: 14,
                bold: true,
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(data, options);
    }
    