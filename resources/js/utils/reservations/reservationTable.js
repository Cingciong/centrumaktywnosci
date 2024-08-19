import axios from "axios";
import { ref, computed } from 'vue';


export function useReservation() {
    const times = computed(() => giveTimes());
    const reservations = ref([]);
    const isList = ref(true);
    const tilesInCart = ref([]);
    const selectedStatus = ref('day');
    const rooms = ref([]);
    const isLoading = ref(false);
    const currentDate = ref(null);
    const date = new Date();
    currentDate.value = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
    const selectedDate = ref(null);
    selectedDate.value = currentDate.value;

    const computedProperties = {
        dayName: () => new Date(selectedDate.value).toLocaleDateString('pl-PL', {weekday: 'long'}),
        dates: () => generateDates(selectedDate.value),
        weekSpan: () => {
            let startDate = new Date(selectedDate.value);
            let endDate = new Date(new Date(selectedDate.value).setDate(new Date(selectedDate.value).getDate() + 6));
            return `${startDate.toLocaleDateString('pl-PL', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            })} - ${endDate.toLocaleDateString('pl-PL', {day: '2-digit', month: 'long', year: 'numeric'})}`;
        }
    };



    const computedRefs = Object.keys(computedProperties).reduce((acc, key) => {
        acc[key] = computed(computedProperties[key]);
        return acc;
    }, {});

    return {
        tilesInCart,
        times,
        reservations,
        isList,
        selectedStatus,
        rooms,
        isLoading,
        currentDate,
        selectedDate,
        ...computedRefs
    };
}
export const selectDate = (date, selectedDate) => {
    let formattedDate = new Date(date.split('-').reverse().join('-'));
    if (!isNaN(formattedDate)) {
        return selectedDate.value = `${formattedDate.getFullYear()}-${String(formattedDate.getMonth() + 1).padStart(2, '0')}-${String(formattedDate.getDate()).padStart(2, '0')}`;
    } else {
        console.error('Invalid date format. The date should be in the format "DD-MM-YYYY".');
    }
};

export const fetchRoomData = async (roomId) => {
    const response = await fetch(`/api/pokoje/${roomId}`);
    let room = await response.json();
    if(room['data'] === null) {
        console.error('Room not found');
        router.push('/404');
    }
    console.log(room.data);
    return room.data;
};
export const giveTimes = () => {
    let slots = [];
    for (let i = 7; i <= 22; i += 0.5) {
        slots.push(`${Math.floor(i).toString().padStart(2, '0')}:${(i % 1 > 0 ? '30' : '00')}`);
    }
    return slots;
}
export const isReserved = (roomId, time, reservations) => {
    if (reservations) {
        for (let reservation of reservations) {
            console.log(reservation.room_id, roomId);
            if (reservation.room_id == roomId) {

                for (let tile of reservation.tiles) {
                    if (tile === time) {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}
export const getReservationsForRoom = (date, roomId) => {
    let start_date = new Date(date);
    let end_date = new Date(date);

    return axios.get(`/api/rezerwacje/${roomId}`, {
        params: {
            start_date: start_date,
            end_date: end_date
        }
    })
        .then(response => {
            console.log(response.data);
            return response.data;
        })
        .catch(console.log);
}
export const getReservationsForDay = (date) => {
    return axios.get('/api/rezerwacje', { params: { start_date: date, end_date: date } })
        .then(response => {
            return response.data;
        })
        .catch(console.log);
}
export const generateDates = (startDate) => {
    let datesArray = [];
    let date = new Date(startDate);
    for (let i = 0; i < 7; i++) {
        let formattedDate = new Date(date.setDate(date.getDate() + i)).toLocaleDateString('en-GB', {year: 'numeric', month: '2-digit',day: '2-digit'  });
        datesArray.push(formattedDate.replace(/\//g, '-')); // Replace slashes with hyphens
        date = new Date(startDate);
    }
    return datesArray;
}
export const changeDate = (days = 1, selectedDate) => {
    let date = new Date(selectedDate.value);
    date.setDate(date.getDate() + days);
    let currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0);
    if (date < currentDate) {
        date = currentDate;
    }
    return selectedDate = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
};
export const getRooms = () => {
    return axios.get('/api/pokoje')
        .then(response => {
            return response.data.data;
        })
        .catch(console.log);
}
