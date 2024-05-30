let click = 0;
let userId = null;

//enviar();

window.addEventListener('load', function() {
    
    borrarDatosUsuarioNull();
    verificarSesion();
    verUserpoints();
    verItem();
    
    click = obtenerDatosUsuario(userId);
    
    
    update();
});

var cont = 0;
window.addEventListener('click', function() {

    if (cont == 0) {
        cont ++;
        var audio = new Audio("../public/sound/music.mp3");
        audio.volume = 0.1;
        audio.play();
    }

});

let inventario = Array(20).fill(0);
let clickAuto = [];
let precioClick = [];
let logros = [];
let ranking = [];
let items = [];
let users = [];
let logrosObtenidos = [];

verInventario();

//funcion para aumentar los clics
function clic() {
    click++;
    var audio = new Audio("../public/sound/Click.mp3");
    audio.volume = 0.3;
    audio.play();
}

//funcion para comprar items y añadirlos al inventario
function comprar(item) {
    if (click >= precioClick[item]) {
        inventario[item]++;
        click -= precioClick[item];
    }  else {
        alert("No tienes suficiente clicks");
    }
}

//funcion para generar clicks de manera automatica
function auto() {
    for (var i = 0; i < inventario.length; i++) {
        click += inventario[i]*clickAuto[i];
    }
}

//funcion para actualizar el inventario y el valor de los click en el html
// Objeto con los valores para cada item
const valoresItems = {
    'Hiurgiy': 1,
    'Klosvans': 2,
    'Piwecer': 4,
    'Iinshall': 8,
    'Qonbruix': 16,
    'Lillelv': 32,
    'Frioxaz': 64,
    'Pullar': 128,
    'Dewass': 256,
    'Krayfgur': 512,
    'Porstyk': 2224,
    'Gyevrer': 1024,
    'Oinzus': 4096,
    'Vionhaas': 8192,
    'Palhurrak': 16384,
    'Atensis': 32768,
    'Wountuhs': 65536,
    'Eimnas': 131072,
    'Frolanta': 262144,
    'Zindor': 524288
    // Agrega aquí los valores para el resto de los items
  };
  
  function update() {
    document.getElementById("valorPuntuacion").innerHTML = click;
    document.getElementById("inventario").innerHTML = `
    <div class="infoMejoras">
      <span>Hiurgiy:</span> <span>${inventario[0]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[0] * valoresItems["Hiurgiy"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Klosvans:</span> <span>${inventario[1]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[1] * valoresItems["Klosvans"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Piwecer:</span> <span>${inventario[2]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[2] * valoresItems["Piwecer"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Iinshall:</span> <span>${inventario[3]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[3] * valoresItems["Iinshall"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Qonbruix:</span> <span>${inventario[4]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[4] * valoresItems["Qonbruix"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Lillelv:</span> <span>${inventario[5]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[5] * valoresItems["Lillelv"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Frioxaz:</span> <span>${inventario[6]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[6] * valoresItems["Frioxaz"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Pullar:</span> <span>${inventario[7]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[7] * valoresItems["Pullar"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Dewass:</span> <span>${inventario[8]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[8] * valoresItems["Dewass"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Krayfgur:</span> <span>${inventario[9]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[9] * valoresItems["Krayfgur"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Porstyk:</span> <span>${inventario[10]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[10] * valoresItems["Porstyk"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Gyevrer:</span> <span>${inventario[11]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[11] * valoresItems["Gyevrer"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Oinzus:</span> <span>${inventario[12]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[12] * valoresItems["Oinzus"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Vionhaas:</span> <span>${inventario[13]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[13] * valoresItems["Vionhaas"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Palhurrak:</span> <span>${inventario[14]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[14] * valoresItems["Palhurrak"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Atensis:</span> <span>${inventario[15]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[15] * valoresItems["Atensis"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Wountuhs:</span> <span>${inventario[16]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[16] * valoresItems["Wountuhs"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Eimnas:</span> <span>${inventario[17]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[17] * valoresItems["Eimnas"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Frolanta:</span> <span>${inventario[18]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[18] * valoresItems["Frolanta"]}</span><br>
    </div>
    <div class="infoMejoras">
      <span>Zindor:</span> <span>${inventario[19]}</span><br>
      <span>Clics por segundo:</span> <span>${inventario[19] * valoresItems["Zindor"]}</span><br>
    </div>
    `;
    comprobarLogros(click);
  }

