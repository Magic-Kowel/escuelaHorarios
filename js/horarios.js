const app  = new Vue({
    el:'#app',
    data:{
        buscar:'',
        searchClass:'',
        respuesta:[],
        schedule:[],
        id:'',
        teachers:[],
        teacher:'',
        clasRoom:'',
        timeStart:'',
        timeEnd:''
    },
    created() {
        this.getSchedule();
        this.getTeacher();
    },
    computed:{
        datosFiltrados() {
            return this.schedule.filter((filtro) => {
                return filtro.nombre_usuario.toUpperCase().match(this.buscar.toUpperCase()) || filtro.salon.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        getSchedule(){
            axios.get('../../api/horarios/index.php')
            .then( res =>{
                this.schedule = res.data;
                console.log(this.schedule);
            });
        },
        getTeacher(){
            axios.get('../../api/datosFrecuentes/teachers.php')
            .then( res =>{
                this.teachers = res.data;
                console.log('teachers',this.teachers);
            });
        },
        addClass(){
            const formClass = document.getElementById('formClass');
            const dataFormClass = new FormData(formClass);
            console.log('datos form Class',...dataFormClass);
            if(this.teacher.trim() !='' && this.clasRoom.trim() != '' && this.timeStart.trim() != '' && this.timeEnd !=''){
                axios.post('../../api/horarios/addClass.php', dataFormClass)
                    .then(res => {
                        this.respuesta = res.data;
                        console.log('respuesta',this.respuesta);
                        this.getTeacher();
                        if (this.respuesta.responce == 'success') {
                            this.getSchedule();
                            Swal.fire({
                                title: 'Guardado',
                                text: 'Clase Agregada',
                                icon: 'success'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: ''+this.respuesta.error,
                                icon: 'error'
                            });
                        }
                        this.clearData();
                    });
            }else{
                Swal.fire({
                    title: 'Rellene datos',
                    text: 'Rellene todos los datos',
                    icon: 'error'
                });
            }
        },
        deleteClass(id){
            Swal.fire({
                title: 'Eliminar',
                text: 'Seguro que deseas eliminar la Clase',
                icon: 'warning',
                confirmButtonText: 'Eliminar',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6'
            })
            .then((result) => {
                if (result.value) {
                    const deleteClass = new FormData();
                    deleteClass.append("id", id);
                    axios.post('../../api/horarios/deleteClass.php',deleteClass)
                        .then(res => {
                            this.respuesta= res.data
                            if (this.respuesta.responce == 'success') {
                                this.getSchedule();
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
        updateClass(){
            const formUpdate = document.getElementById('formClassUpdate');
            const dataFormUpdate = new FormData(formUpdate);
            console.log('datos form Update',...dataFormUpdate);
            axios.post('../../api/horarios/updateClass.php', dataFormUpdate)
                        .then(res => {
                            this.respuesta = res.data;
                            console.log('respuesta',this.respuesta);
                            this.clearData();
                            if (this.respuesta.responce == 'success') {
                                Swal.fire({
                                    title: 'Actualizado',
                                    text: 'Clase Actualizada',
                                    icon: 'success'
                                });
                                this.getSchedule();
                            } else {
                                console.log(this.respuesta);
                                Swal.fire({
                                    title: 'Error',
                                    text: ''+this.respuesta.error,
                                    icon: 'error'
                                });
                            }
                        });
        },
        clearData(){
            this.teacher='';
            this.clasRoom='';
            this.timeStart='';
            this.timeEnd='';
        },
        getDataClass(id,teacher,clasRoom,timeStart,timeEnd){
            this.id=id;
            this.teacher=teacher;
            this.clasRoom=clasRoom;
            this.timeStart=timeStart;
            this.timeEnd=timeEnd;
            console.log('data class',this.id,this.teacher,this.clasRoom,this.timeStart,this.timeEnd);
        }
    }
})