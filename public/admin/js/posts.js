// Initialize lucide icons
lucide.createIcons();


// Menu buttons
document.querySelectorAll(".menu-title").forEach(button => {
    button.addEventListener("click", () => {
        button.parentElement.classList.toggle("open");
    });
});


// Open post modal
const postModal = document.getElementById('postModal');
document.getElementById('addBtn').addEventListener('click', () => {
    postModal.classList.add('open');
});

// Check dirty form
let formDirty = false;
const postForm = document.getElementById('postForm');
postForm.addEventListener('input', () => {
    formDirty = true;
});
postForm.addEventListener('change', () => {
    formDirty = true;
});

// Exit post modal
async function closePostModal() {
    if (formDirty) {
        const answer = await showConfirm(
            'question',
            'Discard unsaved changes?',
            'You have unsaved changes. Are you sure you want to discard them?',
            'Discard changes',
            'Keep editing');

        if (!answer) return;
    }

    window.location.reload();
}
document.getElementById('exitBtn').addEventListener('click', closePostModal);

// Cancel post modal
document.getElementById('cancelBtn').addEventListener('click', closePostModal)


// Open image selector
const removeImageBtn = document.getElementById('removeImageBtn');
const uploadImageBtn = document.getElementById('uploadImageBtn');
const featuredImageInput = document.getElementById('featuredImage');
const imagePreview = document.getElementById('imagePreview');
const uploadPlaceholder = document.getElementById('uploadPlaceholder')
const removeImageInput = document.getElementById('removeImageInput')
uploadImageBtn.addEventListener('click', () => {
    featuredImageInput.click();
});

// Select image
function selectImage() {
    const file = featuredImageInput.files[0];

    if (!file) return;

    removeImageInput.value = 'false';

    imagePreview.src = URL.createObjectURL(file);
    imagePreview.hidden = false;
    imagePreview.style.display = 'block';

    uploadPlaceholder.hidden = true;
    uploadImageBtn.hidden = false;
    removeImageBtn.hidden = false;

    formDirty = true;
}
featuredImageInput.addEventListener('change', selectImage);

// Remove Image
function removeImage() {
    featuredImageInput.value = '';
    removeImageInput.value = 'true';

    postForm.dataset.existingImage = '';

    imagePreview.removeAttribute('src');
    imagePreview.hidden = true;
    imagePreview.style.display = 'none';

    uploadPlaceholder.hidden = false;
    uploadImageBtn.hidden = false;
    removeImageBtn.hidden = true;

    formDirty = true;
}
removeImageBtn.addEventListener('click', removeImage);


// Open preview modal with value
const previewModal = document.getElementById('previewModal');
const postIdInput = document.getElementById("postId");
const titleInput = document.getElementById('title');
const categoryInput = document.getElementById('category');
const excerptInput = document.getElementById('excerpt');
const contentInput = document.getElementById('content');
const publishDateInput = document.getElementById('publishDate');
const previewImage = document.getElementById('previewImage');
const previewImageDefault = document.getElementById('previewImageDefault');
const previewTitle = document.getElementById('previewTitle');
const previewCategory = document.getElementById('previewCategory');
const previewDate = document.getElementById('previewDate');
const previewExcerpt = document.getElementById('previewExcerpt');
const previewContent = document.getElementById('previewContent');
const tableBody = document.getElementById('tableBody');
async function getItem(postId) {
    try {
        const response = await fetch(`api/posts/get-item.php?id=${encodeURIComponent(postId)}`);
        const result = await response.json();

        if (!response.ok) {
            await showAlert(false, result.message);
            return;
        }

        return result.data;
    } catch (error) {
        await showUnexpectedError(error);
        return;
    }
}

