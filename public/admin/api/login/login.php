<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../../bootstrap.php';
require_once __DIR__ . '/../../../../app/Support/helper.php';

use Core\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $user->login();
} else {
    jsonResponse(405, 'Method not allowed.');
}
