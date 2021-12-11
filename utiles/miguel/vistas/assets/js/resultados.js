var totalEquipos = document.getElementById('total-equipos').value;
var nombres = [];
var consumos = [];
var colores = [];

for (let i = 0; i < totalEquipos; i++) {
    let equipo = document.getElementById(`equipo_${i}`);
    nombres.push(equipo.dataset.nombre);
    consumos.push(equipo.value);
    colores.push(equipo.dataset.color);
}

const ctx = document.getElementById('myChart').getContext('2d');
const data = {
    labels: nombres,
    datasets: [{
        label: 'Consumos por equipo',
        data: consumos,
        backgroundColor: colores,
        hoverOffset: 10
    }],
}
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
});