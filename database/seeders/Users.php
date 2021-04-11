<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::insert([
          [
              'nama' => 'Nisrina Izdihar Ardana Putri',
              'telp' => '089696854881',
              'email' => 'ardaputt02@gmail.com',
              'password' => md5('123456789'),
              'level' => 'admin'
          ],
          [
              'nama' => 'Kim Seungmin',
              'telp' => '089267354186',
              'email' => 'seungm00@gmail.com',
              'password' => md5('123456789'),
              'level' => 'admin'
          ]
      ]);
    }
}
