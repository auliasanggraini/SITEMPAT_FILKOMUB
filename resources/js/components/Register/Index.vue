<template>
    <div class="signup-container">
        <div class="signup-form">
            <div class="logo-container">
                <img src="/build/assets/logo-filkom.png" alt="Filkom Logo" class="logo" />
                <h2>SISTEM INFORMASI PEMINJAMAN RUANGAN</h2>
                <h3>FAKULTAS ILMU KOMPUTER</h3>
            </div>
            <form @submit.prevent="register">
                <div class="input-group">
                    <input type="name" v-model="name" placeholder="Input name" required />
                </div>
                <div class="input-group">
                    <input type="email" v-model="email" placeholder="Input email" required />
                </div>
                <div class="input-group">
                    <input type="password" v-model="password" placeholder="Input password" required />
                </div>
                <div class="input-group">
                    <input type="password" v-model="confirmPassword" placeholder="Input password again" required />
                </div>
                <button type="submit" class="btn-register">DAFTAR</button>
            </form>
            <button class="btn-register btn-google-register">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo"
                    class="google-logo" />
                Daftar dengan Google
            </button>
            <p class="login-text">Sudah punya akun? <a href="/login">Login</a></p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            confirmPassword: ''
        }
    },
    methods: {
        register() {
            console.log('Mengirim data:', this.name, this.email, this.password, this.confirmPassword);

            axios.post('/api/register', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.confirmPassword
            })
            .then(response => {
                console.log('Registration successful:', response.data);
                this.$router.push('/login'); // Redirect ke halaman login
            })
            .catch(error => {
                console.error('Registration error:', error.response.data);
            });
        },
        registerWithGoogle() {
            console.log('Register with Google');
            const clientId = 'YOUR_GOOGLE_CLIENT_ID';  // Replace with your Google Client ID
            google.accounts.id.initialize({
                client_id: clientId,
                callback: this.handleCredentialResponse
            });
            google.accounts.id.prompt();
        },
        handleCredentialResponse(response) {
            console.log('Google response:', response);

            axios.post('/api/auth/google', {
                token: response.credential
            })
            .then(res => {
                console.log('Google registration successful:', res.data);
                this.$router.push('/login'); // Redirect ke halaman login
            })
            .catch(error => {
                console.error('Google registration error:', error.response.data);
            });
        }
    }
}

</script>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
    font-family: 'Poppins', sans-serif;
}

.signup-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f2f5;
}

.signup-form {
    text-align: center;
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.logo-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1rem;
}

.logo {
    width: 150px;
}

h2 {
    margin: 0.5rem 0;
    font-size: 1.5rem;
}

h3 {
    margin: 0.5rem 0;
    font-size: 1.2rem;
}

.input-group {
    margin: 1rem 0;
}

.input-group input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-register {
    width: 100%;
    padding: 0.75rem;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-register:hover {
    background-color: #0056b3;
    color: white;
}

.btn-google-register {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
    background-color: #ADD8E6;
    color: #007bff;
}

.btn-google-register .google-logo {
    width: 20px;
    margin-right: 0.5rem;
}

.login-text {
    margin-top: 1rem;
}

.login-text a {
    color: #007bff;
    text-decoration: none;
}

.login-text a:hover {
    text-decoration: underline;
}
</style>