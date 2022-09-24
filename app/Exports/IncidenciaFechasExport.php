<?php

namespace App\Exports;

use App\Models\Incidence;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IncidenciaFechasExport implements FromView,ShouldAutoSize
{
    
    protected $fechainicial,$fechaterminal,$incidences;
    public function __construct($fechainicial,$fechaterminal,$incidences)
    {


         $this->fechainicial= $fechainicial;
         $this->fechainicial = $fechaterminal;
         $this->incidences = $incidences;

   }
   public function view() :View
     {
         $incidences = $this->incidences;
         return view('incidence.excel.export', compact('incidences')); 
     
     }
}
