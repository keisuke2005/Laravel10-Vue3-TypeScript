<template>
<div class="container">
    <div class="row">
        <div class="text-center mt-5">
            <h5>仮登録が完了しました。</h5>
            <h5>ご登録されたメールに本登録URLを記載していますので、ご確認お願いいたします。</h5>
        </div>
    </div>
    <div class="row">
        <button type="button" class="offset-4 col-4 offset-md-5 col-md-2 btn btn-primary btn-sm mt-5" onclick="location.href='<?php echo Constants::LOGIN_URL?>'"> ログイン画面へ</button>
    </div>
</div>


</template>
<script setup lang="ts">

</script>