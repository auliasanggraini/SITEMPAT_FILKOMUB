<template>
    <div class="signup-container">
        <div class="signup-form">
            <img src="/build/assets/logo-filkom.png" alt="FILKOM Logo" class="logo" />
            <h2>SISTEM INFORMASI PEMINJAMAN RUANGAN</h2>
            <h3>UNIVERSITAS BRAWIJAYA</h3>
            <form @submit.prevent="register">
                <input type="email" v-model="email" placeholder="Input email" required />
                <input type="password" v-model="password" placeholder="Input password" required />
                <input type="password" v-model="confirmPassword" placeholder="Input password again" required />
                <button type="submit" class="btn-register">DAFTAR</button>
            </form>
            <button @click="registerWithGoogle" class="btn-google">
                <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google logo" />
                Daftar dengan Google
            </button>
            <p>Punya akun? <a href="/login">Login</a></p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
            confirmPassword: ''
        }
    },
    methods: {
        register() {
            // Handle registration logic
            console.log('Register with', this.email, this.password, this.confirmPassword);
        },
        registerWithGoogle() {
            // Handle Google registration logic
            console.log('Register with Google');
        }
    }
}
</script>

<style scoped>
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

.logo {
    max-width: 100px;
    margin-bottom: 1rem;
}

.signup-form h2,
.signup-form h3 {
    margin: 0.5rem 0;
}

.signup-form form {
    display: flex;
    flex-direction: column;
}

.signup-form input {
    margin: 0.5rem 0;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-register {
    margin-top: 1rem;
    padding: 0.5rem;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.btn-register:hover {
    background-color: #0056b3;
}

.btn-google {
    margin-top: 1rem;
    padding: 0.5rem;
    border: none;
    border-radius: 4px;
    background-color: #4285f4;
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-google img {
    margin-right: 0.5rem;
}

.btn-google:hover {
    background-color: #357ae8;
}
</style>