<?php
 
namespace App\Traits\Role;

use App\Sensei;
use Config;
use Exception; 
use App\Http\Helper\Constants;
use App\Http\Helper;

trait RoleAction {
 
    /** 
    * Get role by id
    *
    */
	public function getRoleById($id)
	{
		$objReturnVal=null;
		try {
			$roleObj = config('comman.table_modal.roles')::where('id', $id)->first();

			$objReturnVal = $roleObj;
		} catch (Exception $e) {
			$objReturnVal=null;
			// throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
			throw new Exception('Somthing error', 500);
		}

		return $objReturnVal;
	} // End function

    /** 
    * Update role by id
    *
    */
	public function updateRoleObj($request)
	{
		$objReturnVal=false;
		try {
			$roleObj = config('comman.table_modal.roles')::where('id', $request->input('id'))->update([
				'display_name' => $request->input('name'),
			]);

			if($roleObj) {
				$objReturnVal = true;
			}
			// $objReturnVal = $roleObj;
		} catch (Exception $e) {
			$objReturnVal=false;
			// throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
			throw new Exception($e->getMessage(), INTERNAL_ERROR_CODE);
		}

		return $objReturnVal;
	} // End function
	

    /** 
    * Update role by id
    *
    */
	public function deleteRoleObj($request)
	{
		$objReturnVal=false;
		try {
			$roleObj = config('comman.table_modal.roles')::where('id', $id)->delete();

			if($roleObj) {
				$objReturnVal = true;
			}
			// $objReturnVal = $roleObj;
		} catch (Exception $e) {
			$objReturnVal=false;
			// throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
			throw new Exception('Somthing error', 500);
		}

		return $objReturnVal;
	} // End function


    /** 
    * Update role by id
    *
    */
	public function createRoleObj($request)
	{
		$objReturnVal=false;
		try {
			$roleObj = config('comman.table_modal.roles')::create([
				'name' =>$request->input('name'),
				'display_name' => $request->input('dname')
			]);

			if($roleObj) {
				$objReturnVal = true;
			}
			// $objReturnVal = $roleObj;
		} catch (Exception $e) {
			$objReturnVal=false;
			// throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
			throw new Exception($e->getMessage(), INTERNAL_ERROR_CODE);
		}

		return $objReturnVal;
	} // End function
	

}