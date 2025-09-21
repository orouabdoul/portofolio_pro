<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'demo_url')) {
                $table->string('demo_url')->nullable()->after('image_path');
            }
            if (!Schema::hasColumn('projects', 'github_url')) {
                $table->string('github_url')->nullable()->after('demo_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'demo_url')) {
                $table->dropColumn('demo_url');
            }
            if (Schema::hasColumn('projects', 'github_url')) {
                $table->dropColumn('github_url');
            }
        });
    }
};
