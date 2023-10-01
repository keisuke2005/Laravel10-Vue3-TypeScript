<template>
    <header class="bg-white container-fluid">
        <div class="wrap">
            <img :src="logoRef">
            <bottun class="btn btn-primary">ログアウト</bottun>
        </div>
    </header>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import logo from '@/assets/images/KnownAnimalLogo.png';

const logoRef = ref<string>(logo);

</script>

<style scoped>
@import "@/assets/styles/global.css";

header {
    height:100px;
}

div.wrap {
    height:100%;
    display:flex;
    align-items: center;
    justify-content: space-between;
}

img {
    height:100%;
    display:block;
}

button {
    display:block;
}
</style>