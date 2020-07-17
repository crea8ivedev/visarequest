<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Statistic;
use App\Services\StatisticsService;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = '   ';

        $statistics['perMonth']             = StatisticsService::getStatisticsPerMonth();
        $statistics['lastMonthCount']       = StatisticsService::getLastMonthVisitsCount();
        $statistics['lastDayCount']         = StatisticsService::getLastDayVisitsCount();
        $statistics['all']                  = StatisticsService::getAllCount();
        $statistics['uniqueIpAddresses']    = StatisticsService::getUniqueIpAddresses();
        $statistics['getMonthName']         = StatisticsService::getMonthName();
        $statistics['getMonthData']         = StatisticsService::getMonthData();
        $statistics['getMaxY']              = StatisticsService::getMaxY();
        $statistics['countryCount']         = StatisticsService::getCountryCount();
        $statistics['adminCount']           = StatisticsService::getAdminCount();
        $statistics['processorCount']       = StatisticsService::getProcessorCount();
        $statistics['agentCount']           = StatisticsService::getAgentCount();
        $statistics['clientCount']          = StatisticsService::getClientCount();
        $statistics['serviceCount']         = StatisticsService::getServiceCount();
        //$statistics['applicationCount']     = StatisticsService::getApplicationCount();

        return view('backend.admin.dashboard', compact('page_title', 'page_description' ,'statistics'));
    }

    /**
     * Show the application visitor.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistic(Request $request) {

        if($request->ajax())
        {
            $currentMonth = date('n');
            $from = date('n', strtotime('-5 month'));
            $data = Statistic::whereBetween(\DB::raw('MONTH(created_at)'), [$from, $currentMonth])->orderBy('created_at', 'DESC')->get();

            return DataTables::of($data)
                    ->editColumn('date', function($data) {
                        $date = $data->created_at;    
                       return '<span class="text-info font-weight-bolder d-block">
                                '. date('d-M-Y h:i A', strtotime($date)) .' </span>';
                    })
                    ->rawColumns(['date'])
                    ->make(true);
        }

        return view('admin.dashboard', compact('statistics'));
    }
}
