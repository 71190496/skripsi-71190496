@extends('peserta.layouts.coba')

<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Profil Saya</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li>Profil Saya</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="course-details" class="course-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Form START -->
                    <form class="file-upload">
                        <div class="row mb-5 gx-5">
                            <!-- Upload profile -->
                            <div class="col-xxl-4">
                                <div class="card rounded-2 border p-5 lift mb-3 shadow">
                                    <div class="row g-3">
                                        <div class="text-center">
                                            <h4 class="mb-4 mt-0">Foto Profil</h4>
                                            <!-- Image upload -->
                                            <div class="square position-relative display-2 mb-3">
                                                <img src="https://www.shutterstock.com/image-vector/profile-blank-icon-empty-photo-600nw-535853269.jpg"
                                                    alt="Foto user" class="avatar-img rounded-circle user"
                                                    style="width: 140px; height: 140px; border: 1px solid #000; margin-right: 5px;">
                                                {{-- <i
                                                    class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i> --}}
                                            </div>
                                            <!-- Button -->
                                            {{-- <input type="file" id="customFile" name="file" hidden="">
                                            <label class="btn btn-success btn-block" for="customFile">Upload</label> --}}
                                            {{-- <button type="button" class="btn btn-danger">Remove</button> --}}
                                            <a class="btn btn-success" href=""><i
                                                class="bi bi-pencil"></i> Edit Profil</a>
                                            <!-- Content -->
                                            {{-- <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum
                                                size 300px x 300px</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact detail -->
                            <div class="col-xxl-8 mb-3 mb-xxl-0">
                                <div class="card rounded-2 border p-5 lift mb-3 shadow">
                                    <div class="row g-2">
                                        <h4 class="mb-4 mt-0">Detail Profil</h4>
                                        <fieldset disabled>
                                            @auth
                                                <!-- First Name -->
                                                <div class="col-md-12">
                                                    <label class="form-label">First Name *</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        aria-label="First name" value="{{ auth()->user()->name }}">
                                                </div>

                                                <!-- Phone number -->
                                                <div class="col-md-12">
                                                    <label class="form-label">Phone number *</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        aria-label="Phone number" value="(333) 000 555">
                                                </div>

                                                <!-- Email -->
                                                <div class="col-md-12">
                                                    <label for="inputEmail4" class="form-label">Email *</label>
                                                    <input type="email" class="form-control" id="inputEmail4"
                                                        value="{{ auth()->user()->email }}">
                                                </div>
                                            @endauth
                                        </fieldset>
                                    </div> <!-- Row END -->
                                </div>
                            </div>


                        </div> <!-- Row END -->

                        <!-- Social media detail -->
                        <div class="row mb-5 gx-5">

                            <!-- change password -->
                            {{-- <div class="col-xxl-8 mb-5 mb-xxl-0">
                                <div class="card rounded-2 border p-5 lift mb-3 shadow">
                                    <div class="row g-3">
                                        <h4 class="my-4">Change Password</h4>
                                        <!-- Old password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1" class="form-label">Old password
                                                *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <!-- New password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword2" class="form-label">New password
                                                *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2">
                                        </div>
                                        <!-- Confirm password -->
                                        <div class="col-md-12">
                                            <label for="exampleInputPassword3" class="form-label">Confirm Password
                                                *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword3">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div> <!-- Row END -->
                        <!-- button -->
                        <div class="gap-3 d-md-flex justify-content-md-start text-center">
                            {{-- <button type="button" class="btn btn-danger btn-lg">Delete profile</button> --}}
                            {{-- <button type="button" class="btn btn-primary btn-lg">Update profile</button> --}}
                        </div>
                    </form> <!-- Form END -->
                </div>
            </div>
        </div>

    </section>

</main>
