<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qr_tips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('tipper_name');
            $table->string('tipper_email')->nullable();
            $table->decimal('amount', 18, 8);
            $table->string('currency', 10);
            $table->string('status')->comment('pending, completed, failed, canceled')->default('pending');
            $table->string('payment_method')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_tips');
    }
};
