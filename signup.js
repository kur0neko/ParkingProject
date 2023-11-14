document.addEventListener('DOMContentLoaded', function () {
    const openSignupModalBtn = document.getElementById('openSignupModalBtn');
    const signupModal = document.getElementById('signupModal');
    const closeSignupModalBtn = document.getElementById('closeSignupModalBtn');

    openSignupModalBtn.addEventListener('click', function () {
        signupModal.style.display = 'block';
    });

    closeSignupModalBtn.addEventListener('click', function () {
        signupModal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === signupModal) {
            signupModal.style.display = 'none';
        }
    });
});
