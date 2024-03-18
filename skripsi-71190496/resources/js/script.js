document.addEventListener('DOMContentLoaded', function () {
    const negaraSelect = $('.negara');
    const provinsiSelect = $('#provinsi_id');
    const kotaSelect = $('#kota_id');

    // Select2
    negaraSelect.select2();
    provinsiSelect.select2();
    kotaSelect.select2();

    // nilai old negara
    negaraSelect.val("{{ old('id_negara', Session::get('id_negara')) }}").trigger('change');

    // Simpan nilai old
    let oldNegaraValue = negaraSelect.val();
    let oldProvinsiValue = "{{ old('id_provinsi', Session::get('id_provinsi')) }}";
    let oldKotaValue = "{{ old('id_kota', Session::get('id_kota')) }}";

    // dropdown Provinsi
    function populateProvinsiDropdown(selectedNegaraId) {
        provinsiSelect.empty();
        kotaSelect.empty();

        // opsi default "Pilih Provinsi"
        const defaultOptionProvinsi = new Option('Pilih Provinsi', '', true, true);
        defaultOptionProvinsi.setAttribute('disabled', 'disabled');
        defaultOptionProvinsi.setAttribute('hidden', 'hidden');
        provinsiSelect.append(defaultOptionProvinsi);

        // opsi default "Pilih Kota"
        const defaultOptionKota = new Option('Pilih Kota', '', true, true);
        defaultOptionKota.setAttribute('disabled', 'disabled');
        defaultOptionKota.setAttribute('hidden', 'hidden');
        kotaSelect.append(defaultOptionKota);

        if (selectedNegaraId) {
            fetch(/get-provinsi-by-negara/$,{selectedNegaraId})
                .then(response => response.json())
                .then(data => {
                    data.forEach(provinsi => {
                        const option = new Option(provinsi.nama_provinsi, provinsi.id_provinsi);
                        provinsiSelect.append(option);
                    });

                    // trigger change nilai old untuk populateKotaDropdown
                    provinsiSelect.val(oldProvinsiValue).trigger('change');
                })
                .catch(error => {
                    console.error('Error fetching provinsi data:', error);
                });
        }
    }

    // dropdown Negara
    negaraSelect.on('change', function () {
        const selectedNegaraId = negaraSelect.val();

        // Update nilai oldNegaraValue
        oldNegaraValue = selectedNegaraId;

        // Update nilai oldProvinsiValue dan oldKotaValue
        oldProvinsiValue = "";
        oldKotaValue = "";

        // Panggil fungsi untuk mengisi dropdown Provinsi
        populateProvinsiDropdown(selectedNegaraId);
    });

    // nilai old pada saat halaman dimuat
    const oldSelectedNegaraId = "{{ old('id_negara', Session::get('id_negara')) }}";
    populateProvinsiDropdown(oldSelectedNegaraId);

    // dropdown Kota
    function populateKotaDropdown(selectedProvinsiId) {
        const selectedNegaraId = negaraSelect.val();
        kotaSelect.empty();

        // Tambahkan opsi default "Pilih Kota"
        const defaultOptionKota = new Option('Pilih Kota', '', true, true);
        defaultOptionKota.setAttribute('disabled', 'disabled');
        defaultOptionKota.setAttribute('hidden', 'hidden');
        kotaSelect.append(defaultOptionKota);

        if (selectedProvinsiId) {
            fetch(/get-kota-by-provinsi/$,{selectedProvinsiId})
                .then(response => response.json())
                .then(data => {
                    data.forEach(kota => {
                        const option = new Option(kota.nama_kota, kota.id_kota);
                        kotaSelect.append(option);
                    });

                    // Set nilai selected dan trigger change
                    kotaSelect.val(oldKotaValue).trigger('change');
                })
                .catch(error => {
                    console.error('Error fetching kota data:', error);
                });
        }
    }

    // Mendapatkan nilai old pada saat halaman dimuat
    const oldSelectedProvinsiId = "{{ old('id_provinsi', Session::get('id_provinsi')) }}";
    populateKotaDropdown(oldSelectedProvinsiId);

    // perubahan pada dropdown Provinsi
    provinsiSelect.on('change', function () {
        const selectedProvinsiId = provinsiSelect.val();

        // Update nilai oldProvinsiValue
        oldProvinsiValue = selectedProvinsiId;

        // Panggil fungsi untuk mengisi dropdown Kota
        populateKotaDropdown(selectedProvinsiId);
     });
    });