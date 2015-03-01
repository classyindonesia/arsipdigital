<?php namespace App\Http\ViewComposers\Frontend;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use \App\Models\Mst\Hit;

class StatistikComposer {


  
    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct() {
     }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view){

        $jml_pengunjung = Hit::distinct()->select(\DB::raw('DISTINCT(_token)'))->get();
        $pengunjung_hr_ini = Hit::distinct()
            ->select(\DB::raw('DISTINCT(_token)'))
            ->where('tgl', '=', date('Y-m-d'))
            ->get();
        $pengunjung_online = Hit::distinct()
            ->select(\DB::raw('DISTINCT(_token)'))
            ->where('timevisit', '>', time() - 200 )
            ->get();
        $hits_hr_ini = Hit::where('tgl', '=', date('Y-m-d'))->count();



         $view->with('jml_total', Hit::count()); 
         $view->with('jml_pengunjung', count($jml_pengunjung)); 
         $view->with('pengunjung_hr_ini', count($pengunjung_hr_ini)); 
         $view->with('pengunjung_online', count($pengunjung_online)); 
         $view->with('hits_hr_ini', $hits_hr_ini); 


    }

}