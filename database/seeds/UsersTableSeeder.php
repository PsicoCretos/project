<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // \DB::table('users')->insert (
            //     [
            //         'name' => 'Administrator',
            //         'email'=> 'admin@admin.com',
            //         'email_verified_at' => now(),
            //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //         'remember_token' => 'oktesteblabla',
            //     ]
            // );

            factory(\App\User::class, 40)->create()->each(function($user){
             $user->store()->save(factory(\App\Store::class)->make());   //criando 40 usuarios, pra cada um desses usuarios criacao de uma loja pra cada usuario por meio da ligacao q esta em usuario metodo store e chamando metodo save pra poder criar um objeto store preenchido com os dados $fakes pra ser inserido na base pra mim pra cada uma de insercoes de cada usuario total 40 usuarios (make retorna instancia do objeto com as informacos fakes, create ja cria na base de fato, referente as factorys) php artisan:seed pra executar no cmd pra fazer os usuarios
        });
    }
}
