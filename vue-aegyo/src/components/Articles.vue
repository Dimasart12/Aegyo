<template>
  <div class="Container">
    <div class="card">
      <div class="card-body">
        <h2 align="center">Seluruh Articles</h2>
        <a href="/tambah" class="btn btn-success mb-3">Tambah</a>

        <table class="table table-hover table-striped">
          <thead class="bg-dark" style="color: white;">
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Description</th>
              <th>Content</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="a in article" :key="a.id">
              <td>{{ a.title }}</td>
              <td>{{ a.id_category }}</td>
              <td>{{ a.description }}</td>
              <td>{{ a.content }}</td>
              <td>
                <a v-bind:href="'/edit/' + a.id" class="btn btn-primary mr-3"
                  >Edit</a
                >

                <button class="btn btn-danger" v-on:click="hapus(a.id)">
                  Hapus
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Articles",
  data() {
    return {
      article: [],
    };
  },
  created() {
    this.axios
      .get(`http://localhost/aegyo1/public/api/article`)
      .then((result) => {
        this.article = result.data;
        console.log(result.data);
      });
  },
  methods: {
    hapus(id) {
      this.axios
        .delete(`http://localhost/aegyo1/public/api/delete_article/${id}`)
        .then(() => {
          let i = this.articles.map((item) => item.id).indexOf(id);
          this.articles.splice(i, 1);
        });
    },
  },
};
</script>