<?php 
// php -S localhost:8000 -t public
require '../vendor/autoload.php';
$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');

$match = $router->match();
if (is_array($match)) {
    require '../elements/header.php';
    if(is_callable($match['target'])) {
       call_user_func_array($match['target'],$match['params']); 
    } else {
        $params = $match['params'];
        require "../templates/{$match['target']}.php";
    }
    
    require '../elements/footer.php';
} else {
    echo '404';
}


