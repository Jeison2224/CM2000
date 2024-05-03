var click = 0;

window.addEventListener('load', function() {
    // Recuperar los puntos del usuario del almacenamiento local
    var userPoints = localStorage.getItem('userPoints');
    
    if (userPoints !== null) {
        // Convertir los puntos del usuario a un número entero
        click = parseInt(userPoints);
    }
    
    // Actualizar la interfaz de usuario con los puntos recuperados
    update();
});

let inventario = [0,0,0];
let clickAuto = [1,5,10];
let precioClick = [2,4,6];

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
    document.getElementById("valorPuntuacion").innerHTML  = click;
    document.getElementById("inventario").innerHTML = `item1: ${inventario[0]}<br>
                                                        item2: ${inventario[1]}<br>
                                                        item3: ${inventario[2]}
    `;
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
        }
        console.log('Puntos del usuario:', click);
            
        // Almacenar los puntos del usuario en el almacenamiento local del navegador
        localStorage.setItem('userPoints', click);
        
        // Actualizar la interfaz de usuario con los nuevos puntos
        update();
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
    'Eimnas'
];


function crearBotones() {
    
    const contenedor = document.getElementById('btncompras');

    
    datos.forEach(nombre => {
        
        const boton = document.createElement('button');

        
        boton.textContent = nombre;

        
        boton.classList.add('bg-blue-500', 'hover:bg-blue-600', 'text-white', 'font-bold', 'py-2', 'px-4', 'rounded', 'ml-2');


       
        boton.addEventListener('click', function() {
            console.log('Has hecho clic en ' + nombre);
            
        });

        
        contenedor.appendChild(boton);
    });
}

// Llamar a la función para crear los botones al cargar la página (opcional)
window.addEventListener('DOMContentLoaded', crearBotones);
