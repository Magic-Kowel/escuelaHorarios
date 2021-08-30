<!DOCTYPE html>
<html lang="en">
<?php include_once('./../../includes/head.php'); ?>
<body>
<div id="app" >
        <?php include_once('../../includes/menu.php'); ?>
        <main class="container">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Privilegio</th>
                            <th scope="col">Mothodo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in usuarios" :key="item.id_usuario">
                            <th scope="row">{{item.id_usuario}}</th>
                            <td>{{item.nombre_usuario}}</td>
                            <td>{{item.apellidos}}</td>
                            <td>{{item.email}}</td>
                            <td>{{item.privilegio}}</td>
                            <th>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                    <button type="button" class="btn btn-warning">
                                        Editar
                                    </button>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="../../js/usuarios.js"></script>
</body>
</html>