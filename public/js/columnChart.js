var array = document.getElementById('array').value;
var test = JSON.parse(array);
    // alert(test[key];
    // for( key in test) {
        console.log(test)

    // }


    google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "nombre de consultations", { role: "style" } ],
            // [val3, parseInt(val1), "#b87333"],
            
            [test[0].nomService, parseInt(test[0].nombre), "#3f51b5"],
            [test[1].nomService, parseInt(test[1].nombre), "color :#b87333"],
            [test[2].nomService, parseInt(test[2].nombre), "color: #e5e4e2"],
            // ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);

        var options = {
            title: "Nombre de consultations par service",
            // width: 
            height: 300,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }

    // pie chart
    