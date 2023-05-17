<template>
    <div>
      <h2>Read Items</h2>
      <ul>
        <li v-for="item in items" :key="item.id">
          {{ item.name }}
          <button @click="deleteItem(item.id)">Delete</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import api from '../services/api';
  
  export default {
    data() {
      return {
        items: []
      };
    },
    created() {
      this.fetchItems();
    },
    methods: {
      fetchItems() {
        api.getItems()
          .then(response => {
            this.items = response.data;
          })
          .catch(error => {
            console.error('Error fetching items:', error);
          });
      },
      deleteItem(id) {
        api.deleteItem(id)
          .then(() => {
            console.log('Item deleted successfully');
            this.fetchItems(); // Refresh item list
          })
          .catch(error => {
            console.error('Error deleting item:', error);
          });
      }
    }
  };
  </script>
  