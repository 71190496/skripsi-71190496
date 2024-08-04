@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Buat Form Evaluasi</h2>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Form Evaluasi</h6>
        </div>


        <div class="card-body">
            <select name="formTemplates" id="formTemplates" class="form-control mb-2">
                <option value="">Pilih template</option>
                <option value="eval">Evaluasi Form</option>
            </select>
            {{-- Hidden form for storing form data --}}
            <form id="hidden-form" action="{{ route('dashboard.evaluasi.store') }}" method="post" style="display: none;">
                @csrf
                <input type="hidden" id="form" name="form">
                <input type="hidden" id="id_pelatihan" name="id_pelatihan" value="{{ $id_pelatihan }}">
            </form>

            {{-- Form builder container --}}
            <div id="form-builder-container" style="overflow: auto; height: 600px;">
                <div id="fb-editor"></div>
            </div>

            {{-- Save button --}}
            <button id="save-button" class="btn btn-success mt-3">Simpan</button>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ asset('form-builder/form-builder.min.js') }}"></script>
    <script>
        jQuery(function($) {
            var options = {
                controlOrder: [
                    'header',
                    'text',
                    'paragraph'
                ],
                disabledActionButtons: [
                    'data',
                    'clear',
                    'save'
                ],
                disabledAttrs: [
                    'name',
                    'placeholder',
                    'value',
                    'access',
                    'class',
                ],
                disableFields: [
                    'autocomplete',
                    // 'button',
                    'hidden',
                ]
            };

            var container = $(document.getElementById('fb-editor'));
            const templateSelect = document.getElementById("formTemplates");

            // Initialize form builder
            var formBuilderInstance = $(container).formBuilder(options);


            // Templates data
            const templates = {
                eval: [{
                    "type": "header",
                    "subtype": "h6",
                    "label": "Fasilitator&nbsp; 1 : <br><span style=\"color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14.6667px; white-space-collapse: preserve;\">Silahkan menilai dan memberi komentar untuk hal-hal berikut :</span><br>"
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "Metode yang digunakan",
                    "inline": true,
                    "name": "metode_yang_digunakan",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Kemampuan merespon peserta</span>",
                    "inline": true,
                    "name": "kemampuan_merespon_peserta",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Pengendalian/ pengembangan proses</span>",
                    "inline": true,
                    "name": "pengembangan_proses",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Kecukupan waktu</span>",
                    "inline": true,
                    "name": "kecukupan_waktu",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Penguasaan materi</span><br>",
                    "inline": true,
                    "name": "penguasaan_materi",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Kemampuan menyampaikan materi</span><br>",
                    "inline": true,
                    "name": "kemampuan_menyampaikan_materi",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "textarea",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">CATATAN : Apapun nilai yang anda berikan di atas, mohon diberikan penjelasan dalam satu atau dua kalimat di bawah ini:</span>",
                    "className": "form-control",
                    "name": "catatan_fasilitator",
                    "subtype": "textarea"
                }, {
                    "type": "header",
                    "subtype": "h6",
                    "label": "Peserta<br><span style=\"color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14.6667px; white-space-collapse: preserve;\">Silahkan menilai dan memberi komentar untuk hal-hal berikut :</span><br>"
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Partisipasi peserta</span><br>",
                    "inline": true,
                    "name": "partisipasi_peserta",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Disiplin peserta</span><br>",
                    "inline": true,
                    "name": "disiplin_peserta",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Kemampuan menyerap materi</span><br>",
                    "inline": true,
                    "name": "kemampuan_menyerap_materi",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Keterbukaan gagasan</span><br>",
                    "inline": true,
                    "name": "keterbukaan_gagasan",
                    "other": false,
                    "values": [{
                        "label": "Kurang",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Cukup",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Baik",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Sangat Baik",
                        "value": "4",
                        "selected": false
                    }]
                }, {
                    "type": "textarea",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">CATATAN : Apapun nilai yang anda berikan di atas, mohon diberikan penjelasan dalam satu atau dua kalimat di bawah ini:</span>",
                    "className": "form-control",
                    "name": "catatan_peserta",
                    "subtype": "textarea"
                }, {
                    "type": "header",
                    "subtype": "h6",
                    "label": "Materi Pelatihan<br><span style=\"color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14.6667px; white-space-collapse: preserve;\">Dari topik-topik pembahasan di bawah, manakah yang :</span><br>"
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\"><p style=\"margin-bottom: 0px;\">Materi 1</p></span>",
                    "inline": false,
                    "name": "materi",
                    "other": false,
                    "values": [{
                        "label": "Tidak dipahami",
                        "value": "Tidak dipahami",
                        "selected": false
                    }, {
                        "label": "Mudah dipahami",
                        "value": "Mudah dipahami",
                        "selected": false
                    }, {
                        "label": "Sulit dipahami",
                        "value": "Sulit dipahami",
                        "selected": false
                    }, {
                        "label": "Sudah dipahami sebelumnya/ tidak ada hal baru",
                        "value": "Sudah dipahami sebelumnya/ tidak ada hal baru",
                        "selected": false
                    }]
                }, {
                    "type": "header",
                    "subtype": "h6",
                    "label": "Fasilitas<br>"
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\"><p style=\"margin-bottom: 0px;\">Ruang Kelas<br></p></span>",
                    "inline": true,
                    "name": "ruang_kelas",
                    "other": false,
                    "values": [{
                        "label": "Tidak memuaskan",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Kurang memuaskan",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Cukup memuaskan",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Memuaskan",
                        "value": "4",
                        "selected": false
                    }, {
                        "label": "Sangat Memuaskan",
                        "value": "5",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Konsumsi</span>",
                    "inline": true,
                    "name": "konsumsi",
                    "other": false,
                    "values": [{
                        "label": "Tidak memuaskan",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Kurang memuaskan",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Cukup memuaskan",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Memuaskan",
                        "value": "4",
                        "selected": false
                    }, {
                        "label": "Sangat Memuaskan",
                        "value": "5",
                        "selected": false
                    }]
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Layanan Panitia</span><br>",
                    "inline": true,
                    "name": "layanan_panitia",
                    "other": false,
                    "values": [{
                        "label": "Tidak memuaskan",
                        "value": "1",
                        "selected": false
                    }, {
                        "label": "Kurang memuaskan",
                        "value": "2",
                        "selected": false
                    }, {
                        "label": "Cukup memuaskan",
                        "value": "3",
                        "selected": false
                    }, {
                        "label": "Memuaskan",
                        "value": "4",
                        "selected": false
                    }, {
                        "label": "Sangat Memuaskan",
                        "value": "5",
                        "selected": false
                    }]
                }, {
                    "type": "textarea",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Apa yang dapat dilakukan untuk memperbaiki pelatihan ini, baik konten/ materi pelatihan maupun fasilitas pelatihan ?&nbsp;</span><br>",
                    "className": "form-control",
                    "name": "perbaikan_pelatihan",
                    "subtype": "textarea"
                }, {
                    "type": "radio-group",
                    "required": true,
                    "label": "<span class=\"M7eMe\" style=\"font-size: 16px; font-family: docs-Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0px; color: rgb(32, 33, 36);\">Saya akan merekomendasikan orang lain untuk mengikuti pelatihan ini<br></span>",
                    "inline": false,
                    "name": "rekomendasi_pelatihan",
                    "other": false,
                    "values": [{
                        "label": "Ya",
                        "value": "Ya",
                        "selected": false
                    }, {
                        "label": "Tidak",
                        "value": "Tidak",
                        "selected": false
                    }]
                }, {
                    "type": "text",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Jika ya, sebutkan nama, lembaga dan kontak yang bisa dihubungi:</span>",
                    "className": "form-control",
                    "name": "kontak",
                    "subtype": "text"
                }, {
                    "type": "textarea",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Hal yang paling utama yang saya dapatkan / pelajari dari pelatihan ini :</span><br>",
                    "className": "form-control",
                    "name": "manfaat_pelatihan",
                    "subtype": "textarea"
                }, {
                    "type": "textarea",
                    "required": true,
                    "label": "<span style=\"color: rgb(32, 33, 36); font-family: docs-Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pelatihan apa yang masih saya butuhkan utuk mendukung pekerjaan saya ?</span><br>",
                    "className": "form-control",
                    "name": "pelatihan_yang_dibutuhkan",
                    "subtype": "textarea"
                }]
            };

            // Event listener for template select
            templateSelect.addEventListener("change", function(e) {
                formBuilderInstance.actions.setData(templates[e.target.value]);
            });

            // Save button click event
            $('#save-button').on('click', function() {
                // Get form data
                var formData = formBuilderInstance.formData;

                // Set form data to hidden input
                $('#form').val(JSON.stringify(formData));

                // Submit the hidden form
                $('#hidden-form').submit();
            });

        });
    </script>
@endsection


{{-- <div class="col-lg-12 mb-4">
    <form id="form-builder" method="post" action="">
        @csrf
        <input type="hidden" name="id_pelatihan" value="{{ $nilai }}">
        <div id="question-container">
            <!-- Question Group 0 -->
            <div class="question-group">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-start">
                            <h6 class="m-0 font-weight-bold text-success">Pertanyaan</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <label>
                                    Pertanyaan :
                                </label>
                                <input class="form-control" type="text" name="pertanyaans[0][pertanyaan]"
                                    placeholder="Masukkan Pertanyaan" required>
                            </div>
                            <div class="col-md-2">
                                <label>Pilih Tipe Pertanyaan</label>
                                <select class="form-control tipe-select" name="pertanyaans[0][tipe]">
                                    <option value="multiple">Pilihan Ganda</option>
                                    <option value="checkbox">Check Box</option>
                                    <option value="short">Pertanyaan Singkat</option>
                                    <option value="long">Paragraf</option>
                                </select>
                            </div>
                        </div>
                        <div class="options-container">
                            <div class="option">
                                <label class="mt-2">
                                    Opsi :
                                </label>
                                <input class="form-control mb-3" type="text" name="pertanyaans[0][opsi][]"
                                    placeholder="Masukkan Opsi" required style="width: 83%">
                            </div>
                        </div>

                        <button type="button" class="add-option btn btn-primary">Tambah Opsi</button>
                        <button type="button" class="remove-question btn btn-danger">Hapus Pertanyaan</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="add-question btn btn-primary">Tambah Pertanyaan</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div> --}}

{{-- <script>
        $(document).ready(function() {
            // Tambah Pertanyaan
            $(".add-question").click(function() {
                var index = $(".question-group").length;
                var questionGroup = `
                <div class="question-group">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-start">
                                <h6 class="m-0 font-weight-bold text-success">Pertanyaan</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row px-auto">
                                <div class="col-md-10"> 
                                    <label>
                                        Pertanyaan :
                                    </label>
                                    <input class="form-control" type="text" name="pertanyaans[${index}][pertanyaan]" placeholder="Masukkan Pertanyaan" required>
                                </div>
                                <div class="col-md-2">
                                    <label>Pilih Tipe Pertanyaan</label>
                                    <select class="form-control px-auto tipe-select" name="pertanyaans[${index}][tipe]">
                                        <option value="multiple">Pilihan Ganda</option>
                                        <option value="checkbox">Check Box</option>
                                        <option value="short">Pertanyaan Singkat</option>
                                        <option value="long">Paragraf</option>
                                    </select> 
                                </div>
                            </div> 
                            <div class="options-container">
                                <div class="option">
                                    <label class="mt-2">
                                        Opsi :
                                    </label>
                                    <input class="form-control mb-3" type="text" name="pertanyaans[${index}][opsi][]" placeholder="Masukkan Opsi" required style="width: 83%"> 
                                </div>
                            </div> 
                            <button type="button" class="add-option btn btn-primary">Tambah Opsi</button>
                            <button type="button" class="remove-question btn btn-danger">Hapus Pertanyaan</button>
                        </div>
                    </div>
                </div> `;
                $("#question-container").append(questionGroup);
            });

            // Hapus Pertanyaan
            $(document).on("click", ".remove-question", function() {
                $(this).closest(".question-group").remove();
            });

            // Tambah Opsi
            $(document).on("click", ".add-option", function() {
                var optionsContainer = $(this).closest(".question-group").find(".options-container");
                var option = `
                    <div class="option">
                        <label>
                            Opsi :
                        </label>
                        <input class="form-control mb-3" type="text" name="pertanyaans[${$(this).closest(".question-group").index()}][opsi][]" placeholder="Masukkan Opsi" required style="width: 83%">
                        <button type="button" class="remove-option btn btn-danger mb-2">Hapus Opsi</button>
                    </div>`;
                optionsContainer.append(option);
            });

            // Sembunyikan atau tampilkan options-container berdasarkan pilihan tipe
            $(document).on("change", ".tipe-select", function() {
                var selectedValue = $(this).val();
                var optionsContainer = $(this).closest(".question-group").find(".options-container");
                var addOptionButton = $(this).closest(".question-group").find(".add-option");
                if (selectedValue === "short" || selectedValue === "long") {
                    optionsContainer.hide();
                    optionsContainer.find(".option").remove(); // Menghapus semua opsi yang sudah ada
                    addOptionButton.hide(); // Menyembunyikan tombol "Tambah Opsi"
                } else {
                    optionsContainer.show();
                    addOptionButton.show(); // Menampilkan tombol "Tambah Opsi"
                }
            });

            $(document).on("click", ".remove-option", function() {
                $(this).closest(".option").remove();
            });

        });
    </script> --}}



{{-- <script>
        $(document).ready(function() {
            let questionIndex = 1;

            $('#add-question').on('click', function() {
                const newQuestionGroup = `
                    <div class="question-group" data-index="${questionIndex}">
                        <label>
                            Question ${questionIndex + 1}:
                            <input class="form-control" type="text" name="questions[${questionIndex}][question]" required>
                        </label>
                        <label>
                            Type:
                            <select class="form-control" name="questions[${questionIndex}][type]" required>
                                <option value="">Pilih tipe pertanyaan</option>
                                <option value="text">Text</option>
                                <option value="multiple_choice">Multiple Choice</option>
                            </select>
                        </label>
                        <div class="options option-group">
                            <label>
                                Options:
                                <input class="form-control" type="text" name="questions[${questionIndex}][options][]" required>
                            </label>
                        </div>
                        <button type="button" class="add-option btn btn-success">Add Option</button>
                        <button type="button" class="remove-question btn btn-danger">Remove</button>
                    </div>
                `;
                $('#question-container').append(newQuestionGroup);
                questionIndex++;
            });

            $(document).on('change', 'select[name^="questions["]', function() {
                const $optionsContainer = $(this).closest('.question-group').find('.options');
                const $addOptionBtn = $(this).closest('.question-group').find('.add-option');
                if ($(this).val() === 'multiple_choice') {
                    $optionsContainer.show();
                    $addOptionBtn
                        .show(); // Tampilkan elemen input opsi pertanyaan jika tipe pertanyaan adalah "Multiple Choice"
                } else {
                    $optionsContainer.hide();
                    $addOptionBtn
                        .hide(); // Sembunyikan elemen input opsi pertanyaan jika tipe pertanyaan bukan "Multiple Choice"
                }
            });

            $(document).on('click', '.add-option', function() {
                const $optionsContainer = $(this).closest('.question-group').find('.options');
                const newOptionInput = `
                    <label>
                        Options:
                        <input class="form-control" type="text" name="${$optionsContainer.data('index')}[options][]" required>
                    </label>
                `;
                $optionsContainer.append(newOptionInput);
            });

            $(document).on('click', '.remove-question', function() {
                $(this).closest('.question-group').remove();
            });

            // $('#form-builder').submit(function(e) {
            //     e.preventDefault();
            //     const formData = $(this).serialize();

            //     $.ajax({
            //         type: 'POST',
            //         url: '{{ route('evaluasi.store') }}',
            //         data: formData,
            //         success: function(response) {
            //             alert('Form saved successfully!');
            //         },
            //         error: function(error) {
            //             console.error(error);
            //             alert('Error while saving form.');
            //         }
            //     });
            // });
        });
    </script> --}}





{{-- <div class="card-header py-3">
                <form method="post" action="{{ route('dashboard.evaluasi.store') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="pertanyaan1">Pertanyaan 1</label>
                        <input type="text" class="form-control @error('pertanyaan1') is-invalid @enderror"
                            placeholder="Masukan pertanyaan" id="pertanyaan1" name="pertanyaan1">
                        @error('pertanyaan1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="pertanyaan2">Pertanyaan 2</label>
                        <input type="text" class="form-control @error('pertanyaan2') is-invalid @enderror"
                            placeholder="Masukan pertanyaan" id="pertanyaan2" name="pertanyaan2">
                        @error('pertanyaan2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="pertanyaan3">Pertanyaan 3</label>
                        <input type="text" class="form-control @error('pertanyaan3') is-invalid @enderror"
                            placeholder="Masukan pertanyaan" id="pertanyaan3" name="pertanyaan3">
                        @error('pertanyaan3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="pertanyaan4">Pertanyaan 4</label>
                        <input type="text" class="form-control @error('pertanyaan4') is-invalid @enderror"
                            placeholder="Masukan pertanyaan" id="pertanyaan4" name="pertanyaan4">
                        @error('pertanyaan4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="pertanyaan5">Pertanyaan 5</label>
                        <input type="text" class="form-control @error('pertanyaan5') is-invalid @enderror"
                            placeholder="Masukan pertanyaan" id="pertanyaan5" name="pertanyaan5">
                        @error('pertanyaan5')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div> --}}
