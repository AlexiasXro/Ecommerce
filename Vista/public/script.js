function actualizarReloj() {
    var ahora = new Date();

    var horas = ahora.getHours();
    var minutos = ahora.getMinutes();

    // Añadir un cero delante de los números menores de 10
    horas = horas < 10 ? '0' + horas : horas;
    minutos = minutos < 10 ? '0' + minutos : minutos;

    // formato para el día y el mes en español
    var opcionesFecha = { weekday: 'short', year: 'numeric', month: 'numeric', day: 'numeric' }

    // Obtener la fecha y hora 
    var fecha = ahora.toLocaleDateString('es-ES', opcionesFecha);
    var horaActual = horas + ':' + minutos;

    // Actualizar el contenido del reloj
    var reloj = document.getElementById('reloj');
    reloj.innerHTML = 'Hora: ' + horaActual + '<br>' + 'Fecha: ' + fecha;
}

// Actualizar cada segundo
setInterval(actualizarReloj, 1000);

// Inicializar el reloj
actualizarReloj();