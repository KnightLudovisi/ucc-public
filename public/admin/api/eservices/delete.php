<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../../bootstrap.php';
require_once __DIR__ . '/../../../../app/Support/helper.php';

use Serv\EServicesService;
use Core\Token;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Token::verify($_POST['csrf_key'] ?? null)) {
        jsonResponse(403, 'Invalid CSRF token.');
    }

    $serv = new EServicesService();
    $serv->deleteItem();
} else {
    jsonResponse(400, 'Invalid request.');
}
