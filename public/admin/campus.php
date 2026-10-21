<?php
declare(strict_types=1);

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../app/Support/helper.php';

use Core\User;
use Core\Token;

User::requireAuthentication();

$pageTitle = 'Campuses';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCC Admin | Campuses</title>

    <link rel="icon" type="image/png" href="assets/images/ucc-LOGO.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/posts.css">

    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="dashboard-layout">

    <?php require __DIR__ . '/template/sidebar.php'; ?>

    <main class="main-content">
        <?php require __DIR__ . '/template/header.php'; ?>

        <section class="posts-page">
            <div class="posts-intro">
                <div>
                    <p>Manage campus details, contact information, and locations.</p>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="posts-toolbar">
                <div class="posts-tools-left">
                    <div class="posts-search">
                        <input
                            type="search"
                            id="search"
                            placeholder="Search campuses..."
                            aria-label="Search campuses"
                        >
                        <i data-lucide="search"></i>
                    </div>

                    <select id="filter" class="posts-filter" aria-label="Filter campuses">
                        <option value="all">All statuses</option>
                        <option value="active">Active</option>
                        <option value="hidden">Hidden</option>
                    </select>

                    <select id="sort" class="posts-filter" aria-label="Sort campuses">
                        <option value="created-desc">Newest created</option>
                        <option value="created-asc">Oldest created</option>
                        <option value="name-asc">Name: A–Z</option>
                        <option value="name-desc">Name: Z–A</option>
                    </select>
                </div>

                <button type="button" id="addBtn" class="post-btn post-btn-primary">
                    <i data-lucide="plus"></i>
                    Add Campus
                </button>
            </div>

            <!-- Campus table -->
            <div class="posts-card">
                <div class="posts-card-head">
                    <h2>Campuses</h2>
                    <span id="itemCount" class="posts-count">0 campuses</span>
                </div>

                <div class="posts-table-wrap">
                    <table class="posts-table">
                        <thead>
                        <tr>
                            <th class="col-logo">Image</th>
                            <th class="col-name">Campus Name</th>
                            <th class="col-address">Address</th>
                            <th class="col-status">Status</th>
                            <th class="col-actions">Actions</th>
                        </tr>
                        </thead>

                        <tbody id="tableBody">
                        <!-- JavaScript clones this row -->
                        <tr id="itemTemplate" class="post-row-template" aria-hidden="true">
                            <td>
                                <div class="featured-thumb">
                                    <i data-lucide="image"></i>
                                </div>
                            </td>

                            <td class="post-title-cell">
                                <span class="cell-ellipsis"></span>
                            </td>

                            <td>
                                <a
                                    class="campus-map-link"
                                    href="#"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i data-lucide="map-pin"></i>
                                    <span class="cell-ellipsis"></span>
                                </a>
                            </td>

                            <td>
                                <span class="status-badge"></span>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <button
                                        type="button"
                                        class="action-btn"
                                        data-action="preview"
                                        aria-label="Preview campus"
                                        title="Preview"
                                    >
                                        <i data-lucide="eye"></i>
                                    </button>

                                    <button
                                        type="button"
                                        class="action-btn edit"
                                        data-action="edit"
                                        aria-label="Edit campus"
                                        title="Edit"
                                    >
                                        <i data-lucide="pencil"></i>
                                    </button>

                                    <button
                                        type="button"
                                        class="action-btn delete"
                                        data-action="delete"
                                        aria-label="Delete campus"
                                        title="Delete"
                                    >
                                        <i data-lucide="trash-2"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr id="emptyItem" hidden>
                            <td colspan="5" class="empty-row">
                                No campuses found.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="posts-list-controls">
                <button
                    type="button"
                    id="showMoreBtn"
                    class="posts-show-more"
                    hidden
                >
                    Show more
                </button>

                <p id="lastItemMessage" class="posts-end-message" hidden>
                    -- No more items --
                </p>
            </div>

            <!-- Add/Edit modal -->
            <div id="mainModal" class="post-modal" aria-hidden="true">
                <div class="post-modal-backdrop" data-close-modal></div>

                <div
                    class="post-modal-panel"
                    role="dialog"
                    aria-modal="true"
                    aria-labelledby="formTitle"
                >
                    <div class="post-modal-head">
                        <div>
                            <h2 id="formTitle">Add Campus</h2>
                            <p id="postFormDescription">
                                Enter the information for this campus.
                            </p>
                        </div>

                        <button
                            type="button"
                            id="exitBtn"
                            class="modal-close"
                            data-close-modal
                            aria-label="Close campus form"
                        >
                            <i data-lucide="x"></i>
                        </button>
                    </div>

                    <form id="form" class="post-form" enctype="multipart/form-data">
                        <input
                            type="hidden"
                            name="csrf_key"
                            id="csrf"
                            value="<?= e(Token::generate()) ?>"
                        >

                        <input type="hidden" name="item_id" id="itemId" value="0">

                        <input
                            type="hidden"
                            name="remove_image"
                            id="removeImageInput"
                            value="false"
                        >

                        <!-- Image upload -->
                        <div class="image-upload-area">
                            <div id="uploadImagePlaceholder" class="upload-placeholder">
                                <i data-lucide="image"></i>
                                <strong>Campus Image</strong>
                            </div>

                            <img
                                id="imagePreview"
                                class="image-preview"
                                alt="Campus image preview"
                                hidden
                            >

                            <input
                                type="file"
                                name="image"
                                id="image"
                                accept="image/png,image/jpeg,image/webp"
                                hidden
                            >

                            <button
                                type="button"
                                id="uploadImageBtn"
                                class="post-btn post-btn-ghost"
                            >
                                <i data-lucide="upload"></i>
                                Choose Photo
                            </button>

                            <button
                                type="button"
                                id="removeImageBtn"
                                class="post-btn post-btn-danger"
                                hidden
                            >
                                <i data-lucide="x"></i>
                                Remove Photo
                            </button>
                        </div>

                        <!-- Campus fields -->
                        <div class="form-grid">
                            <label class="form-field full-width">
                                <span>Campus Name</span>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Enter campus name"
                                    maxlength="180"
                                    required
                                >
                            </label>

                            <label class="form-field full-width">
                                <span>Email</span>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Enter campus email"
                                    maxlength="255"
                                >
                            </label>

                            <label class="form-field full-width">
                                <span>Address</span>
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    placeholder="Enter campus address"
                                    maxlength="500"
                                    required
                                >
                            </label>

                            <label class="form-field full-width">
                                <span>Status</span>
                                <select name="status" id="status" required>
                                    <option value="active">Active</option>
                                    <option value="hidden">Hidden</option>
                                </select>
                            </label>

                            <label class="form-field full-width">
                                <span>Contact Information</span>
                                <textarea
                                    name="contact"
                                    id="contact"
                                    rows="4"
                                    maxlength="1000"
                                    placeholder="Enter phone number or other contact details"
                                ></textarea>
                            </label>

                            <label class="form-field full-width">
                                <span>Location / Google Maps URL</span>
                                <input
                                    type="url"
                                    name="url"
                                    id="url"
                                    placeholder="Paste Google Maps URL"
                                >
                            </label>
                        </div>

                        <!-- Form actions -->
                        <div class="form-actions">
                            <button
                                type="button"
                                id="cancelBtn"
                                class="post-btn post-btn-ghost form-cancel"
                                data-close-modal
                            >
                                Cancel
                            </button>

                            <div class="form-actions-right">
                                <button
                                    type="button"
                                    id="formPreviewBtn"
                                    class="post-btn post-btn-ghost"
                                >
                                    <i data-lucide="eye"></i>
                                    Preview
                                </button>

                                <button
                                    type="submit"
                                    id="saveBtn"
                                    class="post-btn post-btn-primary"
                                >
                                    <i data-lucide="save"></i>
                                    Save Campus
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Preview modal -->
            <div
                id="previewModal"
                class="post-modal preview-modal"
                aria-hidden="true"
            >
                <div class="post-modal-backdrop" data-close-preview></div>

                <article
                    class="post-modal-panel post-preview-panel"
                    role="dialog"
                    aria-modal="true"
                    aria-labelledby="previewHeading"
                >
                    <div class="post-modal-head">
                        <h2 id="previewHeading">Campus Preview</h2>

                        <button
                            type="button"
                            id="exitPreviewBtn"
                            class="modal-close"
                            data-close-preview
                            aria-label="Close campus preview"
                        >
                            <i data-lucide="x"></i>
                        </button>
                    </div>

                    <div class="public-post-preview">
                        <div id="previewImageWrap" class="preview-image-wrap">
                            <div
                                id="previewImageDefault"
                                class="preview-default-image"
                            >
                                <i data-lucide="image"></i>
                                <span>Campus Image</span>
                            </div>

                            <img
                                id="previewImage"
                                alt="Campus image"
                                hidden
                            >
                        </div>

                        <div class="preview-article-body">
                            <h2 id="previewCampusName">Campus Name</h2>

                            <p
                                id="previewCampusEmail"
                                class="preview-excerpt"
                            ></p>

                            <p
                                id="previewCampusAddress"
                                class="preview-content"
                            ></p>

                            <p
                                id="previewCampusContact"
                                class="preview-content"
                            ></p>

                            <a
                                id="previewCampusMap"
                                href="#"
                                target="_blank"
                                rel="noopener noreferrer"
                                hidden
                            >
                                <i data-lucide="map-pin"></i>
                                View on Google Maps
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <div
                class="ui-toast"
                id="uiToast"
                role="status"
                aria-live="polite"
            ></div>
        </section>
    </main>
</div>

<script src="js/common.js"></script>
<script src="js/campus.js"></script>
</body>
</html>
