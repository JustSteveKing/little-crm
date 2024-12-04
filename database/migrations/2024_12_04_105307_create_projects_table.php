<?php

declare(strict_types=1);

use App\Enums\Projects\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('projects', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name');
            $table->string('status')->default(Status::Pending);

            $table->text('details')->nullable();

            $table
                ->foreignUlid('client_id')
                ->index()
                ->constrained('clients')
                ->cascadeOnDelete();

            $table
                ->foreignUlid('contact_id')
                ->nullable()
                ->index()
                ->constrained('contacts')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
