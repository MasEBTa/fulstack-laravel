<template>
<div class="row mb-3">
    <label class="col-sm-4 col-form-label"  :for="inputId">{{ labelText }}</label>
    <div class="col-sm-8">
      <input class="form-control" :id="inputId" :v-model="inputValue" :placeholder="placeholder" type="number" :min="minimum" :max="maximum"  @input="updateValue">
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
    },
    tipe: {
      type: String,
      required: false
    },
    minimum: {
      type: Number,
      default: 0
    },
    maximum: {
      type: Number,
      default: 0
    }
  },
  data () {
    return {
      inputValue: ''
    }
  },
  // declare emitted events
  emits: ['response'],
  // created () {
  //   // emit with argument
  //   this.$emit('response', this.inputValue)
  // },
  methods: {
    updateValue (event) {
      this.inputValue = event.target.value
      this.$emit('response', this.inputValue)
    }
  }
}
</script>
