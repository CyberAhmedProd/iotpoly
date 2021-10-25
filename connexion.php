<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <div class="container-fluid">

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="#">Monitoring</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Create</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Energy</a>
        </li>

    </ul>

        <div class="row">
            <div class="col col-md-12">   
                <h1 class="text-center" style="color : red">Liste des Temperatures - humidités</h1>  
            </div>
        </div>
    </div>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "iotproj";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

        ?>
      
        <?php
            if(!empty($_GET['id']))
            {
            
                $sql = "INSERT INTO data (idcapteur, temperature, humidity) VALUES ({$_GET['id']},{$_GET['temp']} , {$_GET['hum']})";
                if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            else
            {
                $sql = "SELECT * FROM data";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                echo "<table class='table table-striped' id='table_capteur'>
                <thead>
                <tr>
                <th>Date</th>
                <th>idCapteur</th>
                <th>Temperature</th>
                <th>Humidity</th>
                </tr>
                </thead>
                <tbody>";
                
                while($row = $result->fetch_assoc()) {
                  
                    echo "<tr>
                    <td>". $row["date"]."</td>
                    <td>". $row["idcapteur"]."</td>
                    <td>". $row["temperature"]."</td>
                    <td>". $row["humidity"]."</td>
                  </tr>";
                   
              
                }
                echo "</tbody>";
                echo "</table>";
                } else {
                echo "0 results";
                }
            }
       
        ?>
        <!-- close connexion -->
        <?php
            $conn->close();
        ?> 

        <div class="row">
            <div class="col col-md-12">
                <canvas id="myChart" width="200" height="200"></canvas>
            </div>

        </div>



     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/chart.min.js"></script>
    <script>
    var items=[]
    $('#table_capteur tbody tr td:nth-child(1)').each( function(){
    items.push( $(this).text() );       
    })
    var resx = JSON.stringify(items);
    var data=[]
    $('#table_capteur tbody tr td:nth-child(3)').each( function(){
    data.push( $(this).text() );       
    })
    var resy = JSON.stringify(data);
    var ctx = document.getElementById('myChart').getContext('2d');
   
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: items,
        datasets: [{
            label: 'Courbe des temperatures',
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
    </body>
</html>