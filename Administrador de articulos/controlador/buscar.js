//la funcion para hacer la busqueda
document.getElementById('txtBuscar').addEventListener('keyup',
    function buscar() {
        const valores = document.getElementById('txtBuscar').value.toLowerCase();
        const result = document.getElementById('select');
        result.innerHTML = '';
        console.log(valselect);
        for (let i = 0; i < valselect.length; i++) {
            let aBuscar = valselect[i].Nombre.toLowerCase();
            if (aBuscar.indexOf(valores) !== -1) {
                result.innerHTML += `<option value="${valselect[i].Nombre}">${valselect[i].Nombre}
            &emsp;&emsp; ${valselect[i].Estado}</option>`
            }
        }
        if (result.innerHTML === '') {
            result.innerHTML += `<option disabled>No se ha encontrado el Articulo...</option>`
        }
    });
const dialogo = document.getElementById('dialogo');
document.getElementById('Eliminar').addEventListener('click', function preguntar() {
    dialogo.showModal();
    console.log('di vales verga');
});
document.getElementById('Cancelar').addEventListener('click', function cancelar() {
    dialogo.close();
    console.log('di vales verga');
});