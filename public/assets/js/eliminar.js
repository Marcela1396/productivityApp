function eliminar(ruta) {
    let flag;
    if (confirm(`¿Desea eliminar el registro?`)) {
        const url = document.getElementById('url').value;
        const token = document.getElementsByName('_token')[0].value;

        const urlajax = `${url}/${ruta}`;
        const dataForm = `_token=${token}`;
        console.log(urlajax);
        console.log(dataForm);
        const http = new XMLHttpRequest();
        http.open("DELETE", urlajax, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onload = (e) => {
            console.log(http.response);
            const response = JSON.parse(http.response);
            const tipo = response.status == 'exito' ? 'success' : 'danger';
            let respuesta = document.getElementById('respuesta');
            respuesta.innerHTML = `<div class="alert alert-${tipo} text-center"  role="alert">
         <strong>${response.msg}</strong>
         <button class="btn btn-danger" id="close">X</button>
     
     </div>`;
            if (response.status) {
                alert(response.msg)
            };
            setTimeout(() => {}, 5000);
            response.status ? window.location.replace(url) : null;

            $(document).ready(function () {
                document.getElementById('close').addEventListener('click', () => {
                    alert();
                    close()
                });
            })
        }

        http.send(dataForm)
    }

}


function close() {
    alert('entra')

    let respuesta = document.getElementById('respuesta');
    respuesta.hidden = true;
}
