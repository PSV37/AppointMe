<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Sensei;
// use App\Http\Helper\Constants;
use Config;
use Illuminate\Http\Request;
use Input;
use App\Traits\Role\RoleAction;



use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleController extends Controller
{
    use RoleAction;
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
        return view("admin/role/list");
    }


    /** 
    * Get list for all mentors(sensei's) 
    *
    */
    public function getRolesList(){

        try {
            // Get all sensei's
            $users = config('comman.table_modal.roles')::get();

            return json_decode($users);
        } catch (Exception $e) {
            // throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
            throw new Exception('Somthing error', 500);
        }
    } //End function

    public function getRoleObj($id)
    {
        try {
            $roleObj = $this->getRoleById($id);
            
            return json_encode($roleObj);
        } catch (Exception $e) {
            // throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
            throw new Exception('Somthing error', 500);
        }
    } // End function

    /** 
    * Update role obj 
    *
    */
    public function editRole(Request $request)
    {
        try {
            // Update role object
            $roleObj = $this->updateRoleObj($request);

           return response()->json(['msg' => $request->name .' Role updated', 'status' => true]);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), 500);
        }
    } // End Function

    /** 
    * Update role obj 
    *
    */
    public function removeRole(Request $request)
    {
        try {

            // Update role object
            $roleObj = $this->deleteRoleObj($request);
            
            return json_encode($roleObj);
        } catch (Exception $e) {
            // throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
            throw new Exception('Somthing error', 500);
        }
    } // End Function

    /** 
    * Update role obj 
    *
    */
    public function createRole(Request $request)
    {
        try {
            // return $request->input('name');
            // Update role object
            $roleObj = $this->createRoleObj($request);
            
            if($roleObj) {
                return response()->json(['msg' => $request->name .' Role Created', 'status' => true]);
            }
        } catch (Exception $e) {
            // throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
            throw new Exception('Somthing error', 500);
        }
    } // End Function


    

}
