<script setup>

import { ref } from 'vue'

const count = ref(0)
const addCount = () => {
    count.value++
}

</script>

<template>
    <router-view></router-view>
</template>