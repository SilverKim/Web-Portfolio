<?php 
  require_once('../process/db_connect.php');

  $sql = "SELECT * FROM skill"; //
  $result = mysqli_query($link, $sql);

  if(!$result){
      echo"<script>alert(\"Database Error\");history.back();</script>";
  }

  $language=array();
  $score=array();

  while($row=mysqli_fetch_array($result)){
    $language[]=$row['language'];
    $score[]= $row['score'];
  }
?>

<!DOCTYPE html>
  <head>
  <meta charset="utf-8">
  <title>Skill</title>

  <link rel="stylesheet" type="text/css" href="../css/main.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

  <script type="text/javascript">

    var js_arr1 = <?php echo json_encode($language)?>; //php's language array
    var js_arr2 = <?php echo json_encode($score)?>;  //php's score array 
    var color_arr=["red","red","red","red","#555AF7","#555AF7","#555AF7"]; //for defining color of chart 

    var machine_chart = function() {
      var handleDoughnutDesign = function() {
        $.each(js_arr1, function(index, item){        
          var ctx = document.getElementById("donut_single_" + index).getContext('2d');
          ctx.canvas.width = 150;
          ctx.canvas.height = 150;
          var myChart = new Chart(ctx, {
              type: 'doughnut',
              id : 'column',
              data: {
                  datasets: [{
                      label: 'language',
                      data: [js_arr2[index], 100-js_arr2[index]],
                      backgroundColor: [color_arr[index],"white"],
                      borderWidth: 0
                  }]
              },
              options: {
                  responsive: false,
                  maintainAspectRatio : false,
                  legend: {
                      display: false
                  },
                  tooltips: {
                      enabled: false
                  }
              }
          });
          /** 개발 언어 선언 **/
          $('#language-' + index).html(item); 
        });
      };

      return {
          //main function to initiate the theme
          init: function() {
              handleDoughnutDesign(); // handle material design
          }
      };

    }();   

    //for writing perccentage inside chart
    Chart.pluginService.register({
      beforeDraw: function(chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx,
            type = chart.config.type;

            var oldFill = ctx.fillStyle;
            var fontSize = ((height - chart.chartArea.top) / 100).toFixed(2);

            ctx.restore();
            ctx.font = fontSize + "em sans-serif";
            ctx.textBaseline = "middle"

            var text = '0 %';
            if(chart.config.data.datasets[0].data.length > 0)
                text = chart.config.data.datasets[0].data[0] + "%"; 
            var textX = Math.round((width - ctx.measureText(text).width) / 2);
            var textY = (height + chart.chartArea.top) / 2;

            if(chart.config.data.datasets[0].data.length > 0)
                ctx.fillStyle = chart.config.data.datasets[0].backgroundColor[0];
            ctx.fillStyle = 'black';
            ctx.fillText(text, textX, textY);
            ctx.save();

      }
    });

    //start! 
    $(document).ready(function () {
        machine_chart.init();
    });

    </script>
</head>
<body style="font-family:normal; margin:8px;"> <!-- set a category --> 
    <div id="nav">
        <a href="../app/main.html">PROFILE</a>
        <a href="../app/history.html">HISTORY</a>
        <a href="../app/skill.php">SKILL</a>
        <a href="../app/project.php">PROJECT</a>
        <a href="../app/contact.html">CONTACT</a>
    </div>

    
    <h1 style="font-weight:700" > ▼ Back-end Language </h1>

    <div class="container" style="padding-top: 50px; " >
      <div class="row">
        <div class="col-sm">
          <canvas id="donut_single_0"></canvas>
          <div id='language-0'></div>
        </div>
        <div class="col-sm">
          <canvas id="donut_single_1"></canvas>
       <div id='language-1'></div>
        </div>
        <div class="col-sm">
          <canvas id="donut_single_2"></canvas>
       <div id='language-2'></div>
        </div>
        <div class="col-sm">
          <canvas id="donut_single_3"></canvas>
       <div id='language-3'></div>
        </div>
      </div>
    </div>
    

      <br>

    <h1 style="font-weight:700"> ▼ Front-end Language </h1> 

    <div class="container" style="padding-top: 50px; padding-left:100px; " > 
      <div class="row">
        <div class="col-sm">
          <canvas id="donut_single_4"></canvas>
          <div id='language-4'></div>
        </div>
        <div class="col-sm">
          <canvas id="donut_single_5"></canvas>
       <div id='language-5'></div>
        </div>
        <div class="col-sm">
          <canvas id="donut_single_6"></canvas>
       <div id='language-6'></div>
        </div>
      </div>
    </div>
</body>
</html>