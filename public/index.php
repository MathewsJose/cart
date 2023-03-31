<?php
require dirname(dirname(__FILE__)) . '/vendor' . '/autoload.php';
use App\Models\ProductModel;
use App\Controllers\ProductController;

if(isset($_SERVER['PATH_INFO'])){
    $path= $_SERVER['PATH_INFO'];

    // Do a path split
    $path_split = explode('/', ltrim($path));

}else{
    // Set Path to '/'
    $path_split = '/';
}

if($path_split === '/'){
    /* match with index route
    *   Import IndexController and match requested method with it
    */

    $req_model = new ProductModel();
    $req_controller = new ProductController($req_model);
    /**
     *Model and Controller assignment with first letter as UPPERCASE
     *@return Class;
     */
    $model = $req_model;
    $controller = $req_controller;

    /**
     *Creating an Instance of the the model and the controller each
     *@return Object;
     */
    $ModelObj = new $model;
    $ControllerObj = new $controller($req_model);

    /**
     *Assigning Object of Class Init to a Variable, to make it Usable
     *@return Method Name;
     */
    $method = $req_method;

    /**
     *Check if Controller Exist is not empty, then performs an
     *action on the method;
     *@return true;
     */
    if ($req_method != '')
    {

        /**
         *Outputs The Required controller and the req *method respectively
         *@return Required Method;
         */

        print $ControllerObj->$method($req_param);

    }
    else
    {
        /**
         *This works in only when the Url doesnt have a parameter
         *@return void;
         */
        print $ControllerObj->index();
    }
}else{
    // fetch corresponding controller
    $req_controller = $path_split[1];

    /**
     *Set Required Model name
     *@return model;
     */
    $req_model = $path_split[1];

    /**
     *Set Required Method name
     *@return method;
     */
    $req_method = isset($path_split[2])? $path_split[2] :'';

    /**
     *Set Required Params
     *@return params;
     */
    $req_param = array_slice($path_split, 3);

    /**
     *Check if Controller Exist
     *@return void;
     */
    $req_controller_exists = __DIR__.'/Controllers/'.$req_controller.'Controller.php';

    if (file_exists($req_controller_exists))
    {
        /**
         *Model and Controller assignment with first letter as UPPERCASE
         *@return Class;
         */
        $model = ucfirst($req_model).'Model';
        $controller = ucfirst($req_controller).'Controller';

        /**
         *Creating an Instance of the the model and the controller each
         *@return Object;
         */
        $ModelObj = new $model;
        $ControllerObj = new $controller(ucfirst($req_model.'Model'));

        /**
         *Assigning Object of Class Init to a Variable, to make it Usable
         *@return Method Name;
         */
        $method = $req_method;

        /**
         *Check if Controller Exist is not empty, then performs an
         *action on the method;
         *@return true;
         */
        if ($req_method != '')
        {
            /**
             *Outputs The Required controller and the req *method respectively
             *@return Required Method;
             */

            print $ControllerObj->$method($req_param);

        }
        else
        {
            /**
             *This works in only when the Url doesnt have a parameter
             *@return void;
             */
            print $ControllerObj->index();

        }
    }
    else
    {
        header('HTTP/1.1 404 Not Found');
        die('404 - The file - '.$app->req_controller.' - not found');
        //require the 404 controller and initiate it
        //Display its view
    }
}
?>