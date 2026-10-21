<?php
declare(strict_types=1);

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../app/Support/helper.php';

use Repo\PostsRepository;
use Core\User;
use Core\Database;
use Core\Token;

User::requireAuthentication();

$pageTitle = 'Posts';

$repo = new PostsRepository(Database::connect());
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>UCC Admin | Posts </title>
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
                    <div><p>View, organize, and maintain posts published on the university website.</p></div>
                </div>
                <div class="posts-toolbar">
                    <div class="posts-tools-left">
                        <div class="posts-search">
                            <input type="search" id="search" placeholder="Search posts..." aria-label="Search posts">
                            <i data-lucide="search"></i>
                        </div>
                        <select id="filter" class="posts-filter" aria-label="Filter posts">
                            <option value="all">All statuses</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="pending">Pending</option>
                        </select>
                        <select id="sort" class="posts-filter" aria-label="Order posts">
                            <option value="created-desc">Newest created</option>
                            <option value="created-asc">Oldest created</option>
                            <option value="published-desc">Publish date: newest</option>
                            <option value="published-asc">Publish date: oldest</option>
                            <option value="title-desc">Title: Z–A</option>
                            <option value="title-asc">Title: A–Z</option>
                        </select>
                    </div>
                    <button type="button" id="addBtn" class="post-btn post-btn-primary"><i data-lucide="plus"></i> Add New Post</button>
                </div>

                <div class="posts-card">
                    <div class="posts-card-head">
                        <h2>Posts</h2>
                        <span id="itemCount" class="posts-count">0 posts</span>
                    </div>
                    <div class="posts-table-wrap">
                        <table class="posts-table">
                            <thead>
                                <tr>
                                    <th class="col-image">Image</th>
                                    <th class="col-title">Title</th>
                                    <th class="col-category">Category</th>
                                    <th class="col-date">Publish Date</th>
                                    <th class="col-status">Status</th>
                                    <th class="col-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr id="itemTemplate" class="post-row-template" data-table-item aria-hidden="true">
                                    <td><div class="featured-thumb"><i data-lucide="image" aria-hidden="true"></i></div></td>
                                    <td class="post-title-cell"><span class="cell-ellipsis"></span></td>
                                    <td><span class="cell-ellipsis category-text"></span></td>
                                    <td><span class="cell-ellipsis"></span></td>
                                    <td><span class="status-badge"></span></td>
                                    <td><div class="action-buttons">
                                        <button type="button" class="action-btn" data-action="preview" title="Preview post" aria-label="Preview post"><i data-lucide="eye"></i></button>
                                        <button type="button" class="action-btn edit" data-action="edit" title="Edit post" aria-label="Edit post"><i data-lucide="pencil"></i></button>
                                        <button type="button" class="action-btn archive" data-action="archive" title="Archive post" aria-label="Archive post"><i data-lucide="archive"></i></button>
                                    </div></td>
                                </tr>
                                <tr id="emptyItem" hidden><td colspan="6" class="empty-row">No posts found.</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="posts-list-controls">
                    <button type="button" id="showMoreBtn" class="posts-show-more" hidden>Show more</button>
                    <p id="lastItemMessage" class="posts-end-message" hidden>-- No more items --</p>
                </div>

                <div id="postModal" class="post-modal" aria-hidden="true">
                    <div class="post-modal-backdrop" data-close-modal></div>
                    <div class="post-modal-panel" role="dialog" aria-modal="true" aria-labelledby="postFormTitle">
                        <div class="post-modal-head">
                            <div><h2 id="postFormTitle">Add New Post</h2><p id="postFormDescription">Create a post for the university website.</p></div>
                            <button type="button" id="exitBtn" class="modal-close" data-close-modal aria-label="Close post form"><i data-lucide="x"></i></button>
                        </div>
                        <form id="postForm" class="post-form" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_key" value="<?= e(Token::generate()) ?>" id="csrf">
                            <input type="hidden" name="id" id="postId" value="0">
                            <input type="hidden" name="remove_image" id="removeImageInput" value="false">
                            <div class="image-upload-area">
                                <div id="uploadPlaceholder" class="upload-placeholder"><i data-lucide="image-plus"></i><strong>Featured Image</strong></div>
                                <img id="imagePreview" class="image-preview" alt="Featured image preview">
                                <input type="file" name="featured_image" id="featuredImage" accept="image/png, image/jpeg, image/webp" hidden>
                                <button type="button" id="uploadImageBtn" class="post-btn post-btn-ghost"><i data-lucide="upload"></i> Choose Photo</button>
                                <button type="button" id="removeImageBtn" class="post-btn post-btn-danger" hidden><i data-lucide="x"></i> Remove Photo</button>
                            </div>
                            <div class="form-grid">
                                <label class="form-field full-width"><span>Post Title</span><input type="text" name="title" id="title" placeholder="Enter post title" maxlength="180" required></label>
                                <label class="form-field full-width"><span>Excerpt</span><textarea name="excerpt" id="excerpt" rows="3" maxlength="320" placeholder="Write a short summary for the post"></textarea></label>
                                <label><span>Category</span><select name="category_id" id="category" required>
                                    <?php foreach (($repo->fetchCategories() ?? []) as $category): ?>
                                        <option value="<?= e((string) $category['id'] ?? '') ?>"><?= e($category['name'] ?? '') ?></option>
                                    <?php endforeach; ?>
                                </select></label>
                                <label><span>Status</span><select name="status" id="status" required>
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select></label>
                                <label class="publish-date-field"><span>Publish Date</span><input type="date" name="publish_date" id="publishDate" min="<?= date('Y-m-d', time()) ?>" required></label>
                            </div>
                            <label class="content-field"><span>Content</span>
                                <textarea name="content" id="content" class="content-editor" rows="7" placeholder="Write your post content here..." required></textarea>
                            </label>
                            <div class="form-actions">
                                <button type="button" id="cancelBtn" class="post-btn post-btn-ghost form-cancel" data-close-modal>Cancel</button>
                                <div class="form-actions-right">
                                    <button type="button" id="formPreviewBtn" class="post-btn post-btn-ghost"><i data-lucide="eye"></i> Preview</button>
                                    <button type="submit" id="saveBtn" class="post-btn post-btn-primary"><i data-lucide="save"></i> Save Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="previewModal" class="post-modal preview-modal" aria-hidden="true">
                    <div class="post-modal-backdrop" data-close-preview></div>
                    <article class="post-modal-panel post-preview-panel" role="dialog" aria-modal="true" aria-labelledby="previewTitle">
                        <div class="post-modal-head"><div><h2>Post Preview</h2></div><button type="button" id="exitPreviewBtn" class="modal-close" data-close-preview aria-label="Close preview"><i data-lucide="x"></i></button></div>
                        <div class="public-post-preview">
                            <div id="previewImageWrap" class="preview-image-wrap"><div id="previewImageDefault" class="preview-default-image"><i data-lucide="image"></i><span>Featured image</span></div><img id="previewImage" alt="Post featured image" hidden></div>
                            <div class="preview-article-body">
                                <h2 id="previewTitle">Post title</h2>
                                <p id="previewCategory" class="preview-category">News</p>
                                <p id="previewDate" class="preview-date"></p>
                                <p id="previewExcerpt" class="preview-excerpt"></p>
                                <p id="previewContent" class="preview-content"></p>
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
<script src="js/posts.js"></script>
</body>
</html>
