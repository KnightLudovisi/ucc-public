// Initialize lucide icons
lucide.createIcons();


// Login
async function login(formData) {
    try {
        const response = await fetch('api/login/login.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (!response.ok) {
            // Redo password if incorrect
            if (Object.hasOwn(result.data, 'redoPassword')) {
                document.getElementById('password').value = '';
            }

            await showAlert(false, result.message)
            return;
        }

        // Redirect if successful login
        await showAlert(true, result.message);
        window.location.href = result.redirect;
    } catch (error) {
        await showUnexpectedError(error);
        return;
   }
}
document.getElementById('loginForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(loginForm);
    await login(formData);
});
