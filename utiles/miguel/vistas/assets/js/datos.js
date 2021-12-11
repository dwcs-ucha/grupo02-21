function updateTextValue(valor, updateField) {
    document.getElementById(updateField).value = valor;
}

function muestraEquipos() {
    document.getElementById('datos').style.display = 'none';
    document.getElementById('mensaje-error').style.display = 'none';
    document.getElementById('equipos').style.display = 'block';
}