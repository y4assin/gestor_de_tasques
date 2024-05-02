<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

use Exception;

class Tasca extends Model
{
    private String $titol;
    private String $descripcio;
    private Date $dataLímit;
    private String $estat;

    public function __construct(String $titol, String $descripcio, Date $dataLímit, String $estat)
    {
        if (empty($titol) || empty($descripcio) || empty($dataLímit) || empty($estat)) {
            throw new Exception("El títol, descripció, data límit o estat no poden ser null o buits");
        }

        $this->titol = $titol;
        $this->descripcio = $descripcio;
        $this->dataLímit = $dataLímit;
        $this->estat = $estat;
    }

    public function __toString(): String
    {
        return "Tasca{titol=" . $this->titol . ", descripcio=" . $this->descripcio . ", dataLímit=" . $this->dataLímit . ", estat=" . $this->estat . '}';
    }

    public function setEstat(String $estat): void
    {
        $this->estat = $estat;
    }

    public function getTitol(): String
    {
        return $this->titol;
    }

    public function getDescripcio(): String
    {
        return $this->descripcio;
    }

    public function getDataLímit(): Date
    {
        return $this->dataLímit;
    }

    public function getEstat(): String
    {
        return $this->estat;
    }
}
