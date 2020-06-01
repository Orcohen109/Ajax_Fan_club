<!doctype html>
<html>
<body>
    <h1><?php echo $title; ?>  <img id="ball" src= "<?php echo base_url();?>assets/images/ball.jpg"/></h1>
    
   
<div id="mainWrraper">
<div id="searchWrraper">
</form>
</div>
<table><tr><th>game_date</th><th>beginning_time</th><th>stadium</th><th>opponent</th><th>competitions</th><th>refree</th></tr>
<?php foreach ($games as $g): ?>

        <tr><td><?php echo $g['game_date'];?></td><td><?php echo $g['beginning_time']?></td>
        <td><?php echo $g['stadium']?></td><td><?php echo $g['opponent']?></td><td><?php echo $g['competitions']?></td>
        <td><?php echo $g['refree']?></td></tr>
        
<?php endforeach; ?>
        </table>
</div>
    <h1><?php echo $title2; ?><img id="ball" src= "<?php echo base_url();?>assets/images/chartimg.png"/></h1>
        
<div  id="piechart" ></div>

<div  id="piechartpp" ></div>

    
    
<table class="statisticTable"><tr><th>Competitions</th><th>Competitions Summary</th>
<?php foreach ($chart as $c): ?>
        <tr><td><?php echo $c['competitions'];?></td><td><?php echo $c['count(game_date)']?></td>    
<?php endforeach; ?>
</table>

</body>

<script type="text/javascript">
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Competition', 'Count'],
          <?php
           foreach($chart as $game){
               echo "['".$game['competitions']."',".$game['count(game_date)']."],";
           }
          ?>
        ]);

        var options = {
          title: 'My competitions',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartpp);

      function drawChartpp() {

        var data = google.visualization.arrayToDataTable([
          ['Competition', 'Count'],
          <?php
           foreach($chart as $game){
               echo "['".$game['competitions']."',".$game['count(game_date)']."],";
           }
          ?>
        ]);

        var options = {
          title: 'My competitions',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechartpp'));

        chart.draw(data, options);
      }
    </script>
</html>
       