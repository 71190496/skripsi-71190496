    <div>
        <table>
            <thead>
                <tr>
                    <th>Nama Peserta</th>
                    <th>Email Peserta</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Negara</th>
                    <th>Nama Organisasi</th>
                    <th>Jenis Organisasi </th>
                    <th>Jabatan Peserta</th>
                    <th>Dapat Informasi</th>
                    <th>Pelatihan Relevan</th>
                    <th>Harapan Pelatihan</th>
                </tr>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="odd">
                        <td class="">{{ $item['nama_peserta'] }}</td>
                        <td class="sorting_1">{{ $item['email_peserta'] }}</td>
                        <td>{{ $item['no_hp'] }}</td>
                        <td>{{ $item->rentang_usia->usia }}</td>
                        <td>{{ $item->gender->nama_gender }}</td>
                        <td>{{ $item->kabupaten_kota->nama_kabupaten_kota }}</td>
                        <td>{{ $item->provinsi->nama_provinsi }}</td>
                        <td>{{ $item->negara->nama_negara }}</td>
                        <td>{{ $item['nama_organisasi'] }}</td>
                        <td>{{ $item->jenis_organisasi->organisasi }}</td>
                        <td>{{ $item['jabatan_peserta'] }}</td>
                        <td>{{ $item->informasi_pelatihan->keterangan }}</td>
                        <td>{{ $item['pelatihan_relevan'] }}</td>
                        <td>{{ $item['harapan_pelatihan'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
