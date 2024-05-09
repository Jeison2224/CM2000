let click = 0;
let userId = null;

window.addEventListener('load', function() {
    // Llamar a la función para verificar el estado de inicio de sesión cuando se carga la página
    verificarSesion();
    verUserpoints();
    // Recuperar los puntos del usuario del almacenamiento local
    var userPoints = localStorage.getItem('userPoints');
    click = obtenerDatosUsuario(userId);
    
    if (userPoints !== null) {
        // Convertir los puntos del usuario a un número entero
        click = parseInt(userPoints);
    }
    
    // Actualizar la interfaz de usuario con los puntos recuperados
    update();
});

let inventario = Array(20).fill(0);
let clickAuto = Array.from({ length: 20 }, (_, i) => i + 1);
let precioClick = Array.from({ length: 20 }, (_, i) => (i + 1) * 2);
verInventario();


function clic() {
    click++;
    //enviarClicks(click);
    enviar();
    verUserpoints();
    //verInventario();
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

    //let inventarioHTML = '';

    // Agregar items al inventario
    /*for (let i = 0; i < 20; i++) {
        inventarioHTML += `item${i + 1}: ${inventario[i]}<br>`;
    }*/

    document.getElementById("inventario").innerHTML = `Hiurgiy: ${inventario[0]}<br>
                                                        Klosvans: ${inventario[1]}<br>
                                                        Piwecer: ${inventario[2]}<br>
                                                        Iinshall: ${inventario[3]}<br>
                                                        Qonbruix: ${inventario[4]}<br>
                                                        Lillelv: ${inventario[5]}<br>
                                                        Frioxaz: ${inventario[6]}<br>
                                                        Pullar: ${inventario[7]}<br>
                                                        Dewass: ${inventario[8]}<br>
                                                        Krayfgur: ${inventario[9]}<br>
                                                        Porstyk: ${inventario[10]}<br>
                                                        Gyevrer: ${inventario[11]}<br>
                                                        Oinzus: ${inventario[12]}<br>
                                                        Vionhaas: ${inventario[13]}<br>
                                                        Palhurrak: ${inventario[14]}<br>
                                                        Atensis: ${inventario[15]}<br>
                                                        Wountuhs: ${inventario[16]}<br>
                                                        Eimnas: ${inventario[17]}<br>
                                                        Frolanta: ${inventario[18]}<br>
                                                        Zindor: ${inventario[19]}
`;

    //document.getElementById("inventario").innerHTML = inventarioHTML;
}

function guardarInventario() {
    let inventoryData = {
        items: []
    };

    // Recorre los items del inventario
    for (let i = 1; i <= 20; i++) {
        // Recupera el ID del ítem y la cantidad del atributo HTML
        let item_id = document.getElementById("item" + i).getAttribute("data-item-id");
        let item_cantidad = inventario[i - 1];

        // Agrega el ítem al objeto de inventario
        inventoryData.items.push({ id: item_id, cantidad: item_cantidad });
    }

    // Envía el inventario del usuario al backend
    $.ajax({
        url: '/Clicker_Master_2000/Laravel/cm2000/public/index/guardarInventario',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: JSON.stringify(inventoryData),
        contentType: 'application/json',
    }).done(function(response) {
        console.log('Inventario actualizado:', response);
        
    }).fail(function(xhr, status, error) {
        console.error('Error al actualizar el inventario:', error);
    });
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
        var datos = res;
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
        console.log(click);
        console.log(userId);
    });
}


function verInventario() {
    $.ajax({
        url: '/Clicker_Master_2000/Laravel/cm2000/public/index/verInventario',
        method: 'GET',
        success: function(response) {
            // Parsear la respuesta JSON
            var datos = response;
            console.log(datos);

            // Limpiar cualquier contenido anterior en el array inventario
            inventario = Array(20).fill(0); 

            // Iterar sobre los datos del inventario y añadir la cantidad de cada ítem al array inventario
            for (let x = 0; x < datos.length; x++) {
                var cantidad = datos[x].cantidad;
                var itemId = datos[x].item_id;

                // Añadir la cantidad al ítem correspondiente en el array inventario
                inventario[itemId - 1] = cantidad; 
            }

            // Ahora el array inventario contiene las cantidades de cada ítem del inventario
            console.log(inventario);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}




function enviar() {
    $.ajax({
        url: '/Clicker_Master_2000/Laravel/cm2000/public/index/guardarPuntos', 
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
    let id = 1;

    datos.forEach(nombre => {
        
        const boton = document.createElement('button');

        boton.textContent = nombre;

        boton.classList.add('bg-blue-500', 'hover:bg-blue-600', 'text-white', 'font-bold', 'py-2', 'px-4', 'rounded', 'ml-2');

        boton.setAttribute('onclick', 'comprar(' + contador + ')'); 

        boton.setAttribute('id', 'item' + id + '');
       
        boton.setAttribute('data-item-id', id );

        contenedor.appendChild(boton);

        contador++;
        id++;
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
                
                console.log('Usuario autenticado:', response);
                
                iniciarSesionExitoso()
                
            } else {
                
                console.log('Usuario no autenticado');
                
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
    
}

function guardarDatosUsuario(id, datos) {
    localStorage.setItem('usuario_' + id, JSON.stringify(datos));
}

function obtenerDatosUsuario(id) {
    var datos = localStorage.getItem('usuario_' + id);
    return datos ? JSON.parse(datos) : null;
}




