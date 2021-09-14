<!DOCTYPE html>
<html lang="en">
<?php include_once('./../../includes/head.php'); ?>
<body>
<div id="app" >
        <?php include_once('../../includes/menu.php'); ?>
        <main class="container">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button class="btn btn-primary" 
                type="button" 
                data-bs-toggle="modal" 
                data-bs-target="#addUser">
                    Agregar
                </button>
                
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="search" 
                v-model="buscar" 
                placeholder="Buscar Nombre">
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
                            <th scope="col">Acciones</th>
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
                                    <button @click="deleteUser(item.id_usuario)" 
                                    type="button" 
                                    class="btn btn-danger">
                                        Eliminar
                                    </button>
                                    <button type="button" @click="getDataUser(item.id_usuario,item.nombre_usuario,item.apellidos,item.email,item.privilegio)"
                                            class="btn btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateUser">
                                        Editar
                                    </button>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <div class="modal fade " id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUser"  @submit.prevent="addUser" >
                        <div class="mb-3">
                            <label for="inputNombre" class="form-label">Nombre</label>
                            <input type="text" 
                            name="nombreUser" 
                            v-model="nombreUser" 
                            class="form-control" 
                            id="inputNombre" 
                            require>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text"  
                            name="apellidosUser"  
                            v-model="apellidosUser" 
                            class="form-control" 
                            id="apellidos" 
                            require>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email"  
                            name="correoUser"  
                            v-model="correoUser"  
                            class="form-control" 
                            id="correo" 
                            require>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password"  
                            name="passwordUser"  
                            v-model="password"  
                            class="form-control" 
                            id="password" 
                            require>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Confirmar Contraseña</label>
                            <input type="password"  
                            name="passwordUser2"
                            v-model="password2"
                            class="form-control" 
                            id="password2" 
                            require>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" 
                            name="typeUser"  
                            v-model="privilegio"  
                            aria-label="Default select example" 
                            require>
                                <option selected >Privilegio</option>
                                <option v-for="item in typeUser" 
                                :key="item.id_privilegio" 
                                :value="item.id_privilegio" 
                                v-text="item.privilegio" ></option>
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" 
                            class="btn btn-primary"  
                            data-bs-dismiss="modal" 
                            aria-label="Close">
                                Agregar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade " id="updateUser" tabindex="-1" aria-labelledby="updateUserModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModal">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUserUpdate"  @submit.prevent="updateUser">
                        <input  name="id" type="hidden" :value="this.id">
                        <div class="mb-3">
                            <label for="inputNombre" class="form-label">Nombre</label>
                            <input type="text" 
                            name="nombreUser"
                            :value="this.nombreUser"  
                            class="form-control" 
                            id="inputNombreUpdate">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text"  
                            name="apellidosUser"
                            :value="this.apellidosUser" 
                            class="form-control" 
                            id="apellidosUpdate">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email"  
                            name="correoUser"
                            :value="this.correoUser"  
                            class="form-control" 
                            id="correoUpdate">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="text"  
                            name="passwordUser"
                            v-model="password"
                            class="form-control" 
                            id="passwordUpdate">
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Confirmar Contraseña</label>
                            <input type="text" 
                            name="passwordUser2"
                            v-model="password2"
                            class="form-control" 
                            id="password2Update">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" 
                            name="typeUser"
                            v-model="privilegio"
                            aria-label="Default select example">
                                <option selected >Privilegio</option>
                                <option 
                                v-for="item in typeUser" 
                                :key="item.id_privilegio" 
                                :value="item.id_privilegio"  
                                v-text="item.privilegio" >
                                </option>
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button
                            type="submit"
                            class="btn btn-primary"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            @click="updateUser"
                            >
                                Editar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/usuarios.js"></script>
</body>
</html>