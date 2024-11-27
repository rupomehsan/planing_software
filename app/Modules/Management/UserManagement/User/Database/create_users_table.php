<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\Management\UserManagement\User\Database\create_users_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_department_id')->nullable();
            $table->bigInteger('user_department_section_id')->nullable();
            $table->bigInteger('user_department_sub_section_id')->nullable();
            $table->bigInteger('user_role_id')->nullable();

            $table->string('name', 30)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('address')->nullable();
            $table->string('uid', 20)->nullable();
            $table->string('telegram_id', 50)->nullable();
            $table->string('designation', 50)->nullable();

            $table->string('remember_token')->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
