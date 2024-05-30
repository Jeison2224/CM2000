verLogro();

//Recuperar puntos de usuarios desde la base de datos
function verLogro() {
    $.ajax({
        url: verLogroUrl,
        method: 'GET',
        success: function(response) {
            
            var datos = response;
            //console.log(datos);
            logro = [];

            for (let x = 0; x < datos.length; x++) {
                var nombre = datos[x].name; 
                var descripcion = datos[x].description; 
                var puntos = datos[x].point; 
                

                var logroActual = {
                    nombre: nombre,
                    descripcion: descripcion,
                    puntos: puntos
                };
            
                
                logro.push(logroActual);
            }
            listarLogros(logro);

        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function listarLogros(logros) {
    // Supongamos que tienes un contenedor en tu HTML con el id "lista-logros"
    var contenedorLogros = document.getElementById("lista-logros");

    // Iterar sobre el array de logros
    for (let i = 0; i < logros.length; i++) {
        // Obtener el logro actual
        var logro = logros[i];

        // Crear un elemento de lista <div> para mostrar el logro
        var elementoLogro = document.createElement("div");

        // Establecer el contenido del elemento de lista con el nombre, la descripción y los puntos del logro
        elementoLogro.innerHTML = `
            <div class="logros">
            <p><strong>Nombre:</strong> ${logro.nombre}</p>
            <p><strong>Descripción:</strong> ${logro.descripcion}</p>
            <p><strong>Puntos:</strong> ${logro.puntos}</p>
            </div>
        `;

        // Agregar el elemento de lista al contenedor
        contenedorLogros.appendChild(elementoLogro);
    }
}