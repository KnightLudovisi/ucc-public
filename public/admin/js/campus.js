'use strict';

const mainModal = document.getElementById('mainModal');
const previewModal = document.getElementById('previewModal');
const form = document.getElementById('form');
const tableBody = document.getElementById('tableBody');

const formTitle = document.getElementById('formTitle');
const formDescription = document.getElementById('postFormDescription');

const itemIdInput = document.getElementById('itemId');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const addressInput = document.getElementById('address');
const statusInput = document.getElementById('status');
const contactInput = document.getElementById('contact');
const urlInput = document.getElementById('url');

const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('imagePreview');
const uploadImagePlaceholder = document.getElementById('uploadImagePlaceholder');
const uploadImageBtn = document.getElementById('uploadImageBtn');
const removeImageBtn = document.getElementById('removeImageBtn');
const removeImageInput = document.getElementById('removeImageInput');

const previewImage = document.getElementById('previewImage');
const previewImageDefault = document.getElementById('previewImageDefault');
const previewCampusName = document.getElementById('previewCampusName');
const previewCampusEmail = document.getElementById('previewCampusEmail');
const previewCampusAddress = document.getElementById('previewCampusAddress');
const previewCampusContact = document.getElementById('previewCampusContact');
const previewCampusMap = document.getElementById('previewCampusMap');

const searchInput = document.getElementById('search');
const filterInput = document.getElementById('filter');
const sortInput = document.getElementById('sort');
const showMoreBtn = document.getElementById('showMoreBtn');
const emptyItem = document.getElementById('emptyItem');
const itemCount = document.getElementById('itemCount');
const lastItemMessage = document.getElementById('lastItemMessage');

let controller = null;
let requestSequence = 0;
let offset = 0;
let searchTimeout = null;
let formDirty = false;

const PAGE_SIZE = 10;

// Initialize lucide icons
lucide.createIcons();


// Menu buttons
document.querySelectorAll(".menu-title").forEach(button => {
    button.addEventListener("click", () => {
        button.parentElement.classList.toggle("open");
    });
});

// --------------------------------------------------
// Helpers
// --------------------------------------------------

function refreshIcons() {
    if (window.lucide) {
        window.lucide.createIcons();
    }
}

function campusImageUrl(filename) {
    if (!filename) return '';

    if (/^(https?:\/\/|data:|blob:)/i.test(filename)) {
        return filename;
    }

    return `storage/uploads/${filename}`;
}

function formatStatus(status) {
    if (!status) return '';

    return status.charAt(0).toUpperCase() +
        status.slice(1).toLowerCase();
}

function setModal(modal, open) {
    modal.classList.toggle('open', open);
    modal.setAttribute('aria-hidden', String(!open));
}

// --------------------------------------------------
// Image preview
// --------------------------------------------------

