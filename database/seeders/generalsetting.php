<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SettingModel;
class generalsetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = new SettingModel();
        $setting->email = 'example@example.com';
        $setting->address = '123 Example St, City';
        $setting->phone_no = '123-456-7890';
        $setting->footer_tagline = 'Welcome to our website';
        $setting->facebook = 'https://www.facebook.com/example';
        $setting->instagram = 'https://www.instagram.com/example';
        $setting->twitter = 'https://twitter.com/example';
        $setting->pinterest = 'https://www.pinterest.com/example';
        $setting->meta_title = 'Sample Meta Title';
        $setting->meta_description = 'This is a sample meta description.';
        $setting->logo = 'sample_logo.png'; // Replace with your logo filename or path
        $setting->footer_logo = 'sample_footer_logo.png'; // Replace with your footer logo filename or path
        $setting->save();


    }
}
