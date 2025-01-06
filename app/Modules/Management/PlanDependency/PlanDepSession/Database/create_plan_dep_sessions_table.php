<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='/app/Modules/Management/PlanDependency/PlanDepSession/Database/create_plan_dep_sessions_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_dep_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();

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
        Schema::dropIfExists('plan_dep_sessions');
    }
};