<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\Management\UserManagement\UserDepartmentSection\Database\create_user_department_sections_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_department_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_department_id')->nullable();
            $table->string('title', 30)->nullable();
            $table->integer('serial_no')->nullable();

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
        Schema::dropIfExists('user_department_sections');
    }
};