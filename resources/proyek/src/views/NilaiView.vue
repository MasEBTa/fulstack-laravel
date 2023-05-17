<template>
  <div class="home">
    <div class="container">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ data.nama }}</li>
        <li class="list-group-item">{{ data.email }}</li>
        <li class="list-group-item"></li>
      </ul>
    </div>
    <div class="container">
      Hasil Penilaian
      <table style="width:100%">
        <tr>
          <td>Aspek</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>4</td>
          <td>5</td>
        </tr>
        <tr>
          <td>Intelegensi</td>
          <td>
            <span v-if="intelegensi < 1.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="intelegensi > 1.5 && intelegensi < 2.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="intelegensi > 2.5 && intelegensi < 3.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="intelegensi > 3.5 && intelegensi < 4.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="intelegensi > 4.5">Check</span>
            <span v-else> </span>
          </td>
        </tr>
        <tr>
          <td>Numeric</td>
          <td>
            <span v-if="numeric < 1.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="numeric > 1.5 && numeric < 2.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="numeric > 2.5 && numeric < 3.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="numeric > 3.5 && numeric < 4.5">Check</span>
            <span v-else> </span>
          </td>
          <td>
            <span v-if="numeric > 4.5">Check</span>
            <span v-else> </span>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<style scoped>
table, th, td {
  border:1px solid black;
}
</style>

<script>
import { apiBase } from '../global/utils'
import axios from 'axios'

export default {
  props: ['id'], // Properti 'id' untuk menampung parameter
  computed: {
    userId () {
      return this.id // Mengakses nilai parameter 'id'
    },
    intelegensi () {
      return ((this.data.nilai_x * (40 / 100)) + (this.data.nilai_y * (60 / 100))) / 2
    },
    numeric () {
      return ((this.data.nilai_z * (30 / 100)) + (this.data.nilai_w * (70 / 100))) / 2
    }
  },
  data () {
    return {
      apiBase,
      data: []
      // intelegensi: ((data.nilai_x*(40/100)) + (data.nilai_y*(60/100)))/2,
      // numeric: ((data.nilai_z*(30/100)) + (data.nilai_w*(70/100)))/2
    }
  },
  methods: {
    getData () {
      axios.get(this.apiBase + 'peserta/' + this.userId)
        .then(response => {
          // Tangani respons sukses
          console.log(response.data)
          this.data = response.data
        })
        .catch(error => {
          // Tangani respons error
          console.error(error)
        })
    }
  },
  mounted () {
    this.getData()
  }
}
</script>
