<?php
require 'custcreate.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer creation form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="container form-group">
        <form action="custcreate.php" method="post">
            First Name:<input class="form-control" type="text" name="custFirstName"><BR>
            Last Name:<input class="form-control" type="text" name="custLastName"><BR>
            Street:<input class="form-control" type="text" name="custAddStr"><BR>
            House Nr.:<input class="form-control" type="text" name="custAddNr"><BR>
            Phone:<input class="form-control" type="text" name="custPhone"><BR>
            Email:<input class="form-control" type="text" name="custEmail"><BR>
            <button class="btn-primary" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>