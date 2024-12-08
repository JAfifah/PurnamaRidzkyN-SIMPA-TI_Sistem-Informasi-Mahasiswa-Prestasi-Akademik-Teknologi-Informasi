<?php

namespace app\controllers;

use app\helpers\Dump;
use app\models\database\users\Mahasiswa;
use app\models\database\prestasiLomba\Peringkat;

class Leaderboard extends BaseController
{
    /**
     * Menampilkan leaderboard mahasiswa berdasarkan total skor.
     *
     * @return array
     */
    public function renderLeaderboard(): void
    {
        // Ambil data mahasiswa
        $mahasiswa = Mahasiswa::getLeaderboard();

        $mahasiswa = $mahasiswa['result'];
        $this->view("leaderboard/Leaderboard", "Leaderboard", $mahasiswa);
        

    }
}