<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',100);
            $table->text('content',1000);
            $table->string('content_type',100);
            $table->string('image_name')->nullable();


        });
        $faker = Faker::create();

        // You can adjust the number inside the for loop to generate more or fewer fake records
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->sentence,
                'content' => $faker->paragraph(5),
                'content_type' => $faker->randomElement(['Type A', 'Type B', 'Type C']),
                'image_name' => $faker->imageUrl(), // Generating a fake image URL
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
