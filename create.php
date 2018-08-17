<?php
    require 'database.php';

    // Check if $_POST superglobal contains anything (only post to database upon user input)
    if( !empty($_POST)) {
        // initialize validation errors as null
        $nameError = null;
        $emailError = null;
        $mobileError = null;

        // set local variables equal to superglobal form $_POST variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        // validate input
        $valid = true;

        if( empty($name) ){
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if( empty($email) ){
            $emailError = 'Please enter email address';
            $valid = false;
        } 
        else if( !filter_var($email,FILTER_VALIDATE_EMAIL) ){
            $emailError = 'Please enter a valid email address';
            $valid = false;
        }

        if( empty($mobile) ){
            $mobileError = 'Please enter a mobile number';
            $valid = false;
        }

        // if validations passed, enter new record in MySQL database
        if( $valid ){
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile));
            Database::disconnect();
            header("Location: index.php");
        }

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
                <h3>Create a Customer</h3>
            </div>
            <form class="form-horizontal" action="create.php" method="post">
                <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" name="name" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                        <?php if ( !empty($nameError) ): ?>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <input type="text" name="email" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                        <?php if ( !empty($emailError) ): ?>
                            <span class="help-inline"><?php echo $emailError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                    <label class="control-label">Mobile Number</label>
                    <div class="controls">
                        <input type="text" name="mobile" placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                        <?php if ( !empty($mobileError) ): ?>
                            <span class="help-inline"><?php echo $mobileError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>