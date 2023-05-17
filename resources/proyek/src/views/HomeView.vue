<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/talentlytica-logo.png">
    <div class="container mb-5 mt-3">
      <table-view></table-view>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import TableView from './TableView.vue'

export default {
  components: {
    TableView
  }
}
</script>
