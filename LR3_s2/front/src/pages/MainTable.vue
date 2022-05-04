<template>
    <div>
        <v-container>

            <v-data-table
                    :headers="headers"
                    :items="$store.getters.getAllGoods"
                    :hide-default-footer="false"
                    class="elevation-1 mt-8"
            >
                <template v-slot:item.photo="{ item }">
                    <v-img
                            contain
                            max-height="50"
                            max-width="70"
                            :src=" item.photo "
                    ></v-img>
                </template>
                <template v-slot:top>
                    <v-toolbar
                            flat
                    >
                        <v-toolbar-title>Список товаров</v-toolbar-title>

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
                                            <v-col
                                                    cols="12"
                                                    sm="6"
                                                    md="4"
                                            >
                                                <v-text-field
                                                        v-model="editedItem.des"
                                                        label="Описание"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col
                                                    cols="12"
                                                    sm="6"
                                                    md="4"
                                            >
                                                <v-text-field
                                                        v-model="editedItem.cost"
                                                        label="Стоймость"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col
                                                    cols="12"
                                                    sm="6"
                                                    md="4"
                                            >
                                                <v-select
                                                        v-model="editedItem.brand"
                                                        :items="$store.getters.getAllNameBrands"
                                                        color="blue"
                                                        label="Брэнд"
                                                        required

                                                ></v-select>
                                            </v-col>
                                            <v-col
                                                    cols="12"
                                                    sm="6"
                                                    md="4"
                                            >

                                                <v-file-input
                                                        label="Фото"
                                                        v-model="editedItem.photo"
                                                        filled
                                                        hide-input
                                                        prepend-icon="mdi-camera"
                                                ></v-file-input>
<!--                                                <v-img-->
<!--                                                        contain-->
<!--                                                        max-height="50"-->
<!--                                                        max-width="90"-->
<!--                                                        :src="editedItem.photo"-->
<!--                                                ></v-img>-->
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
                        <v-dialog v-model="dialogDelete" max-width="550px">
                            <v-card>
                                <v-card-title class="text-h5">Вы действительно хотите удалить запись?</v-card-title>
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
                            @click="deleteItem(item)"
                    >
                        mdi-delete
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
        name: "MainTable",
        data: () => ({
            dialog: false,
            dialogDelete: false,
            headers: [
                { text: 'Id', value: 'id' },
                { text: 'Название товара', value: 'name' },
                { text: 'Описание', value: 'des', sortable: false },
                { text: 'Стоймость', value: 'cost' },
                { text: 'Брэнд', value: 'brand' },
                { text: 'Фото', value: 'photo', sortable: false },
                { text: 'Действия', value: 'actions', sortable: false }
            ],

            main: [],
            editedIndex: -1,
            editedItem: {
                id: Date.now(),
                name: '',
                des: "",
                cost: 0,
                brand: 0,
                photo: "",
            },
            defaultItem: {
                id: Date.now(),
                name: '',
                des: "",
                cost: 0,
                brand: 0,
                photo: "",
            },
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
                this.$store.dispatch("getGoodsAction");
                //this.main =  store.getters.getAllGoods;
            },

            editItem (item) {
                this.editedIndex = store.getters.getAllGoods.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                this.editedIndex = this.$store.getters.getAllGoods.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialogDelete = true
            },

            deleteItemConfirm () {
                const id = store.getters.getAllGoods.filter( (e,i) => i == this.editedIndex)[0].id;
                this.$store.dispatch("deleteGoodsAction", id)
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
                })
            },

            save () {
                if (this.editedIndex > -1) {
                    let elem = this.editedItem
                    elem.brandID = store.getters.getAllBrands.filter( e => e.name == elem.brand)[0].id;
                    //Object.assign(this.main[this.editedIndex], this.editedItem)
                    if (typeof this.editedItem.photo == 'object'){
                        this.$store.dispatch("editWithFileGoodsAction", this.editedItem)
                    }else{
                        this.$store.dispatch("editGoodsAction", this.editedItem)
                    }

                    // this.$store.commit(
                    //     "emitElementGoods",
                    //     {index: this.editedIndex, elem: this.editedItem}
                    //     );
                } else {
                    let elem = this.editedItem
                    elem.brandID = store.getters.getAllBrands.filter( e => e.name == elem.brand)[0].id;
                    this.$store.dispatch("addGoodsAction", this.editedItem)
                   // this.$store.commit("addElementGoods",this.editedItem);
                    //this.main.push(this.editedItem)
                }
                this.close()
            },
        }
    }
</script>

<style scoped>

</style>