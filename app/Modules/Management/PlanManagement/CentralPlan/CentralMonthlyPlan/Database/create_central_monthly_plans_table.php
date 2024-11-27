<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\Management\PlanManagement\CentralPlan\CentralMonthlyPlan\Database\create_central_monthly_plans_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('central_monthly_plans', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('central_yearly_plan_id')->nullable();
            $table->bigInteger('central_yearly_executive_plan_id')->nullable();
            $table->bigInteger('plan_dep_monthly_schedule_type_id')->nullable();
            $table->bigInteger('plan_dep_schedule_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->datetime('month_year')->nullable();
            $table->bigInteger('serial_no')->nullable();
            $table->integer('rating')->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->tinyInteger('is_approved')->default(0);

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
        Schema::dropIfExists('central_monthly_plans');
    }
};
