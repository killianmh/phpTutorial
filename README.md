# phpTutorial

This repo loosely follows the beginning introduction to PHP using [this tutorial](http://php.net/manual/en/tutorial.php).

This will be followed up by another repo for a more complex, dynamic full-stack web application utilizing PHP. 

This application uses the PHP CLI SAPI built-in web server. This is appropriate for development, but not production. [More information] (http://php.net/manual/en/features.commandline.webserver.php).

The application is connected to MySQL via the pdo_mysql php extension. This extension originally was commented out in the php.ini file under the dynamic extensions section, so I activated it and the application was connected to my SQL database.

I also use the VSCode extension [Live Server] (https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer) which launches a development local server with live reload. Use the alt+L, alt+O shortcuts to start up the local server.

To run this application, start the php CLI SAPI server using the windows command prompt to cd into the directory where the index.php is located. Then use this command: php -S localhost:8000. 
