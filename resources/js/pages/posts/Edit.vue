<template>
    <div>
        <h1>Yazı Düzenle</h1>
        <div v-if="showAlert">
            {{alert}}
        </div>
        <form @submit.prevent="updatePost">
            <input type="text" v-model="post.title">
            <br>
            <textarea v-model="post.description"></textarea>
            <br>
            <button>Güncelle</button>
        </form>
    </div>
</template>


<script>
export default  {
    data() {
        return {
            post: {
                title: null,
                description: null
            },
            alert: null,
            showAlert: false,
        }
    },
    methods: {
        updatePost() {
            const updatedData = {
                title: this.post.title,
                description: this.post.description,
            }

            const id = this.$route.params.id
            axios.put('/api/posts/' + id, updatedData).then(res => {
                console.log(res)
                if (res.status === 200) {
                    this.showAlert = true
                    this.alert = 'Başarılı bir şekilde güncellendi.'
                    setTimeout(() => {
                        this.showAlert = false
                        this.$router.push('/yazilar')
                    }, 2000)
                }
            })
        }
    },
    mounted() {
        console.log(this.$route.params.id)
        var id = this.$route.params.id
        axios.get('/api/posts/' + id).then(resp => {
            this.post = resp.data
        })

    }
}
</script>
