<script setup>
import dayjs from 'dayjs';

import {
  changeDate,
  useReservation,
  fetchRoomData,
  getReservationsForRoom,
} from '../../../utils/reservations/reservationTable.js';
import {ref, onMounted, watch} from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Breadcrumb from "@/components/pages/user/partials/Breadcrumb.vue";

let images = ref([
  '/assets/rooms/Duze-Planty.png',
  '/assets/rooms/Dworcowa-scaled.jpg'
]);
let currentImageIndex = ref(0);
let roomData = ref({
  name: '',
  numberOfPeople: 0,
  size: 0,
  description: '',
  price: 0,
  localization: ''
});
const {
  times,
  reservations,
  isLoading,
  selectedDate,
  dates,
  weekSpan
} = useReservation();
const room = ref(null);
const tilesInCart = ref([]);
const route = useRoute();
const router = useRouter();
const roomId = parseInt(route.params.id, 10);
const routeDate = route.params.date ;
selectedDate.value = routeDate;
const cart = ref([]);
const allTiles = ref([]);


function sortCart(tilesInCart) {
  let sortedTiles = tilesInCart.sort((a, b) => a.start_time.localeCompare(b.start_time));

  let groupedTiles = [];
  let currentGroup = null;

  for (let tile of sortedTiles) {
    let startDate = tile.start_time.split(' ')[0];
    let endDate = tile.end_time.split(' ')[0];

    if (currentGroup && currentGroup.end_time === tile.start_time) {
      currentGroup.end_time = tile.end_time;
      currentGroup.tiles += 1;
      currentGroup.duration += 30;
    } else {
      if (currentGroup) {
        groupedTiles.push(currentGroup);
      }
      currentGroup = {
        date: startDate,
        start_time: tile.start_time,
        end_time: tile.end_time,
        tiles: tilesInCart.filter(t => t.start_time === tile.start_time).length,
        allTiles: tilesInCart.length,
        duration: tilesInCart.filter(t => t.start_time === tile.start_time).length*30,
      };
    }
  }
  if (currentGroup) {
    groupedTiles.push(currentGroup);
  }

  return groupedTiles;
}

watch(() => selectedDate.value, async (newDate) => {
  console.log(newDate);
  isLoading.value = true;
  roomData.value = await fetchRoomData(roomId);
  reservations.value = await getReservationsForRoom(selectedDate.value, roomId);
  isLoading.value = false;
});
watch(() => tilesInCart.value, (newCart) => {
  cart.value = sortCart(newCart);
  if (cart.value.length > 0 && cart.value[0]){
    allTiles.value =  cart.value[0].allTiles;
  } else {
    allTiles.value = null;
  }
  console.log(cart.value);

}, { deep: true });

function removeFromCart(index) {
  let groupToRemove = cart.value[index];

  tilesInCart.value = tilesInCart.value.filter(tile =>
      !(tile.start_time >= groupToRemove.start_time && tile.end_time <= groupToRemove.end_time)
  );

  cart.value.splice(index, 1);
}
const updateSelectedDate = (days) => {
  selectedDate.value = changeDate(days, selectedDate);
};
const itemExistsInCart = (roomId, date,start_time) => {
  let {startDate, endDate} = formatIncomingData(date,start_time);
  return tilesInCart.value.some(tile =>
      tile.room_id === roomId &&
      tile.start_time === startDate &&
      tile.end_time === endDate
  );
};
const formatIncomingData = (date,start_time) => {
  let dateParts = date.split('-');
  let formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;

  let startDate = formattedDate+' '+start_time;
  startDate = dayjs(startDate).format('YYYY-MM-DD HH:mm:ss');
  let endDate = dayjs(startDate).add(30, 'minutes').format('YYYY-MM-DD HH:mm:ss');
  return {startDate, endDate};
}
const addToCart = (roomId, date, start_time) => {
  let {startDate, endDate} = formatIncomingData(date,start_time);

  let itemExists = tilesInCart.value.some(tile =>
      tile.room_id === roomId &&
      tile.start_time === startDate &&
      tile.end_time === endDate,
  );




  if (itemExists) {
    tilesInCart.value = tilesInCart.value.filter(tile =>
        !(tile.room_id === roomId &&
            tile.start_time === startDate &&
            tile.end_time === endDate)
    );
  } else {
    tilesInCart.value.push({
      room_id: roomId,
      start_time: startDate,
      end_time: endDate
    });
  }

};
const addToCartHandler = (roomId, date, time) => {
  addToCart(roomId, date, time);
};
const isReservedForDay = (roomId, date, time, reservations) => {
  if (reservations) {
    for (let reservation of reservations) {
      let dateParts = date.split('-');
      let formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
      let dateTime = new Date(formattedDate + ' ' + time + ":00");
      let reservationStartTime = new Date(reservation.start_time);
      let reservationEndTime = new Date(reservation.end_time);
      if (reservation.room_id === roomId) {
        if (dateTime >= reservationStartTime && dateTime <= reservationEndTime) {
          return true;
        }
      }
    }
  }
  return false;
}


