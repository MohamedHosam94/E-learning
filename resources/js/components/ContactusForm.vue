<template>
    <div class="container">
        
       <p id="success" class="text-white bg-success"></p>
        <form class="contact-form" @submit.prevent="sendMessage">
        
        <div class="row">
          <div class="col-md-6">
            <label>Name</label>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="nc-icon nc-single-02"></i>
                </span>
              </div>
              <input type="text" name="name" required class="form-control" placeholder="Name" v-model="name">

            </div>
          </div>
          <div class="col-md-6">
            <label>Email</label>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="nc-icon nc-email-85"></i>
                </span>
              </div>
              <input type="email" name="email" required class="form-control" placeholder="Email" v-model="email">
              
            </div>
          </div>
        </div>
        <label>Message</label>
        
        <textarea class="form-control" name="message" required rows="4"
          placeholder="Tell us your thoughts" v-model="message"></textarea>

        

        <div class="row">
          <div class="col-md-4 ml-auto mr-auto">
          
             <input class="btn btn-danger btn-lg btn-fill" value="Send Message" type="submit">

          </div>
        </div>
        </form>
                        
            
    </div>
</template>

<script>
    export default {
        
        data(){
            return {
              name: '',
              email: '',
              message: ''
            }
        },
        methods: {
            sendMessage(){

                axios.post('/contact-us',{
                name: this.name,
                email: this.email,
                message: this.message              
                })
                .then((response)=>{

                $('#success').html(response.data.message)

                }).catch((error)=>{
                $('#success').html(error.data.message)
                });
            }
        }
    }
</script>
 