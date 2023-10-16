<template>
    <div>
        <router-link to="/" class="m-10">Ana Sayfa</router-link>
        <router-link to="/yazilar" class="m-10">Yazılar</router-link>
        <router-link to="/urunler" class="m-10">Ürünler</router-link>
        <router-link to="/projeler" class="m-10">Projeler</router-link>
        <router-link to="/students" class="m-10">Students</router-link>

        <router-link to="/students/ekle" class="m-10">Students ekle</router-link>

        <router-view></router-view>
        Footer
    </div>
</template>

<style scoped>

</style>
<script setup>
</script>
