<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:report.index')->only('index');
        
    }
    public function index()
    {
        $totalincidences=0;
        $totalincidences=$this->totalincidences();

        $totalstatus=0;

        $totalstatus=$this->totalincidencesstatus();
        $totalstatusopen=0;
        $totalstatusopen=$this->totalopenstatus();
        $reporte="";
        $report=$this->reporte($reporte);
        $data="";
        $data=$this->reportcategories();

        return view('incidence.report.index',compact('totalincidences','totalstatus','totalstatusopen'),$report+$data);
    }


    public function totalincidences(){

        $mes = Carbon::now('America/Lima')->format('m');
        $year = Carbon::now('America/Lima')->format('Y');
        $totalincidences = Incidence::whereMonth(('incidences.fechareporte'),'=',$mes)->whereYear(('incidences.fechareporte'),'=',$year)->get()->count();

        return  $totalincidences;

    }
    public function totalincidencesstatus(){

        $mes = Carbon::now('America/Lima')->format('m');
        $year = Carbon::now('America/Lima')->format('Y');
        $totalstatus= Incidence::where('status','CERRADO')->whereMonth(('incidences.fechareporte'),'=',$mes)->whereYear(('incidences.fechareporte'),'=',$year)->get()->count();

        return  $totalstatus;

    }
    public function totalopenstatus(){

        $mes = Carbon::now('America/Lima')->format('m');
        $year = Carbon::now('America/Lima')->format('Y');
        $totalstatusopen= Incidence::where('status','ABIERTO')->whereMonth(('incidences.fechareporte'),'=',$mes)->whereYear(('incidences.fechareporte'),'=',$year)->get()->count();

        return  $totalstatusopen;

    }

    public function reporte(){

        $year = Carbon::now('America/Lima')->format('Y');

        // $salesByMonths = DB::select(
        //     DB::raw(" SELECT coalesce(total,0) as total FROM (SELECT 'january' AS month UNION SELECT 'february' 
        //     AS month UNION SELECT 'march' AS month UNION SELECT 'april' AS month UNION SELECT 'may' AS month UNION SELECT 'june'
        //      AS month UNION SELECT 'july' AS month UNION SELECT 'august' AS month UNION SELECT 'september' AS month UNION SELECT 'october'
        //       AS month UNION SELECT 'november' AS month UNION SELECT 'december' AS month ) m LEFT JOIN (SELECT MONTHNAME(fechareporte) AS MONTH,
        //        COUNT(*) AS incidences, COUNT(incidences.id) AS total FROM incidences WHERE year(fechareporte)= 2022 GROUP BY MONTHNAME(fechareporte),
        //        MONTH(fechareporte) ORDER BY MONTH(fechareporte)) c ON m.MONTH =c.MONTH;
        //     ")
        // );

        $salesByMonths = DB::select('CALL spreport(?)',array($year));

        $report=[];
        foreach($salesByMonths as $salesByMonth){
                 
                $report['label'][] = $salesByMonth->mes;

                $report['report'][] = $salesByMonth->cantidad;

          }

         $report['report'] = json_encode($report);

         $reporte=$report;

         return $reporte;
    }

    public function reportcategories(){
        $getyearmonth = Carbon::now('America/Lima')->format('Y-m');


        $categories= DB::select('call spcategoriesmes(?)',array($getyearmonth));
        

        $data=[];
        foreach($categories as $category){
                 
               $data['label'][] = $category->estado;

               $data['data'][] = $category->cantidad;

        }

        $data['data'] = json_encode($data);


        return $data;
    }



    
   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
