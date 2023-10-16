<template>
    <div>
        <h1>Student Ekle</h1>
        <p>
            {{student.name}} {{student.surname}}  {{student.number}} {{student.class}}
        </p>

        <form @submit.prevent="ekleStudent">
            <input type="text" v-model="student.name" >
            <br>
            <input type="text" v-model="student.surname">
            <br>
            <input type="number" v-model="student.number">
            <br>
            <input type="text" v-model="student.class">
            <br>
            <button>Ekle</button>
        </form>
    </div>
</template>
<script>

export default {
    data() {
        return {
            student: {
                name: null,
                surname: null,
                number: null,
                class: null,
            }
        }
    },
    methods: {
        ekleStudent() {
            console.log('güncellenecek veri : ', this.student)
            alert("ekledim")

            axios.post('/api/student',
                {name: this.student.name, surname: this.student.surname, number:this.student.number, class:this.student.class}).then(resp => {

                if (resp.status === 200) {
                    this.$router.push('/students')
                }
            })
        }
    },
    mounted() {
        const id = this.$route.params.id
        console.log('id -> ', id)
        axios.get('/api/students/' + id).then(res => {
            console.log('Student detayı ', res.data)

            this.student.name = res.data.name
            this.student.surname = res.data.surname
            this.student.number = res.data.number
            this.student.class = res.data.class

        })
    }
}
</script>
