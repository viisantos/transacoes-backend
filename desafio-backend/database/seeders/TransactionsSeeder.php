<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Entrada',
            'transaction_description' => "Esta entrada é a venda de um Notebook Dell",
            'transaction_value' => 3200.00,
            'transaction_date' => '2024-09-07',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );

        // 2
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Saida',
            'transaction_description' => "Esta entrada é a venda de um Notebook Samsung Essentials",
            'transaction_value' => 4500.00,
            'transaction_date' => '2024-09-08',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
        // 3
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Entrada',
            'transaction_description' => "Notebook Gamer Acer Nitro 5",
            'transaction_value' => 7500.00,
            'transaction_date' => '2024-09-09',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );

        // 4
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Saída',
            'transaction_description' => "Notebook Gamer Dell G5",
            'transaction_value' => 6540.50,
            'transaction_date' => '2024-09-10',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
        // 5
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Entrada',
            'transaction_description' => "'Notebook Gamer Lenovo Legion Y540",
            'transaction_value' => 5530.00,
            'transaction_date' => '2024-09-11',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
        // 6
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Saída',
            'transaction_description' => "Notebook Gamer HP Pavilion",
            'transaction_value' => 5499.00,
            'transaction_date' => '2024-09-12',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
        // 7
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Entrada',
            'transaction_description' => "Notebook Gamer MSI GL65 Leopard",
            'transaction_value' => 4350.00,
            'transaction_date' => '2024-09-13',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
        // 8
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Saída',
            'transaction_description' => "Notebook Gamer Razer Blade 15",
            'transaction_value' => 11599.00,
            'transaction_date' => '2024-09-14',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
        // 9
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Entrada',
            'transaction_description' => "Notebook Gamer Alienware m15",
            'transaction_value' => 13999.00,
            'transaction_date' => '2024-09-15',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
        // 10
        DB::table('tab_transactions')->insert([
            'transaction_type' => 'Saída',
            'transaction_description' => "Processador Intel Core i9-13900K",
            'transaction_value' => 3299.00,
            'transaction_date' => '2024-09-16',
            'created_at' =>  date("Y-m-d H:i:s"),
            'updated_at' =>  date("Y-m-d H:i:s")
        ]
        );
    }
}
