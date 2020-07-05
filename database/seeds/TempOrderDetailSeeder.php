<?php

use Illuminate\Database\Seeder;

class TempOrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\TempOrderDetail::class,100)->create();
    }
}
