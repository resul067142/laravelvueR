<template>
    <div>
        <h1>Ürünler</h1>
        <div>
            <h1>Ürünler</h1>
            <div v-for="product in products">
                {{product.name}} ({{product.qty}}) <router-link :to="'/urunler/' + product.id">Düzenle</router-link>
                <button @click="deleteProduct(product.id)">Sil</button>
            </div>
        </div>
    </div>
</template>
<script>

import axios from "axios";

export default {
    data() {
        return {
            products: [],
        }
    },
    mounted() {
        /// mounted fonksiyonu sayfa açılırken açılan fonksiyondur.
        /// response = yanıt
        axios.get('/api/products').then(response => {
            console.log(response.data)
            this.products = response.data
        })
    },

    methods: {
        deleteProduct(id) {
            console.log(id + ' id\'li ürün silindi')
            axios.delete('/api/products/' + id).then(res => {
                if (res.status === 200) {
                    console.log(res.data)
                    const index = this.products.findIndex(item => item.id === id)
                    //this.products.splice(index,1)
                }

            }).catch(err => {
                console.log(err.response)
            })
        }
    }
}
</script>
