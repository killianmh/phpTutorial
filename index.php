<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
    <?php   //echo '<p>Hello World test this is cool haha</p>';
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false){
                echo 'You are using IE.<br />';
            } 
            else{
                echo 'You are NOT using IE.<br />';
            }
            // echo $_SERVER['HTTP_USER_AGENT'];
            // phpinfo();
    ?> 
 </body>
</html>