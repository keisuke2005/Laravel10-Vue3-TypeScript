<template>
    <section class="welcome">
        <div class="">
            <div class="mx-5 my-3 h5 text-end">ようこそ！{{ username }}さん</div>
        </div>
    </section>
    <section>
        <div class="container">
            <ul class="row">
                <li class="col-3 p-1">
                    <div class="card">
                        <img :src="noImageRef" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">たぬき</h5>
                            <p>科：タヌキ科</p>
                            <p>特徴：垂れ目</p>
                            <p>知った日：2022-06-04</p>
                            <button class="btn btn-primary edit m-1" type="button" id="edit22">更新</button>
                            <button class="btn btn-primary delete m-1" type="button">削除</button>
                        </div>
                    </div>
                </li>
                <li class="col-3 p-1">
                    <div class="card">
                        <img :src="noImageRef" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">たぬき</h5>
                            <p>科：タヌキ科</p>
                            <p>特徴：垂れ目</p>
                            <p>知った日：2022-06-04</p>
                            <button class="btn btn-primary edit m-1" type="button" id="edit22">更新</button>
                            <button class="btn btn-primary delete m-1" type="button">削除</button>
                        </div>
                    </div>
                </li>
                <li class="col-3 p-1">
                    <div class="card">
                        <img :src="noImageRef" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">たぬき</h5>
                            <p>科：タヌキ科</p>
                            <p>特徴：垂れ目</p>
                            <p>知った日：2022-06-04</p>
                            <button class="btn btn-primary edit m-1" type="button" id="edit22">更新</button>
                            <button class="btn btn-primary delete m-1" type="button">削除</button>
                        </div>
                    </div>
                </li>
                <li class="col-3 p-1">
                    <div class="card">
                        <img :src="noImageRef" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">たぬき</h5>
                            <p>科：タヌキ科</p>
                            <p>特徴：垂れ目</p>
                            <p>知った日：2022-06-04</p>
                            <button class="btn btn-primary edit m-1" type="button" id="edit22">更新</button>
                            <button class="btn btn-primary delete m-1" type="button">削除</button>
                        </div>
                    </div>
                </li>
                <li class="col-3 p-1">
                    <div class="card">
                        <img :src="noImageRef" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">たぬき</h5>
                            <p>科：タヌキ科</p>
                            <p>特徴：垂れ目</p>
                            <p>知った日：2022-06-04</p>
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

const username = ref<string>("");
const noImageRef = ref<string>(noImage);

onMounted(() => {
    axios.get("/api/user").then(response => {
        console.log(response.data);
        username.value = response.data.name;
    });
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