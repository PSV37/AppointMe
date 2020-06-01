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

class UserController extends Controller
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
        return view("admin/user/list");
    }


    /** 
    * Get list for all mentors(sensei's) 
    *
    */
    public function getUsersList(){

        try {
            // Get all sensei's
            $users = config('comman.table_modal.users')::get();

            return json_decode($users);
        } catch (Exception $e) {
            throw new Exception(GET_SENSEI_ERROR_MSG, INTERNAL_ERROR_CODE);
        }
    } //End function


    /** 
    * Update role obj 
    *
    */
    public function editUser(Request $request)
    {
        try {
            // $id = $request->id;
            // $role_name = $request->role_name;
            // $display_name = $request->display_name;

            // Update role object
            $userObj = $this->updateUserObj($request);
            
            return json_encode($userObj);
        } catch (Exception $e) {
            throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
        }
    } // End Function

    /** 
    * Update role obj 
    *
    */
    public function removeUser(Request $request)
    {
        try {
            // $id = $request->id;
            // $role_name = $request->role_name;
            // $display_name = $request->display_name;

            // Update role object
            $roleObj = $this->deleteUserObj($request);
            
            return json_encode($roleObj);
        } catch (Exception $e) {
            throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
        }
    } // End Function
}
