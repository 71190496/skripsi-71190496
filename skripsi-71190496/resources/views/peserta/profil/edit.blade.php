@extends('peserta.layouts.coba')

<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Profil Saya</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li>Profil</li>
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
                            <!-- Contact detail -->
                            <div class="col-xxl-8 mb-3 mb-xxl-0">
                                <div class="card rounded-2 border p-5 lift mb-3 shadow">
                                    <div class="row g-2">
                                        <h4 class="mb-4 mt-0">Detail Profil</h4>
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="First name" value="Scaralet">
                                        </div>
                                        <!-- Last name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Last name" value="Doe">
                                        </div>
                                        <!-- Phone number -->
                                        <div class="col-md-6">
                                            <label class="form-label">Phone number *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Phone number" value="(333) 000 555">
                                        </div>
                                        <!-- Mobile number -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile number *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Phone number" value="+91 9852 8855 252">
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email *</label>
                                            <input type="email" class="form-control" id="inputEmail4"
                                                value="example@homerealty.com">
                                        </div>
                                        <!-- Skype -->
                                        <div class="col-md-6">
                                            <label class="form-label">Skype *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Phone number" value="Scaralet D">
                                        </div>
                                    </div> <!-- Row END -->
                                </div>
                            </div>

                            <!-- Upload profile -->
                            <div class="col-xxl-4">
                                <div class="card rounded-2 border p-5 lift mb-3 shadow">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Upload Foto Profil</h4>
                                        <div class="text-center">
                                            <!-- Image upload -->
                                            <div class="square position-relative display-2 mb-3">
                                                <img src="https://www.shutterstock.com/image-vector/profile-blank-icon-empty-photo-600nw-535853269.jpg"
                                                    alt="Foto user" class="avatar-img rounded-circle user"
                                                    style="width: 140px; height: 140px; border: 1px solid #000; margin-right: 5px;">
                                                {{-- <i
                                                    class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i> --}}
                                            </div>
                                            <!-- Button -->
                                            <input type="file" id="customFile" name="file" hidden="">
                                            <label class="btn btn-success btn-block" for="customFile">Upload</label>
                                            <button type="button" class="btn btn-danger">Remove</button>
                                            <!-- Content -->
                                            <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum
                                                size 300px x 300px</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row END -->

                        <!-- Social media detail -->
                        <div class="row mb-5 gx-5">

                            <!-- change password -->
                            <div class="col-xxl-8 mb-5 mb-xxl-0">
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
                            </div>
                        </div> <!-- Row END -->
                        <!-- button -->
                        <div class="gap-3 d-md-flex justify-content-md-start text-center">
                            {{-- <button type="button" class="btn btn-danger btn-lg">Delete profile</button> --}}
                            <button type="button" class="btn btn-primary btn-lg">Update profile</button>
                        </div>
                    </form> <!-- Form END -->
                </div>
            </div>
        </div>

    </section>

</main>




{{-- <main id="main">
    @section('container')  --}}
<!-- ======= Breadcrumbs ======= -->
{{-- <div class="breadcrumbs mb-2" data-aos="fade-in">
    <div class="container">
        <h2>Profil</h2>
        <p></p>
    </div> 
<div class="text-center">
    <img class="mt-3 mb-3" src="/img/stc1.png" data-aos="fade-in">
</div>
<div class="container" style="text-align: justify" data-aos="fade-in">
    <p>
        SATUNAMA sebagai lembaga swadaya masyarakat mempunyai sejarah yang cukup panjang. Sejarah yang panjang itu
        bermuatan perkembagan lembaga sesuai dengan dinamika internal lembaga maupun dalam menanggapi perkembangan
        masyarakat yang dilayaninya. Maka wajar kalau SATUNAMA mempunyai modal yang memadai dalam bentuk pengetahuan
        dan
        praktek yang bisa di-share ke banyak pihak melalui pelatihan dan konsultasi.
    </p>
    <p>
        Pelatihan dan Konsultasi yang dijalankan oleh SATUNAMA sudah berjalan selama 2 (dua) dekade dengan
        perkembangan
        dan dinamikanya sendiri. Pada awalnya layanan SATUNAMA berada dalam kerangka pembangunan yang langsung
        berkaitan
        dengan pengentasan dari kemiskinan. Pelatihan-pelatihan yang diberikan banyak menyangkut hal-hal praktis,
        seperti akupuntur, ekonomi rumah tangga, dan sebagainya.
    </p>
    <p>
        Dalam perkembangan selanjutnya disadari bahwa kemiskinan bukanlah suatu substansi yang terlepas dari
        konteksnya
        yang lebih luas dalam bentuk sistem ekonomi, politik, sosial, budaya, dst. Maka pelatihan pun berkembang ke
        pemberdayaan masyarakat, termasuk LSM, melalui pelatihan manajemen organisasi dan manajemen program, mulai
        dari
        perencanaan hingga evaluasi. Di samping itu pemberdayaan masyarakat juga menyangkut politik dalam arti luas
        melalui civic education (pendidikan kewargaan) untuk LSM (CEFIL), pemimpin pedesaan baik formal maupun
        informal
        (CEFRUL), pemimpin agama (CEFREL), PKK (Strecew), politisi lokal (CELOP), dst. Bersama dengan munculnya era
        Reformasi, pelatihan-pelatihan terkait civic education yang di atas semakin dipertegas demi berkembangnya
        demokrasi yang sehat.
    </p>
    <p>
        Dengan begitu menjadi jelas bahwa SATUNAMA melalui Unit Training dan Konsultasi ingin menyumbangkan
        seoptimal
        mungkin kepada semua pihak apa yang dimiliki serta apa yang menjadi pusat keprihatinannya. Menjadi jelas
        bahwa
        SATUNAMA merupakan bagian integral dari perkembangan Bangsa Indonesia yang bergerak maju dalam semangat
        saling
        mendukung, menguatkan, dan menyumbangkan yang dimilikinya.
    </p>
</div> 
</main> --}}
