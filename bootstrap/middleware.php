<?php

foreach ($container->get('config')->get('app.middlewares') as $middleware) {
    $route->middleware($container->get($middleware));
}
