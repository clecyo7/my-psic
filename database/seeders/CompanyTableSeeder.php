<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('companies')->insert([
            'name' => 'My Psic',
            'description' => 'Descrição exemplo',
            'email_tenant' => 'exemplo@email.com',
            'email_responsible' => 'responsavel@email.com',
            'phone' => '123456789',
            'cep' => '12345-678',
            'logradouro' => 'Rua Exemplo',
            'number' => '123',
            'bairro' => 'Bairro Exemplo',
            'complemento' => 'Complemento Exemplo',
            'cidade' => 'Cidade Exemplo',
            'uf' => 'UF',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
