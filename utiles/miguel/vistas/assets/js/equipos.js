function inicializarConsumos() {
    let tabs = ['cocina', 'limpieza', 'climatizacion', 'electronica', 'transporte', 'iluminacion'];

    tabs.forEach(tab => {

        // Inicializar los valores de la pestaña
        let totalTab = 0;
        // Inicializar valor del consumo de cada aparato
        let aparatos = document.querySelectorAll(`[data-tab='${tab}']`);
        aparatos.forEach(aparato => {
            // Comprobar valor de consumo del aparato
            aparato = aparato.id;
            let consumoTotalAparato = parseFloat(document.getElementById(`${tab}_${aparato}_consumo_total`).value);
            if (consumoTotalAparato > 0) {
                // Inyectar el valor en la etiqueta
                document.getElementById(`${tab}_${aparato}_consumo_total_etiqueta`).innerHTML = formatNumero(consumoTotalAparato);
                document.getElementById(`${tab}_${aparato}_consumo`).style.display = 'block';

                // Añadir el valor al total de la pestaña
                totalTab += consumoTotalAparato;
            } else {
                document.getElementById(`${tab}_${aparato}_consumo`).style.display = 'none';
            }
        });

        // Inicializar valor del consumo total
        document.getElementById(`total_consumo_${tab}`).innerHTML = formatNumero(totalTab);
    });

}

function setMinutosToHoras(minutos) {
    return parseFloat(minutos) / 60;
}

function getTotalHorasAno(horas, minutos) {
    // comprobar que minutos tiene valor sino igualar a cero
    if (minutos) {
        minutos = setMinutosToHoras(minutos)
    } else {
        minutos = 0;
    }

    // comprobar que horas tiene valor, sino igualar a cero
    horas = horas ? horas : 0;

    horas = parseFloat(horas) + parseFloat(minutos);
    return horas * 52;
}

function setConsumo(elem) {
    // Inicializar variables
    let tab, linea, potencia, tipoAparato;
    // Nombre del aparato
    let aparato = elem.dataset.aparato;
    if (!aparato) {
        let espacio = elem.dataset.espacio;

        // Pestaña
        tab = document.getElementById(espacio).dataset.tab;
        // Identificador de línea
        linea = `${tab}_${espacio}_`;
        // Potencia del equipo de iluminacion
        potencia = document.querySelector(`input[name="equipos[${tab}][${espacio}][potencia]"]:checked`).value;
    } else {
        // Pestaña
        tab = document.getElementById(aparato).dataset.tab;
        // Identificador de linea
        linea = `${tab}_${aparato}_`;
        // Potencia del aparato
        potencia = document.getElementById(`${linea}potencia`).value;
    }

    // Numero de unidades del aparatd
    let unidades = document.getElementById(`${linea}unidades`).value;

    // Tipo de aparato
    // 1 == uso temporal parcial semanal ej. 2 horas a la semana
    // 2 == uso continuo. Ej. nevera
    // 3 == cantidad de usos semanales ej. 4 usos a la semana
    // 4 == Calculo de uso por kWh por km/al mes

    if (!aparato) {
        // Si no hay aparato significa que se trata de iluminación
        // el cálculo es igual que el modelo 1
        tipoAparato = '1';
    } else {
        tipoAparato = document.getElementById(aparato).dataset.tipoAparato;
    }

    // Cálculo de consumos
    let horas, min, kmMes, consumoAnual = 0;
    switch (tipoAparato) {
        case '1':
            horas = document.getElementById(`${linea}horas`).value
            min = document.getElementById(`${linea}min`).value
            break;
        case '2':
            horas = 168;
            min = 0;
            break;
        case '3':
            horas = document.getElementById(`${linea}usos_semanales`).value;
            min = 0;
            break;
        case '4':
            kmMes = document.getElementById(`${linea}km_mes`).value
            horas = kmMes;
            break;
    }

    // Solo mostrar datos si tiene unidades, potencia y horas o minutos
    let mostrarResultado = unidades > 0 && potencia > 0 && (horas > 0 || min > 0);

    if (mostrarResultado) {
        // Horas de uso por km mensuales
        if (tipoAparato == '4') {
            consumoAnual = parseFloat(kmMes) * parseFloat(potencia) * parseFloat(unidades) * 12;
        } else {
            // Horas de uso anual
            let totalHoras = getTotalHorasAno(horas, min);
            // Consumo del aparato
            consumoAnual = (totalHoras * parseFloat(potencia) * parseInt(unidades)) / 1000;
        }

        // pasar resultado al total de la linea
        document.getElementById(`${linea}consumo_total`).value = consumoAnual;

    } else {
        document.getElementById(`${linea}consumo_total`).value = 0;
    }

    inicializarConsumos();
}

function formatNumero(numero, decimales = 2) {
    numero = numero.toFixed(decimales);
    numero = numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    return numero;
}

inicializarConsumos();