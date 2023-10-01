<script setup lang="ts">

import { ref,defineComponent,computed } from 'vue'
import HeaderComponent from './components/common/Header.vue'

import { useRoute } from 'vue-router'

const route = useRoute();
const showHeader = computed(() => {
    return route.meta.showHeader;
});
</script>

<template>
    <HeaderComponent v-if="showHeader" />
    <main class="bg-body">
        <router-view></router-view>
    </main>
</template>