<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'image_path')) {
                // La colonne existe déjà, ne rien faire
                return;
            }
            $table->string('image_path')->nullable()->after('duration');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'image_path')) {
                $table->dropColumn('image_path');
            }
        });
    }
};
