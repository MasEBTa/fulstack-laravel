<template>
  <div class="row mb-3">
    <label :for="inputId" class="col-sm-4 col-form-label">{{ labelText }}</label>
    <div class="col-sm-8">
      <input class="form-control" :id="inputId" v-model="inputValue" :placeholder="placeholder" @input="updateValue">
    </div>
  </div>
</template>

<script>
export default {
  props: {
    inputId: {
      type: String,
      required: true
    },
    labelText: {
      type: String,
      required: true
    },
    placeholder: {
      type: String,
      required: false
    }
  },
  data () {
    return {
      inputValue: ''
      // sample: this.$parent
    }
  },
  // declare emitted events
  emits: ['response'],
  created () {
    // emit with argument
    this.$emit('response', this.inputValue)
  },
  methods: {
    updateValue (event) {
      this.inputValue = event.target.value
      this.$emit('response', this.inputValue)
    }
  },
  mounted () {
    // console.log(this)
  }
}
</script>
