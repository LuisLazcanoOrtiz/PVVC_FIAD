
function validar() {
   var usuario = document.getElementById('usuario').value.trim();
   var password = document.getElementById('pass').value.trim();

    if(usuario === '' || password === '') {
        Swal.fire(
            'Atencion...',
            'Todos los campos son necesarios',
            'error'
        );
        return false;
    } 
}
