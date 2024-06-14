<template>
    <div class="peminjaman-page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Form Peminjaman</h1>
            <form @submit.prevent="submitForm">
                <div class="form-group">
                    <label class="title2" for="penanggungJawab">Penanggung Jawab *</label>
                    <input type="text" id="penanggungJawab" v-model="form.penanggungJawab" required />
                </div>
                <div class="form-group">
                    <label class="title2" for="nim">NIM *</label>
                    <input type="text" id="nim" v-model="form.nim" required/>
                </div>
                <div class="form-group">
                    <label class="title2" for="programStudi">Program Studi *</label>
                    <select id="programStudi" v-model="form.programStudi" required>
                        <option value="" disabled selected>Pilih program studi</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Pendidikan Teknologi Informasi">PendidikanTeknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="title2" for="tanggalPeminjaman">Tanggal Peminjaman *</label>
                    <input type="date" id="tanggalPeminjaman" v-model="form.tanggalPeminjaman" required/>
                </div>
                <div class="form-group">
                    <label class="title2" for="waktuPeminjaman">Waktu Peminjaman *</label>
                    <input type="time" id="waktuPeminjaman" v-model="form.waktuPeminjaman" required />
                </div>
                <div class="form-group">
                    <label class="title2" for="durasiPeminjaman">Durasi Peminjaman *</label>
                    <input type="number" id="durasiPeminjaman" v-model="form.durasiPeminjaman" min="1" required />
                </div>
                <div class="form-group">
                    <label class="title2" for="room">Ruangan *</label>
                    <select id="room" v-model="form.room" required>
                        <option value="">Pilih Ruangan</option>
                        <option value="Hall lantai 1">Hall lantai 1</option>
                        <option value="Ruangan 4.1">Ruangan 4.1</option>
                        <option value="Ruangan 3.2">Ruangan 3.2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="title2" for="keperluan">Keperluan Peminjaman *</label>
                    <textarea id="keperluan" v-model="form.keperluan" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit">Pinjam Ruangan</button>
                    <button type="reset" @click="resetForm">Reset</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Sidebar from '@/components/Layout/Sidebar.vue';

export default {
    components: {
        Sidebar
    },
    data() {
        return {
            form: {
                penanggungJawab: '',
                nim: '',
                programStudi: '',
                tanggalPeminjaman: '',
                waktuPeminjaman: '',
                durasiPeminjaman: 1,
                gedung: '',
                lantai: '',
                ruangDipinjam: '',
                keperluan: ''
            }
        };
    },
    methods: {
        submitForm() {
            console.log('Form data:', this.form);
        },
        resetForm() {
            this.form = {
                penanggungJawab: '',
                nim: '',
                programStudi: '',
                tanggalPeminjaman: '',
                waktuPeminjaman: '',
                durasiPeminjaman: 1,
                gedung: '',
                lantai: '',
                ruangDipinjam: '',
                keperluan: ''
            };
        }
    }
};
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

.title {
    font-size: 1.5em;
    font-weight: bold;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.title2 {
    font-size: small;
    font-weight: bold;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-actions {
    display: flex;
}

.form-actions button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

.form-actions button[type="submit"] {
    background-color: #007bff;
    color: #fff;
}

.form-actions button[type="reset"] {
    background-color: darkgrey;
}
</style>