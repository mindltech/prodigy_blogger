<template>
  <div class="container">
    <form @submit.prevent="getpost" action="/search" method="POST" role="search">
         <div class="input-group mb-3">
             <input v-model="search" name="search" type="text" class="form-control" placeholder="what are you searching for?" aria-label="Search keyword" aria-describedby="basic-addon2">
             <div class="input-group-append">
                 <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
             </div>
         </div>
    </form>
  </div>
</template>





<script>
export default {
    props: ['posts'],

    data() {
      return {
        results: this.posts,
        search: ''
      }
    },

    mounted: function() {
      console.log(this.results)
    },

    methods:{
      getpost() {
        axios.post('/search',{search: this.search})
        .then(response => {
          this.results = response.data.posts;
          console.log(this.results[0])
        })
      }
    }

}
</script>



<style>

</style>