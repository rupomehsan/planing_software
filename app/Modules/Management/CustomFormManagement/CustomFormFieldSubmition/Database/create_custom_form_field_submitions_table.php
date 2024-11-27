<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\Management\CustomFormManagement\CustomFormFieldSubmition\Database\create_custom_form_field_submitions_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_form_field_submitions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('custom_form_id')->nullable();
            $table->bigInteger('custom_form_field_id')->nullable();
            $table->string('value', 100)->nullable();
            $table->string('field_ttile', 100)->nullable();

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
        Schema::dropIfExists('custom_form_field_submitions');
    }
};