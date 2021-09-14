
<!DOCTYPE html>
<html lang="en">
    <?php include_once('../../includes/head.php'); ?>
<body>
    <div id="app" >
        <?php include_once('../../includes/menu.php'); ?>
        <main class="container">
            <form id="formClass"  @submit.prevent="addClass" >
                <div class="mb-3">
                    <label for="inputNombre" class="form-label">Maestro</label>
                    <select class="form-select" 
                    name="teacher"  
                    aria-label="Default select example" 
                    require>
                        <option selected >Maestro</option>
                        <option v-for="item in teachers"
                        :key="item.id_usuario" 
                        :value="item.id_usuario" 
                        v-text="item.nombre_usuario" ></option>
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
                    class="btn btn-primary">
                        Agregar
                    </button>
                </div>
            </form>
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
                        <tr v-for="(item,index) in schedule" :key="item.id_clase">
                            <th scope="row">{{item.id_clase}}</th>
                            <td>{{item.nombre_usuario}}</td>
                            <td>{{item.salon}}</td>
                            <td>{{item.horario_inicio}}</td>
                            <td>{{item.horario_fin}}</td>
                            <th>
                                <button @click="deleteClass(item.id_clase)" 
                                    type="button"
                                    class="btn btn-danger">
                                        Eliminar
                                </button>
                            </th>
                        <tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="../../js/horarios.js"></script>
</body>
</html>