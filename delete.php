<?php
    require 'database.php';
    $id = 0;

    if(!empty($_GET['id'])){
        $id = $_REQUEST['id'];

        $pdo = Database::connect();
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customers where id = ?";
        $q = $pdo -> prepare($sql);
        $q -> execute(array($id));
        $data = $q -> fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

    if(!empty($_POST)){
        $id = $_POST['id'];

        // Delete from database
        $pdoDel = Database::connect();
        $pdoDel -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlDel = "DELETE FROM customers WHERE id = ?";
        $qDel = $pdoDel -> prepare($sqlDel);
        $qDel -> execute(array($id));
        Database::disconnect();
        header("Location: index.php");
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
             <h3>Delete a Customer</h3>
         </div>
                     
        <form class="form-horizontal" action="delete.php" method="post">
             <input type="hidden" name="id" value="<?php echo $id;?>"/>
             <p class="alert alert-error">Are you sure you want to delete <?php echo $data['name']; ?>?</p>
             <div class="form-actions">
                 <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
             </div>
        </form>
      </div>   
    </div> <!-- /container -->
  </body>
</html>