<script setup>

</script>

<template>
    <article class="md:w-[600px] w-full h-[600px]  flex flex-col rounded-2xl relative overflow-hidden">
        <div class="absolute bg-ss-green-300 text-white w-fit font-bold p-1 text-[13px] tracking-wide right-0 z-10 rounded-md" v-if="isPinned">przypięty</div>
        <div class="w-full h-[80%]  relative group rounded-2xl overflow-hidden">
            <div class="h-full bg-[url('https://picsum.photos/1000/500')] bg-no-repeat bg-cover bg-center transform group-hover:scale-110 transition-transform duration-200 origin-center" ></div>
            <div class="absolute inset-0 bg-ss-green-300 opacity-0 hover:opacity-50 transition-opacity duration-200"></div>
        </div>

        <div class="bg-white w-[80%] absolute rounded-2xl p-5 flex flex-col gap-2 text-ss-gray-300 bottom-0 left-1/2 transform -translate-x-1/2">
            <time :datetime="date" class="text-ss-sm ">{{ date }}</time>
            <h1 class="text-ss-lg font-semibold text-ss-gray-400">{{ title }}</h1>
            <p class="text-ss-base ">{{ text }}</p>
            <div class="flex flex-row gap-2">
                <a v-for="(tag, index) in tagNames" :key="index" href="/" class="text-gray-400 bg-ss-gray-200 px-2 py-1 font-bold text-ss-sm  rounded-xl uppercase">{{ tag }}</a>
            </div>

            <a href="#" class="text-ss-green-500 uppercase tracking-wide font-bold">Czytaj dalej
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </article>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
    date: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    },
    tagNames: {
        type: Array,
        required: true
    },
    isPinned: {
        type: Boolean,
        default: false
    }
})
</script>
