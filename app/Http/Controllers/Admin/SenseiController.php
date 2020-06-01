<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Sensei;
use \Helper\Constants;
use Config;
use Illuminate\Http\Request;
use Input;
use App\Traits\Sensei\SenseiAction;


use Exception;

class SenseiController extends Controller
{
    use SenseiAction;
    /*
    |--------------------------------------------------------------------------
    | Sensei Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    | 
    */
    public function index()
    {
        return view("admin/sensei/list");
    }


    /** 
    * Get list for all mentors(sensei's) 
    *
    */
    public function getListMentors(){

        try {
            // Get all sensei's
            $users = config('comman.table_modal.senseis')::get();

            return json_decode($users);
        } catch (Exception $e) {
            throw new Exception(GET_SENSEI_ERROR_MSG, INTERNAL_ERROR_CODE);
        }
    } //End function

    /** 
    * Sync all mentor's from third party api(Zoom) with local DB 
    *
    */
    public function syncSenseisToDB()
    {
        try {
            // Get all sensei's from zoom api
            $senseis = $this->getAllSenseisFromZoom();

            // Sync with our local DB
            $senseis = $this->syncSenseisWithLocalDB($senseis);

            // Get from local DB
            $users = config('comman.table_modal.senseis')::get();

            return json_decode($users);
        } catch (Exception $e) {
            throw new Exception(SYNC_DB_ERROR_MSG, INTERNAL_ERROR_CODE);    
        }
    } //End function


    /** 
    * Truncate table
    *
    */
    public function truncateTable()
    {
        try {
            $truncate = config('comman.table_modal.senseis')::truncate();
            if($truncate) {
                return TRUNCATE_SUCCESS_MSG;
            }
        } catch (Exception $e) {
            throw new Exception(TRUNCATE_ERROR_MSG, INTERNAL_ERROR_CODE);
        }
    } //End function



    public function getSenseiById($id)
    {
        try {
            $senseiObj = $this->getSenseiObjById($id);

            return view("admin/sensei/details", ['senseiObj' => $senseiObj]);
        } catch (Exception $e) {
            
        }
    } //End function


    public function updateProfile(Request $request)
    {
        try {
           $isUpdated = $this->updateSingleSensei($request);
           if($isUpdated) {
                return redirect()->back()->with('message', 'Successfully updated profile');
           }

        return $name;
        } catch (Exception $e) {
            
        }
    } //End function

}
