<template>
  <div class="container">
    <form @submit.prevent="simpanarticles(this.$route.params.id)">
    <h1 align="center" class="mb-4">Edit Article</h1>
      Title
      <input 
        type="text" 
        name="title" 
        v-model="title" 
        class="form-control mb-4" />

      Category
      <input
        type="text"
        name="id_category"
        v-model="category_id"
        class="form-control mb-4"
      />

      Description
      <input
        type="text"
        name="description"
        v-model="description"
        class="form-control mb-4"
      />

      Content
      <input
        type="text"
        name="content"
        v-model="content"
        class="form-control mb-4"
      />

      <button class="btn btn-primary" style="float: right" type="submit">
        SIMPAN
      </button>
      <br />
      <div v-bind:class="style_msg">
        <div v-if="error == true">
          <div v-for="msg in message" :key="msg.id">
            <p v-for="m in msg" :key="m.id">{{ m }}</p>
          </div>
        </div>
        <p v-else>{{ message }}</p>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  name: "Edit",
  data() {
    return {
      article: {},

      title: "",
      id_category: "",
      description: "",
      content: "",
      style_msg: "",
      message: "",
      error: false,
    };
  },
   
  methods: {
      async getbyid(id) {
      var data = {
        title: this.title,
        id_category: this.id_category,
        description: this.description,
        content: this.content,
      };
     var res = await this.axios.get("http://localhost/aegyo1/public/api/article/"+id, data)
        this.title= res.data.title,
        this.id_category= res.data.id_category;
        this.description= res.data.description;
        this.content= res.data.content;
        console.log(res)
    },
    async simpanarticles(id) {
      var dataku = {
        title: this.title,
        id_category: this.id_category,
        description: this.description,
        content: this.content,
      };
       this.axios.put(
        `http://localhost/aegyo1/public/api/edit_article/`+id,
        dataku
      )
      .then((res) =>
      {
        console.log(res);
        // if (res.request.status == 200) {
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
      })
    },
  },
  mounted(){
    this.getbyid(this.$route.params.id);
  }
};
</script>