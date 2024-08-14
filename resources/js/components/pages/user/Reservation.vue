<script setup>
import { ref, onMounted, computed, watch,  watchEffect } from 'vue';
import axios from 'axios';
import Button from "@/components/pages/user/partials/button.vue";
import Room from "@/components/pages/user/partials/reservations/Room.vue";

let selectedStatus = ref('day');
let reservations = ref([]);
let times = computed(() => {
    let slots = [];
    for (let i = 7; i <= 22; i += 0.5) {
        slots.push(`${Math.floor(i).toString().padStart(2, '0')}:${(i % 1 > 0 ? '30' : '00')}`);
    }
    return slots;
});
let isList = ref(false);
let rooms = ref([]);
let isLoading = ref(false);
let isWeek = ref(false);
let currentDate = ref(null);
let date = new Date();
currentDate.value = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;

let selectedDate = ref(null);
selectedDate.value = currentDate.value;


let dayName = computed(() => new Date(selectedDate.value).toLocaleDateString('pl-PL', { weekday: 'long' }));


watch(() => selectedDate.value, async (newDate) => {
    isLoading.value = true;
    await getReservationsForDay(newDate);
    await getRooms();

});

watchEffect(() => {
    if (isLoading.value) {
        isLoading.value = false;
    }
});

const incrementDate = () => {
    let date = new Date(selectedDate.value);
    date.setDate(date.getDate() + 1);
    selectedDate.value = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
};

const decrementDate = () => {
    let date = new Date(selectedDate.value);
    date.setDate(date.getDate() - 1);
    let decrementedDate = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;

    if(new Date(decrementedDate).getTime() >= new Date(currentDate.value).getTime()) {
        selectedDate.value = decrementedDate;
    }
};
const isReserved = (roomId, time) => reservations.value ? reservations.value.some(reservation => reservation.room_id == roomId && reservation.tiles.some(tile => tile === time)) : false;
const getReservationsForDay = (date) => {
    axios.get('/api/rezerwacje', { params: { start_date: date, end_date: date } })
        .then(response => {
            reservations.value = response.data;
        })
        .catch(console.log);
}
const getRooms = () => {
    axios.get('/api/pokoje')
        .then(response => { rooms.value = response.data.data; })
        .catch(console.log);
}

onMounted(() => {
    getReservationsForDay(selectedDate.value);
    getRooms();
});
</script>

<template>

    <div class=" fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" :class="{ 'hidden': !isLoading}">
        <svg aria-hidden="true" class="w-20 h-20 text-gray-200 animate-spin  fill-ss-green-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
    </div>
    <div class="flex flex-col text-ss-gray-300   sm:text-left text-center max-w-8xl mx-auto mt-20"
         :class="{ 'opacity-15': isLoading, 'opacity-100': !isLoading}">
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
            <div class="relative px-2 py-2 rounded-full bg-white text-ss-gray-300 text-[17px]">
                <input id="day" class="peer hidden" type="radio" name="status" v-model="selectedStatus" value="day" />
                <label for="day" :class="{ 'bg-ss-green-300': selectedStatus === 'day' }" class="pl-2 pr-3 py-1 rounded-full cursor-pointer">Dzień</label>

                <input id="week" class="peer hidden" type="radio" name="status" v-model="selectedStatus" value="week" />
                <label for="week" :class="{ 'bg-ss-green-300': selectedStatus === 'week' }" class="pr-2 pl-3 py-1 rounded-full cursor-pointer">Tydzień</label>
<!--                <div :class="{ 'left-0': selectedStatus === 'day', 'right-0': selectedStatus === 'week' }" class=" transform transition bg-ss-green-300 absolute w-1/2 h-full rounded-full transition-all duration-300"></div>-->
            </div>
        </div>

        <section v-if="isList" class="flex flex-col gap-10 mb-20">
            <Room
                v-for="room in rooms"
                :key="room.id"
                :room="room"
            />
        </section>
        <section v-if="!isList" class="flex flex-col gap-5 mb-20">
            <div class="flex flex-row gap-10 justify-center" v-if="selectedStatus === 'day'">
                <button @click="decrementDate"><i class="fa-solid fa-arrow-left"></i></button>
                <div class="flex flex-col text-center text-ss-gray-300">
                    <strong>{{selectedDate}}</strong>
                    <strong class="text-ss-green-300">{{ dayName }}</strong>
                </div>
                <button @click="incrementDate"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="flex flex-row gap-10 justify-center" v-if="selectedStatus === 'week'">
                <button @click="decrementDate"><i class="fa-solid fa-arrow-left"></i></button>
                <div class="flex flex-col text-center text-ss-gray-300">
                    <strong>{{selectedDate}}</strong>
                    <strong class="text-ss-green-300">{{ dayName }}</strong>
                </div>
                <button @click="incrementDate"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="flex flex-col gap-10 mb-20 relative">

                <div class="bg-white rounded-2xl w-full p-[20px]">
                    <table  v-if="selectedStatus === 'day'">
                        <thead class="border-ss-green-300 border-opacity-45 border-b-2 border-dashed ">
                            <tr class=" grid grid-cols-10 gap-2 text-ss-gray-300  text-center">
                                <th></th>
                                <th  class=" font-normal pb-5" v-for="room in rooms" :key="room.id">{{ room.name  }}</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr class=" grid grid-cols-10 gap-2 border-ss-green-300 border-opacity-45 border-b-2 border-dashed py-2" v-for="time in times" :key="time">
                                <td>{{ time}}</td>
                                <td v-for="room in rooms" :key="room.id"
                                    :class="{ 'bg-ss-green-300': !isReserved(room.id, time), 'bg-red-500': isReserved(room.id, time) }"
                                    class="h-10 rounded-md"
                                    :value="`${isReserved(room.id, time)}-${time}`">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table   class="w-full" v-if="selectedStatus === 'week'">
                        <thead class="border-ss-green-300 border-opacity-45 border-b-2 border-dashed ">
                        <tr class=" grid grid-cols-10 gap-2 text-ss-gray-300  text-center w-full">
                            <th></th>
                            <th class="font-normal pb-5 w-full" v-for="index in 9" :key="index">
                                {{ new Date(new Date().setDate(new Date().getDate() + index)).toLocaleDateString() }}
                            </th>
                        </tr>
                        </thead>
                        <tbody >
                        <tr class=" grid grid-cols-10 gap-2 border-ss-green-300 border-opacity-45 border-b-2 border-dashed py-2" v-for="time in times" :key="time">
                            <td>{{ time}}</td>
                            <td class="h-10 rounded-md bg-ss-green-300" v-for="index in 9" :key="index">

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>


    </div>
</template>

<style scoped>

</style>
