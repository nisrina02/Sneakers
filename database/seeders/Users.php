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
              'alamat' => 'Jl. Bendungan Wadas Lintang',
              'password' => md5('123456789'),
              'level' => 'admin'
          ],
          [
              'nama' => 'Kim Seungmin',
              'telp' => '089267354186',
              'email' => 'seungm00@gmail.com',
              'alamat' => 'Cheongdam-dong',
              'password' => md5('123456789'),
              'level' => 'admin'
          ],
          [
            'nama' => 'Bang Christoper Chan',
            'telp' => '0823561893562',
            'email' => 'CB97@gmail.com',
            'alamat' => 'Greenacre, NSW',
            'password' => md5('123456789'),
            'level' => 'seller'
          ],
          [
            'nama' => 'Hwang Hyunjin',
            'telp' => '0872936541740',
            'email' => 'Llama00@gmail.com',
            'alamat' => 'Seoul',
            'password' => md5('123456789'),
            'level' => 'customer'
          ]
      ]);
    }
}
