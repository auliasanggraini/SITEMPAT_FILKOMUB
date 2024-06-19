<template>
    <div class="peminjaman-page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Form Peminjaman</h1>
            <form @submit.prevent="submitForm">
                <div class="form-group">
                    <label class="form-label" for="penanggungJawab">Penanggung Jawab *</label>
                    <input type="text" id="penanggungJawab" v-model="form.penanggungJawab" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="nim">NIM *</label>
                    <input type="text" id="nim" v-model="form.nim" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="programStudi">Program Studi *</label>
                    <select id="programStudi" v-model="form.programStudi" required>
                        <option value="" disabled selected>Pilih program studi</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Pendidikan Teknologi Informasi">Pendidikan Teknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="tanggalPeminjaman">Tanggal Peminjaman *</label>
                    <input type="date" id="tanggalPeminjaman" v-model="form.tanggalPeminjaman" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="waktuPeminjaman">Waktu Peminjaman *</label>
                    <input type="time" id="waktuPeminjaman" v-model="form.waktuPeminjaman" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="durasiPeminjaman">Durasi Peminjaman *</label>
                    <input type="number" id="durasiPeminjaman" v-model="form.durasiPeminjaman" min="1" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="room">Ruangan *</label>
                    <select id="room" v-model="form.room" required>
                        <option value="" disabled selected>Pilih Ruangan</option>
                        <option value="GKM lantai 1">GKM lantai 1</option>
                        <option value="GKM 3.1">GKM 3.1</option>
                        <option value="GKM 3.2">GKM 3.2</option>
                        <option value="GKM 3.3">GKM 3.3</option>
                        <option value="GKM 3.4">GKM 3.4</option>
                        <option value="GKM 4.1">GKM 4.1</option>
                        <option value="GKM 4.2">GKM 4.2</option>
                        <option value="Gedung G">Auditorium</option>
                        <option value="Gedung F 3.1">Ruang F3.1</option>
                        <option value="Gedung F 3.2">Ruang F3.2</option>
                        <option value="Gedung F 3.3">Ruang F3.3</option>
                        <option value="Gedung F 3.4">Ruang F3.4</option>
                        <option value="Lap Basket">Lapangan Basket</option>
                        <option value="Theater">Ruang Theater</option>
                        <option value="Gym">Ruang GYM</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="keperluan">Keperluan Peminjaman *</label>
                    <textarea id="keperluan" v-model="form.keperluan" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit">Pinjam Ruangan</button>
                    <button type="reset" @click="resetForm">Reset</button>
                    <button type="button" @click="cancelForm">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Sidebar from '@/components/Layout/Sidebar.vue';
import axios from 'axios';

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
                room: '',
                keperluan: ''
            }
        };
    },
    methods: {
        submitForm() {
            console.log('Mengirim data form:', this.form);

            axios.post('/api/peminjaman/create', {
                penanggungJawab: this.form.penanggungJawab,
                nim: this.form.nim,
                programStudi: this.form.programStudi,
                tanggalPeminjaman: this.form.tanggalPeminjaman,
                waktuPeminjaman: this.form.waktuPeminjaman,
                durasiPeminjaman: this.form.durasiPeminjaman,
                ruangan: this.form.room,
                keperluanPeminjaman: this.form.keperluan
            })
                .then(response => {
                    console.log('Data berhasil disimpan:', response.data);
                    this.$router.push('/peminjaman'); // Redirect ke halaman Peminjaman/Index.vue
                })
                .catch(error => {
                    console.error('Gagal menyimpan data:', error);
                });
        },
        resetForm() {
            this.form = {
                penanggungJawab: '',
                nim: '',
                programStudi: '',
                tanggalPeminjaman: '',
                waktuPeminjaman: '',
                durasiPeminjaman: 1,
                room: '',
                keperluan: ''
            };
        },
        cancelForm() {
            this.$router.push('/peminjaman'); // Redirect to the peminjaman page
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

.title {
    font-size: 1.5em;
    font-weight: bold;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.form-label {
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
    color: #fff;
}

.form-actions button[type="button"] {
    background-color: #FF2400;
    color: #fff;
}
</style>
