<?php

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Appetizers',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Condiments',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Confectionery',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Convenience foods',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Desserts',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Dips',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'pastes ',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'spreads',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Dried foods',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Dumplings',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Fast food',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Fermented foods',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Halal food',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Kosher food',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Noodles',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Pies',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Salads',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Sandwiches',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Sauces',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Snack foods',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Soups',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Stews',
                'created_at' => Carbon::now(),
            ],
        ];
        Category::insert($categories);
    }
}
