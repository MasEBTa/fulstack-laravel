<template>
<div>
  <div id="cover"></div>
  <div class="card-body table-responsive">
    <table>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Email</th>
        <th colspan="4">Nilai</th>
        <th rowspan="2">Action</th>
      </tr>
      <tr>
        <th>X</th>
        <th>Y</th>
        <th>z</th>
        <th>W</th>
      </tr>
      <tr v-for="(value, key, index) in data"  v-bind:key="index">
        <td>{{ key+1 }}</td>
        <td>{{ value.nama }}</td>
        <td>{{ value.email }}</td>
        <td>{{ value.nilais.nilai_x }}</td>
        <td>{{ value.nilais.nilai_y }}</td>
        <td>{{ value.nilais.nilai_z }}</td>
        <td>{{ value.nilais.nilai_w }}</td>
        <td>
          <router-link :to="`/nilai/${value.id}`"  type="button" class="badge border-0 text-bg-success">laporan</router-link> |
          <router-link :to="`/edit/${value.id}`"  type="button" class="badge border-0 text-bg-warning">edit</router-link> |
          <button type="button"  @click="deleteData(value.id)"  class="badge border-0 text-bg-danger">hapus</button>
        </td>
      </tr>
    </table>
  </div>
</div>
</template>

<style scoped>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<script>
import { apiBase } from '../global/utils'
import axios from 'axios'

export default {
  data () {
    return {
      apiBase: apiBase,
      data: []
    }
  },
  methods: {
    getData () {
      axios.get(this.apiBase + 'peserta')
        .then(response => {
          // Tangani respons sukses
          console.log(response.data)
          this.data = response.data
        })
        .catch(error => {
          // Tangani respons error
          console.error(error)
        })
    },
    deleteData (id) {
      if (confirm('Yakin?') === true) {
        // proses hapus
        axios.delete(this.apiBase + 'peserta/' + id)
          .then(response => {
            // Tangani respons sukses
            console.log(response.data)
            // perbarui data
            this.getData()
            const cover = document.getElementById('cover')
            // Lakukan tindakan lain setelah penghapusan data berhasil
            cover.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Holy guacamole!</strong> Data brhasil dihapus.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`
          })
          .catch(error => {
            // Tangani respons error
            console.error(error)
            // Lakukan tindakan lain jika terjadi kesalahan dalam penghapusan data
          })
      } else {
        console.log('canceled')
      }
    }
  },
  mounted () {
    console.log(this.apiBase)
    this.getData()
  }
}
</script>
