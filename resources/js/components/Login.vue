<template>
    <div class="container">
        <div class="row">

            <form @submit.prevent="login" class="bg-white my-5 p-5 offset-4 col-4 rounded">
                <div class="row my-1">
                    <h2 class="col-12 text-center">ログイン</h2>
                </div>
                <div class="row my-1">
                    <p class="col-12 text-danger">{{ getUserMessage }}</p>
                </div>
                <div class="row my-1">
                    <input type="text" class="form-contrall" v-model="email" placeholder="email">
                </div>
                <div class="row my-1">
                    <input type="password" class="form-contrall" v-model="pass" placeholder="password">
                </div>
                <div class="row my-1">
                    <button class="btn btn-primary offset-3 col-6" type="submit">ログイン</button>
                </div>
                <div class="text-center my-3">
                    <a href="#">パスワードを忘れた方はこちら</a>
                </div>
                <div class="text-center">
                    <label>初めてご利用の方はこちら</label><br>
                    <button @click="goToAccountCreate" class="btn btn-primary">新規アカウントを作成</button>
                </div>
                
            </form>
        </div>
    </div>
</template>
<script setup lang="ts">
import { ref, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter()
const email = ref<string>('')
const pass = ref<string>('')
const error = ref<boolean>(false)
const getUserMessage = ref<string>('')

watch(email, () => {
    console.log(email.value)
})

console.log(1)

const login = async () => {
    const url = '/sanctum/csrf-cookie'
    
    await axios.get(url).then((res) => {console.log(2)})
    .catch((err) => {
        getUserMessage.value = 'ログインに失敗しました。'
    })
    console.log(3)
    await axios.post('/api/login', {
        email: email.value,
        password: pass.value,
    })
    .then((res) => {
        console.log(4)
        if( res.data.status_code == 200 ) {
            router.push("/top");
        }
        getUserMessage.value = 'ログインに失敗しました。'
    })
    .catch((err) => {
        console.log(err);
        getUserMessage.value = 'ログインに失敗しました。'
    })
    console.log(5)
}

const goToAccountCreate = () => {
  router.push('/account/create');
};



</script>