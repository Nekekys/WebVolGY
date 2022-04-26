import axios from "axios";

export default {
    state: {
        brands: [
            // {
            //     id: 1,
            //     name: "10"
            // },
            // {
            //     id: 2,
            //     name: "20"
            // },
            // {
            //     id: 3,
            //     name: "30"
            // }
        ]
    },
    getters: {
        getAllBrands(state){
            return state.brands
        },
        getAllNameBrands(state){
            return state.brands.map( e => e.name )
        }
    },
    mutations: {
        deleteElementBrands(state,payload){
            state.brands = state.brands.filter( (e) => e.id != payload)
        },
        addElementBrands(state,payload) {
            state.brands.push(payload)
        },
        addAllElementBrands(state,payload) {
            state.brands = payload
        },
        emitElementBrands(state,payload) {
            state.brands = state.brands.map( (e) => {
                if (e.id == payload.id) e.name = payload.name
                return e
            })
        }
    },
    actions: {
        async  getBrandsAction ({commit}){
            try {
                let result = await axios.get('http://localhost/server/rest/brands/show')
                result = result.data.map(e => {
                    return {id: e.id_brand, name: e.name_brand}
                })
                commit('addAllElementBrands',result)
            }catch (e) {
                console.log(e)
            }
        },
        async  addBrandsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('name', payload.name);
                let result = await axios.post('http://localhost/server/rest/brands/add', data)
                result = {
                    id: result.data.id,
                    name: payload.name
                }
                commit('addElementBrands',result)
            }catch (e) {
                console.log(e)
            }
        },
        async  editBrandsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('id', payload.id);
                data.append('name', payload.name);

                await axios.post('http://localhost/server/rest/brands/edit', data)

                commit('emitElementBrands',payload)
            }catch (e) {
                console.log(e)
            }
        },
        async  deleteBrandsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('id', payload);

                await axios.post('http://localhost/server/rest/brands/delete', data)

                commit('deleteElementBrands',payload)
            }catch (e) {
                console.log(e)
            }
        }

    }
}