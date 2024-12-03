<?php

namespace App\Enums;

enum PengajuanStatus: string
{
    case SedangDiproses = 'Sedang Diproses';
    case Diterima = 'Diterima';
    case Ditolak = 'Ditolak';
}


