<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Proprietario;
use App\Models\Pagamento;
use App\Models\Orcamento;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        Orcamento::factory()->create([
            'ribruca' => "Administração",
            'valor' => 100
        ]);
        Orcamento::factory()->create([
            'ribruca' => "Eletricidade",
            'valor' => 300
        ]);
        Orcamento::factory()->create([
            'ribruca' => "Obras",
            'valor' => 1400
        ]);



    }
}
