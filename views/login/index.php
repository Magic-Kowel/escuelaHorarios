<?php @session_start();
if (isset($_SESSION['logueado'])) {
    header("location:../horarios");
}?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once('../../includes/head.php'); ?>
    <body>
        <div class="login container-fluid" id='app'>
            <div class="row">
                <div class="col-md-4 offset-md-4 mt-5">
                    <form id="loginForm" autocomplete="off" class="card pt-5" @submit.prevent="login">
                        <div class="card-header text-center">
                            <h1>
                                Login
                            </h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                    📧
                                    </span>
                                    <input
                                        v-model="email"
                                        id="email"
                                        name="email"
                                        type="email"
                                        class="form-control"
                                        placeholder="Correo"
                                        aria-label="Correo"
                                        aria-describedby="basic-addon1"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">
                                    🔒
                                    </span>
                                    <input
                                        v-model="pass"
                                        id="pass"
                                        name="pass"
                                        type="password"
                                        class="form-control"
                                        placeholder="Contraseña"
                                        aria-label="Contraseña"
                                        aria-describedby="basic-addon2"
                                    />
                                </div>
                            </div>
                            <div class="d-grid gap-1">
                                <button
                                    type="submit"
                                    class="btn btn-info btn-lg btn-block">
                                    Entrar
                                </button>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <span>Olvido su contraseña</span><a href="#">Recuperar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../../js/login.js"></script>
    </body>
</html>