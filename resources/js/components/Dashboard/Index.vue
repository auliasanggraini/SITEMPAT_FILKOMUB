<template>
    <div class="page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Ruangan</h1>
            <div class="tabs">
                <ul>
                    <li v-for="(tab, index) in tabs" :key="index" :class="{ 'is-active': activeTab === index }">
                        <a @click="setActiveTab(index)">{{ tab }}</a>
                    </li>
                </ul>
            </div>
            <div v-if="showFloorButtons" class="floor-tabs">
                <ul>
                    <li v-for="(floor, index) in floors" :key="index" :class="{ 'is-active': activeFloor === index }">
                        <a @click="setActiveFloor(index)">{{ floor }}</a>
                    </li>
                </ul>
            </div>
            <div class="box">
                <div class="columns">
                    <div class="column is-half" v-for="room in filteredRooms" :key="room.name">
                        <div class="room">
                            <div class="room-info">
                                <p class="room-name">{{ room.name }}</p>
                                <p>{{ room.building }}</p>
                            </div>
                            <span :class="room.status === 'Tersedia' ? 'tag is-success' : 'tag is-danger'">
                                {{ room.status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '@/components/Layout/Sidebar.vue';

export default {
    components: {
        Sidebar
    },
    name: 'RoomList',
    data() {
        return {
            activeTab: 0,
            activeFloor: null,
            tabs: [
                'Gedung Kreativitas Mahasiswa',
                'Gedung F',
                'Gedung G',
                'Lainnya'
            ],
            floors: [
                'Lantai 1',
                'Lantai 3',
                'Lantai 4'
            ],
            rooms: [
                { name: 'GKM Hall', building: 'Gedung Kreativitas Mahasiswa', floor: 'Lantai 1', status: 'Tersedia' },
                { name: 'GKM 3.1', building: 'Gedung Kreativitas Mahasiswa', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'GKM 3.2', building: 'Gedung Kreativitas Mahasiswa', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'GKM 3.3', building: 'Gedung Kreativitas Mahasiswa', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'GKM 3.4', building: 'Gedung Kreativitas Mahasiswa', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'GKM 4.1', building: 'Gedung Kreativitas Mahasiswa', floor: 'Lantai 4', status: 'Tersedia' },
                { name: 'GKM 4.2', building: 'Gedung Kreativitas Mahasiswa', floor: 'Lantai 4', status: 'Tersedia' },
                { name: 'Ruangan F3.1', building: 'Gedung F', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'Ruangan F3.2', building: 'Gedung F', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'Ruangan F3.3', building: 'Gedung F', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'Ruangan F3.4', building: 'Gedung F', floor: 'Lantai 3', status: 'Tersedia' },
                { name: 'Auditorium', building: 'Gedung G', floor: 'Lantai 2', status: 'Tersedia' },
                { name: 'Lapangan Basket', building: 'Lainnya', floor: null, status: 'Tersedia' },
                { name: 'Ruang Theater', building: 'Lainnya', floor: null, status: 'Tersedia' },
                { name: 'Ruang GYM', building: 'Lainnya', floor: null, status: 'Tersedia' },
            ]
        };
    },
    computed: {
        showFloorButtons() {
            return this.activeTab === 0;
        },
        filteredRooms() {
            if (this.activeTab === 0 && this.activeFloor !== null) {
                const floor = this.floors[this.activeFloor];
                return this.rooms.filter(room => room.building === 'Gedung Kreativitas Mahasiswa' && room.floor === floor);
            } else if (this.activeTab !== 0) {
                const building = this.tabs[this.activeTab];
                return this.rooms.filter(room => room.building === building);
            } else {
                return [];
            }
        }
    },
    methods: {
        setActiveTab(index) {
            this.activeTab = index;
            if (index !== 0) {
                this.activeFloor = null;
            }
        },
        setActiveFloor(index) {
            this.activeFloor = index;
        }
    }
};
</script>

<style scoped>
.page {
    display: flex;
}

.content {
    padding: 20px;
    flex: 1;
    margin-left: 270px;
}

.title {
    font-size: 1.5em;
    font-weight: bold;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.tabs ul {
    display: flex;
    list-style: none;
    padding: 0;
}

.tabs ul li {
    margin-right: 10px;
    border-radius: 5px;
    background-color: #C6E5FF;
    padding: 10px;
}

.tabs ul li.is-active a {
    font-weight: bold;
    color: #007bff;
}

.tabs ul li a {
    cursor: pointer;
    border-radius: 5px;
}

.floor-tabs {
    margin-top: 20px;
}

.floor-tabs ul {
    display: flex;
    list-style: none;
    padding: 0;
}

.floor-tabs ul li {
    margin-right: 10px;
}

.floor-tabs ul li.is-active a {
    font-weight: bold;
    color: red;
}

.floor-tabs ul li a {
    cursor: pointer;
    padding: 10px;
    border-radius: 5px;
}

.box {
    margin-bottom: 20px;
    margin-top: 20px;
}

.room {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #F5F8FA;
    border-radius: 5px;
}

.room-info {
    display: flex;
    flex-direction: column;
}

.room-name {
    font-weight: bold;
}

.tag.is-success {
    font-weight: bold;
    color: #28a745;
}

.tag.is-danger {
    color: #dc3545;
}
</style>
