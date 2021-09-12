const app= new Vue ({
    el:'#app',
    data:{
        respuesta:[],
        usuarios:[],
        buscar:'',
        typeUser:[],
        id:'',
        password:'',
        password2:'',
        privilegio:'',
        correoUser:'',
        apellidosUser:'',
        nombreUser:''
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
            if(this.correoUser.trim() !='' && this.password.trim()  !='' && this.nombreUser.trim()  !='' && this.apellidosUser.trim()  !='' && this.typeUser.trim()  !=''  ){
                if(this.password == this.password2){
                        axios.post('../../api/usuarios/addUser.php', dataForm)
                            .then(res => {
                                this.respuesta = res.data;
                                console.log('respuesta',this.respuesta);
                                this.getUser();
                                this.clearData();
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
                    this.clearData();
                    Swal.fire({
                        title: 'Error',
                        text: 'Contraseñas no coinsiden'+this.password +' = '+this.password2,
                        icon: 'error'
                    });
                }
            }else{
                this.clearData();
                Swal.fire({
                    title: 'Rellene datos',
                    text: 'Rellene todos los datos',
                    icon: 'error'
                });
            }
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
                            
                        });
                } else {
                    return false
                }
            })
        },
        getDataUser(id,nombreUser,apellidosUser,correoUser,privilegio){
            this.id=id;
            this.correoUser=correoUser;
            this.apellidosUser=apellidosUser;
            this.nombreUser=nombreUser;
            this.privilegio= privilegio;
            console.log('update',
            this.id,
            this.privilegio,
            this.correoUser,
            this.apellidosUser,
            this.nombreUser);
        },
        updateUser(){
            if(this.correoUser.trim() !='' && this.password.trim()  !='' && this.nombreUser.trim()  !='' && this.apellidosUser.trim()  !='' && this.typeUser.trim()  !=''  ){
                if(this.password == this.password2){
                    const formUpdate = document.getElementById('formUserUpdate');
                    const dataFormUpdate = new FormData(formUpdate);
                    console.log('datos form Update',...dataFormUpdate);
                    axios.post('../../api/usuarios/updateUser.php', dataFormUpdate)
                                .then(res => {
                                    this.respuesta = res.data;
                                    console.log('respuesta',this.respuesta);
                                    this.clearData();
                                    if (this.respuesta.responce == 'success') {
                                        Swal.fire({
                                            title: 'Actualizado',
                                            text: 'Usuario Actualizado',
                                            icon: 'success'
                                        });
                                        this.getUser();
                                    } else {
                                        console.log(this.respuesta);
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
                        text: 'Contraseñas no coinsiden'+this.password +' = '+this.password2,
                        icon: 'error'
                    });
                }
            }else{
                Swal.fire({
                    title: 'Rellene datos',
                    text: 'Rellene todos los datos',
                    icon: 'error'
                });
            }
        },
        clearData(){
            password='';
            password2='';
            privilegio='';
            correoUser='';
            apellidosUser='';
            nombreUser='';
        }
    },
});