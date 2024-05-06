var click = 0;
var userId = null;

window.addEventListener('load', function() {
    // Llamar a la función para verificar el estado de inicio de sesión cuando se carga la página
    verificarSesion();
    // Recuperar los puntos del usuario del almacenamiento local
    //var userPoints = localStorage.getItem('userPoints');
    click = obtenerDatosUsuario(userId);
    
    /*if (userPoints !== null) {
        // Convertir los puntos del usuario a un número entero
        click = parseInt(userPoints);
    }*/
    
    // Actualizar la interfaz de usuario con los puntos recuperados
    //update();
});

let inventario = Array(20).fill(0);
let clickAuto = Array.from({ length: 20 }, (_, i) => i + 1);
let precioClick = Array.from({ length: 20 }, (_, i) => (i + 1) * 2);


function clic() {
    click++;
    //enviarClicks(click);
    enviar();
    verUserpoints();
}

function comprar(item) {
    if (click >= precioClick[item]) {
        inventario[item]++;
        click -= precioClick[item];
    }  else {
        alert("No tienes suficiente clicks");
    }
}

function auto() {
    for (var i = 0; i < inventario.length; i++) {
        click += inventario[i]*clickAuto[i];
    }
}

function update() {
    document.getElementById("valorPuntuacion").innerHTML = click;

    let inventarioHTML = '';

    // Agregar items al inventario
    for (let i = 0; i < 20; i++) {
        inventarioHTML += `item${i + 1}: ${inventario[i]}<br>`;
    }

    document.getElementById("inventario").innerHTML = inventarioHTML;
}


/*function enviarClicks(clicks) {
    console.log('enviar ok');
    fetch('http://localhost/Clicker_Master_2000/Laravel/cm2000/public/index/guardarPuntos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            // Puedes añadir otros headers si es necesario, como tokens de autenticación
        },
        body: JSON.stringify({ userId, clicks }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al guardar clicks');
        }
        // Puedes manejar la respuesta si es necesario
    })
    .catch(error => {
        console.error('Error:', error);
    });
}*/

function verUserpoints() {
    $.ajax({
        url: '/Clicker_Master_2000/Laravel/cm2000/public/index/all',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function(res){
        var datos = JSON.parse(res);
        console.log(res);
        
        for (let x = 0; x < datos.length; x++) {
            click = datos[x].point;
            userId = datos[x].user_id;
        }
        console.log('Puntos del usuario:', click);
            
        // Almacenar los puntos del usuario en el almacenamiento local del navegador
        //localStorage.setItem('userPoints', click);
        guardarDatosUsuario(userId, click);
        
        
        // Actualizar la interfaz de usuario con los nuevos puntos
        //update();
        //console.log(click);
    });
}

function enviar() {
    $.ajax({
        url: '/Clicker_Master_2000/Laravel/cm2000/public/index/guardarPuntos', // Ruta para insertar datos en la base de datos
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            point: click 
        }
    }).done(function(response){
        console.log(response); 
    });
}



let updatePantalla = 30;
let updateAuto = 1;

setInterval(function() {
    auto();
},1000/updateAuto);

setInterval(function() {
    update();
},1000/updatePantalla);

const datos = [
    'Hiurgiy',
    'Klosvans',
    'Piwecer',
    'Iinshall',
    'Qonbruix',
    'Lillelv',
    'Frioxaz',
    'Pullar',
    'Dewass',
    'Krayfgur',
    'Porstyk',
    'Gyevrer',
    'Oinzus',
    'Vionhaas',
    'Palhurrak',
    'Atensis',
    'Wountuhs',
    'Eimnas',
    'Frolanta',
    'Zindor'
];



function crearBotones() {
    const contenedor = document.getElementById('btncompras');
    let contador = 0;

    datos.forEach(nombre => {
        
        const boton = document.createElement('button');

        boton.textContent = nombre;

        boton.classList.add('bg-blue-500', 'hover:bg-blue-600', 'text-white', 'font-bold', 'py-2', 'px-4', 'rounded', 'ml-2');

        boton.setAttribute('onclick', 'comprar(' + contador + ')'); // Añade el atributo onclick con la función comprar y el contador como argumento

        contenedor.appendChild(boton);

        contador++; // Incrementa el contador para el próximo botón
    });
}



// Llamar a la función para crear los botones al cargar la página (opcional)
window.addEventListener('DOMContentLoaded', crearBotones);


function verificarSesion() {
    $.ajax({
        url: '/Clicker_Master_2000/Laravel/cm2000/public/index/api',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response) {
                // El usuario está autenticado
                console.log('Usuario autenticado:', response);
                // Realizar acciones específicas para usuarios autenticados, como mostrar opciones de menú adicionales, etc.
                //iniciarSesionExitoso()
                
            } else {
                // El usuario no está autenticado
                console.log('Usuario no autenticado');
                // Realizar acciones específicas para usuarios no autenticados, como ocultar opciones de menú, mostrar un formulario de inicio de sesión, etc.
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function limpiarLocalStorage() {
    localStorage.removeItem('userPoints');
}

function iniciarSesionExitoso() {
    // Limpiar el localStorage para eliminar los datos del usuario anterior
    limpiarLocalStorage();
    // Otros pasos para la sesión exitosa...
}

function guardarDatosUsuario(id, datos) {
    localStorage.setItem('usuario_' + id, JSON.stringify(datos));
}

function obtenerDatosUsuario(id) {
    var datos = localStorage.getItem('usuario_' + id);
    return datos ? JSON.parse(datos) : null;
}




