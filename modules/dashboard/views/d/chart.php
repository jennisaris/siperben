<?php
//print_r($result);
//exit;
?>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
  google.charts.load('current', {packages: ['corechart','bar']});     
</script>

<div id = "container" style = "width: 100%; height: 400px; margin: 0 auto;overflow:auto;">
</div>
<script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable(<?=$result;?>);
            
            /*var data = google.visualization.arrayToDataTable([
               ['Year', 'Asia', 'Europe'],
               ['2012',  900,      390],
               ['2013',  1000,      400],
               ['2014',  1170,      440],
               ['2015',  1250,       480],
               ['2016',  1530,      540]
            ]);*/
            /*var data = google.visualization.arrayToDataTable([
              ["Unit Utama","BP","BPn","BPP"],
              ["SETJEN",37,6,0],
              ["ITJEN",0,0,0],
              ["BAHASA",33,21,0],
              ["GTK",0,0,0],
              ["PAUD, DIKDASMEN",0,0,0],
              ["VOKASI",0,0,0],
              ["DIKTI",0,0,0],
              ["KEBUDAYAAN",0,0,0],
              ["BALITBANG",0,0,0]
            ]);*/



            var options = {title: 'Jumlah Pejabat Perbendaharaan',
              vAxis: {
                minValue:0
              }
            };  

            // Instantiate and draw the chart.
            var chart = new google.charts.Bar(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
<?php
//print_r($result);
?>