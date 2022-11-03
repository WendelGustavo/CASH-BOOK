<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<section>
    <?php

    $input = array_column($this->data['inputAll'], "input");
    $output = array_column($this->data['outputAll'], "output");
    $cash_balance = round($this->data['cash_balance'], 2);
    $all = $this->data['listMovi'];
    ?>
    <div class="wrap">
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Entrada', 'Saída', 'Valor real movimento'],
          <?php
                    $values = $this->data['list'];
                    foreach ($values as $value) {
                    ?>['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[0]; ?>), parseFloat(<?php echo $output[0]; ?>), parseFloat(<?php echo $input[0] - $output[0]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[1]; ?>), parseFloat(<?php echo $output[1]; ?>), parseFloat(<?php echo $input[1] - $output[1]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[2]; ?>), parseFloat(<?php echo $output[2]; ?>), parseFloat(<?php echo $input[2] - $output[2]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[3]; ?>), parseFloat(<?php echo $output[3]; ?>), parseFloat(<?php echo $input[3] - $output[3]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[4]; ?>), parseFloat(<?php echo $output[4]; ?>), parseFloat(<?php echo $input[4] - $output[4]; ?>)],
                      ['<?php echo $value['date']; ?>', parseFloat(<?php echo $input[5]; ?>), parseFloat(<?php echo $output[5]; ?>), parseFloat(<?php echo $input[5] - $output[5]; ?>)],
                      <?php } ?>
        ]);

        var options = {
          title: 'DashBoard Entrada, Saida e Total',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('curve_chart'));
        chart.draw(data, options);

        google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Description', 'Moviments'],
          <?php
          $cont=0;
foreach($all AS $moviment){
  $description[$cont]=$moviment['description'];
  $value[$cont]=$moviment['value'];
  $cont++;
}
          ?>
                    ['<?php echo"$description[0]"?>', <?php echo"$value[0]"?>],
                    ['<?php echo"$description[1]"?>',  <?php echo"$value[1]"?> ],
                    ['<?php echo"$description[2]"?>', <?php echo"$value[2]"?>],
                    ['<?php echo"$description[3]"?>',  <?php echo"$value[3]"?> ],
                    ['<?php echo"$description[4]"?>', <?php echo"$value[4]"?>],
                    ['<?php echo"$description[5]"?>',  <?php echo"$value[5]"?> ],
                    ['<?php echo"$description[6]"?>', <?php echo"$value[6]"?>],
                    ['<?php echo"$description[7]"?>',  <?php echo"$value[7]"?> ],
                    ['<?php echo"$description[8]"?>', <?php echo"$value[8]"?>],
                    ['<?php echo"$description[9]"?>',  <?php echo"$value[9]"?> ],
                    ['<?php echo"$description[10]"?>', <?php echo"$value[10]"?>],
                    ['<?php echo"$description[11]"?>',  <?php echo"$value[11]"?> ],
                    ['<?php echo"$description[12]"?>',  <?php echo"$value[12]"?> ]
        ]);

        var options = {
          title: 'DashBoard Moviments',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('curve_chart2'));
        chart.draw(data, options);
      }
      }
    </script>
  </head>
  <body>
    <div id="divlegal" style="
    
  
    width: 300px;
    border-radius: 10px;
    height: 100px;
    align-self: center; 
    margin : 0  auto;
    margin-top: 30px;
    align-items: center;
    text-align: center;

    ">
  <h2 style='align-self: center; 
    margin: 0 auto; 
    padding-top: 7px;
    align-items: center;
    text-align: center;
    width: 200px;
    color: #fff;
    '>Saldo atual:</h2>
     <h2 style='align-self: center; 
    margin: 0 auto; 
    align-items: center;
    text-align: center;
    width: 200px;
    color: #fff;
    '>R$  <?php echo $cash_balance; ?></h2>

    
  </div>
    <div style="
    align-self: center; 
    margin: 0 auto; 
    display: flex;
  justify-content: center;
  ">
    <div id="curve_chart2" style="width: 900px; height: 500px;"></div>
    <div id="curve_chart" style="width: 900px; height: 500px;"></div>
    </div>
  </body>
    </div>
    <script>
      let div= document.getElementById('divlegal');
      if(<?php echo $cash_balance; ?> < 0){
        div.style.backgroundColor = 'red';
      }else{
        div.style.backgroundColor = 'green';
      }

  </script>
</section>
<?= $this->endSection() ?>