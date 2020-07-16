<?php

namespace App\Services;

use App\Models\Statistic;
use App\Models\Country;
use App\Models\User;
use App\Models\Service;
use Carbon\Carbon;
use DB;
use Config;

/**
 * =============================================================================
 * Service class with static methods for dashboard statistics.
 * It gets a user IP address from $_SESSION global object and
 * returns user location attributes (by doing request to external service)
 * =============================================================================
 * 
 * @author Kishan Busa
 * @since 2020
 */

class StatisticsService {
    
    public static function stat($ip) {
        if(!empty($ip)){
            try {
                $location = self::locationQuery($ip);
                /**
                 * Set cookie to 1 month
                 */
                setcookie("Vstatistics", 1, time() +  (86400 * 30));  // 86400 = 1 day

                try {
                    if ($location) {
                        self::createEntity($location);
                    }
                }catch (Exception $ex) {}
            } catch (Exception $ex) {
                echo 'Caught exception: ',  $ex->getMessage(), "\n";
            }
        }
      
        return $location;
    }
    
    public static function locationQuery($ip) {

        $location_url = env("LOCATION_ACCESS_URL");
        $location_key = env("LOCATION_ACCESS_KEY");
        $url          = $location_url.'/'.$ip.'?access_key='.$location_key; 
        $ch = curl_init();
        $timeout = 1; // set timeout to 1 second

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $result = curl_exec($ch);
        curl_close($ch);
        
        $result = json_decode($result, true);
       return $result;
    }
    
    public static function createEntity($location) {
        Statistic::create($location);
    }
    
    public static function getStatisticsPerMonth() {
        $currentMonth = date('n');
        $from = date('n', strtotime('-5 month'));
        $entities = Statistic::whereBetween(\DB::raw('MONTH(created_at)'), [$from, $currentMonth])->orderBy('created_at', 'DESC')->get();
        
        $statistics = array();
        foreach ($entities as $entity) {
            $month = $entity->created_at->format('F');
            $statistics[$month][] = $entity->id;
        }
        
        $str = '[';
        foreach ($statistics as $k => $v) {
            $str .= '["'.$k.'", '.count($v).'], ';
        }
        $str .= ']';
        
        return $str;
     }
     
     public static function getLastMonthVisitsCount(){
        $currentMonth = date('n');
        $from = date('n', strtotime('-5 month'));
        $entitiesCount = Statistic::whereBetween(\DB::raw('MONTH(created_at)'), [$from, $currentMonth])->whereMonth('created_at', '=', date('n'))->count();

        return $entitiesCount;
    }

    public static function getLastDayVisitsCount(){
        $currentMonth = date('n');
        $from = date('n', strtotime('-5 month'));
        $entitiesCount = Statistic::whereDate('created_at', '=', Carbon::today()->toDateString())->count();

        return $entitiesCount;
    }
    
    public static function getUniqueIpAddresses(){
        $currentMonth = date('n');
        $from = date('n', strtotime('-5 month'));
        $entitiesCount = Statistic::whereBetween(\DB::raw('MONTH(created_at)'), [$from, $currentMonth])->groupBy('ip')->get()->count();
        
        return $entitiesCount;
    }
    
    public static function getAllCount(){
        $currentMonth = date('n');
        $from = date('n', strtotime('-5 month'));
        $entitiesCount = Statistic::whereBetween(\DB::raw('MONTH(created_at)'), [$from, $currentMonth])->get()->count();
        
        return $entitiesCount;
    }
    
    /**
     * Remove all old entities in DB statistics table where created_at field is before 6 months
     */
    public static function removeOldEntities() {
        $from = date('Y-m-d H:i:s', strtotime('-5 month'));
        $deleteStatus = Statistic::whereDate(\DB::raw('created_at'), '<', $from)->delete();
        return $deleteStatus;
    }

    public static function getMonthName() {

        $months = array(
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul ', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
        );

        return implode(',', $months);

    }

    public static function getMonthData() {
        
        $statistics = Statistic::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

        $statisticmcount = [];
        $statisticArr = [];

        foreach ($statistics as $key => $value) {
            $statisticmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++) {
            if(!empty($statisticmcount[$i])){
                $statisticArr[$i] = $statisticmcount[$i];    
            }else{
                $statisticArr[$i] = 0;    
            }
        }
        
        return implode(',', $statisticArr);
    }

    public static function getMaxY() {

        $data = self::getMonthData();

        $sum = array_sum( explode( ',', $data ) );
        //dd($sum);
        $getMaxY = $sum + 0.1 ;

        return $getMaxY;

    }

    public static function getCountryCount() {

        return Country::get()->count();
    }

    public static function getAdminCount() {
        return User::where('role',Config::get('constants.ROLES.ADMIN'))->get()->count();
    }

    public static function getProcessorCount() {
        return User::where('role',Config::get('constants.ROLES.PROCESSOR'))->get()->count();
    }

    public static function getAgentCount() {
        return User::where('role',Config::get('constants.ROLES.AGENT'))->get()->count();
        return User::get()->count();
    }

     public static function getClientCount() {
        return User::where('role',Config::get('constants.ROLES.CLIENT'))->get()->count();
        return User::get()->count();
    }

     public static function getServiceCount() {
        return Service::get()->count();
    }

     
//    public static function getMostPopularCities(){
//        $currentMonth = date('n');
//        $from = date('n', strtotime('-5 month'));
//        $entities = Statistic::whereBetween(\DB::raw('MONTH(created_at)'), [$from, $currentMonth])->orderBy('city')->get(['city']);
//        
//        dd($entities);
//        
//    }
    
}
