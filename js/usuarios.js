const app= new Vue ({
    el:'#app',
    data:{
        usuarios:[]
    },
    created() {
        this.getUser();
    },
    computed:{

    },
    methods: {
        getUser(){
            axios.get('../../api/usuarios/index.php')
            .then( res =>{
                this.usuarios = res.data;
                console.log(this.usuarios);
            });
        }
    },
});