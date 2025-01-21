document.addEventListener('DOMContentLoaded', function() { // Esperamos a que cargue todo el DOM para ejecutar el codigo
    eventListeners();
    darkModeUser();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu'); // Traemos la clase de .mobile-menu
    const botonDarkMode = document.querySelector('.dark-mode');

    mobileMenu.addEventListener('click', navegacionResponsive) // Le agregamos un Event Listener de 'click' que ejecuta la función navegacionResponsive
    botonDarkMode.addEventListener('click', darkMode)

    // Muestra campos condicionales

    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]'); // .querySelectorAll(), no se le puede asignar un evento

    metodoContacto.forEach(input => input.addEventListener('click', mostrarCampo));
}

function mostrarCampo(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono"></label>
            <input type="tel" placeholder="Tú teléfono" id="telefono" name="contacto[telefono]">

            <p>Elija la fecha y hora para contactarlo</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else {
        contactoDiv.innerHTML = `
            <label for="email"></label>
            <input type="email" placeholder="Tú e-mail" id="email" name="contacto[email]">
        `;
    }
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion'); // Traemos la clase .navegacion

    // if(navegacion.classList.contains('mostrar')) { // Verificamos si la clase navegacion (classList.contains) contiene la clase mostrar, si no tiene le agregamos la clase y si tiene la removemos
    //     navegacion.classList.remove('mostrar');
    // }else {
    //     navegacion.classList.add('mostrar');
    // }

    navegacion.classList.toggle('mostrar'); // toggle(className): Alterna la presencia de una clase, es decir, si la clase está presente la elimina, y si no está presente, la añade
}

// Una vez que se agrega (la clase .mostrar) a la lista de clases de navegacion, con css modificamos dicha clase para mostrar en el DO

function darkMode() {
    const body = document.querySelector('body');

    body.classList.toggle('dark');
}

function darkModeUser() {
    const preferenciaUsuario = window.matchMedia('(prefers-color-scheme: dark)');
    const body = document.querySelector('body');

    if(preferenciaUsuario.matches) { // Es un objeto, por lo tanto debemos acceder a la propiedad con .matches (boolean, true o false)
        body.classList.add('dark');
    }else {
        body.classList.remove('dark');
    }

    preferenciaUsuario.addEventListener('change', function() {
        if(preferenciaUsuario.matches) { 
            body.classList.add('dark');
        }else {
            body.classList.remove('dark');
        }
    });
}