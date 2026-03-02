<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique(); // unique to not have two assets with the same identifier
            $table->string('type');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('serial')->nullable();
            $table->string('status')->default('active'); // active, spare, retired
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->nullOnDelete(); // foreign relationship to users table + asset can be assigned to null even if user is deleted
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
