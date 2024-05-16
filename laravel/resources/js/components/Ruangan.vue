<template>
    <div>
        <h2>Daftar Ruangan</h2>
        <ul>
            <li v-for="ruangan in ruangans" :key="ruangan.id">
                {{ ruangan.nama }} - Kapasitas: {{ ruangan.kapasitas }} - Fasilitas: {{ ruangan.fasilitas }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ruangans: []
        };
    },
    mounted() {
        axios.get('/api/ruangans')
            .then(response => {
                this.ruangans = response.data;
            });
    }
}
</script>
