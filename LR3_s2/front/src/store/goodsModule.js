import axios from "axios";
import store from "@/store/index";

export default {
    state: {
        filter: -1,
        goods: [
            // {
            //     id: 1,
            //     name: "123123",
            //     des: "adsawdawd",
            //     cost: 214,
            //     brand: 10,
            //     photo: 'https://picsum.photos/id/11/500/300',
            // },
            // {
            //     id: 2,
            //     name: "212asd",
            //     des: "adsawdawd",
            //     cost: 240,
            //     brand: 20,
            //     photo: 'https://picsum.photos/id/11/500/300',
            // },
            // {
            //     id: 3,
            //     name: "wewefdf",
            //     des: "adsawdawd",
            //     cost: 1,
            //     brand: 10,
            //     photo: 'https://picsum.photos/id/11/500/300',
            // }
        ]
    },
    getters: {
        getAllGoods(state){
            return state.goods
        },
        getFilterGoods(state){
            return state.filter
        }
    },
    mutations: {
        deleteElementGoods(state,payload){
            state.goods = state.goods.filter( (e) => e.id != payload)
        },
        addElementGoods(state,payload) {
            state.goods.push(payload)
        },
        addAllElementGoods(state,payload) {
            if(state.filter != -1){
                state.goods = payload.filter( e => e.brand == state.filter)
            }else{
                state.goods = payload
            }

        },
        emitElementGoods(state,payload) {
            state.goods = state.goods.map( (e) => {
                if (e.id == payload.id) return payload
                else  return e
            })
        },
        reloadBrandElementGoods(state,payload){
            state.goods = state.goods.map( (e) => {
                if (e.brand == payload.oldBrand.name) return  {
                    id: e.id,
                    name: e.name,
                    des: e.des,
                    cost: e.cost,
                    brand: payload.newBrand.name,
                    photo: e.photo,
                }
                else return e
            })
        },
        emitFilter(state,payload){
            state.filter = payload
        },
    },
    actions: {
        async  getGoodsAction ({state,commit}){
            try {
                let result = await axios.get('http://localhost/server/rest/goods/show')
                result = result.data.map(e => {
                    return {id: e.id, name: e.name,cost: e.cost ,des: e.description ,brand: e.name_brand ,photo: `http://localhost/server/files/${e.img_path}`}
                })
                commit('addAllElementGoods',result)
            }catch (e) {
                console.log(e)
            }
        },
        async  handOverBrandOfTheGoodsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('selected_id', payload.newBrand.id);
                data.append('del_id', payload.oldBrand.id);

                await axios.post('http://localhost/server/rest/brands/handOver', data)

                commit('reloadBrandElementGoods',payload)
            }catch (e) {
                console.log(e)
            }
        },
        async  addGoodsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('name', payload.name);
                data.append('brand', payload.brandID);
                data.append('cost', payload.cost);
                data.append('des', payload.des);
                data.append('photo', payload.photo);

                let result = await axios.post('http://localhost/server/rest/goods/add', data)
                result = {
                    id: result.data.id,
                    name: payload.name,
                    brand: payload.brand,
                    cost: payload.cost,
                    des: payload.des,
                    photo: URL.createObjectURL(payload.photo)
                }
                commit('addElementGoods',result)
            }catch (e) {
                console.log(e)
            }
        },
        async  deleteGoodsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('id', payload);

                await axios.post('http://localhost/server/rest/goods/delete', data)
                commit('deleteElementGoods',payload)
            }catch (e) {
                console.log(e)
            }
        },
        async  editGoodsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('id', payload.id);
                data.append('name', payload.name);
                data.append('brand', payload.brandID);
                data.append('cost', payload.cost);
                data.append('des', payload.des);

                await axios.post('http://localhost/server/rest/goods/edit', data)
                commit('emitElementGoods',payload)
            }catch (e) {
                console.log(e)
            }
        },
        async  editWithFileGoodsAction ({commit},payload){
            try {
                const data = new FormData();
                data.append('id', payload.id);
                data.append('name', payload.name);
                data.append('brand', payload.brandID);
                data.append('cost', payload.cost);
                data.append('des', payload.des);
                data.append('photo', payload.photo);

                let result = await axios.post('http://localhost/server/rest/goods/editWF', data)

                result = {
                    id: payload.id,
                    name: payload.name,
                    brand: payload.brand,
                    cost: payload.cost,
                    des: payload.des,
                    photo: URL.createObjectURL(payload.photo)
                }
                commit('emitElementGoods',result)
            }catch (e) {
                console.log(e)
            }
        }
    }
}