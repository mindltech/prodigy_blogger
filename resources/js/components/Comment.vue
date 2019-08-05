<template>
    <div class="container">
    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" style="float: right; margin-top: -75px;" >comment</button>


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
    <ul>
      <li v-for="{comment, user, id} in thisComment" :key="id">
        {{comment}}<br>
        <em style="color: #636e72">by {{user.name}}</em>
        <p style="float: right;">&times;</p>
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
        watch:{
          commentsData(){
            this.comment = this.commentsData
          }
        },
         methods:{
            getcomment(){
                axios.post('/posts/' + this.posts.id + '/comment', {
                  comment: this.comment
                })
                    .then(response => {
                        console.log(response.data);
                        thisComment = response.data.comment;
                        
                    })
                    .catch(err => console.error(err.data));
            }
          }
    }
</script>
          