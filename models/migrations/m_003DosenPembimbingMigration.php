<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_003DosenPembimbingMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("dosen_pembimbing", function (Blueprint $table) {
            $table->string("id",6);
            $table->string("id_dosen",6);
            $table->string("id_prestasi", 6);

            $table->primary("id");
            $table->unique("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("dosen_pembimbing");
    }
}
