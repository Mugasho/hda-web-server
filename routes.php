<?php /** @noinspection PhpIncludeInspection */
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 12/25/2018
 * Time: 12:59 PM
 */

header("Content-Type: text/html");
$router = new AltoRouter();
$router->setBasePath('/app');

// Main routes that non-customers see
$router->map('GET|POST','/', 'public/views/home/home.php', 'home');
$router->map('GET','/admin/', 'admin/views/home/index.php', 'admin');
$router->map('GET','/admin/drugs/', 'admin/views/drugs/index.php', 'drugs');
$router->map('GET|POST','/admin/drugs/add/', 'admin/views/drugs/add.php', 'add-drug');
$router->map('GET|POST','/admin/drugs/detail/[*:id]/', 'admin/views/drugs/detail.php', 'drug-detail');
$router->map('GET','/admin/facility/', 'admin/views/facility/index.php', 'facility');
$router->map('GET','/facility/', 'public/views/facility/index.php', 'front-facility');
$router->map('GET|POST','/admin/facility/add/', 'admin/views/facility/add.php', 'add-facility');
$router->map('GET|POST','/admin/facility/detail/[*:id]/', 'admin/views/facility/detail.php', 'facility-detail');
$router->map('GET','/admin/facility/api/', 'admin/views/facility/api.php', 'facilityAPI');
$router->map('GET','/admin/hw/', 'admin/views/hw/index.php', 'hw');
$router->map('GET|POST','/hw/', 'public/views/hw/index.php', 'front-hw');
$router->map('GET|POST','/admin/hw/add/', 'admin/views/hw/add.php', 'hw-add');
$router->map('GET|POST','/admin/hw/detail/[*:id]/', 'admin/views/hw/detail.php', 'hw-detail');
$router->map('GET|POST','/hw/detail/[*:id]/', 'public/views/hw/detail.php', 'front-hw-detail');
$router->map('GET|POST','/admin/hw/edit/[*:id]/', 'admin/views/hw/edit.php', 'hw-edit');
$router->map('GET','/admin/users/', 'admin/views/users/index.php', 'users');
$router->map('GET|POST','/admin/register/', 'admin/views/users/register.php', 'register');
$router->map('POST','/admin/users/api/[*:action]/', 'admin/views/users/api.php', 'userAPI');
$router->map('GET|POST','/admin/login/', 'admin/views/login.php', 'login');

// Special (payments, ajax processing, etc)
$router->map('GET','/charge/[*:customer_id]/','charge.php','charge');
$router->map('GET','/pay/[*:status]/','payment_results.php','payment-results');

// API Routes
$router->map('GET','/facility/api/[*:key]/[*:id]/', 'admin/views/facility/api.php', 'api');
$router->map('GET','/drugs/api/[*:key]/[*:id]/', 'admin/views/drugs/api.php', 'drugs-api');
$router->map('GET','/admin/drugs/api/[*:key]/[*:id]/', 'admin/views/drugs/api.php', 'drugs-limit');

/* Match the current request */
$match = $router->match();
if($match) {
    require $match['target'];
}
else {
    header("HTTP/1.0 404 Not Found");
    require 'utils/404.php';
}