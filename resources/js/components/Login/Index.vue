<template>
    <div class="login-container">
        <div class="login-box">
            <img src="/build/assets/logo-filkom.png" alt="Filkom Logo" class="logo" />
            <h2>SISTEM INFORMASI PEMINJAMAN RUANGAN</h2>
            <h3>UNIVERSITAS BRAWIJAYA</h3>
            <form @submit.prevent="login">
                <div class="input-group">
                    <input type="email" v-model="email" placeholder="Input email" required />
                </div>
                <div class="input-group">
                    <input type="password" v-model="password" placeholder="Input password" required />
                </div>
                <button type="submit" class="btn-login">LOGIN</button>
            </form>
            <button class="btn-login btn-google-login">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo"
                    class="google-logo" />
                Login dengan Google
            </button>
            <p class="register-text">Belum punya akun? <a href="#">Daftar</a></p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login() {
            // Handle login logic here
            console.log('Email:', this.email);
            console.log('Password:', this.password);
        }
    }
}
</script>

<style scoped>
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

.logo {
    width: 150px;
}

h2,
h3 {
    margin: 0.5rem 0;
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
}

.btn-google-login {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
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
