<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin[] = [
            'email' => 'root@root.root',
            'password' => '$2y$10$TMkylOz/kR/vguPsm.huu.FfNGsfXGA6SjN3hXT5xNlChYpoHbqSK',
            'remember_token' => 'DpfpdtEYxovPANmsC5jHxNUNLjen5zNyiUZvZovMhgyBVkmf5P9qeN6Tysjk'
        ];
        DB::table('users')->insert($admin);
    }
}
