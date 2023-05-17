<template>
    <div>
      <h2>Update Item</h2>
      <form @submit.prevent="updateItem">
        <label for="name">Name:</label>
        <input type="text" v-model="itemName" required>
        <button type="submit">Update</button>
      </form>
    </div>
</template>
  
<script>
  import api from '../services/api';
  
  export default {
    data() {
      return {
        itemName: ''
      };
    },
    created() {
      this.fetchItem();
    },
    methods: {
      fetchItem() {
        const itemId = this.$route.params.id;
        api.getItem(itemId)
          .then(response => {
            this.itemName = response.data.name;
          })
          .catch(error => {
            console.error('Error fetching item:', error);
          });
      },
      updateItem() {
        const itemId = this.$route.params.id;
        api.updateItem(itemId, { name: this.itemName })
          .then(() => {
            console.log('Item updated successfully');
            this.$router.push('/read'); // Redirect to Read page
          })
          .catch(error => {
            console.error('Error updating item:', error);
          });
      }
    }
  };
</script>
  