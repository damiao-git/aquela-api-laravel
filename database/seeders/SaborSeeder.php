<?php

namespace Database\Seeders;

use App\Models\Sabor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaborSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sabor::create(['nome' => 'morango', 'descricao' => 'delicioso sorvete de morango']);
        Sabor::create(['nome' => 'flocos', 'descricao' => 'delicioso sorvete de flocos']);
        Sabor::create(['nome' => 'chocolate', 'descricao' => 'delicioso sorvete de chocolate']);
        Sabor::create(['nome' => 'ninho', 'descricao' => 'delicioso sorvete de ninho']);
        Sabor::create(['nome' => 'menta', 'descricao' => 'delicioso sorvete de menta']);
        Sabor::create(['nome' => 'baunilha', 'descricao' => 'delicioso sorvete de baunilha']);
    }
}
