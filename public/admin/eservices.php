<?php
declare(strict_types=1);

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../app/Support/helper.php';

use Core\User;
use Core\Token;

User::requireAuthentication();

$pageTitle = 'E-Services';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>UCC Admin | E-Services</title>
    <link rel="icon" type="image/png" href="assets/images/ucc-LOGO.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/posts.css">
</head>
<body>
    <div class="dashboard-layout">
        <?php require __DIR__ . '/template/sidebar.php' ?>
        <main class="main-content">
            <?php require __DIR__ . '/template/header.php' ?>
            <section class="posts-page">
                <div class="posts-intro">
                    <div>
                        <p>Manage the online services and external resources available to the UCC community.</p>
                    </div>
                </div>
                <div class="posts-toolbar">
                    <div class="posts-tools-left">
                        <div class="posts-search">
                            <input type="search" id="search" placeholder="Search e-services..." aria-label="Search e-services">
                            <i data-lucide="search"></i>
                        </div>
                        <select id="filter" class="posts-filter" aria-label="Filter e-services">
                            <option value="all">All statuses</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <select id="sort" class="posts-filter"aria-label="Order e-services">
                            <option value="created-desc">Newest created</option>
                            <option value="created-asc">Oldest created</option>
                            <option value="name-desc">Name: Z–A</option>
                            <option value="name-asc">Name: A–Z</option>
                        </select>
                    </div>
                    <button type="button" id="addBtn" class="post-btn post-btn-primary"><i data-lucide="plus"></i>Add E-Service</button>
                </div>

                <div class="posts-card">
                    <div class="posts-card-head">
                        <h2>E-Services</h2>
                        <span id="itemCount" class="posts-count">0 services</span>
                    </div>
                    <div class="posts-table-wrap">
                        <table class="posts-table">
                            <thead>
                                <tr>
                                    <th class="col-logo">Logo</th>
                                    <th class="col-name">Service Name</th>
                                    <th class="col-link">Link</th>
                                    <th class="col-status">Status</th>
                                    <th class="col-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr id="itemTemplate" class="post-row-template" data-table-item aria-hidden="true">
                                    <td><div class="featured-thumb"><i data-lucide="globe"aria-hidden="true"></i></div></td>
                                    <td class="post-title-cell"><span class="cell-ellipsis"></span></td>
                                    <td><span class="cell-ellipsis"></span></td>
                                    <td><span class="status-badge"></span></td>
                                    <td><div class="action-buttons">
                                        <button type="button" class="action-btn" data-action="preview" title="Preview service" aria-label="Preview service"><i data-lucide="eye"></i></button>
                                        <button type="button" class="action-btn edit" data-action="edit" title="Edit service" aria-label="Edit service"><i data-lucide="pencil"></i></button>
                                        <button type="button" class="action-btn delete" data-action="delete" title="Delete service" aria-label="Delete service"><i data-lucide="trash-2"></i></button>
                                    </div></td>
                                </tr>
                                <tr id="emptyItem" hidden><td colspan="5" class="empty-row">No e-services found</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="posts-list-controls">
                    <button type="button" id="showMoreBtn" class="posts-show-more"hidden>Show more</button>
                    <p id="lastItemMessage" class="posts-end-message" hidden>-- No more items --</p>
                </div>

                <div id="mainModal" class="post-modal" aria-hidden="true">
                    <div class="post-modal-backdrop" data-close-modal></div>
                    <div class="post-modal-panel" role="dialog" aria-modal="true" aria-labelledby="postFormTitle">
                        <div class="post-modal-head">
                            <div><h2 id="formTitle">Add E-Service</h2><p id="postFormDescription">Enter the information for this e-service.</p></div>
                            <button type="button" id="exitBtn" class="modal-close" data-close-modal aria-label="Close service form"><i data-lucide="x"></i></button>
                        </div>
                        <form id="form" class="post-form" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_key" value="<?= e(Token::generate()) ?>" id="csrf">
                            <input type="hidden" name="item_id" id="itemId" value="0">
                            <input type="hidden" name="remove_image" id="removeImageInput" value="false">
                            <div class="image-upload-area">
                                <div id="uploadImagePlaceholder"class="upload-placeholder"><i data-lucide="globe"></i><strong>Service Logo</strong></div>
                                <img id="imagePreview" class="image-preview" alt="Service logo preview">
                                <input type="file" name="logo" id="image" accept="image/png, image/jpeg, image/webp, image/svg+xml" hidden>
                                <button type="button" id="uploadImageBtn" class="post-btn post-btn-ghost"><i data-lucide="upload"></i>Choose Photo</button>
                                <button type="button" id="removeImageBtn" class="post-btn post-btn-danger" hidden><i data-lucide="x"></i>Remove Photo</button>
                            </div>
                            <div class="form-grid">
                                <label class="form-field full-width"><span>Service Name</span><input type="text" name="name" id="name" placeholder="Enter service name" maxlength="180" required></label>
                                <label class="form-field full-width"><span>Status</span><select name="status" id="status"required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select></label>
                                <label class="form-field full-width"><span>Description</span>
                                    <textarea name="description" id="description" rows="4" maxlength="500" placeholder="Enter service description" required></textarea>
                                </label>
                                <label class="form-field full-width"><span>Website URL</span><input type="url" name="url" id="url" placeholder="https://example.com"></label>
                            </div>
                            <div class="form-actions">
                                <button type="button" id="cancelBtn" class="post-btn post-btn-ghost form-cancel" data-close-modal>Cancel</button>
                                <div class="form-actions-right">
                                    <button type="button" id="formPreviewBtn" class="post-btn post-btn-ghost"><i data-lucide="eye"></i>Preview</button>
                                    <button type="submit" id="saveBtn" class="post-btn post-btn-primary"><i data-lucide="save"></i>Save Service</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="previewModal"class="post-modal preview-modal" aria-hidden="true">
                    <div class="post-modal-backdrop" data-close-preview></div>
                    <article class="post-modal-panel post-preview-panel" role="dialog" aria-modal="true" aria-labelledby="previewHeading">
                        <div class="post-modal-head">
                            <div><h2 id="previewHeading"> E-Service Preview</h2></div>
                            <button type="button" id="exitPreviewBtn" class="modal-close" data-close-preview aria-label="Close service preview"><i data-lucide="x"></i></button>
                        </div>
                        <div class="public-post-preview">
                            <div id="previewImageWrap" class="preview-image-wrap"><div id="previewImageDefault"class="preview-default-image"><i data-lucide="globe"></i><span>Service Logo</span></div><img id="previewImage" alt="Service logo" hidden></div>
                            <div class="preview-article-body">
                                <h2 id="previewName">Service Name</h2>
                                <p id="previewDescription" class="preview-content">Service description will appear here.</p>
                                <p id="previewURL" class="preview-excerpt"></p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="ui-toast" id="uiToast" role="status" aria-live="polite"></div>
            </section>
        </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/common.js"></script>
<script src="js/eservices.js"></script>
</body>
</html>
