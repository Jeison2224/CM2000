let click = 0;
let userId = null;

//enviar();

window.addEventListener('load', function() {
    // Llamar a la función para verificar el estado de inicio de sesión cuando se carga la página
    //crearBotones();
    borrarDatosUsuarioNull();
    verificarSesion();
    verUserpoints();
    verItem();
    
    
    

    click = obtenerDatosUsuario(userId);
    
    // Actualizar la interfaz de usuario con los puntos recuperados
    update();
});

let inventario = Array(20).fill(0);
let clickAuto = [];
let precioClick = [];
let logros = [];
let ranking = [];
let items = [];

verInventario();


function clic() {
    click++;
    //enviarClicks(click);
    //enviar();
    //verUserpoints();
    //verInventario();
}

function comprar(item) {
    if (click >= precioClick[item]) {
        inventario[item]++;
        click -= precioClick[item];
        //alert(`Compraste ${item.nombre} por ${item.precio} con ${item.cantidad} clics.`);
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

    document.getElementById("inventario").innerHTML = `
        <span>Hiurgiy:</span> ${inventario[0]}<br>
        <span>Klosvans:</span> ${inventario[1]}<br>
        <span>Piwecer:</span> ${inventario[2]}<br>
        <span>Iinshall:</span> ${inventario[3]}<br>
        <span>Qonbruix:</span> ${inventario[4]}<br>
        <span>Lillelv:</span> ${inventario[5]}<br>
        <span>Frioxaz:</span> ${inventario[6]}<br>
        <span>Pullar:</span> ${inventario[7]}<br>
        <span>Dewass:</span> ${inventario[8]}<br>
        <span>Krayfgur:</span> ${inventario[9]}<br>
        <span>Porstyk:</span> ${inventario[10]}<br>
        <span>Gyevrer:</span> ${inventario[11]}<br>
        <span>Oinzus:</span> ${inventario[12]}<br>
        <span>Vionhaas:</span> ${inventario[13]}<br>
        <span>Palhurrak:</span> ${inventario[14]}<br>
        <span>Atensis:</span> ${inventario[15]}<br>
        <span>Wountuhs:</span> ${inventario[16]}<br>
        <span>Eimnas:</span> ${inventario[17]}<br>
        <span>Frolanta:</span> ${inventario[18]}<br>
        <span>Zindor:</span> ${inventario[19]}<br>
`;



    //document.getElementById("inventario").innerHTML = inventarioHTML;

    //comprobarLogros(click);
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
        url: guardarInventarioUrl,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: JSON.stringify(inventoryData),
        contentType: 'application/json',
    }).done(function(response) {
        //console.log('Inventario actualizado:', response);
        
    }).fail(function(xhr, status, error) {
        console.error('Error al actualizar el inventario:', error);
    });
}

