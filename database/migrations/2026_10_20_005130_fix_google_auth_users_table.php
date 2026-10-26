
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Agregar el identificador de Google
            $table->string('google_id')
                  ->nullable()
                  ->unique();

            // Permitir usuarios sin DNI
            $table->string('dni', 15)
                  ->nullable()
                  ->change();

            // Permitir usuarios sin contraseña
            $table->string('password', 255)
                  ->nullable()
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['google_id']);
            $table->dropColumn('google_id');

            $table->string('dni', 15)
                  ->nullable(false)
                  ->change();

            $table->string('password', 255)
                  ->nullable(false)
                  ->change();
        });
    }
};
