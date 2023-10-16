<template>
    <div>
        <h1>Students</h1>
        <div v-for="student in students">

            {{student.name}} {{student.surname}}  {{student.number}} {{student.class}}  <br>
            <router-link :to="'/students/' + student.id">Düzenle</router-link> <br>
            <button @click="deleteStudent(student.id)">Sil</button><hr>

        </div>
    </div>
</template>
<script>

import axios from "axios";

export default {
    data() {
        return {
            students: [],
        }
    },

    methods: {
        deleteStudent(id) {
            console.log(id + 'silindi')
            alert(SİLİNDİ)

            axios.delete('/api/student/' + id).then(res => {
                if (res.status === 200) {
                    console.log(res.data)
                    const index = this.products.findIndex(item => item.id === id)

                }
            }).catch(err => {
                console.log(err.response)
            })
        }
    },

    mounted() {

        axios.get('/api/student').then(response => {

            console.log(response.data)

            this.students = response.data
        })
    }
}

</script>
