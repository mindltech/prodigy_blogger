<template>
  <div class="">
      <div v-for="{name, id} in tags" :key="id">
          <div>
              <span><a href="">{{ '#' + name}}</a></span>
          </div>
      </div>
  </div>
</template>






<script>
export default {
    props: ['tags'],
    
    data() {
        return {
            thisTags : this.tags,
        }
    },

    mounted() {
        console.log(this.tags)
    }

}
</script>

<style>

</style>