<template>
    <div>
        <v-app-bar
                color="blue accent-4"
                dense
                dark
        >

            <v-toolbar-title>Спорт товары</v-toolbar-title>


            <v-btn
                    elevation="2"
                    outlined
                    class="mr-3 ml-5"
            >
                <router-link to="/">Товары</router-link>

            </v-btn>
            <v-btn
                    elevation="2"
                    outlined
            >
                <router-link to="/brands">Брэнды</router-link>
            </v-btn>

        </v-app-bar>
    </div>
</template>

<script>
    export default {
        name: 'nav-bar'
    }
</script>

<style scoped>

</style>