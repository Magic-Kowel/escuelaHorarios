<!DOCTYPE html>
<html lang="en">
<?php include_once('../../includes/head.php'); ?>
<?php include_once('./../../includes/logeado.php'); ?>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg text-white navbar-dark bg-fullColor">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">School</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span> </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='./../../includes/salir.php'>
                            <span> Salir</span>    
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <main class="container">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in datosFiltrados" :key="item.id_clase">
                            <th scope="row">{{item.id_clase}}</th>
                            <td>{{item.nombre_usuario}}</td>
                            <td>{{item.salon}}</td>
                            <td>{{item.horario_inicio}}</td>
                            <td>{{item.horario_fin}}</td>
                        <tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="../../js/horarios.js"></script>
</body>

</html>