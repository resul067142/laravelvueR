<template>
    <div>
        <h1>Student Düzenle</h1>
        <p>
            {{student.name}} {{student.surname}}  {{student.number}} {{student.class}}
        </p>

        <form @submit.prevent="updateStudent">
            <input  type="text" v-model="student.name " placeholder="ögrenci adını">
            <br>
            <input type="text" v-model="student.surname" placeholder="ögrenci Soyadını">
            <br>
            <input type="number" v-model="student.number" placeholder="ögrenci Numarasını">
            <br>
            <input type="text" v-model="student.class" placeholder="ögrenci sınıdını">
            <br>
            <button>Güncelle</button>
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
        updateStudent() {
            console.log('güncellenecek veri : ', this.student)

            axios.put('/api/student/' + this.$route.params.id,

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

        axios.get('/api/student/' + id).then(res => {

            console.log('Student detayı ', res.data)

            this.student.name = res.data.name
            this.student.surname = res.data.surname
            this.student.number = res.data.number
            this.student.class = res.data.class

        })
    }
}
</script>
