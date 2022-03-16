export default {
    state: {
        brands: [
            {
                id: 1,
                name: "10"
            },
            {
                id: 2,
                name: "20"
            },
            {
                id: 3,
                name: "30"
            }
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
        deleteElementGoods(state,payload){
            state.brands = state.brands.filter( (e,i) => i != payload)
        },
        addElementBrands(state,payload) {
            state.brands.push(payload)
        },
        emitElementBrands(state,payload) {
            state.brands = state.brands.map( (e, i) => {
                if (i == payload.index) return payload.elem
                else  return e
            })
        }
    },
    actions: {
    }
}