<script setup>

import Button from "@/components/pages/user/partials/button.vue";
import { ref } from 'vue';


let isList = ref(true);
</script>

<template>
    <div class="flex flex-col text-ss-gray-300   sm:text-left text-center max-w-7xl mx-auto">
        <form class="w-full h-[120px] rounded-2xl bg-white gap-4 flex flex-row items-center px-10 text-ss-sm ">
            <div class="flex flex-col">
                <label for="date">Kim jesteś?*</label>
                <select class="border-ss-gray-200 border rounded-lg text-[16px] p-2">
                    <option value="1">Firma (usłga płatna)</option>
                    <option value="2">Mieszkanie Mikołowa</option>
                    <option value="3">Organizacja pozarządowa</option>
                    <option value="4">Somorząd</option>
                </select>

            </div>
            <div class="flex flex-col">
                <label for="date">Data</label>
                <input class="border-ss-gray-200 border rounded-lg text-[16px] p-2" type="date" id="date" name="date">
            </div>
            <div class="flex flex-col">
                <label for="date">Data</label>
                <input class="border-ss-gray-200 border rounded-lg text-[16px] p-2" type="date" id="date" name="date">
            </div>
            <div class="flex flex-col">
                <label for="date">Data</label>
                <input class="border-ss-gray-200 border rounded-lg text-[16px] p-2" type="date" id="date" name="date">
            </div>
            <div class="flex justify-end w-full ">
                <button type="submit" class=" uppercase bg-ss-green-300 py-3 px-4 rounded-full font-bold text-ss-base text-white tracking-wide">sprawdź dostępność </button>
            </div>
        </form>

        <div v-if="isList" class="flex flex-row text-[30px] gap-3 my-7">
            <i class="fa-solid text-ss-green-300 fa-list" @click="isList = !isList"></i>
            <i class="fa-regular fa-calendar-days" @click="isList = !isList"></i>
            <h1  class="text-ss-lg text-ss-gray-400">Lista</h1>
        </div>
        <div v-if="!isList" class="flex flex-row text-[30px] gap-3 my-7">
            <i class="fa-solid fa-list" @click="isList = !isList"></i>
            <i @click="isList = !isList" class="fa-regular fa-calendar-days text-ss-green-300" ></i>
            <h1  class="text-ss-lg text-ss-gray-400">Kalendarz</h1>
        </div>

        <section v-if="isList" class="">

        </section>


    </div>
</template>

<style scoped>

</style>
