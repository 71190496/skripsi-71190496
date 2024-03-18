@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Form Tambah Pertanyaan</h2>
    </div>
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form id="form-builder" method="post" action="{{ route('dashboard.evaluasi.store') }}">
                    @csrf
                    <input type="hidden" name="id_pelatihan" value="{{ $nilai }}">
                    <div id="question-container">
                        <!-- Question Group 0 -->
                        <div class="question-group" data-index="0">
                            <label>
                                Question 1:
                                <input class="form-control" type="text" name="pertanyaans[0][pertanyaan]" required>
                            </label> 
                            <div class="options option-group">
                                <label>
                                    Options:
                                </label>
                                <div class="form-row mb-2">
                                    <div class="col">
                                        <input class="form-control mb-2" type="text" name="pertanyaans[0][jawaban][]" required>
                                    </div>
                                    <div class="col">
                                        <input class="form-control mb-2" type="text" name="pertanyaans[0][jawaban][]" required>
                                    </div>
                                    <div class="col">
                                        <input class="form-control mb-2" type="text" name="pertanyaans[0][jawaban][]" required>
                                    </div>
                                    <div class="col">
                                        <input class="form-control mb-2" type="text" name="pertanyaans[0][jawaban][]" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-2" type="button" id="add-question">Add Question</button>
                    <button class="btn btn-success mt-2" type="submit" id="save-form">Save Form</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .option-group {
            margin-top: 10px;
            visibility: visible;
            /* Ubah visibility menjadi visible */
        }

        .add-option {
            margin-top: 5px;
            visibility: visible;
            /* Ubah visibility menjadi visible */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('add-question').addEventListener('click', function () {
            var questionContainer = document.getElementById('question-container');
            var newIndex = questionContainer.getElementsByClassName('question-group').length;
    
            var newQuestionGroup = document.createElement('div');
            newQuestionGroup.classList.add('question-group');
            newQuestionGroup.setAttribute('data-index', newIndex);
    
            newQuestionGroup.innerHTML = `
                <label>
                    Question ${newIndex + 1}:
                    <input class="form-control" type="text" name="pertanyaans[${newIndex}][pertanyaan]" required>
                </label>
                <label> 
                <div class="options option-group">
                    <label>
                        Options:
                    </label>
                    <div class="form-row mb-2">
                        <div class="col">
                            <input class="form-control mb-2" type="text" name="pertanyaans[${newIndex}][jawaban][]" required>
                        </div>
                        <div class="col">
                            <input class="form-control mb-2" type="text" name="pertanyaans[${newIndex}][jawaban][]" required>
                        </div>
                        <div class="col">
                            <input class="form-control mb-2" type="text" name="pertanyaans[${newIndex}][jawaban][]" required>
                        </div>
                        <div class="col">
                            <input class="form-control mb-2" type="text" name="pertanyaans[${newIndex}][jawaban][]" required>
                        </div>
                    </div>
                </div>
            `;
    
            questionContainer.appendChild(newQuestionGroup);

            
        });
    </script>
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
@endsection





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
