<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\BasicSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'site_name'         => "Xmin v3.0.0",
            'site_title'        => "AppDevs Admin Panel",
            'base_color'        => "#F26822",
            'secondary_color'   => "#262626",
            'otp_exp_seconds'   => "3600",
            'timezone'          => "Asia/Dhaka",
            'broadcast_config'  => [
                "method" => "pusher",
                "app_id" => "",
                "primary_key" => "",
                "secret_key" => "",
                "cluster" => "ap2"
            ],
            'push_notification_config'  => [
                "method" => "pusher",
                "instance_id" => "",
                "primary_key" => ""
            ],
            'kyc_verification'  => true,
            'email_verification'    => true,
            'email_notification'    => true,
            'user_registration'     => true,
            'agree_policy'          => true,
            'mail_config'       => [
                "method" => "smtp",
                "host" => "",
                "port" => "",
                "encryption" => "",
                "username" => "",
                "password" => "",
                "from" => "",
                "app_name" => "",
            ],
            'email_verification'    => true,
            'admin_prefix'          => 'admin',
            'site_logo_dark'        => "seeder/dark-logo.png",
            'site_logo'             => "seeder/white-logo.png",
            'site_fav_dark'         => "seeder/dark-fav.png",
            'site_fav'              => "seeder/white-fav.png",
            'web_version'           => "1.0.0",
            'admin_version'         => "2.5.0",
        ];

        BasicSettings::firstOrCreate($data);
    }
}
