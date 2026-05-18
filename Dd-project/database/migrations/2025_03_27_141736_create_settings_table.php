<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    
        // Insert default values
        DB::table('settings')->insert([
            ['key' => 'site_name', 'value' => 'Your Website Name'],
            ['key' => 'site_logo', 'value' => 'default-logo.png'],
            ['key' => 'hero_heading', 'value' => 'Welcome to Our Platform'],
            ['key' => 'hero_text', 'value' => 'Your success starts here.'],
            ['key' => 'how_to_join_title', 'value' => 'How To Join'],
            ['key' => 'how_to_join_subtitle', 'value' => 'Get Started In Three Easy Steps'],
            ['key' => 'register_title', 'value' => 'Register'],
            ['key' => 'register_text', 'value' => 'Complete our easy sign-up form on the sign-up page by clicking on this <a class="nav-link" href="{{ route(\'login\') }}">Link</a>'],
            ['key' => 'choose_plan_title', 'value' => 'Choose a Plan'],
            ['key' => 'choose_plan_text', 'value' => 'Log in to your Investment dashboard and choose an investment plan of your choice to kickstart your investment plan.'],
            ['key' => 'earn_rewards_title', 'value' => 'Earn Rewards'],
            ['key' => 'earn_rewards_text', 'value' => 'After you have selected an investment plan, just relax and watch your earnings skyrocket.'],
            ['key' => 'about_title', 'value' => 'We Care About how Your Money makes earnings for you.'],
            ['key' => 'about_text', 'value' => 'EminentStrategies.com is a registered and legal international investment trading company based in Poland and with the vision of becoming a prominent player in the crypto industry...'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
