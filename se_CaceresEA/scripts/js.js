
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".navbar-menu li a");
    const currentUrl = window.location.href;

    links.forEach(link => {
        if (currentUrl.includes(link.getAttribute("href"))) {
            link.classList.add("activo");
        }
    });
});


function mostrarAlerta(mensaje, tipo = 'info') {
    const alerta = document.createElement("div");
    alerta.textContent = mensaje;
    alerta.className = `alerta alerta-${tipo}`;
    document.body.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 3000);
}
