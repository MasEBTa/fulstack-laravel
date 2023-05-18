<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/talentlytica-logo.png">
    <div class="container mb-5 mt-3">
      <table-view></table-view>
    </div>
  </div>
</template>

<style scoped>
img {
  width: 100%;
  max-width: 500px;
  height: auto;
}
</style>

<script>
// @ is an alias to /src
import TableView from './TableView.vue'

export default {
  components: {
    TableView
  }
}
</script>
