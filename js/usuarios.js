const app= new Vue ({
    el:'#app',
    data:{
        respuesta:[],
        usuarios:[],
        buscar:'',
        typeUser:[],
    },
    created() {
        this.getUser();
        this.getTypeUser();
    },
    computed:{
        datosFiltrados() {
            return this.usuarios.filter((filtro) => {
                return filtro.nombre_usuario.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        getUser(){
            axios.get('../../api/usuarios/index.php')
            .then( res =>{
                this.usuarios = res.data;
                console.log(this.usuarios);
            });
        },
        getTypeUser(){
            axios.get('../../api/datosFrecuentes/typeUsers.php')
            .then( res =>{
                this.typeUser = res.data;
                console.log('typeUser',this.typeUser);
            });
        },
        addUser(){
            const form = document.getElementById('formUser')
            const dataForm = new FormData(form);
            console.log('datos form',...dataForm);
            let {password,password2,typeUser,correoUser,apellidosUser,nombreUser}=dataForm;
            //if(correoUser !='' || password !='' || nombreUser !='' || apellidosUser !='' || typeUser !='' ){
                console.log(password,password2,typeUser,correoUser,apellidosUser,nombreUser);
                if(password == password2){
                        axios.post('../../api/usuarios/addUser.php', dataForm)
                            .then(res => {
                                this.respuesta = res.data;
                                console.log('respuesta',this.respuesta);
                                this.getUser();
                                if (this.respuesta.responce == 'success') {
                                    Swal.fire({
                                        title: 'Guardado',
                                        text: 'Usuario Agregado',
                                        icon: 'success'
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        text: ''+this.respuesta.error,
                                        icon: 'error'
                                    });
                                }
                            });
                }else{
                    Swal.fire({
                        title: 'Error',
                        text: 'Contraseñas no coinsiden'+password +' '+password2,
                        icon: 'error'
                    });
                }
            /*}else{
                Swal.fire({
                    title: 'Rellene datos',
                    text: 'Rellene todos los datos',
                    icon: 'error'
                });
            }*/
        },
        deleteUser(id){
            Swal.fire({
                title: 'Eliminar',
                text: 'Seguro que deseas eliminar la Persona',
                icon: 'warning',
                confirmButtonText: 'Eliminar',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6'
            })
            .then((result) => {
                if (result.value) {
                    const deleteUser = new FormData();
                    deleteUser.append("id", id);
                    axios.post('../../api/usuarios/deleteUser.php',deleteUser)
                        .then(res => {
                            this.respuesta= res.data
                            
                            if (this.respuesta.responce == 'success') {
                                this.getUser();
                                Swal.fire({
                                    title: 'Eliminado',
                                    text: 'Persona Eliminada',
                                    icon: 'success'
                                })
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: this.respuesta.error,
                                    icon: 'error'
                                })
                            }
                            
                        })
                } else {
                    return false
                }
            })
        }
    },
});