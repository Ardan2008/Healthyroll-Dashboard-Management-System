// login.js — FINAL + Tekan Enter = Submit
const form = document.querySelector("form");
const email    = document.querySelector('input[name="email"]');
const password = document.querySelector('input[name="password"]');
const submitBtn = form.querySelector('button[type="submit"]');

form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Bersihkan error sebelumnya
    document.querySelectorAll(".error").forEach(el => el.remove());
    document.querySelectorAll(".error-input").forEach(el => el.classList.remove("error-input"));

    let hasError = false;

    // === VALIDASI EMAIL ===
    if (!email.value.trim()) {
        showError(email, "Email tidak boleh kosong.");
        hasError = true;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
        showError(email, "Format email tidak valid.");
        hasError = true;
    }

    // === VALIDASI PASSWORD ===
    if (!password.value) {
        showError(password, "Password tidak boleh kosong.");
        hasError = true;
    } else if (password.value.length < 6) {
        showError(password, "Password minimal 6 karakter.");
        hasError = true;
    }

    if (!hasError) {
        alert("Login berhasil! Selamat datang kembali");
        window.location.href = "/home";
    }
});

// Tekan Enter di mana saja di form → otomatis submit
form.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();        // cegah submit dua kali kalau cursor di input
        submitBtn.click();         // trigger klik tombol
    }
});

function showError(input, message) {
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
    input.addEventListener("input", function () {
        this.classList.remove("error-input");
        const err = this.parentNode.querySelector(".error");
        if (err) err.remove();
    });
});