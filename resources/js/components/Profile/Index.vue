<template>
    <div class="profile-page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Profile</h1>
            <form @submit.prevent="updateProfile">
                <div class="form-group">
                    <label class="form-label" for="email">Alamat email *</label>
                    <input type="email" id="email" v-model="email" required placeholder="shafaradina@student.ub.ac.id">
                </div>
                <div class="form-group">
                    <label class="form-label" for="name">Nama Lengkap *</label>
                    <input type="text" id="name" v-model="name" required placeholder="Shafa Auliya Faradina">
                </div>
                <div class="form-group">
                    <label class="form-label" for="nim">NIM *</label>
                    <input type="text" id="nim" v-model="nim" required placeholder="215150700111057">
                </div>
                <div class="form-group">
                    <label class="form-label" for="program">Program Studi *</label>
                    <select id="program" v-model="program" required>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Pendidikan Teknologi Informasi">Pendidikan Teknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone">Nomor HP</label>
                    <input type="tel" id="phone" v-model="phone" placeholder="+62 81226105968">
                </div>
                <div class="form-actions">
                    <button type="submit">Update</button>
                    <button type="reset" @click="resetForm">Reset</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Sidebar from '@/components/Layout/Sidebar.vue';

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
            phone: ''
        };
    },
    created() {
        this.fetchProfile();
    },
    methods: {
        async fetchProfile() {
            try {
                const response = await axios.get('/api/profile');
                const user = response.data;
                this.email = user.email;
                this.name = user.name;
                this.nim = user.nim;
                this.program = user.program;
                this.phone = user.phone;
            } catch (error) {
                console.error('Failed to fetch profile:', error.response.data);
                // Handle error as needed
            }
        },
        async updateProfile() {
            try {
                const response = await axios.put('/api/profile', {
                    email: this.email,
                    name: this.name,
                    nim: this.nim,
                    program: this.program,
                    phone: this.phone
                });
                console.log('Profile updated successfully:', response.data);
                this.$router.push('/dashboard'); // Redirect ke halaman login
                // Optionally, show success message or redirect
            } catch (error) {
                console.error('Failed to update profile:', error.response.data);
                // Handle error as needed
            }
        },
        resetForm() {
            // Reset form fields to original values fetched from API
            this.fetchProfile();
        }
    }
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
    margin-bottom: 20px;
}

.form-label {
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
    border: 1px solid #ccc;
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

.form-actions {
    display: flex;
    gap: 10px;
}
</style>
