
<template>
    <router-link :to="link">
        <button class="bg-ss-green-300 py-3  font-bold text-[12px] text-white rounded-full px-5 hover:bg-ss-green-500 duration-300 ">{{ buttonText }}</button>
    </router-link>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    buttonText: {
        type: String,
        default: 'button'
    },
    link: {
        type: String,
        default: '/'
    }
});
</script>
