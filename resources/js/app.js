import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Auto Logout after idle
const maxIdleTime = 20 * 60 * 1000; // 20 menit
let idleTimer;

function resetTimer() {
    clearTimeout(idleTimer);
    idleTimer = setTimeout(logoutUser, maxIdleTime);
}

function logoutUser() {
    // Kirim permintaan logout ke server
    fetch("/logout", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json",
        },
    }).then(() => {
        window.location.href = "/login";
    });
}

// Reset timer setiap ada aktivitas user
window.onload = resetTimer;
document.onmousemove = resetTimer;
document.onkeypress = resetTimer;
document.onscroll = resetTimer;
document.onclick = resetTimer;