async function showPreviewModal() {
    const postId = Number(postIdInput.value);

    previewTitle.textContent = titleInput.value;
    previewCategory.textContent = categoryInput.selectedOptions[0].textContent
    previewDate.textContent = publishDateInput.value ? formatDate(publishDateInput.value) : 'Date not set';
    previewExcerpt.textContent = excerptInput.value;
    previewContent.textContent = contentInput.value;

    const existingImage = postForm.dataset.existingImage ?? '';
    const imageRemoved = removeImageInput.value === 'true';

    if (featuredImageInput.files.length > 0) {
        // Use newly selected image
        previewImage.src = URL.createObjectURL(featuredImageInput.files[0]);
        previewImage.alt = titleInput.value;
        previewImage.hidden = false;
        previewImageDefault.hidden = true;
    } else if (postId > 0 && existingImage && !imageRemoved) {
        // Use database image only when editing an existing post
        previewImage.src = `storage/uploads/${existingImage}`;
        previewImage.alt = 'Post featured image';
        previewImage.hidden = false;
        previewImageDefault.hidden = true;
    } else {
        // No selected image or usable existing image
        previewImage.removeAttribute('src');
        previewImage.hidden = true;
        previewImageDefault.hidden = false;
    }

    previewModal.classList.add('open');
}
document.getElementById('formPreviewBtn').addEventListener('click', showPreviewModal);

// Close preview modal
document.getElementById('exitPreviewBtn').addEventListener('click', () => {
    previewModal.classList.remove('open');
});

// Show item preview
async function showItemPreview(postId) {
    const item = await getItem(postId);

    if (!item) return;

    previewTitle.textContent = item.title ?? '';
    previewCategory.textContent = item.category ?? '';
    previewDate.textContent = item.publishedAt ? formatDate(item.publishedAt) : 'Date not set';
    previewExcerpt.textContent = item.excerpt ?? '';
    previewContent.textContent = item.content ?? '';

    if (item.featuredImage) {
        previewImage.src = `storage/uploads/${item.featuredImage}`;
        previewImage.alt = item.title;
        previewImage.hidden = false;
        previewImageDefault.hidden = true;
    } else {
        previewImage.removeAttribute('src');
        previewImage.hidden = true;
        previewImageDefault.hidden = false;
    }

    previewModal.classList.add('open');
}
tableBody.addEventListener('click', async (event) => {
    const button = event.target.closest('[data-action="preview"]');

    if (!button || !tableBody.contains(button)) return;

    const postId = Number(button.dataset.postId);

    if (!Number.isInteger(postId) || postId <= 0) {
        await showAlert(false, 'Invalid post ID.');
        return;
    }

    await showItemPreview(postId);
});


// Save
async function save(formData) {
  try {
      const response = await fetch('api/posts/save.php', {
          method: 'POST',
          body: formData
      });

      const result = await response.json();

      if (!response.ok) {
          await showAlert(false, result.message);
          return;
      }

      await showAlert(true, result.message);
      window.location.reload();
  } catch (error) {
      await showUnexpectedError(error);
      return;
  }
}
postForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(postForm);
    await save(formData);
});


// Filter
let controller = null;
let requestSequence = 0;
let offset = 0;
let searchTimeout;
const showMoreBtn = document.getElementById('showMoreBtn');
const searchInput = document.getElementById('search');
const filterInput = document.getElementById('filter');
const sortInput = document.getElementById('sort');
function createItem(item) {
    const row = document.getElementById('itemTemplate').cloneNode(true);

    row.removeAttribute('id');
    row.classList.remove('post-row-template');

    const cells = row.querySelectorAll('td');
    const imageContainer = cells[0].querySelector('.featured-thumb');

    if (item.featured_image) {
        const image = document.createElement('img');
        image.src = `storage/uploads/${item.featured_image}`;
        image.alt = item.title;
        imageContainer.replaceChildren(image);
    }

    cells[1].querySelector('.cell-ellipsis').textContent = item.title ?? '';
    cells[2].querySelector('.cell-ellipsis').textContent = item.category ?? '';
    cells[3].querySelector('.cell-ellipsis').textContent = item.published_at ? formatDate(item.published_at) : '—';
    const statusBadge = cells[4].querySelector('.status-badge');
    statusBadge.textContent = item.display_status ?? '';
    statusBadge.className = `status-badge status-${String(item.display_status ?? '').toLowerCase()}`;

    row.querySelectorAll('[data-action]').forEach(button => {
        button.dataset.postId = item.id;
    });

    return row;
}

