<style>

</style>

<template>
    <div class="container">
    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" style="float: right; position: relative; bottom: 75px" >comment</button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="getcomment()" method="post">
              <div class="form-group">
                <label for="message-text" class="col-form-label">What's on your mind:</label>
                <textarea class="form-control" id="message-text" name="comment" v-model="comment"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Comment</button>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <ul style="list-style: none;">
      <li v-for="{ comment, user, id } in thisComment" :key="id"  v-on:delete-comment="deleteComment   ">
        {{comment}}<br>
        <em style="color: #636e72">by {{user.name}}</em>
        <!-- <button type="button" style="float: right;" @click="$emit('delete-comment',comment)">&times;</button> -->
      <hr>     

      </li>
    </ul>

  </div>
</template>

<script>
    export default {
        props:['posts', 'comments'],

        data() {
            return {
              comment: '', 
              thisComment: this.comments
          }
        },

        mounted(){
          console.log('mounted');
        },
        // watch:{
        //   commentsData(){
        //     this.comment = this.commentsData
        //   }
        // },
         methods:{
            getcomment(){
                axios.post('/posts/' + this.posts.id + '/comment', {
                  comment: this.comment
                })
                    .then(response => {
                        // console.log(response.data);  
                        // console.log(this.thisComment);
                        this.thisComment = response.data[0];
                        this.comment = '';

                        // console.log(this.thisComment);

                        
                    })
                    .catch(err => console.error(err.data));
            },
            // deleteComment(comment, id){
            //     axios.get('/posts/' + this.post.id + '/delete')
            //         // .then(response => {
            //           // this.result.splice(id, 1)
            //           // console.log(this.comment);
            //         // });
            //         .catch(err => console.error(err.data));
            // }
              //   deleteComment() {
              //     this.$emit('comment-deleted', {
              //         'id': this.comment.id,
              //     });
              // }
              // deleteComment(comment){
              //   this.$http.delete("/posts/" + this.post.id) 
              //   .then(response => {
              //     let index = this.comments.indexOf(comment);
              //     this.comments.splice(index,1);
              //     console.log(response.data);
              //   })
              // }
          }
    }
</script>
          