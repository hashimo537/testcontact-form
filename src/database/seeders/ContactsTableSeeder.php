<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Contact::create([
                'first_name' => '山田',
                'last_name' => '太郎',
                'gender' => 1,
                'email' => 'test@example.com',
                'category_id' => 1,
                'tel' => '08012345678',
                'address' => '東京都渋谷区千駄ヶ谷１−２−３',
                'building' => '千駄ヶ谷マンション１０１',
                'detail' => '届いた商品が注文した商品ではありませんでした。商品の交換をお願いします。',
            ]);
        }
    }
}