function verUserpoints() {
    $.ajax({
        url: allUrl,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function(res){
        var datos = res;
        //console.log(datos);
        
        for (let x = 0; x < datos.length; x++) {
            userId = datos[x].user_id;
            click = datos[x].point;
        }
        //console.log(userId);
        //console.log('Puntos del usuario:', click);
            
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
        url: verInventarioUrl,
        method: 'GET',
        success: function(response) {
            // Parsear la respuesta JSON
            var datos = response;
            //console.log(datos);

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
            //console.log(inventario);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}




function enviar() {
    $.ajax({
        url: guardarPuntosUrl, 
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


function verificarSesion() {
    $.ajax({
        url: apiUrl,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response) {
                
                //console.log('Usuario autenticado:', response);
                
                iniciarSesionExitoso()
                
            } else {
                
                //console.log('Usuario no autenticado');
                
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function verItem() {
    $.ajax({
        url: verItemUrl,
        method: 'GET',
        success: function(response) {
            // Parsear la respuesta JSON
            var datos = response;
            //console.log(datos);
            items = [];

            for (let x = 0; x < datos.length; x++) {
                var nombre = datos[x].name;
                var precio = datos[x].precio;
                var cantidad = datos[x].cantidadclics;
                

                var item = {
                    nombre: nombre,
                    precio: precio,
                    cantidad: cantidad
                };
                items.push(item);
            }
            
            //listarRankings(ranking);
            precioClick = items.map(i => i.precio);
            clickAuto = items.map(i => i.cantidad)
            //crearBotones(items);
            //console.log(precioClick);
            //console.log(clickAuto);

            const contenedor = document.getElementById('btncompras');
    
            items.forEach((item, index) => {
                const boton = document.createElement('button');
        
                boton.innerHTML = `${item.nombre} <br> Precio: ${item.precio} <br> Cantidad de clics: ${item.cantidad}`;
        
                boton.classList.add('bg-blue-500', 'hover:bg-blue-600', 'text-white', 'font-bold', 'py-2', 'px-4', 'rounded', 'ml-2', 'button_slide', 'slide_left');
        
                boton.setAttribute('onclick', `comprar(${index})`); 
        
                boton.setAttribute('id', `item${index + 1}`);
                boton.setAttribute('data-item-id', index + 1);
                boton.setAttribute('data-item-price', item.precio);
                boton.setAttribute('data-item-clicks', item.cantidad);
        
                contenedor.appendChild(boton);
            });

        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$.ajax({
    url: verLogroUrl,
    method: 'GET',
    success: function(response) {
        // Parsear la respuesta JSON
        var datos = response;
        console.log(datos);
        logros = [];

        for (let x = 0; x < datos.length; x++) {
            var nombre = datos[x].name; 
            var descripcion = datos[x].description; 
            var puntos = datos[x].point; 
                

            var logro = {
                nombre: nombre,
                descripcion: descripcion,
                puntos: puntos
            };
            
                
            logros.push(logro);
        }
            

    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});

let logrosObtenidos = [];

function comprobarLogros(puntosJugador) {
    logros.forEach(logro => {
        if (puntosJugador >= logro.puntos && !logrosObtenidos.includes(logro.nombre)) {
            logrosObtenidos.push(logro.nombre);
            mostrarNotificacion(logro);
        }
    });
}

function mostrarNotificacion(logro) {
    alert(`¡Has logrado un nuevo hito!\n\n${logro.nombre}\n${logro.descripcion}`);
}




function limpiarLocalStorage() {
    var test = localStorage.removeItem('userPoints');
    console.log(test);
}

function iniciarSesionExitoso() {
    // Limpiar el localStorage para eliminar los datos del usuario anterior
    limpiarLocalStorage();
    
}

function guardarDatosUsuario(id, datos) {
    if (id === null) {
        // Si el id es null, llamar a la función enviar()
        enviar();
    } else {
        // Si el id no es null, guardar los datos en el localStorage
        localStorage.setItem('usuario_' + id, JSON.stringify(datos));
    }
}

function obtenerDatosUsuario(id) {
    var datos = localStorage.getItem('usuario_' + id);
    //console.log(datos);
    return datos ? JSON.parse(datos) : null;
}

function guardarDatos() {
    guardarInventario();
    enviar();
}

/*function changeImage(state) {
    const imgElement = document.getElementById('cursorImg');
    switch (state) {
        case 'hover':
            imgElement.src = '/img/cursorclicsvg.svg'; // Cambia a la imagen de hover
            break;
        case 'click':
            imgElement.src = '/img/cursorsum.svg'; // Cambia a la imagen de clic
            break;
        default:
            imgElement.src = '/img/cursor.svg'; // Cambia a la imagen por defecto
    }
}*/

function verDatosUsuario() {
    let datos = [];
    for (let i = 0; i < localStorage.length; i++) {
        let clave = localStorage.key(i);
        let valor = localStorage.getItem(clave);
        datos.push({ clave: clave, valor: valor });
    }
    return datos;
}

// Llamar a la función para obtener los datos
let datosUsuario = verDatosUsuario();
console.log(datosUsuario);

function borrarDatosUsuarioNull() {
    localStorage.removeItem('usuario_null');
}

borrarDatosUsuarioNull();




