<template>
    <div>
        <span class="like-btn" @click="likeReceta" :class="{'like-active' : isActive}"></span>
        <p>{{cantidadLikes }} Les gusta esta receta</p>
          
    </div>
</template>

<script>
export default {
    props:['recetaId', 'like', 'likes'],
    // mounted(){
    //     console.log(this.like);
    // },
    data: function(){
        return{
            isActive: this.like,
            totalikes: this.likes
        }
    },
    methods:{
        likeReceta(){
            // console.log('Diste me gusta: ',this.recetaId);
            axios.post('/recetas/' + this.recetaId)
            .then(respuesta=>{
                if(respuesta.data.attached.length > 0){
                    this.$data.totalikes++;
                }else{
                    this.$data.totalikes--;
                }

                this.isActive = !this.isActive
            })
            .catch(error =>{
               if(error.response.status ===401){
                   window.location='/register';
               }
            });
        }
    },
    computed: {
        cantidadLikes: function(){
            return this.totalikes
        }
    },
}
</script>