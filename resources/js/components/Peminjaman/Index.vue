<template>
    <div class="peminjaman-page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Peminjaman</h1>
            <div class="button-container">
                <router-link to="/peminjaman/create" class="button-link">
                    <button class="button">
                        <i class="fas fa-plus-circle"></i> Buat Baru
                    </button>
                </router-link>
            </div>
            <div class="history">
                <h2 class="title2">Riwayat Peminjaman</h2>
                <ul>
                    <li v-for="history in bookingHistory" :key="history.id">
                        <div class="booking-details">
                            <span>{{ history.ruangan }} - {{ history.tanggal_peminjaman }} - {{ history.waktu_peminjaman
                                }}</span>
                            <span :class="statusClass(history.status)">{{ history.status }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '@/components/Layout/Sidebar.vue'

export default {
    components: {
        Sidebar
    },

    props: {
        bookingData: Array
    },
    data() {
        return {
            currentBookings: [
                { id: 1, ruangan: 'Hall lantai 1', tanggal_peminjaman: '4 Mei 2024', waktu_peminjaman: '10.00 WIB', status: 'Booking' },
            ],
            bookingHistory: [
                { id: 1, ruangan: 'Ruangan 4.1', tanggal_peminjaman: '18 April 2024', waktu_peminjaman: '13.00 WIB', status: 'Selesai' },
                { id: 2, ruangan: 'Ruangan 3.2', tanggal_peminjaman: '4 April 2024', waktu_peminjaman: '09.00 WIB', status: 'Selesai' },
            ]
        }
    },
    methods: {
        createForm() {
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

.booking-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
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
