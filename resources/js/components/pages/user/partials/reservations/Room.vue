<script setup>
import { defineProps } from 'vue'

const props = defineProps({
    room: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <article class="h-[240px]  w-full p-[20px] bg-white rounded-2xl font-bold tracking-wide grid grid-cols-12">
        <img class="w-[260px] h-[200px] rounded-2xl col-span-2" src="../../../../../../../public/assets/rooms/Sala-Polna.jpg">
        <div class=" col-span-7 ml-7 pr-20">
            <div class="flex flex-col justify-between text-ss-gray-300 ">
                <h1 class="text-ss-gray-400 text-ss-lg font-semibold">{{ room.name }}</h1>
                <strong class="text-ss-green-300 font-bold text-[17px] mb-5">{{ room.numberOfPeople }} <i class="fa-solid fa-person"> &nbsp;&nbsp;</i><span class="text-ss-gray-300 opacity-80">{{ room.size }}m2</span></strong>
                <p class="font-normal mb-16">{{ room.description }}</p>
                <span class="opacity-50 font-semibold "><i class="fa-solid fa-location-dot"></i> {{ room.localization }}</span>
            </div>
        </div>
        <div class="col-span-3 flex flex-col justify-between  ">
            <div class="text-ss-green-300 text-[20px] flex flex-row gap-1 font-light justify-end">
                <i class="fa-solid fa-wifi" alt="WiFi" v-if="room.utilities.includes('wifi')"></i>
                <i class="fa-solid fa-chalkboard" v-if="room.utilities.includes('chalkboard')"></i>
                <i class="fa-solid fa-wheelchair" v-if="room.utilities.includes('disability')"></i>
                <i class="fa-solid fa-volume-low" v-if="room.utilities.includes('speaker')"></i>
                <i class="fa-solid fa-stairs" v-if="room.utilities.includes('stairs')"></i>
            </div>
            <p class="font-normal text-[15px] text-lg mt-16 text-left">cena za 1h:<strong class="text-[30px] font-bold text-ss-gray-400">{{ room.price }}zł / 1h </strong></p>
            <button class="border-2  rounded-full border-ss-green-300 text-ss-green-300 uppercase px-10 py-2 hover:bg-ss-green-300 hover:text-white duration-300 w-48">zobacz</button>
        </div>
    </article>
</template>

