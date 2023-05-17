import Vue from 'vue';
import VueRouter from 'vue-router';
import Create from '../components/Create.vue';
import Read from '../components/Read.vue';
import Update from '../components/Update.vue';

Vue.use(VueRouter);

const routes = [
  { path: '/create', component: Create },
  { path: '/read', component: Read },
  { path: '/update/:id', component: Update }
];

const router = new VueRouter({
  routes
});

export default router;
