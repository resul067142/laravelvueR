<template>
    <div>
        <h1>Ürün Düzenle</h1>
        <p>
            {{product.name}} {{product.qty}}
        </p>

        <form @submit.prevent="updateProduct">
            <input type="text" v-model="product.name">
            <br>
            <input type="number" v-model="product.qty">
            <br>
            <button>Güncelle</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            product: {
                name: null,
                qty: 0,
            }
        }
    },
    methods: {
        updateProduct() {
            console.log('güncellenecek veri : ', this.product)
            axios.put('/api/products/' + this.$route.params.id,
                {name: this.product.name, qty: this.product.qty}).then(resp => {

                if (resp.status === 200) {
                    this.$router.push('/urunler')
                }
            })
        }
    },
    mounted() {
        const id = this.$route.params.id
        console.log('id -> ', id)
        axios.get('/api/products/' + id).then(res => {
            console.log('Ürün detayı ', res.data)

            this.product.name = res.data.name
            this.product.qty = res.data.qty
        })
    }
}
</script>
