<!DOCTYPE html>
<html lang="en">
<?php include_once('../../includes/head.php'); ?>
<?php include_once('./../../includes/logeado.php'); ?>
<?php include_once('./../../includes/sessionMaestro.php'); ?>
<body>
    <div id="app">
        <?php include_once('../../includes/menu.php'); ?>
        <main class="container">
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addClass">
                    Agregar Clase
                </button>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="search" v-model="buscar" placeholder="Buscar Clase">
                <div class="input-group-append">
                    <span id="button-search" class="input-group-text">🔎</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Maestro</th>
                            <th scope="col">Salon</th>
                            <th scope="col">Inicio</th>
                            <th scope="col">Fin</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in datosFiltrados" :key="item.id_clase">
                            <th scope="row">{{item.id_clase}}</th>
                            <td>{{item.nombre_usuario}}</td>
                            <td>{{item.salon}}</td>
                            <td>{{item.horario_inicio}}</td>
                            <td>{{item.horario_fin}}</td>
                            <th class="btn-group" role="group">
                                <button @click="deleteClass(item.id_clase)" type="button" class="btn btn-danger"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    Eliminar
                                </button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#updateClass"
                                    @click="getDataClass(item.id_clase,item.nombre_usuario,item.salon,item.horario_inicio,item.horario_fin)">
                                    Editar
                                </button>
                            </th>
                        <tr>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Add Class -->
        <div class="modal fade " id="addClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Clase</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formClass" @submit.prevent="addClass">
                            <div class="mb-3">
                                <label for="inputNombre" class="form-label">Maestro</label>
                                <select class="form-select" v-model="teacher" name="teacher"
                                    aria-label="Default select example" require>
                                    <option selected>Maestro</option>
                                    <option v-for="item in teachers" :key="item.id_usuario" :value="item.id_usuario"
                                        v-text="item.nombre_usuario"></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Salon</label>
                                <input type="text" v-model="clasRoom" name="clasRoom" class="form-control" id="clasRoom"
                                    require>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Inicio</label>
                                <input type="time" v-model="timeStart" name="timeStart" class="form-control"
                                    id="timeStart" require>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Fin</label>
                                <input type="time" v-model="timeEnd" name="timeEnd" class="form-control" id="timeEnd"
                                    require>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit"
                                class="btn btn-primary"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                >
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
        <!-- Update Class -->
        <div class="modal fade " id="updateClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Clase</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formClassUpdate" @submit.prevent="updateClass">
                        <input  name="id" type="hidden" :value="this.id">
                            <div class="mb-3">
                                <label for="inputNombre" class="form-label">Maestro</label>
                                <select class="form-select" v-model="teacher" name="teacher"
                                    aria-label="Default select example" require>
                                    <option selected>Maestro</option>
                                    <option v-for="item in teachers" :key="item.id_usuario" :value="item.id_usuario"
                                        v-text="item.nombre_usuario"></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Salon</label>
                                <input type="text" 
                                v-model="clasRoom" 
                                name="clasRoom" 
                                class="form-control" 
                                id="clasRoom"
                                require>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Inicio</label>
                                <input type="time"
                                v-model="timeStart"
                                name="timeStart"
                                class="form-control"
                                id="timeStart"
                                require>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Fin</label>
                                <input type="time"
                                v-model="timeEnd"
                                name="timeEnd"
                                class="form-control"
                                id="timeEnd"
                                require>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit"
                                class="btn btn-primary"
                                data-bs-dismiss="modal"
                                aria-label="Close"
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
    <script src="../../js/horarios.js"></script>
</body>

</html>