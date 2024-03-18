<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Reguler::class, static function (Faker\Generator $faker) {
    return [
        'id_jenis_produk' => $faker->randomNumber(5),
        'id_tema' => $faker->randomNumber(5),
        'id_fasilitator' => $faker->randomNumber(5),
        'nama_pelatihan' => $faker->sentence,
        'image' => $faker->sentence,
        'deskripsi_pelatihan' => $faker->text(),
        'tanggal_mulai' => $faker->date(),
        'tanggal_selesai' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DashboardReguler::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pelatihan::class, static function (Faker\Generator $faker) {
    return [
        'id_pelatihan' => $faker->randomNumber(5),
        'id_jenis_produk' => $faker->randomNumber(5),
        'id_asal_pelatihan' => $faker->randomNumber(5),
        'id_tema' => $faker->randomNumber(5),
        'nama_pelatihan' => $faker->sentence,
        'deskripsi' => $faker->text(),
        'jumlah_donor' => $faker->randomNumber(5),
        'tanggal_mulai' => $faker->date(),
        'tanggal_selesai' => $faker->date(),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Reguler::class, static function (Faker\Generator $faker) {
    return [
        'id_pelatihan' => $faker->sentence,
        'id_fasilitator' => $faker->sentence,
        'id_tema' => $faker->sentence,
        'nama_pelatihan' => $faker->sentence,
        'tanggal_mulai' => $faker->date(),
        'tanggal_selesai' => $faker->date(),
        'tanggal_pendaftaran' => $faker->date(),
        'tanggal_batas_pendaftaran' => $faker->date(),
        'deskripsi_pelatihan' => $faker->text(),
        'status' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
