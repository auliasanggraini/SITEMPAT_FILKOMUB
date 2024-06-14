<template>
    <div class="profile-page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Profile</h1>
            <div class="form-group">
                <label class="title2" for="email">Alamat email *</label>
                <input type="email" id="email" v-model="email" placeholder="shafaradina@student.ub.ac.id">
            </div>
            <div class="form-group">
                <label class="title2" for="name">Nama Lengkap *</label>
                <input type="text" id="name" v-model="name" placeholder="Shafa Auliya Faradina">
            </div>
            <div class="form-group">
                <label class="title2" for="nim">NIM *</label>
                <input type="text" id="nim" v-model="nim" placeholder="215150700111057">
            </div>
            <div class="form-group">
                <label class="title2" for="program">Program Studi *</label>
                <select id="program" v-model="program">
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Pendidikan Teknologi Informasi">PendidikanTeknologi Informasi</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                </select>
            </div>
            <div class="form-group">
                <label class="title2" for="phone">Nomor HP</label>
                <input type="tel" id="phone" v-model="phone" placeholder="+62 81226105968">
            </div>
            <button @click="updateProfile">Update</button>
            <button type="reset" @click="resetForm">Reset</button>
        </div>
    </div>
</template>

<script>
import Sidebar from '@/components/Layout/Sidebar.vue'
export default {
    components: {
        Sidebar
    },
    data() {
        return {
            email: '',
            name: '',
            nim: '',
            program: 'Teknologi Informasi',
            phone: '',
            timezone: 'Asia/Jakarta',
            language: 'id',
            currentPassword: '',
            newPassword: '',
            confirmPassword: '',
        };
    },
    methods: {
        updateProfile() {
            console.log('Update Profile:', {
                email: this.email,
                name: this.name,
                nim: this.nim,
                program: this.program,
                phone: this.phone,
                timezone: this.timezone,
                language: this.language,
                currentPassword: this.currentPassword,
                newPassword: this.newPassword,
                confirmPassword: this.confirmPassword,
            });
        },
        resetForm() {
            this.email = '';
            this.name = '';
            this.nim = '';
            this.program = 'Teknologi Informasi';
            this.phone = '';
            this.timezone = 'Asia/Jakarta';
            this.language = 'id';
            this.currentPassword = '';
            this.newPassword = '';
            this.confirmPassword = '';
        },
        cancel() {
        },
    },
};
</script>

<style scoped>
.profile-page {
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

.title2 {
    font-size: small;
    font-weight: bold;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #F5F8FA;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
}

button:hover {
    background-color: #0069d9;
}

button[type="reset"] {
    background-color: darkgrey;
    color: #000;
}
</style>