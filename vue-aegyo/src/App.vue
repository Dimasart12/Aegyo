<template>
  <!-- <div class="container">
    <div class="container">
      <ul class="nav navbar-nav">
       
        <li class="nav-item"><router-link class="nav-link" to="/articles">Articles</router-link></li>
  
      </ul>
      </div>
      <router-view></router-view>
</div> -->
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: white; font-weight: 600;">
                Aegyo
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-body">
                    <div class="navbar-nav" data-bs-dismiss="offcanvas">
                        <li class="nav-item" ><router-link class="nav-link" style="color: white;" to="/articles">Articles</router-link></li>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-dark py-5">
    <div class="container px-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-6">
          <div class="text-center my-5">
            <h1 class="display-5 fw-bolder text-white mb-2">
              Selamat Datang!
            </h1>
            <p class="lead text-white-50 mb-4">
              Silahkan atur Article kesukaanmu! 
            </p>
            <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <router-link class="btn btn-primary btn-lg px4 me-sm-3" to="/keranjang">Order</router-link>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </header>
    <div class="container pt-5">
    <router-view></router-view>
    </div>
</template>

<script>

export default {
  name: 'App',

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 50px;
}
</style>
