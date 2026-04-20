<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade'); // deleting a user removes their application

            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');

            $table->string('role_applied_for')->nullable(); // e.g. "Frontend Dev", "Data Science"

            $table->text('admin_notes')->nullable(); // internal notes visible only to admin

            $table->timestamp('reviewed_at')->nullable(); // when admin last changed status

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
