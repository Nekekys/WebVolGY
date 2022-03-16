export default {
    state: {
        goods: [
            {
                id: 1,
                name: "123123",
                des: "adsawdawd",
                cost: 214,
                brand: 10,
                photo: 'https://picsum.photos/id/11/500/300',
            },
            {
                id: 2,
                name: "212asd",
                des: "adsawdawd",
                cost: 240,
                brand: 20,
                photo: 'https://picsum.photos/id/11/500/300',
            },
            {
                id: 3,
                name: "wewefdf",
                des: "adsawdawd",
                cost: 1,
                brand: 10,
                photo: 'https://picsum.photos/id/11/500/300',
            }
        ]
    },
    getters: {
        getAllGoods(state){
            return state.goods
        }
    },
    mutations: {
        deleteElementGoods(state,payload){
            state.goods = state.goods.filter( (e,i) => i != payload)
        },
        addElementGoods(state,payload) {
            state.goods.push(payload)
        },
        emitElementGoods(state,payload) {
            state.goods = state.goods.map( (e, i) => {
                if (i == payload.index) return payload.elem
                else  return e
            })
        },
        reloadBrandElementGoods(state,payload){
            state.goods = state.goods.map( (e) => {
                if (e.brand == payload.oldBrand) return  {
                    id: e.id,
                    name: e.name,
                    des: e.des,
                    cost: e.cost,
                    brand: payload.newBrand,
                    photo: e.photo,
                }
                else  return e
            })
        },
    },
    actions: {
    }
}