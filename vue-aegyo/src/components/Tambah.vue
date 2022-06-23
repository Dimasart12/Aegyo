<template>
<div class="container">
    
<form @submit.prevent="simpanarticles()">
<h1 align="center" class="mb-4">Tambah Article</h1>
    Title 
    <input type="text" name="title" v-model="title" class="form-control mb-4">

     Category
     <input type="text" name="category_id" v-model="id_category" class="form-control mb-4">  

     Description
     <input type="text" name="description" v-model="description" class="form-control mb-4">

    Content
     <input type="text" name="content" v-model="content" class="form-control mb-4">
      <button
        class="btn btn-success"
        style="float: right"
        type="submit"
      >
        SIMPAN
      </button>
      <br>
        <div v-bind:class="style_msg">
            <div v-if="error==true">
                <div v-for="msg in message" :key="msg.id">
                    <p v-for="m in msg" :key="m.id">{{m}}</p>
                </div>
            </div>
            <p v-else>{{message}}</p>
        </div>
   </form>
</div>
</template>
<script>
export default{
name:"Tambah",
data(){
    return {
        article: {},
            title:'',
            id_category:'',
            description:'',
            content:'',
            style_msg:'',
            message:'',
            error:false,
        }
    },
    methods:{
        async simpanarticles() {
        var dataarticles = {
        title: this.title,
        id_category: this.id_category,
        description: this.description,
        content: this.content,
      };
         this.axios.post("http://localhost/aegyo1/public/api/create_article", dataarticles)
         .then((res) => 
        {
          console.log(res);
          //  if (res.request.status == 200) {
            if (res.data.status == true) {
              this.error = false;
              this.message = res.data.message;
              this.style_msg = "alert alert-success";
              setTimeout(() => {
              this.$router.push("/articles");
            }, 2000);
            } else {
              this.error = true;
              this.message = res.data.message;
              this.style_msg = "alert alert-danger";
            }
        }
        );
    },
  },
};  
</script>