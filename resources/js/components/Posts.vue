<template>
  <div class="col">
      <div class="row m-1 shadow" v-for="{ created_at, body, title, user,  id, tags} in thisPosts" :key="id">
          <div class="card m-1" >
              <h2 class="card-title">{{ title }}</h2>
              <p class="card-text" v-html="truncate(body)"></p>
              <div class="fl">
                  <div>
                    <span v-for="{name, id} in tags" :key="id"><a :href="'tag/'+ id +'/tag_post'" class="badge badge-dark">{{ name }}</a></span>
                  </div>
                  <div>
                    <span class="pull-right" v-for="{name, username, id} in {user}" :key="id"><a :href="'users/'+ id +'/@' + username +'/'">{{ name }}</a></span>
                  </div>
              </div>
          </div>
          <button class="navbar-toggler toggler-example purple darken-3" type="button" data-toggle="dropdown"
                data-target="#navbarSupportedContent41" aria-controls="navbarSupportedContent41" aria-expanded="false"
                aria-label="Toggle navigation"><span class="white-text"><i class="fa fa-ellipsis-v"></i></span>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
              <a :href="'post/'+ id +'/show'" class="dropdown-item">View</a>
              <a :href="'post/'+ id +'/edit'" class="dropdown-item" v-if="">Edit</a>
              <a href="#" class="dropdown-item">Delete</a>
          </div>
          <span>{{ created_at | moment("from", "now") }}</span>
      </div>
  </div>
</template>






<script>
export default {
    props: ['posts'],

    data() {
        return{
            thisPosts: this.posts
        }
    },

    mounted() {
        console.log(this.posts)
        
    },

    methods: {
        loadResource() {
            // axios.get('/', [{posts}, {tags}])
            //      .then(response => {console.log(response)})
            //      .catch(error => {console.log(error)})
        },
        truncate(value) {
            if (value.length >= 30) {
                return value.slice(0, 50) + "...";
            }

        
        },
        // humanize (date) {
        //     return this.$duration().humanize(date);
        // }
    },
    // filters: {
    //     moment (date) {
    //         return moment(date).fromNow();
    //     }
    // }
    


}
</script>




<style>
.card{
    width: 100%;
    padding: 10px;
    border: none;
}
.col{
    padding: 5rem 2rem;
}
.dropdown-item{
    color: #000;
}
.row{
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}
</style>