async function loadItems(reset = false) {
    const currentRequest = ++requestSequence;

    if (controller) {
        controller.abort();
    }

    controller = new AbortController();

    if (reset) {
        offset = 0;
        document.querySelectorAll('#tableBody tr[data-post-row]').forEach(item => item.remove());
    }

    const params = new URLSearchParams({
        search: searchInput.value.trim(),
        filter: filterInput.value,
        sort: sortInput.value,
        offset: String(offset)
    });

    try {
        const response = await fetch(`api/posts/get-items.php?${params.toString()}`, {
            signal: controller.signal,
        });

        const result = await response.json();

        if (currentRequest !== requestSequence) {
            return;
        }

        if (!response.ok) {
            await showAlert(false, result.message);
            return;
        }

        const items = result.data.items;

        items.forEach(item => {
            const row = createItem(item);
            row.dataset.postRow = 'true';
            tableBody.appendChild(row);
        });

        offset += items.length;
        const hasItems = offset > 0;
        const hasMore = result.data.hasMore;
        document.getElementById('itemCount').textContent = `${result.data.totalItems} ${result.data.totalItems === 1 ? 'post' : 'posts'}`;
        showMoreBtn.hidden = !hasMore;
        document.getElementById('emptyItem').hidden = hasItems;
        document.getElementById('lastItemMessage').hidden = !hasItems || hasMore;
    } catch (error) {
        // Skip abort as it is intentional and handle errors from previous requests
        if (error.name === 'AbortError' || currentRequest !== requestSequence) {
            return;
        }

        await showUnexpectedError(error);
        return;
    }
}
searchInput.addEventListener('input', () => {
    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {
        loadItems(true);
    }, 300);
});
filterInput.addEventListener('change', () => {
    loadItems(true);
});
sortInput.addEventListener('change', () => {
    loadItems(true);
});
showMoreBtn.addEventListener('click', () => {
    loadItems(false);
});
loadItems(true);


// Edit
async function editItem(postId) {
    const item = await getItem(postId);

    if (!item) return;

    postIdInput.value = postId;
    titleInput.value = item.title ?? '';
    excerptInput.value = item.excerpt ?? '';
    categoryInput.value = item.categoryId ?? '';
    publishDateInput.value = item.publishedAt ? item.publishedAt.substring(0, 10) : '';
    contentInput.value = item.content ?? '';
    // Not included in preview
    document.getElementById('status').value = item.status ?? 'draft';
    featuredImageInput.value = '';
    // Store image for preview only (already caught up with db)
    postForm.dataset.existingImage = item.featuredImage ?? '';
    removeImageInput.value = 'false';

    if (item.featuredImage) {
        imagePreview.src = `storage/uploads/${item.featuredImage}`;
        imagePreview.hidden = false;
        imagePreview.style.display = 'block';
        uploadPlaceholder.hidden = true;
        removeImageBtn.hidden = false;
    } else {
        imagePreview.removeAttribute('src');
        imagePreview.hidden = true;
        imagePreview.style.display = 'none';
        uploadPlaceholder.hidden = false;
        removeImageBtn.hidden = true;
    }

    formDirty = false;

    postModal.classList.add('open');
}
tableBody.addEventListener('click', async (event) => {
    const button = event.target.closest('[data-action="edit"]');

    if (!button || !tableBody.contains(button)) return;

    const postId = Number(button.dataset.postId);

    if (!Number.isInteger(postId) || postId <= 0) {
        await showAlert(false, 'Invalid post ID.');
        return;
    }

    await editItem(postId);
});


// Archive
async function archiveItem(postId) {
    try {
        const formData = new FormData();
        formData.append('id', String(postId));
        formData.append('csrf_key', document.getElementById('csrf').value);
        const response = await fetch('api/posts/archive.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (!response.ok) {
            await showAlert(false, result.message);
            return;
        }

        await showAlert(true, result.message);
        window.location.reload();

    } catch (error) {
        await showUnexpectedError(error);
        return;
    }
}
tableBody.addEventListener('click', async (event) => {
    const button = event.target.closest('[data-action="archive"]');

    if (!button || !tableBody.contains(button)) return;

    const postId = Number(button.dataset.postId);

    if (!Number.isInteger(postId) || postId <= 0) {
        await showAlert(false, 'Invalid post ID.');
        return;
    }

    const confirmed = await showConfirm(
        'warning',
        'Archive this post?',
        'This post will be moved to the archive.',
        'Archive',
        'Cancel'
    );

    if (!confirmed) return;

    await archiveItem(postId);
});
