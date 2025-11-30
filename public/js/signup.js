const form = document.querySelector("form");
const username = document.querySelector('input[name="username"], input[placeholder="Username"]');
const email    = document.querySelector('input[name="email"], input[type="email"]');
const password = document.querySelector('input[name="password"], input[type="password"]');
const submitBtn = form.querySelector('button[type="submit"]');

form.addEventListener("submit", function (e) {
    e.preventDefault();

    document.querySelectorAll(".error").forEach(el => el.remove());
    document.querySelectorAll(".error-input").forEach(el => el.classList.remove("error-input"));

    let hasError = false;

    // Username
    if (!username?.value.trim()) {
        showError(username, "Username tidak boleh kosong.");
        hasError = true;
    } else if (username.value.trim().length < 3) {
        showError(username, "Username minimal 3 karakter.");
        hasError = true;
    }

    // Email
    if (!email?.value.trim()) {
        showError(email, "Email tidak boleh kosong.");
        hasError = true;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
        showError(email, "Format email tidak valid.");
        hasError = true;
    }

    // Password
    if (!password?.value) {
        showError(password, "Password tidak boleh kosong.");
        hasError = true;
    } else if (password.value.length < 6) {
        showError(password, "Password minimal 6 karakter.");
        hasError = true;
    }

    if (!hasError) {
        alert("Pendaftaran berhasil! Silakan login.");
        window.location.href = "/login";
    }
});

// Tekan Enter → otomatis klik tombol Sign Up
form.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        submitBtn.click();
    }
});

function showError(input, message) {
    if (!input) return;
    const existing = input.parentNode.querySelector(".error");
    if (existing) existing.remove();

    const error = document.createElement("div");
    error.className = "error";
    error.textContent = message;
    error.style.cssText = "color:#e74c3c; font-size:13px; margin:6px 0 12px;";
    input.classList.add("error-input");
    input.insertAdjacentElement("afterend", error);
}

// Hapus error saat mengetik
document.querySelectorAll("input").forEach(input => {
    input.addEventListener("input", () => {
        input.classList.remove("error-input");
        const err = input.parentNode.querySelector(".error");
        if (err) err.remove();
    });
});