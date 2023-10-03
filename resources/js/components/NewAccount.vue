<template>
    <div class="container">
        <div class="row">

            <form class="bg-white my-5 p-5 offset-4 col-4 rounded">
                <div class="row my-2">
                    <h2 class="col-12 text-center">新規アカウント作成</h2>
                </div>
                <div class="row my-2">
                    <p class="col-12 text-danger"></p>
                </div>
                <div class="row my-2">
                    <label>名前</label>
                    <input type="text" class="form-contrall">
                </div>
                <div class="row my-2">
                    <label>メールアドレス</label>
                    <input type="text" class="form-contrall">
                </div>
                <div class="row my-2">
                    <label>パスワード</label>
                    <input type="password" class="form-contrall">
                </div>
                <div class="row my-2">
                    <label>パスワード（確認）</label>
                    <input type="repassword" class="form-contrall">
                </div>
                <div class="row my-4">
                    <button class="btn btn-primary offset-3 col-6" type="submit">登録</button>
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

const name = ref<string>("");
const email = ref<string>("");
const password = ref<string>("");
const repassword = ref<string>("");




</script>