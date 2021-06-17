function edit(id, estado) {
    var URLactual = window.location;
    var url = "";
    if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-usuarios.php"){
        console.log("usuarios");
        url = "../../controllers/UsuarioController.php";
    } else if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-aptos.php"){
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
    if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-usuarios.php"){
        url = "../../controllers/UsuarioController.php";
    } else if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-torres.php"){
        url = "../../controllers/TorreController.php";
    } else if (URLactual.pathname == "/Proyecto-Conjunto/views/html/gestor-aptos.php"){
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