<template>
    <div>
        <h1>{{title}} <small>({{posts.length}})</small></h1>

        <h2>Yazı Ekle</h2>
        <form @submit.prevent="savePost">
            <input type="text" v-model="post.title" placeholder="Title"><br>

            <textarea cols="30" rows="10" v-model="post.description"
                      placeholder="Description"></textarea>   <br>

            <button type="submit">Kaydet</button>
        </form>

        <div v-for="post in posts">
            <h2>#{{post.id}} -> {{post.title}}</h2>

            <p>{{post.description}}</p>
            <p>
                <router-link :to="'/yazilar/' + post.id">Düzenle</router-link>

                <button type="button" @click="deletePost(post.id)">Sil</button>

            </p>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            title: 'Yazılar Listesi',
            posts: [],
            post: {
                id: null,
                title: null,
                description: null,
            }
        }
    },
    methods: {
        // yazı ekleme
        async savePost() {
            const newPost = {
                // id: this.posts.length+1,
                title: this.post.title,
                description: this.post.description,
            }

            await axios.post('/api/posts', newPost).then(res => {
                console.log('res.data',res.data)
                //this.posts.prepend(res.data) js'te prepend yok
                this.posts = this.prepend(res.data, this.posts);
            })
            // laravele post isteği atılacak kaydedilen post geri döndürülecek. Dönen post arraye eklenecek
            //this.posts.push(newPost)
            console.log('this.post', this.post)
        },
        deletePost(id) {
            axios.delete('/api/posts/' + id).then(res => {
                if (res.status === 200) {
                    const index = this.posts.findIndex(post => {
                        return post.id === id
                    })

                    if (index !== -1) {
                        this.posts.splice(index, 1)
                    }

                    console.log(res.data)
                }
            })
        },
        prepend(value, array) {
            var newArray = array.slice();
            newArray.unshift(value);
            return newArray;
        }
    },
    mounted() {
        axios.get('/api/posts').then(response => {
            console.log(response.data)

            this.posts = response.data
        })
        console.log('sayfa açıldı...')
    },
    created() {
        console.log('sayfa oluşturuldu')
    }
}
</script>
