<?php

namespace App\Enums;

enum PengajuanStatus: string
{
    case SedangDiproses = 'sedang diproses';
    case Diterima = 'diterima';
    case Ditolak = 'ditolak';
}


