<?php

use Illuminate\Database\Seeder;
use App\Setting;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\Language::create(['name' => 'ع']);
        \App\Language::create(['name' => 'en']);
        \App\User::create(['name' => 'admin','email'=>'admin@admin.com','password'=>'123456']);
        Setting::create(['key' => 'restaurant_name_ar','value'=>'Restaurant']);
        Setting::create(['key' => 'restaurant_name_en','value'=>'Restaurant']);
        Setting::create(['key' => 'logo','value'=>'']);
        Setting::create(['key' => 'logo','value'=>'']);
        Setting::create(['key' => 'currency','value'=>'ل.س']);
        Setting::create(['key' => 'worktime','value'=>'']);
        Setting::create(['key' => 'phone','value'=>'1234567']);
        Setting::create(['key' => 'empty_image','value'=>'no-image.jpg']);

    }
}
