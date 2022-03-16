<template>
  <v-app>
      <nav-bar />
      <router-view />
  </v-app>
</template>

<script>

import NavBar from "@/components/navbar";
export default {
  name: 'App',
    components: {NavBar},
    data: () => ({
    //
  }),
};
</script>
<style>
    a{
        color: white!important;
        text-decoration: none;
    }
</style>