<template>
    <div class="container">
        <div class="row">

            <form @submit.prevent="addAccount" class="bg-white my-5 p-5 offset-4 col-4 rounded">
                <div class="row my-2">
                    <h2 class="col-12 text-center">新規アカウント作成</h2>
                </div>
                <div class="row my-2">
                    <p v-if="isNameEmpty && showErrors" class="col-12 text-danger">名前を入力してください</p>
                    <p v-if="isEmailEmpty && showErrors" class="col-12 text-danger">メールアドレスを入力してください</p>
                    <p v-if="isPasswordEmpty && showErrors" class="col-12 text-danger">パスワードを入力してください</p>
                    <p v-if="isPasswordMismatch && showErrors" class="col-12 text-danger">パスワードと確認パスワードが一致していません。</p>
                </div>
                <div class="row my-2">
                    <label>名前</label>
                    <input type="text" v-model="name" class="form-contrall">
                </div>
                <div class="row my-2">
                    <label>メールアドレス</label>
                    <input type="text" v-model="email" class="form-contrall">
                </div>
                <div class="row my-2">
                    <label>パスワード</label>
                    <input type="password" v-model="password" class="form-contrall">
                </div>
                <div class="row my-2">
                    <label>パスワード（確認）</label>
                    <input type="repassword" v-model="repassword" class="form-contrall">
                </div>
                <div class="row my-4">
                    <button class="btn btn-primary offset-3 col-6" type="submit">登録</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup lang="ts">
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter();
const showErrors = ref<boolean>(false);

const name = ref<string>("");
const email = ref<string>("");
const password = ref<string>("");
const repassword = ref<string>("");

const isNameEmpty = computed(() => !name.value.trim());
const isEmailEmpty = computed(() => !email.value.trim());
const isPasswordEmpty = computed(() => !password.value.trim());
const isPasswordMismatch = computed(() => password.value !== repassword.value);

const addAccount = async () => {
    showErrors.value = true;
    if(
        isNameEmpty.value || isEmailEmpty.value ||
        isPasswordEmpty.value || isPasswordMismatch.value
    )
    {
        return;
    }

    try {
        // データをサーバサイドに送信します。
        const response = await axios.post('/api/account/register', {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation:repassword.value,
        });

        // 応答をチェックして成功時にリダイレクトします。
        if (response.status === 200 && response.data.success) {
            console.log(response.status);
            console.log(response.data);

            //router.push("/account/confirm");
        } else {
            // 必要に応じてエラー処理を行います。
        }
        } catch (error) {
            console.error("Error sending data:", error);
        }
}


</script>