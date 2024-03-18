<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'reguler' => [
        'title' => 'Reguler',

        'actions' => [
            'index' => 'Reguler',
            'create' => 'New Reguler',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_jenis_produk' => 'Id jenis produk',
            'id_tema' => 'Id tema',
            'id_fasilitator' => 'Id fasilitator',
            'nama_pelatihan' => 'Nama pelatihan',
            'image' => 'Image',
            'deskripsi_pelatihan' => 'Deskripsi pelatihan',
            'tanggal_mulai' => 'Tanggal mulai',
            'tanggal_selesai' => 'Tanggal selesai',
            
        ],
    ],

    'dashboard-reguler' => [
        'title' => 'Dashboardreguler',

        'actions' => [
            'index' => 'Dashboardreguler',
            'create' => 'New Dashboardreguler',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'reguler' => [
        'title' => 'Reguler',

        'actions' => [
            'index' => 'Reguler',
            'create' => 'New Reguler',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_jenis_produk' => 'Id jenis produk',
            'id_tema' => 'Id tema',
            'id_fasilitator' => 'Id fasilitator',
            'nama_pelatihan' => 'Nama pelatihan',
            'image' => 'Image',
            'deskripsi_pelatihan' => 'Deskripsi pelatihan',
            'tanggal_mulai' => 'Tanggal mulai',
            'tanggal_selesai' => 'Tanggal selesai',
            
        ],
    ],

    'pelatihan' => [
        'title' => 'Pelatihan',

        'actions' => [
            'index' => 'Pelatihan',
            'create' => 'New Pelatihan',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_pelatihan' => 'Id pelatihan',
            'id_jenis_produk' => 'Id jenis produk',
            'id_asal_pelatihan' => 'Id asal pelatihan',
            'id_tema' => 'Id tema',
            'nama_pelatihan' => 'Nama pelatihan',
            'deskripsi' => 'Deskripsi',
            'jumlah_donor' => 'Jumlah donor',
            'tanggal_mulai' => 'Tanggal mulai',
            'tanggal_selesai' => 'Tanggal selesai',
            
        ],
    ],

    'reguler' => [
        'title' => 'Reguler',

        'actions' => [
            'index' => 'Reguler',
            'create' => 'New Reguler',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_pelatihan' => 'Id pelatihan',
            'id_fasilitator' => 'Id fasilitator',
            'id_tema' => 'Id tema',
            'nama_pelatihan' => 'Nama pelatihan',
            'tanggal_mulai' => 'Tanggal mulai',
            'tanggal_selesai' => 'Tanggal selesai',
            'tanggal_pendaftaran' => 'Tanggal pendaftaran',
            'tanggal_batas_pendaftaran' => 'Tanggal batas pendaftaran',
            'deskripsi_pelatihan' => 'Deskripsi pelatihan',
            'status' => 'Status',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];