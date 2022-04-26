import Vue from 'vue'
import VueRouter from 'vue-router'
import Brands from "@/pages/Brands";
import MainTable from "@/pages/MainTable";


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: MainTable
  },
  {
    path: '/brands',
    name: 'brands',
    component: Brands
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
