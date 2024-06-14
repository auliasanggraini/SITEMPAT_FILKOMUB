<template>
    <div class="login-container">
        <div class="login-box">
            <div class="logo-container">
                <img src="/build/assets/logo-filkom.png" alt="Filkom Logo" class="logo" />
                <h2>SISTEM INFORMASI PEMINJAMAN RUANGAN</h2>
                <h3>FAKULTAS ILMU KOMPUTER</h3>
            </div>
            <form @submit.prevent="login">
                <div class="input-group">
                    <input type="email" v-model="email" placeholder="Input email" required />
                </div>
                <div class="input-group">
                    <input type="password" v-model="password" placeholder="Input password" required />
                </div>
                <button type="submit" class="btn-login">MASUK</button>
            </form>
            <button class="btn-login btn-google-login">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo"
                    class="google-logo" />
                Masuk dengan Google
            </button>
            <p class="register-text">Belum punya akun? <a href="/register">Daftar</a></p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        async login() {
            try {
                const response = await axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                });
                console.log('Login successful:', response.data);
            } catch (error) {
                console.error('Login error:', error.response.data);
            }
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
    font-family: 'Poppins', sans-serif;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.login-box {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
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

.btn-login {
    width: 100%;
    padding: 0.75rem;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-login:hover {
    background-color: #0056b3;
    color: white;
}

.btn-google-login {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
    background-color: #ADD8E6;
    color: #007bff;
}

.btn-google-login .google-logo {
    width: 20px;
    margin-right: 0.5rem;
}

.register-text {
    margin-top: 1rem;
}

.register-text a {
    color: #007bff;
    text-decoration: none;
}

.register-text a:hover {
    text-decoration: underline;
}
</style>
