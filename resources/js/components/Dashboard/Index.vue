<template>
    <div class="page">
        <Sidebar />
        <div class="content">
            <h1 class="title">Ruangan</h1>
        </div>
    </div>
</template>

<script>
import Sidebar from '@/components/Layout/Sidebar.vue'

export default {
    components: {
        Sidebar
    }
}
</script>

<style scoped>
.page {
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
</style>
