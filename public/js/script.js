let click = 0;
let userId = null;

window.addEventListener('load', function() {
    // Llamar a la función para verificar el estado de inicio de sesión cuando se carga la página
    verificarSesion();
    verUserpoints();
    verRanking();
    
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
let logro = [];
let ranking = [];

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
        //console.log(res);
        
        for (let x = 0; x < datos.length; x++) {
            click = datos[x].point;
            userId = datos[x].user_id;
        }
        //console.log('Puntos del usuario:', click);
            
        // Almacenar los puntos del usuario en el almacenamiento local del navegador
        //localStorage.setItem('userPoints', click);
        guardarDatosUsuario(userId, click);
        
        // Actualizar la interfaz de usuario con los nuevos puntos
        //update();
        //console.log(click);
        //console.log(userId);
    });
}


function verInventario() {
    $.ajax({
        url: verInventarioUrl,
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



function crearBotones() {
    const contenedor = document.getElementById('btncompras');
    let contador = 0;
    let id = 1;

    datos.forEach(nombre => {
        
        const boton = document.createElement('button');

        boton.textContent = nombre;

        boton.classList.add('bg-blue-500', 'hover:bg-blue-600', 'text-white', 'font-bold', 'py-2', 'px-4', 'rounded', 'ml-2', 'button_slide', 'slide_left');

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

function verRanking() {
    $.ajax({
        url: verRankingUrl,
        method: 'GET',
        success: function(response) {
            // Parsear la respuesta JSON
            var datos = response;
            console.log(datos);
            ranking = [];

            for (let x = 0; x < datos.length; x++) {
                var nombre = datos[x].name; 
                var puntos = datos[x].point; 
                

                var rankings = {
                    nombre: nombre,
                    puntos: puntos
                };
            
                
                ranking.push(rankings);
            }
            listarRankings(ranking);

        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function listarRankings(rankings) {
    // Supongamos que tienes un contenedor en tu HTML con el id "lista-logros"
    var contenedorRankings = document.getElementById("lista-ranking");

    // Iterar sobre el array de logros
    for (let i = 0; i < rankings.length; i++) {
        // Obtener el logro actual
        var ranking = rankings[i];

        // Crear un elemento de lista <div> para mostrar el logro
        var elementoRanking = document.createElement("div");

        // Establecer el contenido del elemento de lista con el nombre, la descripción y los puntos del logro
        elementoRanking.innerHTML = `
            <div class="logros">
            <p><strong>Nombre:</strong> ${ranking.nombre}</p>
            <p><strong>Puntos:</strong> ${ranking.puntos}</p>
            </div>
        `;

        // Agregar el elemento de lista al contenedor
        contenedorRankings.appendChild(elementoRanking);
    }
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






