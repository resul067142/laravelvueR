<template>
    <div>
        <h1>Ürünler</h1>
        <p>
            <button type="button" @click="azalt">Azalt</button>
            {{number}}
            <button type="button" @click="artir">Artır</button>
        </p>
        <p>
            Ürün Adı: {{product.name}}
            <br>
            Ürün Stok: {{product.qty}}

            <br>
            <input type="number" v-model="newQty">
            <button type="button" @click="qtyGuncelle">Stok Güncelle</button>
            <br>
            <button type="button" @click="stokArtir">Stok Ekle</button>

        </p>
        <p>
            <li v-for="car in cars">{{car}}</li>
        </p>
        <p>
            <!-- {{flowers}} -->
            <li v-for="flower in flowers">{{flower.color}} {{flower.name}}</li>
        </p>
        <p>
            <router-link :to="link">Git</router-link>
        </p>
    </div>
</template>
<script>
export default {
    data() {
        return {
            link: '/urunler/1',
            number: 1,
            product: {
                name: 'Tshirt',
                qty: 200,
            },
            newQty: 10,
            cars: [
                'togg',
                'audi',
                'mercedes',
            ],
            flowers: [
                {name: 'Gül', color: 'Kırmızı'},
                {name: 'Zambak', color: 'Yeşil'},
            ],
        }
    },
    methods: {
        azalt() {
            this.number = this.number - 1
        },
        artir() {
            this.number = this.number + 1
        },
        stokArtir(){
            this.product.qty += 10
        },
        qtyGuncelle() {
            this.product.qty = this.newQty
        },
    }
}
</script>
