<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = Carbon::now();
        // User::factory(10)->create();
        DB::table("user_roles")->insert([[
            "persian_name" => "ادمین",
            "english_name" => "admin",
            "created_at" => $now,
            "updated_at" => $now
        ],[
            "persian_name" => "کاربر",
            "english_name" => "user",
            "created_at" => $now,
            "updated_at" => $now
        ]]);
    }
}
