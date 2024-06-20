<?php 
// php -S localhost:8000 -t public
require '../vendor/autoload.php';
$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
$router->map('GET', '/', function () {
    echo 'Salut';
});
$router->map('GET', '/nous-contacter', function () {
    echo 'Nous contacter';
});
$router->map('GET', '/blog/[*:slug]-[i:id]', function ($slug, $id) {
    echo "Je suis sur l'article $slug avec le numéro $id";
});
$match = $router->match();
if ($match !== null) {
    require '../elements/header.php';
    call_user_func_array($match['target'],$match['params']);
    require '../elements/footer.php';
}