//funcion para guardar datos del inventario
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

//Recuperar puntos de usuarios desde la base de datos
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
            
        guardarDatosUsuario(userId, click);
        //console.log(click);
        //console.log(userId);
    });
}

//Recuperar inventario desde la base de datos
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

            //console.log(inventario);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}



//Guardar puntos de usuarios y los envia a la base de datos
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

//variables para updates de pantalla
let updatePantalla = 30;
let updateAuto = 1;

//aqui se actualizan los puntos automaticos
setInterval(function() {
    auto();
},1000/updateAuto);

//aqui se actualiza la pantalla
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

//funcion para verificar la sesion del usuario que esta logeado
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

//Recuperar items desde la base de datos
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
            
            precioClick = items.map(i => i.precio);
            clickAuto = items.map(i => i.cantidad);
            //console.log(precioClick);
            //console.log(clickAuto);

            //forEach para crear los botones de las mejoras
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

//Recuperar los logros desde la base de datos
$.ajax({
    url: verLogroUrl,
    method: 'GET',
    success: function(response) {
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

$.ajax({
    url: verUserUrl,
    method: 'GET',
    success: function(response) {
      var datos = response;
      //console.log(datos);
      users = [];
  
      // Obtener el ID del usuario actual
      var usuarioId = datos.id; // Ajusta esto según la estructura de la respuesta del servidor
  
      // Función para obtener la clave única del usuario
  
      // Recuperar los logros obtenidos del localStorage
        id = usuarioId;
  
      for (let x = 0; x < datos.length; x++) {
        var id = datos[x].id;
        var nombre = datos[x].name;
        var user = {
          id: id,
          nombre: nombre
        };
        users.push(user);
        //console.log(users);
      }
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
});

logrosObtenidos = JSON.parse(localStorage.getItem(obtenerIDUsuario())) || [];

function comprobarLogros(puntosJugador) {
  logros.forEach(logro => {
    if (puntosJugador >= logro.puntos && !logrosObtenidos.includes(logro.nombre)) {
      logrosObtenidos.push(logro.nombre);
      localStorage.setItem(obtenerIDUsuario(userId), JSON.stringify(logrosObtenidos));
      
      // Verificar si el logro no se ha obtenido anteriormente antes de mostrar la notificación
      if (!logrosObtenidos.includes(logro.nombre)) {
        mostrarNotificacion(logro);
        var audio = new Audio("../public/sound/logro.mp3");
        audio.volume = 0.5;
        audio.play();
      }
    }
  });
}

function mostrarNotificacion(logro) {
    alert(`¡Has logrado un nuevo hito!\n\n${logro.nombre}\n${logro.descripcion}`);
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

function obtenerIDUsuario(userId) {
    if (userId === null) {
        // Si el id es null, llamar a la función enviar()
        enviar();
        obtenerIDUsuario(userId);
        console.log(userId);
    } else {
        // Si el id no es null, guardar los datos en el localStorage
        console.log(userId);
        return `logrosUsuario_${userId}`;
    }
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

console.log(verDatosUsuario());

// Llamar a la función para obtener los datos
let datosUsuario = verDatosUsuario();
console.log(datosUsuario);

function borrarDatosUsuarioNull() {
    localStorage.removeItem('usuario_null');
}

function borrarDatosUsuarioUndefined() {
    localStorage.removeItem('logrosUsuario_undefined');
}

borrarDatosUsuarioNull();
borrarDatosUsuarioUndefined();





