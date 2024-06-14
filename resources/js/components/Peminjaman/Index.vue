<template>
    <div class="peminjaman-page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Peminjaman</h1>
            <div class="button-container">
                <button @click="createForm">Buat Baru</button>
            </div>
            <div class="current-booking">
                <h2 class="title2">Sedang Berlangsung</h2>
                <ul>
                    <li v-for="booking in currentBookings" :key="booking.id">
                        {{ booking.room }} - {{ booking.date }} - {{ booking.time }} -
                        <span :class="statusClass(booking.status)">{{ booking.status }}</span>
                    </li>
                </ul>
            </div>
            <div class="history">
                <h2 class="title2">Riwayat Peminjaman</h2>
                <ul>
                    <li v-for="history in bookingHistory" :key="history.id">
                        {{ history.room }} - {{ history.date }} - {{ history.time }} -
                        <span :class="statusClass(history.status)">{{ history.status }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '@components/Layout/sidebar.vue';

export default {
    components: {
        Sidebar
    },
    data() {
        return {
            currentBookings: [
                { id: 1, room: 'Hall lantai 1', date: '4 Mei 2024', time: '10.00 WIB', status: 'Booking' },
            ],
            bookingHistory: [
                { id: 1, room: 'Ruangan 4.1', date: '18 April 2024', time: '13.00 WIB', status: 'Selesai' },
                { id: 2, room: 'Ruangan 3.2', date: '4 April 2024', time: '09.00 WIB', status: 'Selesai' },
            ]
        }
    },
    methods: {
        createForm() {
            // Logic to handle creating a new booking
            console.log('Creating a new booking');
        },
        statusClass(status) {
            return {
                status: true,
                booking: status === 'Booking',
                selesai: status === 'Selesai'
            };
        }
    }
}
</script>

<style scoped>
.peminjaman-page {
    display: flex;
}

.content {
    padding: 20px;
    flex: 1;
    margin-left: 270px;
}

.current-booking,
.history {
    margin-top: 20px;
}

.current-booking ul,
.history ul {
    list-style-type: none;
    padding: 0;
}

.current-booking li,
.history li {
    margin: 10px 0;
    padding: 10px;
    background-color: #F5F8FA;
    border-radius: 5px;
}

.status {
    font-weight: bold;
}

.status.booking {
    color: #007bff;
}

.status.selesai {
    color: #28a745;
}

.title {
    font-size: 1.5em;
    font-weight: bold;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
}

.title2 {
    color: #007bff;
    font-size: small;
    font-weight: bold;
}

.button-container {
    display: flex;
    justify-content: flex-end;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

button:hover {
    background-color: #0069d9;
}
</style>
