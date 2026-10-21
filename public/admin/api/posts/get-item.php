<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../../bootstrap.php';
require_once __DIR__ . '/../../../../app/Support/helper.php';

use Serv\PostsService;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $serv = new PostsService();
    $serv->getItem();
} else {
    jsonResponse(400, 'Invalid request.');
}
