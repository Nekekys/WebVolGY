<template>
    <div>
        <v-container>

            <v-data-table
                    :headers="headers"
                    :items="$store.getters.getAllBrands"
                    :hide-default-footer="true"
                    class="elevation-1 mt-8"
            >
                <template v-slot:top>
                    <v-toolbar
                            flat
                    >
                        <v-toolbar-title>Список брэндов</v-toolbar-title>

                        <v-divider
                                class="mx-4"
                                inset
                                vertical
                        ></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog
                                v-model="dialog"
                                max-width="500px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                        color="primary"
                                        dark
                                        class="mb-2"
                                        v-bind="attrs"
                                        v-on="on"
                                >
                                    Добавить
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="text-h5">{{ formTitle }}</span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col
                                                    cols="12"
                                                    sm="6"
                                                    md="4"
                                            >
                                                <v-text-field
                                                        v-model="editedItem.name"
                                                        label="Название"
                                                ></v-text-field>
                                            </v-col>

                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="close"
                                    >
                                        Отменить
                                    </v-btn>
                                    <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="save"
                                    >
                                        Сохранить
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialogDelete" max-width="590px">
                            <v-card>
                                <v-card-title class="text-h5">Если товары нужно перенести, выбирите куда, если нет подтвердите удаление</v-card-title>
                                <v-col
                                        cols="12"
                                        sm="6"
                                >
                                    <v-select
                                            v-model="currentIndex"
                                            :items="main"
                                            color="blue"
                                            label="Брэнд"
                                            required

                                    ></v-select>
                                </v-col>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="closeDelete">Отмена</v-btn>
                                    <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-icon
                            small
                            class="mr-2"
                            @click="editItem(item)"
                    >
                        mdi-pencil
                    </v-icon>
                    <v-icon
                            small
                            class="mr-2"
                            @click="deleteItem(item)"
                    >
                        mdi-delete
                    </v-icon>
                    <v-icon
                            small
                            @click="filterItem(item)"
                    >
                        mdi-filter
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <v-btn
                            color="primary"
                            @click="initialize"
                    >
                        Reset
                    </v-btn>
                </template>
            </v-data-table>

        </v-container>
    </div>
</template>

<script>
    import store from "@/store";

    export default {
        name: "Brands",
        data: () => ({
            dialog: false,
            dialogDelete: false,
            headers: [
                { text: 'Id', value: 'id' },
                { text: 'Название бренда', value: 'name' },
                { text: 'Действия', value: 'actions', sortable: false }
            ],

            main: [],
            editedIndex: -1,
            editedItem: {
                id: Date.now(),
                name: ''
            },
            defaultItem: {
                id: Date.now(),
                name: ''
            },
            currentIndex: -1
        }),

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'Новый элемент' : 'Изменить элемент'
            },
        },

        watch: {
            dialog (val) {
                val || this.close()
            },
            dialogDelete (val) {
                val || this.closeDelete()
            },
        },

        created () {
            this.initialize()
        },

        methods: {
            initialize () {
                this.$store.dispatch("getBrandsAction");
            },

            editItem (item) {
                this.editedIndex = store.getters.getAllBrands.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                let obj = this.$store.getters.getAllBrands
                this.editedIndex = obj.indexOf(item)
                this.editedItem = Object.assign({}, item)
                obj = obj.map(e => e.name).filter((e,index)=> index != this.editedIndex)

                this.main = obj
                this.dialogDelete = true
            },

            filterItem (item) {
                this.$store.commit("emitFilter",item.name)
                this.$router.push('/')
            },

            deleteItemConfirm () {
                if (this.currentIndex != -1){
                    const newBrand = this.$store.getters.getAllBrands.filter(e => e.name == this.currentIndex)[0]
                    this.$store.dispatch("handOverBrandOfTheGoodsAction", {newBrand, oldBrand: this.editedItem})
                    this.$store.commit("deleteElementBrands",this.editedItem.id)
                    //this.$store.dispatch("deleteBrandsAction", this.editedItem.id)
                }else{

                    this.$store.dispatch("deleteBrandsAction", this.editedItem.id)

                }

                this.closeDelete()
            },

            close () {
                this.dialog = false
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                })
            },

            closeDelete () {
                this.dialogDelete = false
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                    this.currentIndex = -1
                })

            },

            save () {
                if (this.editedIndex > -1) {
                    //Object.assign(this.main[this.editedIndex], this.editedItem)
                    // this.$store.commit(
                    //     "emitElementBrands",
                    //     {index: this.editedIndex, elem: this.editedItem}
                    // );
                    this.$store.dispatch("editBrandsAction", this.editedItem)

                } else {
                    this.$store.dispatch("addBrandsAction", this.editedItem)
                    //this.main.push(this.editedItem)
                }
                this.close()
            },
        }
    }
</script>

<style scoped>

</style>