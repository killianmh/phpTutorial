# phpTutorial

This repo is an app that started by using [this tutorial](http://php.net/manual/en/tutorial.php). It has since grown and is now a full CRUD app which was built using [this PHP CRUD tutorial](https://www.startutorial.com/articles/view/php-crud-tutorial-part-1).

This application uses the PHP CLI SAPI built-in web server. This is appropriate for development, but not production. [More information](http://php.net/manual/en/features.commandline.webserver.php).

The application is connected to MySQL via the pdo_mysql php extension. This extension originally was commented out in the php.ini file under the dynamic extensions section, so I activated it and the application was connected to my SQL database.

I also use the VSCode extension [Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer) which launches a development local server with live reload. Use the alt+L, alt+O shortcuts to start up the local server.

To run this application use the windows command prompt to cd into the directory where the index.php is located. Then use this command to start the php CLI SAPI server : php -S localhost:8000. 
