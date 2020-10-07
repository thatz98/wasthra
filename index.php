<?php

require 'config/paths.php';
require 'config/database.php';
require 'config/constants.php';
require 'util/authenticate.php';



spl_autoload_register( function($class) {
    if (is_file(LIBS.$class.'.php')) {
        require LIBS.$class.'.php';
    }
});



/*require 'libs/Wastrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Database.php';
require 'libs/Session.php';
*/


$app = new Wastrap();






?>
