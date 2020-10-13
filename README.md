Kronos is a single entry point microframework for APIs. The files for your application should go inside the app folder.
The entry point for your routes is the app.php file where you can create an autoloader to dynamically load your router function files.

Kronos es un microframework para APs. Los archivos de tu aplicacion deberian ir dentro de la carpeta app.
El punto de inicio de tu aplicacion es el archivo app.php donde puedes crear un autoloader para cargar de forma dinamica tus funciones para el enrutador.

------------------------------------------------------------------------------------------------------------------------------------------------------

You can easily create routes with a Lumen-like routing system.
By accessing the $app variable and using the router property you can specify the type of request.
The framework will lock al the other methods if there is no route for that method. 

Puedes crear rutas facilmente con un sistema de rutas parecido al de Lumen.
Accediendo a la variable $app y usando la propiedad router puedes especificar el tipo de peticion.
El framework bloqueara todos los demas métodos en caso de no existir una ruta.

    $app->router->get('/', function ($req, $res) {
        
        $res->code(400);
        
        $res->send($res->json("THIS IS HOME"));
    }); 


----------------------------------------------------------------------------------------------------------------------------------------------------

Additionally you can pass parameters through your url and they will be available in the route function. To create this parameters just wrap them with a set of brackets '{}'.

Tambien puedes pasar parametros a travez de a URL y van a estar disponibles en la funcion de la ruta. Para crear estos parametros simplemente envuelvelos con un par de brackets.


    $app->router->get('/user/{name}/scoreboard/{id}', function ($req, $res) {
        
        $res->code(200);
        
        $res->send($res->json("THIS IS THE SCOREBOARD " . $req->params['id'] . ' FOR THE USER ' . $req->params['name']));
    
    });


Here you can see the 'name' and 'id' parameters being used. All the parameters are part of the request object in a Express-like fashion.

Aqui puedes ver los parametros "nombre" y "id" en uso. Todos los parametros son parte del objeto de peticion en un sistema parecido a Express.
