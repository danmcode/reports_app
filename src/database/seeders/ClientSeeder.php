<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['ClientId' => 1, 'Name' => 'Pedro',   'LastName' => 'Pérez',   'Identification' => '12345612'],
            ['ClientId' => 2, 'Name' => 'Juan',    'LastName' => 'Sanchez', 'Identification' => '99888773'],
            ['ClientId' => 3, 'Name' => 'María',   'LastName' => 'Torres',  'Identification' => '20014032'],
            ['ClientId' => 4, 'Name' => 'Marcos',  'LastName' => 'Vargas',  'Identification' => '85274196'],
            ['ClientId' => 5, 'Name' => 'Juanita', 'LastName' => 'Lopez',   'Identification' => '74165432'],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['ClientId' => $client['ClientId']], $client);
        }
    }
}
