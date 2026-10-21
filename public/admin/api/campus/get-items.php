<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../../bootstrap.php';
require_once __DIR__ . '/../../../../app/Support/helper.php';

use Serv\CampusService;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $serv = new CampusService();
    $serv->getItems();
} else {
    jsonResponse(400, 'Invalid request.');
}
