<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('contacts', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name')->comment('Taylor Otwell');
            $table->string('email')->comment('taylor@laravel.com');

            $table
                ->foreignUlid('client_id')
                ->index()
                ->constrained('clients')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['email','client_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
