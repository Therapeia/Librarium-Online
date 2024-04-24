const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const iniciarSesionBtn = document.getElementById("formulario");
const container = document.querySelector(".container");
const tarjeta = document.getElementById("#biblioteca");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

iniciarSesionBtn.addEventListener("click", () => {
    if (container.classList.contains("show")) {
        container.classList.remove("show");
        iniciarSesionBtn.textContent = "Iniciar Sesion";
    } else {
        container.classList.add("show");
        iniciarSesionBtn.textContent = "Cancelar";
    }
});

tarjeta.addEventListener("click", function (event) {
    const target = event.target;
    if (target.classList.contains("see-more-btn")) {
        const post = target.closest(".card__container");
        const readView = post.querySelector(".read-view");
        const titulo = readView.querySelector(".post_titulo").textContent;
        const contenido = readView.querySelector("p").textContent;
        const imagen = readView.querySelector(".imagen-post img").src; // Asegúrate de seleccionar la imagen correctamente
        const audioSrc = readView.querySelector("audio source").src;

        Swal.fire({
            title: titulo,
            html: `<p>${contenido}</p><img src="${imagen}" alt="Imagen del post" class="imagen-post"><audio controls><source src="${audioSrc}" type="audio/mp3">Tu navegador no soporta la reproducción de audio.</audio>`
        });
    }
});




