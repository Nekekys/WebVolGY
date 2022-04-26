import Vue from 'vue'
import Vuex from 'vuex'
import goodsModule from "@/store/goodsModule";
import brandsModule from "@/store/brandsModule";

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  getters: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    goodsModule,
    brandsModule
  }
})
