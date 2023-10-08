<template>
    <header class="bg-white container-fluid">
        <div class="wrap">
            <img :src="logoRef">
            <bottun @click="logout" class="btn btn-primary">ログアウト</bottun>
        </div>
    </header>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import logo from '@/assets/images/KnownAnimalLogo.png';

const router = useRouter()
const logoRef = ref<string>(logo);

const logout = () => {
    axios.post("/api/logout")
    .then(response => {
        console.log(response.status);
        console.log(response.data.success);
        if(response.status === 200 && response.data.success) {
            router.push("/login");
        }
    })
    .catch(error => {
        console.log(error);
    });
};

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