<?php
declare(strict_types=1);

namespace Repositories;

require_once __DIR__ . '/../core/Database.php';

use Core\Database;
use PDO;

    final class NewsRepository {

        private PDO $conn;

        public function __construct(PDO $db) {
            $this->conn = $db;
        }

        public function getAllNews(): array
        {
            $sql = "SELECT * FROM news";

            $stmt = $this->conn->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>