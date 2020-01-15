var array = document.getElementById('arrayHospitalisation').value;
var hospitalisationArray = JSON.parse(array);

// console.log(array)
 // Load the Visualization API and the corechart package.
 google.charts.load('current', {'packages':['corechart']});

 // Set a callback to run when the Google Visualization API is loaded.
 google.charts.setOnLoadCallback(drawChart);

 // Callback that creates and populates a data table,
 // instantiates the pie chart, passes in the data and
 // draws it.
 function drawChart() {

   // Create the data table.
   var data = new google.visualization.DataTable(hospitalisationArray);
   data.addColumn('string', 'Topping');
   data.addColumn('number', 'Slices');
   for (let index = 0; index < hospitalisationArray.length; index++) {
    //  const element = array[index];
      data.addRows([
        [hospitalisationArray[index].mois, parseInt(hospitalisationArray[index].nbrHospitalisation)],
      ]);
     
   }
  
   // Set chart options
   var options = {'title':'Nombre d\'hospitalisations par mois',
                  // 'width':400,
                  'height':300,
                  // 'fontSize': 14
                  slices: {
                    0: { color: '#DC3912' },
                    1: { color: '#1a3f60' },
                  },
                  titleTextStyle: { 
                    fontSize: 14,
                    bold: true,
                    }
                };

   // Instantiate and draw our chart, passing in some options.
   var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
   chart.draw(data, options);
 }