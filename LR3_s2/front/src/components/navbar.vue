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
                    class="mr-3"
            >
                <router-link to="/brands">Брэнды</router-link>
            </v-btn>
            <v-btn
                    elevation="2"
                    color="blue-grey"
                    @click="clearFilter"
                    v-if="$store.getters.getFilterGoods != -1"
            >
                Отчистить фильтр
            </v-btn>

        </v-app-bar>
    </div>
</template>

<script>
    export default {
        name: 'nav-bar',
        methods: {
            clearFilter(){
                this.$store.commit("emitFilter",-1)
                this.$store.dispatch("getGoodsAction");
            }
        }
    }
</script>

<style scoped>

</style>