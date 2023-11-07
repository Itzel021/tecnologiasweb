<?php
    //Hacer referencia al namespace de la clase
    use Webtechnologies\Models\User as User;//Alias para la clase
    //use Webtechnologies\Controllers\AccountController as AccountController;
    //use Webtechnologies\Views\AccountController as AccountController;
    //Cargar el código de la clase que se usa en ese momento
    require_once __DIR__.'/app/start.php';

    $user = new User();
    //$user = new UserTemplate();
    //$user = new UserController();
    //$user = new Account();
    //$user = new AccountTemplate();
    //$user = new AccountController();
?>