<template>
    <section class="welcome">
        <div class="">
            <div class="mx-5 my-3 h5 text-end">ようこそ！{{ username }}さん</div>
        </div>
    </section>
    <section>
        <div class="container">
            <ul class="row">
                <li class="col-3 p-1" v-for="animal in animals" :key="animal.id">
                    <div class="card">
                        <img :src="noImageRef" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ animal.name }}</h5>
                            <p>科：{{ animal.subject }}</p>
                            <p>特徴：{{ animal.feature }}</p>
                            <p>知った日：{{ animal.known_date }}</p>
                            <button class="btn btn-primary edit m-1" type="button" id="edit22">更新</button>
                            <button class="btn btn-primary delete m-1" type="button">削除</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>   
    </section>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import noImage from '@/assets/images/no_image.jpeg';
import { useRouter } from 'vue-router';

interface Animal {
    id: number;
    name: string;
    subject: string;
    feature: string;
    known_date: string;
}


const username = ref<string>("");
const noImageRef = ref<string>(noImage);
const animals = ref<Animal[]>([]);

onMounted(async () => {
    try {
        const responseUser = await axios.get('/api/user');
        username.value = responseUser.data.name;

        const responseAnimals = await axios.get('/api/animal/list');
        animals.value = responseAnimals.data.animals;
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

const logout = () => {
    axios.post("api/logout")
    .then(response => {
        console.log(response);
        // ここでthis.$routerは直接使用できません。
        // 代わりにuseRouterを使ってルーターインスタンスを取得します。
        const router = useRouter();
        router.push("/login");
    })
    .catch(error => {
        console.log(error);
    });
};

</script>

<style scoped>
li {
    list-style:none;
}
</style>