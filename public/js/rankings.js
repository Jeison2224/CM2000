verRanking();

//Recuperar ranking desde la base de datos
function verRanking() {
    $.ajax({
        url: verRankingUrl,
        method: 'GET',
        success: function(response) {
            
            var datos = response;
            //console.log(datos);
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