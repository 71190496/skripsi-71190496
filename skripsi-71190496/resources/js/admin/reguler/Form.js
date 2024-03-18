import AppForm from '../app-components/Form/AppForm';

Vue.component('reguler-form', {
    mixins: [AppForm],
    props: ['fasilitator'],
    data: function() {
        return {
            form: {
                id_pelatihan:  '' ,
                id_fasilitator: '', // Menggunakan properti id_fasilitator dari props 
                id_tema:  '' ,
                nama_pelatihan:  '' ,
                tanggal_mulai:  '' ,
                tanggal_selesai:  '' ,
                tanggal_pendaftaran:  '' ,
                tanggal_batas_pendaftaran:  '' ,
                deskripsi_pelatihan:  '' ,
                status:  false ,
                
                
            },

            mediaCollections: ['gambar'],
            
            
        }
    }

});