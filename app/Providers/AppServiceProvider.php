<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EmailSettings;
use App\Models\WebsiteSettings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $mail_setting = EmailSettings::first();
        $website_setting = WebsiteSettings::first();
        if ($mail_setting) {
            config(['services.mandrill.secret' => $mail_setting->mandrill_key, 'mail.from.address' => $mail_setting->from_email, 'mail.from.name' => $mail_setting->from_name, 'mail.feedback_to.address' => $mail_setting->feedback_email_to]);
        }
        if ($website_setting) {
            config(['website.setting.name' => $website_setting->name, 'website.setting.logo_light' => $website_setting->logo_light, 'website.setting.logo_dark' => $website_setting->logo_dark, 'website.setting.logo_small_light' => $website_setting->logo_small_light, 'website.setting.logo_small_dark' => $website_setting->logo_small_dark,'website.setting.meta_description' => $website_setting->meta]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
