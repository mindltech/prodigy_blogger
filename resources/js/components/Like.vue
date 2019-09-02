<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button class="btn btn-success" @click="liked()">{{ !like ? 'like' : 'unlike' }}</button>
                <p style='color:#7f8c8d'> You have {{ like }}  like(s) </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: {
            post: Object,
            likes: Number,
            userliked: Boolean
        },

        data(){
            return {
                like: 0,
                disabled: this.userliked,
            }
        },

        methods:{
            liked(){
                axios.get('/posts/' + this.post.id + '/like')
                    .then(response => {
                        console.log(response.data);
                        this.like = response.data.likes;
                        console.log(this.disabled)
                        console.log(this.like)
                        this.disabled ? this.disabled = false : this.disabled = true;
                        
                    })
                    .catch(err => console.error(err.data));
            }
        }

    }
</script>
