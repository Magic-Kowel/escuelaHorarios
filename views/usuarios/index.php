<!DOCTYPE html>
<html lang="en">
<?php include_once('./../../includes/head.php'); ?>
<body>
<div id="app" >
        <?php include_once('../../includes/menu.php'); ?>
        <main class="container">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button class="btn btn-primary" type="button">
                    Agregar
                </button>
                
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="search" v-model="buscar" placeholder="Buscar Nombre">
                <div class="input-group-append">
                    <span id="button-search" class="input-group-text">🔎</span>
                </div>
            </div>
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
                        <tr v-for="(item,index) in datosFiltrados" :key="item.id_usuario">
                            <th scope="row">{{item.id_usuario}}</th>
                            <td>{{item.nombre_usuario}}</td>
                            <td>{{item.apellidos}}</td>
                            <td>{{item.email}}</td>
                            <td>{{item.privilegio}}</td>
                            <th>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button @click="deleteUser(item.id_usuario)" type="button" class="btn btn-danger">
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
                <form id="formUser"  @submit.prevent="addUser">
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" name="nombreUser" class="form-control" id="inputNombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text"  name="apellidosUser" class="form-control" id="apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email"  name="correoUser" class="form-control" id="correo">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password"  name="passwordUser" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Confirmar Contraseña</label>
                        <input type="password"  name="passwordUser2" class="form-control" id="password2">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="typeUser" aria-label="Default select example">
                            <option selected >Privilegio</option>
                            <option v-for="item in typeUser" :key="item.id_privilegio" :value="item.id_privilegio" >{{item.privilegio}}</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            Agregar
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src="../../js/usuarios.js"></script>
</body>
</html>