function setFormImage(src) {
    if (src) {
        imagePreview.src = campusImageUrl(src);
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
}

function setPreviewImage(src, altText = 'Campus image') {
    if (src) {
        previewImage.src = campusImageUrl(src);
        previewImage.alt = altText;
        previewImage.hidden = false;
        previewImageDefault.hidden = true;
    } else {
        previewImage.removeAttribute('src');
        previewImage.hidden = true;
        previewImageDefault.hidden = false;
    }
}

uploadImageBtn.addEventListener('click', () => {
    imageInput.click();
});

imageInput.addEventListener('change', () => {
    const file = imageInput.files[0];

    if (!file) return;

    if (!file.type.startsWith('image/')) {
        imageInput.value = '';
        void showAlert(false, 'Please select a valid image file.');
        return;
    }

    removeImageInput.value = 'false';

    imagePreview.src = URL.createObjectURL(file);
    imagePreview.alt = nameInput.value || 'Campus image preview';
    imagePreview.hidden = false;
    imagePreview.style.display = 'block';

    uploadImagePlaceholder.hidden = true;
    removeImageBtn.hidden = false;

    formDirty = true;
});

removeImageBtn.addEventListener('click', () => {
    imageInput.value = '';
    removeImageInput.value = 'true';

    form.dataset.existingImage = '';

    setFormImage('');

    formDirty = true;
});

// --------------------------------------------------
// Form state
// --------------------------------------------------

function resetForm() {
    form.reset();

    itemIdInput.value = '0';
    removeImageInput.value = 'false';
    form.dataset.existingImage = '';

    setFormImage('');

    formTitle.textContent = 'Add Campus';
    formDescription.textContent =
        'Enter the information for this campus.';

    formDirty = false;
}

document.getElementById('addBtn').addEventListener('click', () => {
    resetForm();
    setModal(mainModal, true);
});

// --------------------------------------------------
// Get one campus
// --------------------------------------------------

async function getItem(itemId) {
    try {
        const response = await fetch(
            `api/campus/get-item.php?id=${encodeURIComponent(itemId)}`,
            {
                headers: {
                    Accept: 'application/json'
                }
            }
        );

        const result = await response.json();

        if (!response.ok) {
            await showAlert(false, result.message);
            return null;
        }

        return result.data;
    } catch (error) {
        await showUnexpectedError(error);
        return null;
    }
}

// --------------------------------------------------
// Preview
// --------------------------------------------------

function updatePreviewMap(value) {
    const mapUrl = value.trim();

    if (mapUrl) {
        previewCampusMap.href = mapUrl;
        previewCampusMap.hidden = false;
    } else {
        previewCampusMap.removeAttribute('href');
        previewCampusMap.hidden = true;
    }
}

function populatePreview(item, useFormImage = false) {
    previewCampusName.textContent = item.name ?? '';
    previewCampusEmail.textContent = item.email || 'No email provided.';
    previewCampusAddress.textContent = item.address ?? '';
    previewCampusContact.textContent =
        item.contact || 'No contact information provided.';

    updatePreviewMap(item.url ?? '');

    const image = useFormImage
        ? (
            imageInput.files[0]
                ? URL.createObjectURL(imageInput.files[0])
                : (
                    removeImageInput.value === 'true'
                        ? ''
                        : form.dataset.existingImage ?? ''
                )
        )
        : item.image ?? '';

    setPreviewImage(image, item.name ?? 'Campus image');
    setModal(previewModal, true);
}

document.getElementById('formPreviewBtn').addEventListener('click', () => {
    populatePreview({
        name: nameInput.value,
        email: emailInput.value,
        address: addressInput.value,
        contact: contactInput.value,
        url: urlInput.value
    }, true);
});

async function showItemPreview(itemId) {
    const item = await getItem(itemId);

    if (!item) return;

    populatePreview(item);
}

document.getElementById('exitPreviewBtn').addEventListener('click', () => {
    setModal(previewModal, false);
});

// --------------------------------------------------
// Save
// --------------------------------------------------

async function save(formData) {
    try {
        const response = await fetch('api/campus/save.php', {
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
    }
}

form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(form);

    await save(formData);
});

// --------------------------------------------------
// Edit
// --------------------------------------------------

async function editItem(itemId) {
    const item = await getItem(itemId);

    if (!item) return;

    resetForm();

    itemIdInput.value = item.id;
    nameInput.value = item.name ?? '';
    emailInput.value = item.email ?? '';
    addressInput.value = item.address ?? '';
    contactInput.value = item.contact ?? '';
    urlInput.value = item.url ?? '';
    statusInput.value = item.status ?? 'hidden';

    form.dataset.existingImage = item.image ?? '';
    removeImageInput.value = 'false';
    imageInput.value = '';

    setFormImage(item.image ?? '');

    formTitle.textContent = 'Edit Campus';
    formDescription.textContent =
        'Update the information for this campus.';

    formDirty = false;

    setModal(mainModal, true);
}

// --------------------------------------------------
// Delete
// --------------------------------------------------

async function deleteItem(itemId) {
    try {
        const formData = new FormData();

        formData.append('id', String(itemId));
        formData.append(
            'csrf_key',
            document.getElementById('csrf').value
        );

        const response = await fetch('api/campus/delete.php', {
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
    }
}

// --------------------------------------------------
// Table actions
// --------------------------------------------------

tableBody.addEventListener('click', async (event) => {
    const button = event.target.closest('[data-action]');

    if (!button || !tableBody.contains(button)) return;

    const itemId = Number(button.dataset.itemId);

    if (!Number.isInteger(itemId) || itemId <= 0) {
        await showAlert(false, 'Invalid campus ID.');
        return;
    }

    switch (button.dataset.action) {
        case 'preview':
            await showItemPreview(itemId);
            break;

        case 'edit':
            await editItem(itemId);
            break;

        case 'delete': {
            const confirmed = await showConfirm(
                'warning',
                'Delete this campus?',
                'This campus will be removed.',
                'Delete',
                'Cancel'
            );

            if (confirmed) {
                await deleteItem(itemId);
            }

            break;
        }
    }
});

// --------------------------------------------------
// Filtering, sorting, and pagination
// --------------------------------------------------

function createItem(item) {
    const row = document
        .getElementById('itemTemplate')
        .cloneNode(true);

    row.removeAttribute('id');
    row.classList.remove('post-row-template');
    row.removeAttribute('aria-hidden');
    row.dataset.campusRow = 'true';

    const cells = row.querySelectorAll('td');

    // Image
    const imageContainer = cells[0].querySelector('.featured-thumb');

    if (item.image) {
        const image = document.createElement('img');

        image.src = campusImageUrl(item.image);
        image.alt = item.name ?? '';

        imageContainer.replaceChildren(image);
    }

    // Name
    cells[1].querySelector('.cell-ellipsis').textContent =
        item.name ?? '';

    // Address / Google Maps link
    const mapLink = cells[2].querySelector('.campus-map-link');
    const mapText = mapLink.querySelector('.cell-ellipsis');

    mapText.textContent = item.address ?? '';

    if (item.url) {
        mapLink.href = item.url;
        mapLink.hidden = false;
    } else {
        mapLink.removeAttribute('href');
        mapLink.hidden = true;
    }

    // Status
    const statusBadge = cells[3].querySelector('.status-badge');
    const status = String(item.status ?? '').toLowerCase();

    statusBadge.textContent = formatStatus(status);

    const statusClass =
        status === 'active' ? 'published' :
        status === 'inactive' ? 'draft' :
        status;

    statusBadge.className = `status-badge status-${statusClass}`;

    // Action buttons
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

        document
            .querySelectorAll('#tableBody tr[data-campus-row]')
            .forEach(row => row.remove());
    }

    const params = new URLSearchParams({
        search: searchInput.value.trim(),
        filter: filterInput.value,
        sort: sortInput.value,
        offset: String(offset)
    });

    try {
        const response = await fetch(
            `api/campus/get-items.php?${params.toString()}`,
            {
                signal: controller.signal
            }
        );

        const result = await response.json();

        if (currentRequest !== requestSequence) return;

        if (!response.ok) {
            await showAlert(false, result.message);
            return;
        }

        const items = result.data.items;

        items.forEach(item => {
            tableBody.appendChild(createItem(item));
        });

        offset += items.length;

        const hasItems = offset > 0;
        const hasMore = result.data.hasMore;
        const totalItems = result.data.totalItems;

        itemCount.textContent =
            `${totalItems} ${totalItems === 1 ? 'campus' : 'campuses'}`;

        showMoreBtn.hidden = !hasMore;
        emptyItem.hidden = hasItems;

        lastItemMessage.hidden = !hasItems || hasMore;

        refreshIcons();
    } catch (error) {
        if (
            error.name === 'AbortError' ||
            currentRequest !== requestSequence
        ) {
            return;
        }

        await showUnexpectedError(error);
    }
}

// Search with debounce
searchInput.addEventListener('input', () => {
    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {
        loadItems(true);
    }, 300);
});

// Status filter
filterInput.addEventListener('change', () => {
    loadItems(true);
});

// Sorting
sortInput.addEventListener('change', () => {
    loadItems(true);
});

// Load more
showMoreBtn.addEventListener('click', () => {
    loadItems(false);
});

// --------------------------------------------------
// Close modal / discard changes
// --------------------------------------------------

async function closeMainModal() {
    if (formDirty) {
        const confirmed = await showConfirm(
            'question',
            'Discard unsaved changes?',
            'You have unsaved changes. Are you sure you want to discard them?',
            'Discard changes',
            'Keep editing'
        );

        if (!confirmed) return;
    }

    window.location.reload();
}

document.getElementById('exitBtn')
    .addEventListener('click', closeMainModal);

document.getElementById('cancelBtn')
    .addEventListener('click', closeMainModal);

document.querySelectorAll('[data-close-modal]').forEach(button => {
    button.addEventListener('click', event => {
        if (event.currentTarget.id === 'exitBtn' ||
            event.currentTarget.id === 'cancelBtn') {
            return;
        }

        void closeMainModal();
    });
});

document.querySelectorAll('[data-close-preview]').forEach(button => {
    button.addEventListener('click', () => {
        setModal(previewModal, false);
    });
});

// Track form changes
form.addEventListener('input', () => {
    formDirty = true;
});

form.addEventListener('change', () => {
    formDirty = true;
});

// Initial load
refreshIcons();
loadItems(true);
