<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Peminjaman Ruangan</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .google-login {
            background-color: #4285f4;
            color: white;
            padding: 12px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .google-login img {
            width: 20px;
        }

        .register-link {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app" class="container">
        <div class="logo">
            <img src="https://www.filkom.ub.ac.id/images/logo-filkom.png" alt="Filkom Logo">
        </div>
        <h1>SISTEM INFORMASI PEMINJAMAN RUANGAN</h1>
        <h2>UNIVERSITAS BRAWIJAYA</h2>

        <form @submit.prevent="handleSubmit">
            <div>
                <label for="email">Email</label>
                <input type="text" id="email" v-model="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" v-model="password">
            </div>
            <button type="submit">LOGIN</button>
        </form>

        <button class="google-login">
            <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" alt="Google Logo">
            Login dengan Google
        </button>

        <p>Belum punya akun? <a href="#" class="register-link">Daftar</a></p>
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    email: '',
                    password: ''
                }
            },
            methods: {
                handleSubmit() {
                    // Handle login logic here
                    console.log('Email:', this.email);
                    console.log('Password:', this.password);
                }
            }
        });

        app.mount('#app');
    </script>
</body>
</html>