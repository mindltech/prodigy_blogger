<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button class="btn btn-success" @click="liked()">Like</button>
                <p style='color:#7f8c8d'> You have {{ like }}  like(s) </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props:['post'],

        data(){
            return{
            like:0,
            disabled:false
            }
        },

        methods:{
            liked(){
                   this.like++;
                   this.disabled=true;
                    axios.get('/posts/' + this.post.id + '/like', {
                        likes: this.like,
                        id:this.post.id
                    })
                    .then(function (response) {
                        console.log(response.data);
                    });
            }
        }

    }
</script>
