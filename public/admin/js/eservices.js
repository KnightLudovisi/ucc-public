// Initialize lucide icons
lucide.createIcons();


// Menu buttons
document.querySelectorAll(".menu-title").forEach(button => {
    button.addEventListener("click", () => {
        button.parentElement.classList.toggle("open");
    });
});


// Open main modal
const mainModal = document.getElementById('mainModal');
document.getElementById('addBtn').addEventListener('click', () => {
    mainModal.classList.add('open');
});

// Check dirty form
let formDirty = false;
const form = document.getElementById('form');
form.addEventListener('input', () => {
    formDirty = true;
});
form.addEventListener('change', () => {
    formDirty = true;
});

// Exit main modal
async function closeMainModal() {
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
document.getElementById('exitBtn').addEventListener('click', closeMainModal);

// Cancel main modal
document.getElementById('cancelBtn').addEventListener('click', closeMainModal)


// Open image selector
const removeImageBtn = document.getElementById('removeImageBtn');
const uploadImageBtn = document.getElementById('uploadImageBtn');
const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('imagePreview');
const uploadImagePlaceholder = document.getElementById('uploadImagePlaceholder')
const removeImageInput = document.getElementById('removeImageInput')
uploadImageBtn.addEventListener('click', () => {
    imageInput.click();
});

// Select image
function selectImage() {
    const file = imageInput.files[0];

    if (!file) return;

    removeImageInput.value = 'false';

    imagePreview.src = URL.createObjectURL(file);
    imagePreview.hidden = false;
    imagePreview.style.display = 'block';

    uploadImagePlaceholder.hidden = true;
    uploadImageBtn.hidden = false;
    removeImageBtn.hidden = false;

    formDirty = true;
}
imageInput.addEventListener('change', selectImage);

// Remove Image
function removeImage() {
    imageInput.value = '';
    removeImageInput.value = 'true';

    form.dataset.existingImage = '';

    imagePreview.removeAttribute('src');
    imagePreview.hidden = true;
    imagePreview.style.display = 'none';

    uploadImagePlaceholder.hidden = false;
    uploadImageBtn.hidden = false;
    removeImageBtn.hidden = true;

    formDirty = true;
}
removeImageBtn.addEventListener('click', removeImage);


// Open preview modal with value
const previewModal = document.getElementById('previewModal');
const itemIdInput = document.getElementById("itemId");
const nameInput = document.getElementById('name');
const descriptionInput = document.getElementById('description');
const urlInput = document.getElementById('url');
const previewImage = document.getElementById('previewImage');
const previewImageDefault = document.getElementById('previewImageDefault');
const previewName = document.getElementById('previewName');
const previewDescription = document.getElementById('previewDescription');
const previewURL = document.getElementById('previewURL');
const tableBody = document.getElementById('tableBody');
async function getItem(itemId) {
    try {
        const response = await fetch(`api/eservices/get-item.php?id=${encodeURIComponent(itemId)}`);
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
    const itemId = Number(itemIdInput.value);

    previewName.textContent = nameInput.value;
    previewDescription.textContent = descriptionInput.value;
    previewURL.textContent = urlInput.value;

    const existingImage = form.dataset.existingImage ?? '';
    const imageRemoved = removeImageInput.value === 'true';

    if (imageInput.files.length > 0) {
        // Use newly selected image
        previewImage.src = URL.createObjectURL(imageInput.files[0]);
        previewImage.alt = nameInput.value;
        previewImage.hidden = false;
        previewImageDefault.hidden = true;
    } else if (itemId > 0 && existingImage && !imageRemoved) {
        // Use database image only when editing an existing post
        previewImage.src = `storage/uploads/${existingImage}`;
        previewImage.alt = nameInput.value;
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
async function showItemPreview(itemId) {
    const item = await getItem(itemId);

    if (!item) return;

    previewName.textContent = item.name ?? '';
    previewDescription.textContent = item.description ?? '';
    previewURL.textContent = item.url ?? '';

    if (item.logo) {
        previewImage.src = `storage/uploads/${item.logo}`;
        previewImage.alt = item.name;
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

    const itemId = Number(button.dataset.itemId);

    if (!Number.isInteger(itemId) || itemId <= 0) {
        await showAlert(false, 'Invalid e-services id.');
        return;
    }

    await showItemPreview(itemId);
});


// Save
async function save(formData) {
  try {
      const response = await fetch('api/eservices/save.php', {
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
form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(form);
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

    if (item.logo) {
        const image = document.createElement('img');
        image.src = `storage/uploads/${item.logo}`;
        image.alt = item.name ?? '';
        imageContainer.replaceChildren(image);
    }

    cells[1].querySelector('.cell-ellipsis').textContent = item.name ?? '';

    const linkCell = cells[2];
    linkCell.replaceChildren();

    if (item.url) {
        const link = document.createElement('a');
        link.href = item.url;
        link.target = '_blank';
        link.rel = 'noopener noreferrer';
        link.textContent = 'Open link';
        linkCell.appendChild(link);
    } else {
        linkCell.textContent = 'No link';
    }

    const statusBadge = cells[3].querySelector('.status-badge');
    statusBadge.textContent = item.status ?? '';
    const status = String(item.status ?? '').toLowerCase();
    const statusClass = status === 'active' ? 'published' : status === 'inactive' ? 'draft' : status;
    statusBadge.className = `status-badge status-${statusClass}`;

    row.querySelectorAll('[data-action]').forEach(button => {
        button.dataset.itemId = item.id;
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
        const response = await fetch(`api/eservices/get-items.php?${params.toString()}`, {
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
        document.getElementById('itemCount').textContent = `${result.data.totalItems} ${result.data.totalItems === 1 ? 'service' : 'services'}`;
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
async function editItem(itemId) {
    const item = await getItem(itemId);

    if (!item) return;

    itemIdInput.value = itemId;
    nameInput.value = item.name ?? '';
    descriptionInput.value = item.description ?? '';
    urlInput.value = item.url ?? '';
    // Not included in preview
    document.getElementById('status').value = item.status ?? 'inactive';
    imageInput.value = '';
    // Store image for preview only (already caught up with db)
    form.dataset.existingImage = item.logo ?? '';
    removeImageInput.value = 'false';

    if (item.logo) {
        imagePreview.src = `storage/uploads/${item.logo}`;
        imagePreview.hidden = false;
        imagePreview.style.display = 'block';
        uploadImagePlaceholder.hidden = true;
        removeImageBtn.hidden = false;
    } else {
        imagePreview.removeAttribute('src');
        imagePreview.hidden = true;
        imagePreview.style.display = 'none';
        uploadImagePlaceholder.hidden = false;
        removeImageBtn.hidden = true;
    }

    formDirty = false;

    mainModal.classList.add('open');
}
tableBody.addEventListener('click', async (event) => {
    const button = event.target.closest('[data-action="edit"]');

    if (!button || !tableBody.contains(button)) return;

    const itemId = Number(button.dataset.itemId);

    if (!Number.isInteger(itemId) || itemId <= 0) {
        await showAlert(false, 'Invalid e-services ID.');
        return;
    }

    await editItem(itemId);
});


// Delete
async function deleteItem(itemId) {
    try {
        const formData = new FormData();
        formData.append('id', String(itemId));
        formData.append('csrf_key', document.getElementById('csrf').value);
        const response = await fetch('api/eservices/delete.php', {
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
    const button = event.target.closest('[data-action="delete"]');

    if (!button || !tableBody.contains(button)) return;

    const itemId = Number(button.dataset.itemId);

    if (!Number.isInteger(itemId) || itemId <= 0) {
        await showAlert(false, 'Invalid e-services id.');
        return;
    }

    const confirmed = await showConfirm(
        'warning',
        'Delete this e-service?',
        'This e-service will be deleted.',
        'Delete',
        'Cancel'
    );

    if (!confirmed) return;

    await deleteItem(itemId);
});
