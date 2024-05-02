<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Exception;
class GestordeTasques extends Model
{

    private array $tasques;

    public function __construct() {
        $this->tasques = [];
    }

    /**
     * Funció que afegeix una tasca al gestor de tasques
     * @param String $titol
     * @param String $descripcio
     * @param Date $dataLímit
     * @param String $estat
     * @return void
     */
    public function afegirTasca(String $titol, String $descripcio, Date $dataLímit, String $estat) {
        $tasca = new Tasca($titol, $descripcio, $dataLímit, $estat);
        $this->tasques[] = $tasca;
    }

    /**
     * Funció que elimina una tasca del gestor de tasques
     * @param String $titol
     * @throws Exception
     * @return void
     */
    public function eliminarTasca(String $titol) {
        $isDeleted = false;
        foreach ($this->tasques as $key => $tasca) {
            if (strtolower($tasca->getTitol()) == $titol) {
                unset($this->tasques[$key]);
                $idDeleted = true;
            }
        }
        if ($isDeleted) {
            throw new Exception("No s'ha trobat la tasca amb el títol $titol");
        }
    }

    /**
     * Funció que actualitza l'estat d'una tasca del gestor de tasques
     * @param String $titol
     * @param String $estat
     * @return void
     */
    public function actualitzarEstatTasca(String $titol, String $estat) {
        foreach ($this->tasques as $key => $tasca) {
            if ($tasca->getTitol() == $titol) {
                $tasca->setEstat($estat);
            }
        }
    }

    /**
     * Funció que llista totes les tasques del gestor de tasques
     * @return array
     */
    public function llistarTasques(): array {
        return $this->tasques;
    }
}