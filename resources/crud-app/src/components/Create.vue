<template>
    <div>
      <h2>Create Item</h2>
      <form @submit.prevent="createItem">
        <label for="name">Name:</label>
        <input type="text" v-model="itemName" required>
        <button type="submit">Create</button>
      </form>
    </div>
</template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        itemName: ''
      };
    },
    methods: {
      createItem() {
        axios.post('/api/items', { name: this.itemName })
          .then(response => {
            console.log('Item created successfully');
          })
          .catch(error => {
            console.error('Error creating item:', error);
          });
      }
    }
  };
</script>
  