<template>
    <div class="container">
        <div class="header">
            <img src="/build/assets/logo-filkom.png" alt="Filkom Logo" class="logo" />
            <div class="title">
                <h1>SISTEM INFORMASI</h1>
                <h2>PEMINJAMAN RUANGAN</h2>
                <h3>UNIVERSITAS BRAWIJAYA</h3>
            </div>
            <div class="notification">
                <i class="fa fa-bell"></i>
            </div>
        </div>
        <div class="content">
            <div class="profile">
                <div class="profile-image">
                    <img src="/profile-placeholder.png" alt="Profile Picture" />
                </div>
                <div class="profile-info">
                    <h3>Elyzia Janara</h3>
                    <p>Mahasiswa</p>
                    <ul>
                        <li>
                            <router-link to="/ruang-kelas">Ruang Kelas</router-link>
                        </li>
                        <li>
                            <router-link to="/peminjaman">Peminjaman</router-link>
                        </li>
                        <li>
                            <router-link to="/profil">Profil</router-link>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-container">
                <h1>Manage Your Profile Information</h1>
                <p>Use the forms below to update the information we have on file for your account</p>

                <h2>Contact Information</h2>
                <div class="form-group">
                    <label for="email">Alamat email *</label>
                    <p>Harap menggunakan alamat email yang valid untuk mendapatkan respon jawaban dari ticket yang
                        diajukan</p>
                    <input type="email" id="email" v-model="email" placeholder="shafaradina@student.ub.ac.id">
                </div>
                <div class="form-group">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" v-model="name" placeholder="Shafa Auliya Faradina">
                </div>
                <div class="form-group">
                    <label for="nim">NIM/NIK/ID Lain *</label>
                    <input type="text" id="nim" v-model="nim" placeholder="215150700111057">
                </div>
                <div class="form-group">
                    <label for="program">Program Studi *</label>
                    <select id="program" v-model="program">
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor HP</label>
                    <input type="tel" id="phone" v-model="phone" placeholder="08885964169">
                </div>

                <h2>Preferences</h2>
                <div class="form-group">
                    <label for="timezone">Time Zone:</label>
                    <select id="timezone" v-model="timezone">
                        <option value="Asia/Jakarta">Asia/Jakarta</option>
                        <option value="America/New_York">America/New_York</option>
                        <option value="Europe/London">Europe/London</option>
                    </select>
                    <button @click="detectTimezone">Auto Detect</button>
                </div>
                <div class="form-group">
                    <label for="language">Preferred Language:</label>
                    <select id="language" v-model="language">
                        <option value="id">Bahasa Indonesia</option>
                        <option value="en">English</option>
                    </select>
                </div>

                <h2>Access Credentials</h2>
                <div class="form-group">
                    <label for="currentPassword">Current Password:</label>
                    <input type="password" id="currentPassword" v-model="currentPassword" placeholder="********">
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password:</label>
                    <input type="password" id="newPassword" v-model="newPassword" placeholder="********">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm New Password:</label>
                    <input type="password" id="confirmPassword" v-model="confirmPassword" placeholder="********">
                </div>

                <button @click="updateProfile">Update</button>
                <button @click="resetForm">Reset</button>
                <button @click="cancel">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
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
        detectTimezone() {
            // Implement timezone detection logic here
            // For example:
            // this.timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        },
        updateProfile() {
            // Implement update profile logic here
            // This would usually involve sending data to a backend API
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
            // Implement cancel logic here, e.g., navigate away from the page
        },
    },
};
</script>

<style scoped>
.container {
    display: flex;
    height: 100vh;
}

.header {
    background-color: #f2f2f2;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 300px;
}

.logo {
    width: 100px;
    height: auto;
}

.title {
    text-align: center;
}

.title h1 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.title h2 {
    margin: 0;
    font-size: 18px;
}

.title h3 {
    margin: 0;
    font-size: 14px;
}

.notification {
    cursor: pointer;
    font-size: 20px;
    color: #888;
}

.content {
    display: flex;
    flex-grow: 1;
    padding: 20px;
}

.profile {
    background-color: #e0f2f7;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
}

.profile-image {
    text-align: center;
}

.profile-image img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-info {
    text-align: center;
    margin-top: 20px;
}

.profile-info h3 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
}

.profile-info p {
    margin: 5px 0;
}

.profile-info ul {
    list-style: none;
    padding: 0;
}

.profile-info ul li {
    margin-bottom: 10px;
}

.profile-info ul li a {
    text-decoration: none;
    color: #333;
}

.form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

h1,
h2 {
    text-align: center;
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
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0069d9;
}
</style>