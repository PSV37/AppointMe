<?php
 
namespace App\Traits\Sensei;

use App\Sensei;
use Config;
use Exception; 


trait SenseiAction {
 
    /** 
    * Get all sensei's from zoom api
    *
    */
    public function getAllSenseisFromZoom() 
    {
    	$objReturnVal = [];
 		try {
            $authToken = \Config('constant.jwt_token'); 

            // Call third party api for get all mentors
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => ZOOM_URL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer ".$authToken,
                    "content-type: application/json"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            $objReturnVal = json_decode($response)->users;
 		} catch (Exception $e) {
 			$objReturnVal=[];
 			throw new Exception(ZOOM_API_FETCH_ERROR_MSG, INTERNAL_ERROR_CODE);
 		}

 		return $objReturnVal;
    } // End Function

    /** 
    * Sync sensei's with local DB
    *
    */
    public function syncSenseisWithLocalDB($senseis)
    {
    	$objReturnVal = false;
    	try {
              // Sync with our local DB
            foreach ($senseis as $key => $sensei) {
                $newUser = config('comman.table_modal.senseis')::updateOrCreate([
                    'first_name' => $sensei->first_name,
                    'last_name' => $sensei->last_name,
                    'pic_url'   => (isset($sensei->pic_url) && $sensei->pic_url!='') ? $sensei->pic_url : DEFAULT_PIC_URL,
                    'm_id'      =>  $sensei->id,
                    'email'     =>  $sensei->email,
                    'phone_number' =>  (isset($sensei->phone_number) && $sensei->phone_number!='') ? $sensei->phone_number : null,
                    'dept'       =>  $sensei->dept,
                    'status'     =>  $sensei->status,
                ],[
                    'first_name' => $sensei->first_name,
                    'last_name' => $sensei->last_name,
                    'pic_url'   => (isset($sensei->pic_url) && $sensei->pic_url!='') ? $sensei->pic_url : DEFAULT_PIC_URL,
                    'm_id'      =>  $sensei->id,
                    'email'     =>  $sensei->email,
                    'phone_number' =>  (isset($sensei->phone_number) && $sensei->phone_number!='') ? $sensei->phone_number : null,
                    'dept'       =>  $sensei->dept,
                    'status'     =>  $sensei->status,
                ]);
            }

            $objReturnVal=true;
 		} catch (Exception $e) {
 			$objReturnVal=false;
 			throw new Exception(SYNC_DB_ERROR_MSG, INTERNAL_ERROR_CODE);
 		}

 		return $objReturnVal;
    } // End Function


    public function getSenseiObjById($id)
    {
    	$objReturnVal=null;
    	try {
    		$senseiObj = config('comman.table_modal.senseis')::where('m_id', $id)->first();

    		 return $senseiObj;
 		} catch (Exception $e) {
 			$objReturnVal=false;
 			throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
 		}
    }
 

    public function updateSingleSensei($request)
    {
    	$objReturnVal=null;
    	try {

			$fname = $request->first_name;
			$lname = $request->last_name;
			$email = $request->email;
			$phone_number = $request->phone_number;
			$dept = $request->dept;
			$bio = $request->bio;
			$status = $request->status;
			$m_id = $request->m_id;

    		$senseiObj = config('comman.table_modal.senseis')::where('m_id', $m_id)->update([
    			'first_name' => $fname,
    			'last_name'  => $lname,
    			'email'      => $email,
    			'phone_number' => $phone_number,
    			'status'	=> ($status=='active') ? $status : 'in-active',
    			'bio'		=>$bio,
    		]);

    		 $objReturnVal = $senseiObj;
 		} catch (Exception $e) {
 			$objReturnVal=false;
 			throw new Exception(COMMAON_ERROR_MSG, INTERNAL_ERROR_CODE);
 		}

 		return $objReturnVal;
    }
}