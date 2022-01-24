<?php

namespace App\Models\Publico;

use CodeIgniter\Model;


class Funciones extends Model
{

    public function _obtenerHorarioDisponible($currentTime,$startTime,$endTime)
    {
        if (
            ($startTime < $endTime &&
                $currentTime >= $startTime &&
                $currentTime <= $endTime
            ) ||
            ($startTime > $endTime && ($currentTime >= $startTime ||
                    $currentTime <= $endTime
                )
            )
        ) {
            return "1";
        } else {
            return "0";
        }
    }
}
