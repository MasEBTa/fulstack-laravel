<template>
<div>
  <div class="alert-place container"></div>
  <form @submit="pushData()" class="mb-5" id="myform">
    <div class="container d-flex flex-lg-row flex-column">
      <div class="row g-3">
      <h1>Tambahkan Peserta</h1>
        <div>
          <text-input input-id="nama" label-text="Nama" placeholder="Nama Peserta" type="text" @response="(msg) => nama = msg"></text-input>
          <text-input input-id="email" label-text="Email" placeholder="Email Peserta" type="email" @response="(msg) => email = msg"></text-input>
        </div>
      </div>
      <div class="row g-3">
        <h2>Tambahkan Nilai</h2>
        <div>
          <numb-input input-id="nilai-x" label-text="Nilai X" placeholder="Masukkan nilai X" minimum="1" maximum="33" @response="(msg) => nilaiX = msg"></numb-input>
          <numb-input input-id="nilai-y" label-text="Nilai Y" placeholder="Masukkan nilai y" minimum="1" maximum="23" @response="(msg) => nilaiY = msg"></numb-input>
          <numb-input input-id="nilai-z" label-text="Nilai Z" placeholder="Masukkan nilai z" minimum="1" maximum="18" @response="(msg) => nilaiZ = msg"></numb-input>
          <numb-input input-id="nilai-w" label-text="Nilai W" placeholder="Masukkan nilai w" minimum="1" maximum="13" @response="(msg) => nilaiW = msg"></numb-input>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-secondary">Tambah</button>
  </form>
</div>
</template>

<script>
// import FormView from './FormView.vue' // Impor komponen NavbarView
import TextInput from './components/TextInput.vue'
import NumbInput from './components/NumbInput.vue'
import { apiBase } from '../global/utils'
import axios from 'axios'

export default {
  components: {
    TextInput,
    NumbInput
    // FormView // Daftarkan komponen NavbarView di sini
  },
  data () {
    return {
      apiBase,
      nama: '',
      email: '',
      nilaiX: null,
      nilaiY: null,
      nilaiZ: null,
      nilaiW: null
    }
  },
  methods: {
    pushData () {
      axios.post(this.apiBase + 'peserta', {
        nama: this.nama,
        email: this.email,
        nilaiX: this.nilaiX,
        nilaiY: this.nilaiY,
        nilaiW: this.nilaiW,
        nilaiZ: this.nilaiZ
      })
        .then(response => {
          const elements = document.getElementsByClassName('alert-place')[0]
          // log berhasil
          console.log('Respon:', response.status)
          // notif
          elements.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Holy guacamole!</strong> Data brhasil ditambahkan.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`
          // kosongkan
          const name = document.getElementById('nama')
          const email = document.getElementById('email')
          const nilaiX = document.getElementById('nilai-x')
          const nilaiY = document.getElementById('nilai-y')
          const nilaiZ = document.getElementById('nilai-z')
          const nilaiW = document.getElementById('nilai-w')
          name.value = ''
          email.value = ''
          nilaiX.value = null
          nilaiY.value = null
          nilaiZ.value = null
          nilaiW.value = null
          this.nama = ''
          this.email = ''
          this.nilaiX = null
          this.nilaiY = null
          this.nilaiW = null
          this.nilaiZ = null
          // Lakukan tindakan setelah menerima respon
        })
        .catch(error => {
          console.error('Kesalahan:', error.response)
          const elements = document.getElementsByClassName('alert-place')[0]
          console.log(elements)
          elements.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Holy guacamole!</strong> Silahkan cek data kamu apakah sudah diisi dengan benar.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`
          // Lakukan penanganan kesalahan jika diperlukan
        })
    }
  },
  mounted () {
    console.log(this.apiBase)
  }
}
</script>
