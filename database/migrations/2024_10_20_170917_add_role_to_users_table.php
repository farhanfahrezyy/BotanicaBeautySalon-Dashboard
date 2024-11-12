<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom 'role' dengan nilai default 'user'
            $table->enum('role', ['admin', 'user'])->default('user')->after('email_verified_at')->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom 'role' jika migration di-rollback
            $table->dropColumn('role');
        });
    }
}
