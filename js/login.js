const app= new Vue ({
    el:'#app',
    data:{
        datos:'',
        email:'',
        pass:'',
        respuesta:''
    },
    created() {
    
    },
    computed:{

    },
    methods: {
        login(){
            const form = new FormData();
            form.append('email',this.email);
            form.append('pass',this.pass);
            console.log('objeto', form);
            axios.post('../../api/login/index.php',form)
            .then( res =>{
            this.respuesta = res.data;
            if (res.data.responce == 'success') {
                Swal.fire({
                    title:'logeado',
                    text:'Bienvenido',
                    icon:'success',
                    timer:'2000'
                });
                if(res.data.pribilegio==1){
                    location.href = '../horarios';
                }else{
                    location.href = '../horariosClases';
                }
            } else {
                Swal.fire(
                    'error',
                    this.respuesta,
                    'error'
                );
            }
                
            })
        }
    },
});