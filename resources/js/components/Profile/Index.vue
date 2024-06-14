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
<<<<<<< Updated upstream
import Sidebar from '@/components/Layout/Sidebar.vue'

=======
import Sidebar from '@components/Layout/sidebar.vue';
>>>>>>> Stashed changes
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
    methods: {
        updateProfile() {
            console.log('Update Profile:', {
                email: this.email,
                name: this.name,
                nim: this.nim,
                program: this.program,
                phone: this.phone
            });
        },
        resetForm() {
            this.email = '';
            this.name = '';
            this.nim = '';
            this.program = 'Teknologi Informasi';
            this.phone = '';
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
