<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_018GetLeaderboardStoredProcedur implements BaseMigration
{
    public function up(): array
    {
        return Schema::query("
            CREATE VIEW GetLeaderboard AS
            SELECT TOP 10
            m.nama AS Nama_Mahasiswa,
            m.prodi AS Program_Studi,
            CAST(m.total_skor AS INT) AS Total_Skor -- Pastikan tipe data sesuai
            FROM
            dbo.mahasiswa m
            LEFT JOIN
            dbo.prestasi p ON p.id_mahasiswa = m.id
            GROUP BY
            m.id, m.nama, m.nim, m.prodi, m.total_skor
            ORDER BY
            CAST(m.total_skor AS INT) DESC; -- Urut berdasarkan total_skor

        ");
    }

    public function down(): array
    {
        return Schema::query("
            DROP VIEW GetLeaderboard;
        ");
    }
}