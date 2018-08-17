<?php
    require 'database.php';
    $id = null;
    if(!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if($id == null){
        header("Location: index.php");
    }
    else {
        $pdo = Database::connect();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customers where id = ?";
        $q = $pdo -> prepare($sql);
        $q -> execute(array($id));
        $data = $q -> fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Read a Customer</h3>
            </div>

            <div class="form-horizontal" >
                <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['name'];?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['email'];?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Mobile</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['mobile'];?>
                        </label>
                    </div>
                </div>
                <div class="form-actions">
                    <a class="btn" href="index.php">Back</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