onMounted(async () => {
  roomData.value = await fetchRoomData(roomId);
  reservations.value = await getReservationsForRoom(selectedDate.value, roomId);
});
</script>

<template>
    <div class=" fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" :class="{ 'hidden': !isLoading}">
        <svg aria-hidden="true" class="w-20 h-20 text-gray-200 animate-spin  fill-ss-green-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
    </div>
  <div class="flex flex-col text-ss-gray-300   sm:text-left text-center  mx-auto mt-20 max-w-8xl"
       :class="{ 'opacity-15': isLoading, 'opacity-100': !isLoading}">

    <Breadcrumb :crumbs="[
      { text: 'Strona główna', href: '/' },
      { text: 'Rezerwacje', href: '/rezerwacje' },
      { text: 'Sala', href: '/rezerwacje/sale/:id' },
    ]" />
    <section class="w-full rounded-2xl bg-white gap-4 flex flex-row items-center  text-ss-sm mb-10">
        <article class="max-h-[450px] h-fit w-full p-[20px] bg-white rounded-2xl font-bold tracking-wide grid grid-cols-11">
          <div class="  flex justify-center w-full h-auto rounded-2xl col-span-5 object-contain relative">
            <div class="flex flex-row absolute translate-x-1/2 bottom-1 gap-2">
            <span class="text-[24px] transition duration-300" v-for="(image, index) in images" :key="index" :class="index === currentImageIndex ? 'text-ss-green-300' : 'text-ssgray-300'">
              &#9679;
            </span>
            </div>
            <button class="absolute top-1/2 left-0 transform -translate-y-1/2 w-14 h-14 bg-ss-gray-200 opacity-65 hover:opacity-35 duration-300 rounded-md align-middle text-ss-gray-300 text-[30px]"
                    @click="currentImageIndex = (currentImageIndex + images.length - 1) % images.length">
              <i class="fa-solid fa-chevron-left "></i>
            </button>
            <button class="absolute top-1/2 right-0 transform -translate-y-1/2 w-14 h-14 bg-ss-gray-200 opacity-65 hover:opacity-35 duration-300 rounded-md align-middle text-ss-gray-300 text-[30px]"
                    @click="currentImageIndex = (currentImageIndex + 1) % images.length">
              <i class="fa-solid fa-chevron-right "></i>
            </button>
            <div class="object-scale-none  bg-contain h-full w-full bg-ss-gray-100 bg-no-repeat bg-center rounded-xl  duration-300 transition-all" :style="{ backgroundImage: `url(${images[currentImageIndex]})`, backgroundColor: '#yourColor' }"></div>
          </div>
            <div class=" col-span-6 ml-7  pr-2 flex flex-col text-ss-gray-300  min-h-[400px]">
                  <div class="flex flex-row justify-between ">
                      <h1 class="text-ss-gray-400 text-ss-lg font-semibold">{{ roomData.name }}</h1>
                      <span class="opacity-50 font-semibold "><i class="fa-solid fa-location-dot"></i> {{ roomData.localization }}</span>
                  </div>
                  <strong class="text-ss-green-300 font-bold text-[17px] mb-5">{{ roomData.numberOfPeople }} <i class="fa-solid fa-person"> &nbsp;&nbsp;</i><span class="text-ss-gray-300 opacity-80">{{ roomData.size }}m2</span></strong>
                  <p class="font-normal pr-28
                   text-ss-gray-400 text-[16px] line-clamp-6 ">{{ roomData.description }}</p>
                  <div class="flex flex-col gap-2 mt-auto">
                    <p class="font-normal text-[14px] text-lg mt-16 text-left ">cena za 1h:<strong class="text-[24px] font-bold text-ss-gray-400">{{ roomData.price }}zł / 1h </strong></p>
                    <button class="border-2  rounded-full border-ss-green-300 text-ss-green-300 uppercase px-10 py-2 hover:bg-ss-green-300 hover:text-white duration-300 w-48">zobacz</button>
                  </div>
            </div>
        </article>
    </section>
    <section class="grid grid-cols-12 gap-10 mb-10">
        <article class="col-span-7 min-h-screen w-full p-[20px] bg-white rounded-2xl flex flex-col gap-4">
          <h1 class="text-ss-lg text-ss-gray-400 font-bold mb-2">Terminy Rezerwacji</h1>
          <div class="flex flex-row gap-10 justify-center">
            <button @click="updateSelectedDate(-7)"><i class="fa-solid fa-arrow-left"></i></button>
            <div class="flex flex-col text-center text-ss-gray-300">
              <strong>{{ weekSpan }}</strong></div>
            <button @click="updateSelectedDate(7)"><i class="fa-solid fa-arrow-right"></i></button>
          </div>



          <table class="w-full">
            <thead class="border-ss-green-300 border-opacity-45 border-b-2 border-dashed ">
            <tr class="grid grid-cols-8 gap-2 text-ss-gray-300 text-center w-full">
              <th></th>
              <th class="font-normal pb-5 w-full"  v-for="date in dates" :key="date">
                {{ date }}
              </th>
            </tr>
            </thead>
            <tbody>
            <tr class="grid grid-cols-8 gap-2 border-ss-green-300 border-opacity-45 border-b-2 border-dashed py-2" v-for="time in times" :key="time">
              <td>{{ time }}</td>
              <td v-for="date in dates" :key="date">
                  <button  class="h-10 rounded-md w-full bg-ss-green-300 opacity-25" v-if="isReservedForDay(roomId,date,time,reservations)"></button>
                <button
                    @click="addToCartHandler(roomId, date, time)"
                    v-else
                    :class="{
    'h-10 rounded-md w-full bg-ss-green-300 transition-all': true,
    'bg-ss-green-500 text-white': itemExistsInCart(roomId, date,time),
    'bg-ss-green-300 text-ss-300': !itemExistsInCart(roomId, date,time),
  }"
                >
                  <i  v-if="itemExistsInCart(roomId, date,time)" class="fa-solid fa-check "></i>
                </button>
              </td>
            </tr>
            </tbody>
          </table>

        </article>
        <article class="col-span-5  h-fit w-full p-[30px] bg-white rounded-2xl">
          <h1 class="text-ss-lg text-ss-gray-400 font-bold mb-6">Twoje terminy</h1>

          <p v-if="cart.length === 0">Brak dodanych terminów</p>

          <div class="flex flex-row h-fit border border-gray-300 justify-between mb-3" v-for="(group, index) in cart" :key="index">
            <div class="flex flex-col p-3 gap-1">
              <span class="text-ss-gray-300">{{ dayjs(group.start_time).format('HH:mm') }}-{{  dayjs(group.end_time).format('HH:mm')}} {{group.date}}</span>
              <span class="text-red-500" v-if="group.duration < 60">Minimalna długość rezerwacji to 1h</span>
            </div>
            <span class="text-lg text-center my-auto text-ss-gray-400 text-[33px]">
              {{ group.tiles * roomData.price }}zł
            </span>
            <button class="hover:opacity-65 duration-300 bg-ss-gray-200 text-ss-gray-400 text-opacity-80 justify-self-end w-24 text-center flex items-center justify-center" @click="removeFromCart(index)">
              <i class="fa-solid fa-x align-middle"></i>
            </button>
          </div>

          <p class=" text-right my-7" v-if="!(cart.length === 0)">Razem: <strong class="text-[36px] text-ss-gray-400">{{allTiles*roomData.price}} zł</strong></p>
          <button v-if="!(cart.length === 0)" class="border-2  rounded-full border-ss-green-300 text-ss-green-300 uppercase px-10 py-2 hover:bg-ss-green-300 hover:text-white duration-300 w-full font-semibold">Dodaj do koszyka</button>
        </article>

    </section>
  </div>
</template>

<style scoped>

</style>
