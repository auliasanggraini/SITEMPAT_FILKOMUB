<template>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="/build/assets/logo-filkom.png" alt="Filkom Logo" class="logo" />
            <h1>SISTEM INFORMASI<br>PEMINJAMAN RUANGAN</h1>
            <p>FAKULTAS ILMU KOMPUTER</p>
        </div>
        <ul class="sidebar-nav">
            <li>
                <router-link to="/ruang-kelas">
                    <i class="fas fa-door-open"></i> Dashboard
                </router-link>
            </li>
            <li>
                <router-link to="/peminjaman">
                    <i class="fas fa-book"></i> Form Peminjaman
                </router-link>
            </li>
            <li>
                <router-link to="/profil">
                    <i class="fas fa-user"></i> Profil
                </router-link>
            </li>
        </ul>
        <div class="sidebar-footer">
            <router-link to="/login">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Sidebar',
};
</script>

<style scoped>
.sidebar {
    width: 250px;
    background-color: #f2f2f2;
    padding: 20px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
}

.sidebar-header {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar-header img {
    width: 100px;
    height: auto;
}

.sidebar-header h1 {
    font-size: 1.5rem;
    margin-top: 10px;
    margin-bottom: 5px;
}

.sidebar-header p {
    font-size: 0.8rem;
    color: #666;
}

.user-profile {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
}

.user-avatar {
    font-size: 3rem;
    color: #666;
    margin-right: 20px;
}

.user-info h2 {
    margin-bottom: 5px;
}

.user-info p {
    color: #666;
    font-size: 0.8rem;
}

.sidebar-nav {
    list-style: none;
    padding: 0;
}

.sidebar-nav li {
    margin-bottom: 15px;
}

.sidebar-nav li a {
    display: block;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.2s ease;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
}

.sidebar-nav li a i {
    margin-right: 10px;
}

.sidebar-nav li a:hover {
    background-color: #ddd;
}

.sidebar-footer {
    text-align: center;
    position: absolute;
    bottom: 20px;
    width: 85%;
}

.sidebar-footer a {
    display: block;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.2s ease;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
}

.sidebar-footer a i {
    margin-right: 10px;
}

.sidebar-footer a:hover {
    background-color: #ddd;
}
</style>
