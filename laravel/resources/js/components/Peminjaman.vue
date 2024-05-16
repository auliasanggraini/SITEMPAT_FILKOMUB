<template>
    <div>
        <h2>Formulir Peminjaman</h2>
        <form @submit.prevent="submitForm">
            <div>
                <label>Ruangan</label>
                <select v-model="form.ruangan_id">
                    <option v-for="ruangan in ruangans" :key="ruangan.id" :value="ruangan.id">
                        {{ ruangan.nama }}
                    </option>
                </select>
            </div>
            <div>
                <label>Waktu Mulai</label>
                <input type="datetime-local" v-model="form.waktu_mulai">
            </div>
            <div>
                <label>Waktu Selesai</label>
                <input type="datetime-local" v-model="form.waktu_selesai">
            </div>
            <div>
                <label>Tujuan</label>
                <input type="text" v-model="form.tujuan">
            </div>
            <button type="submit">Ajukan Peminjaman</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                ruangan_id: '',
                waktu_mulai: '',
                waktu_selesai: '',
                tujuan: ''
            },
            ruangans: []
        };
    },
    mounted() {
        axios.get('/api/ruangans')
            .then(response => {
                this.ruangans = response.data;
            });
    },
    methods: {
        submitForm() {
            axios.post('/api/peminjamans', this.form)
                .then(response => {
                    alert('Peminjaman berhasil diajukan');
                });
        }
    }
}
</script>
