<?php
declare(strict_types=1);

namespace Serv;

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../Support/helper.php';

use Repo\BORRepository;
use Core\UploadedImage;
use Core\Database;
use RuntimeException;

final class BORService {
    private array $statusKeys = ['active', 'hidden'];

    public function save() {
        $post = $_POST;
        $borId = (int) ($post['bor_id'] ?? 0);
        $name = trim($post['name'] ?? '');
        $position = trim($post['position'] ?? '');
        $bio = trim($post['bio'] ?? '');
        $status = $post['status'] ?? '';

        if ($name === '') {
            jsonResponse(422, 'Name cannot be empty.');
        }

        if ($position === '') {
            jsonResponse(422, 'Position cannot be empty.');
        }

        if ($bio === '') {
            jsonResponse(422, 'Biography cannot be empty.');
        }

        if (!in_array($status, $this->statusKeys, true)) {
            jsonResponse(422, 'Invalid status.');
        }

        $removeImage = ($post['remove_image'] ?? '0') === '1';
        $filename = null;
        $repo = new BORRepository(Database::connect());

        if ($borId !== 0) {
            $existingBor = $repo->fetchBor($borId);
            
            if (!$existingBor) {
                jsonResponse(400, 'Regent not found.');
            } 

            // Use stored image from db
            $filename = $existingBor['image'];

            // Remove image from db if remove is selected
            if ($removeImage) {
                $filename = null;
            }
        }

        // Won't run if filename is null (no value in $_FILES)
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            try {
                $image = new UploadedImage();

                $tempFile = $image->verify($_FILES['image'] ?? []);

                if ($tempFile === false) {
                    jsonResponse(422, 'The uploaded image is invalid.');
                }

                $filename = $image->store(
                    $tempFile,
                    __DIR__ . '/../../public/admin/storage/uploads'
                ); 
            } catch (RuntimeException $e) {
                error_log($e->getMessage());
                jsonResponse(500, 'An unexpected error occurred while processing the image.');
            }
        }

        $data = [
            'bor_id' => $borId,
            'name' => $name,
            'position' => $position,
            'bio' => $bio,
            'image' => $filename,
            'status' => $status,
            'author_id' => $_SESSION['user_id'],
            'editor_id' => $_SESSION['user_id'],
        ];

        if ($borId !== 0) {
            $repo->update($data); 
        } else {
            $repo->insert($data);
        }

        jsonResponse(200, 'Regent saved successfully.');
    }

    public function filter(): void {
        $search = trim($_GET['search'] ?? '');
        $filter = $_GET['filter'] ?? 'all';

        $repo = new BORRepository(Database::connect());
        $bors = $repo->fetchFilteredBors($search, $filter);

        ob_start();

        require __DIR__ . '/../../public/admin/template/bor-table.php';

        $html = ob_get_clean();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            'html' => $html,
            'count' => count($bors)
        ]);

        exit;
    }

    public function view(): void {
        $borId = (int) ($_GET['bor_id'] ?? 0);

        if ($borId <= 0) {
            jsonResponse(400, 'Invalid regent ID.');
        }

        $repo = new BORRepository(Database::connect());
        $bor = $repo->fetchBor($borId);

        if (!$bor) {
            jsonResponse(404, 'Board of Regent not found.');
        }

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            'id' => $bor['id'],
            'name' => $bor['name'],
            'position' => $bor['position'],
            'bio' => $bor['bio'],
            'image' => $bor['image'],
            'status' => $bor['status']
        ]);

        exit;
    }

    public function edit(): void {
        $borId = (int) ($_GET['bor_id'] ?? 0);

        if ($borId <= 0) {
            jsonResponse(400, 'Invalid regent ID.');
        }

        $repo = new BORRepository(Database::connect());
        $bor = $repo->fetchBor($borId);

        if (!$bor) {
            jsonResponse(400, 'Board of Regent not found.');
        }

        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            'bor' => $bor
        ]);

        exit;
    }

    public function remove(): void {
        $borId = (int) ($_POST['bor_id'] ?? 0);

        if ($borId === 0) {
            jsonResponse(400, 'Invalid regent ID.');
        }

        $repo = new BORRepository(Database::connect());
        $repo->inactiveBor($borId);

        jsonResponse(200, 'Regent successfully removed.');
    }
}
