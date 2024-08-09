<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import Button from "@/components/pages/user/partials/button.vue";
import Room from "@/components/pages/user/partials/reservations/Room.vue";




let reservations = ref([]);
let times = computed(() => {
    let slots = [];
    for (let i = 7; i <= 22; i += 0.5) {
        let hours = Math.floor(i).toString().padStart(2, '0');
        let minutes = (i % 1 > 0 ? '30' : '00');
        slots.push(`${hours}:${minutes}`);
    }
    return slots;
});

let selectedDate = ref(null);
let isList = ref(false);
let rooms = ref([]);
let currentDate = new Date();
let day = String(currentDate.getDate()).padStart(2, '0');
let month = String(currentDate.getMonth() + 1).padStart(2, '0'); //January is 0!
let year = currentDate.getFullYear();

currentDate = year + '-' + month + '-' + day;


const isReserved = (roomId, time) => {
    if (reservations.value) {
        return reservations.value.some(reservation => {
            if(reservation.room_id == roomId) {
                for (let i = 0; i < reservation.tiles.length; i++) {
                    // Compare each tile with the time
                    if (reservation.tiles[i] === time) {
                        return true;
                    }
                }
            }
        });
    } else {
        // Return false as a default value if reservations.value is undefined
        return false;
    }
};
const getReservationsForDay = (date) => {
    axios.get('/api/rezerwacje', {
        params: {
            start_date: date,
            end_date: date
        }
    })
        .then(response => {
            reservations.value = response.data; // change this line
            console.log(reservations.value);
        })
        .catch(error => {
            console.log(error);
        });
}
const getRooms = () => {
    axios.get('/api/pokoje')
        .then(response => {
            console.log(response.data);
            rooms.value = response.data.data;
            console.log(rooms.value);
        })
        .catch(error => {
            console.log(error);
        });
}

onMounted(() => {
    getReservationsForDay(currentDate);
    getRooms();
});

</script>

<template>
    <div class="flex flex-col text-ss-gray-300   sm:text-left text-center max-w-8xl mx-auto mt-20">
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

        <section v-if="isList" class="flex flex-col gap-10 mb-20">
            <Room
                v-for="room in rooms"
                :key="room.id"
                :room="room"
            />
        </section>
        <section v-if="!isList" class="flex flex-col gap-10 mb-20">
            <div class="flex flex-col gap-10 mb-20">
                <div class="bg-white rounded-2xl w-full p-[20px]">
                    <table>
                        <thead class="border-ss-green-300 border-opacity-45 border-b-2 border-dashed ">
                            <tr class=" grid grid-cols-10 gap-2 text-ss-gray-300  text-center">
                                <th></th>
                                <th  class=" font-normal pb-5" v-for="room in rooms" :key="room.id">{{ room.name  }}, {{room.id}}</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr class=" grid grid-cols-10 gap-2 border-ss-green-300 border-opacity-45 border-b-2 border-dashed py-2" v-for="time in times" :key="time">
                                <td>{{ time}}</td>
                                <td v-for="room in rooms" :key="room.id" :id="`room-${room.id}-time-${time}`"
                                    :class="{ 'bg-ss-green-300': !isReserved(room.id, time), 'bg-red-500': isReserved(room.id, time) }"
                                    class="h-10 rounded-md"
                                    :value="`${isReserved(room.id, time)}-${time}`">

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
