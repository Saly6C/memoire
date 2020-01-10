var array = document.getElementById('arrayHospitalisation').value;
var test1 = JSON.parse(array);
var key;
// switch (test1[key].mois) {
//   case 1: 'Janvier'
//     break;
//   case 2: 'Février'
//     break;
//   case 3: 'Mars'
//     break;
//   case 4: 'Avril'
//     break;
//   case 5: 'Mai'
//     break;
//   case 6: 'Juin'
//     break;
//   case 7: 'Juillet'
//     break;
//   case 8: 'Août'
//     break;
//   case 9: 'Septembre'
//     break;
//   case 10: 'Octobre'
//     break;
//   case 11: 'Novembre'
//     break;
//   case 12: 'Décembre'
//     break;

//   default:
//     break;
// }
// for(key in test1) {
//   var month ;
//   if (key == 0 && test1[0].mois == 1) {
//       month = "Janvier"
//   }
//   if (key == 0 && test1[].mois == 1) {
//       month = "Janvier"
//   }
  // var month = test1[key].mois
  // var k = key;
  // if (  k == 0 && month == 1)
  // {
  //   month = "janvier"
  // } else ( k == 1 && month == 1)
  // {
  //   month = "Fevrier"
  // }
// }
console.log(test1)
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
   data.addColumn('string', 'Topping');
   data.addColumn('number', 'Slices');
   data.addRows([
     [test1[0].mois, parseInt(test1[0].nbrHospitalisation)],
     [test1[1].mois, parseInt(test1[1].nbrHospitalisation)],
   ]);

   // Set chart options
   var options = {'title':'Nombre d\'hospitalisations par mois',
                  // 'width':400,
                  'height':300};

   // Instantiate and draw our chart, passing in some options.
   var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
   chart.draw(data, options);
 }