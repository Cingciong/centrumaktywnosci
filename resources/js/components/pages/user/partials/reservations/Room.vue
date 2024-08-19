<script setup>
import { defineProps, reactive } from 'vue'

const props = defineProps({
    room: {
        type: Object,
        required: true
    }
})

const state = reactive({
    currentDate: new Date().toISOString().split('T')[0]
})
</script>

<template>
    <article class="md:h-[240px] h-fit md:w-full w-3/4 mx-auto p-[20px]  bg-white rounded-2xl font-bold tracking-wide md:grid md:grid-cols-12 max-md:flex max-md:flex-col max-md:gap-3 md:text-left text-center ">
        <img class="md:w-[260px] md:h-[200px] w-fit  md:mx-0 mx-auto rounded-2xl lg:col-span-3   md:col-span-4" src="../../../../../../../public/assets/rooms/Sala-Polna.jpg">
        <div class=" lg:col-span-6  md:col-span-6 h-full  flex flex-col justify-between text-ss-gray-300  lg:ml-7 ml-0 mx-auto lg:pr-20 pr-0 md:gap-0 gap-3">
                <h1 class="text-ss-gray-400 text-ss-lg font-semibold row-span-1 line-clamp-2">{{ room.name }}</h1>
                <strong class="text-ss-green-300 font-bold text-[17px] row-span-1">{{ room.numberOfPeople }} <i class="fa-solid fa-person"> &nbsp;&nbsp;</i><span class="text-ss-gray-300 opacity-80">{{ room.size }}m2</span></strong>
                <p class="font-normal w-full row-span-2 line-clamp-3 md:pr-20 pr-0">{{ room.description }}</p>
                <span class="opacity-50 font-semibold row-span-1 line-clamp-1"><i class="fa-solid fa-location-dot"></i> {{ room.localization }}</span>

        </div>
        <div class="lg:col-span-3 md:col-span-2 flex flex-col h-full justify-between ">
            <div class="text-ss-green-300 text-[20px] gap-2 flex flex-row gap-1 font-light justify-end ">
                <i class="fa-solid fa-wifi" alt="WiFi" v-if="room.utilities.includes('wifi')"></i>
                <i class="fa-solid fa-chalkboard" v-if="room.utilities.includes('chalkboard')"></i>
                <i class="fa-solid fa-wheelchair" v-if="room.utilities.includes('disability')"></i>
                <i class="fa-solid fa-volume-low" v-if="room.utilities.includes('speaker')"></i>
                <i class="fa-solid fa-stairs" v-if="room.utilities.includes('stairs')"></i>
            </div>
            <div class="flex flex-col gap-2 justify-items-center">
                <p class="font-normal text-[15px] text-lg  text-center  w-full">cena za 1h: <strong class="text-[30px] font-bold text-ss-gray-400">{{ room.price }}zł </strong></p>
                <router-link :to="`/rezerwacje/sala/${room.id}/${state.currentDate}`"
                             class="border-2 rounded-full text-center mx-auto border-ss-green-300 text-ss-green-300 uppercase px-10 py-2 hover:bg-ss-green-300 hover:text-white duration-300 w-48">
                    zobacz
                </router-link>
            </div>

        </div>
    </article>
</template>

