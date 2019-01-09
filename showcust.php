<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <script>
$(document).ready(function(){
  $("#filterInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#custTable tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

    <style>
    table{
        text-align: left;
        margin-top: 50px;
        width: 100%;
    }
    tr{
        text-align: center;
    }
    td{
        text-align: left;
    }
    </style>
</head>
<body>
    <div class="container form-group">
        <form action="showcust.php" method="get">
            <!-- First Name:<input class="form-control" type="text" name="custFirstName"><BR>
            Last Name:<input class="form-control" type="text" name="custLastName"><BR>
            Street:<input class="form-control" type="text" name="custAddStr"><BR>
            House Nr.:<input class="form-control" type="text" name="custAddNr"><BR>
            Phone:<input class="form-control" type="text" name="custPhone"><BR>
            Email:<input class="form-control" type="text" name="custEmail"><BR>
            <button class="btn-primary" type="submit">Search</button> -->
        </form>
        <h2>Filter Customers</h2>
        <input class="form-control" type="text" name="filterInput" id="filterInput" placeholder="Filter value..">
    </div>
</body>
</html>


<?php



try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=crm', 'root', 'toortoor');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
try {
    // $statement = $pdo->prepare("SELECT * FROM cust_info");
    $sql = 'SELECT * FROM cust_info';
    $res = $pdo->query($sql);
    if ($res->rowCount() > 0) {
        echo "<div class=\"container\">";
        echo "<table id=\"custTable\" class=\"table table-striped table-hover\" >"; 
        echo "<thead class=\"thead-dark\">";
        echo "<tr>"; 
        echo "<th>Firstname</th>"; 
        echo "<th>Lastname</th>"; 
        echo "<th>Address Street</th>"; 
        echo "<th>HouseNr.</th>"; 
        echo "<th>Phone</th>"; 
        echo "<th>Email</th>";
        echo "</tr>"; 
        echo "</thead>";
        echo "<tbody>";
        while ($row = $res->fetch()) {
            echo "<tr>"; 
            echo "<td>".$row['custFirstName']."</td>"; 
            echo "<td>".$row['custLastName']."</td>"; 
            echo "<td>".$row['custAddStr']."</td>";
            echo "<td>".$row['custAddNr']."</td>"; 
            echo "<td>".$row['custPhone']."</td>"; 
            echo "<td>".$row['custEmail']."</td>"; 
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        unset($res);
    } else {
        echo "No matching records found";
    }


} catch (PDOException $e) {
    var_dump($sql);
    die($e->getMessage());
}

?>