
<template>
    <router-link :to="link">
        <button :class="buttonClassRef">{{ buttonText }}</button>
    </router-link>
</template>

<script setup>
import { defineProps, ref, watch } from 'vue';



const props = defineProps({
    buttonText: {
        type: String,
        default: 'button'
    },
    link: {
        type: String,
        default: '/'
    },
    buttonClass: {
        type: String,
        default: ''
    }
});


</script>
