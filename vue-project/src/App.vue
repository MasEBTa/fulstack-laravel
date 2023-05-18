<template>
  <navbar-view></navbar-view>
  <div class="controller">
    <router-view/>
  </div>
</template>

<script>
import NavbarView from './components/NavbarView.vue' // Impor komponen NavbarView

export default {
  components: {
    NavbarView // Daftarkan komponen NavbarView di sini
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
