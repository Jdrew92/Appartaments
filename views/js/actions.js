function edit(id, estado) {
    var URLactual = window.location;
    var url = "";
    if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-usuarios.php") {
        console.log("usuarios");
        url = "../../controllers/UsuarioController.php";
    } else if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-aptos.php") {
        url = "../../controllers/ApartamentoController.php";
    }
    if (confirm("¿Esta seguro de cambiar el estado?")) {
        $.post(url, {
            update: "update",
            id: id,
            estado: estado
        });
        location.reload();
        return false;
    }
}

function remove(id) {
    var URLactual = window.location;
    var url = "";
    if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-usuarios.php") {
        url = "../../controllers/UsuarioController.php";
    } else if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-torres.php") {
        url = "../../controllers/TorreController.php";
    } else if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-aptos.php") {
        url = "../../controllers/ApartamentoController.php";
    }
    if (confirm("¿Desea eliminar este elemento?")) {
        $.post(url, {
            delete: 'delete',
            id: id
        });
        location.reload();
        return false;
    }
}

function selectTorre() {
    let idTorre = document.getElementById("torres").value;
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let num_doc = document.getElementById("num_doc").value;
    var url = "/Proyecto-Conjunto/views/html/crear-inquilino.php";
    window.location.replace(url+"?idt="+idTorre+"&nm="+nombre+"&ap="+apellido+"&dc="+num_doc);
    return false;
}