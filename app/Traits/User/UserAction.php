<?php
 
namespace App\Traits\Role;

use App\Sensei;
use Config;
use Exception; 
use Hash;

trait UserAction {
 
    /** 
    * Get role by id
    *
    */
	public function getRoleById($id)
	{
		$objReturnVal=null;
		try {
			$userObj = config('comman.table_modal.users')::where('id', $id)->first();

			$objReturnVal = $userObj;
		} catch (Exception $e) {
			$objReturnVal=null;
			throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
		}

		return $objReturnVal;
	} // End function

    /** 
    * Update role by id
    *
    */
	public function updateUserObj($request)
	{
		$objReturnVal=false;
		try {
			$user = config('comman.table_modal.users')::find($request->id);
			if(isset($request->password)) {
				$user->password = Hash::make($request->password);
			}

			$user->name = $request->name;
			$user->email = $request->email;
			$user->org_id = $request->org_id;
			$user->role_id = $request->role_id;
			$user->status = $request->status;
			$user->save();

			if($user) {
				$objReturnVal = true;
			}
			// $objReturnVal = $userObj;
		} catch (Exception $e) {
			$objReturnVal=false;
			throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
		}

		return $objReturnVal;
	} // End function
	

    /** 
    * Update role by id
    *
    */
	public function deleteUserObj($request)
	{
		$objReturnVal=false;
		try {
			$roleObj = config('comman.table_modal.users')::where('id', $request->id)->delete();

			if($roleObj) {
				$objReturnVal = true;
			}
			// $objReturnVal = $roleObj;
		} catch (Exception $e) {
			$objReturnVal=false;
			throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
		}

		return $objReturnVal;
	} // End function

}