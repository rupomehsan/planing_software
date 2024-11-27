<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Database\create_plan_dep_orjitobbo_targets_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_dep_orjitobbo_targets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plan_dep_dofa_id')->nullable();
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('plan_dep_orjitobbo_targets');
    }
};