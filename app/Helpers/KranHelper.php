<?php
namespace App\Helpers;

use Image;
use Mail;
use App;
use GuzzleHttp\Client;
use Route;

class KranHelper
{

    public static function gen_uuid()
    {
        return sprintf('%04x%04x%04x%04x%04x%04x%04x%04x', // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), // 16 bits for "time_mid"
            mt_rand(0, 0xffff), // 16 bits for "time_hi_and_version", // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000, // 16 bits, 8 bits for "clk_seq_hi_res", // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000, // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

    public static function base64_to_jpeg($base64_string)
    {
        $output_file = static::createTempFile('png');
        $data = explode(',', $base64_string);
        if (isset($data[1])) {
            $ifp = fopen($output_file, "wb");
            fwrite($ifp, base64_decode($data[1]));
            fclose($ifp);
        }
        return $output_file;
    }

    public static function format_hours($hour) {
        if($hour) {
            $hour = rtrim($hour, "00");
            $hour = ltrim($hour, 0);

            if(substr($hour, -1) == ",") {
                $hour = substr_replace($hour ,"",-1);
            }
        }
        return $hour;
    }


    // format date to norway format
    public static function formatDate($date,$format = 'd.m.Y') {
        if($date) {
            $date = new \DateTime($date);
            return $date->format($format);
        }else{
            $date = new \DateTime();
            return $date->format($format);
        }
    }

    // To set the string limit
   public static function reviewStringLimit($row) {
        return substr($row['reviews'],0,20). '...';
    }

    //
    public static function getProviderStatus($row) {
      $row_status = $row['status'] ? $row['status'] : '1';
      $status = ['1' => 'Under Review','2'=> 'Approved', '3' => 'Rejected'];
      return $status[$row_status];
    }

    // Date time format
    public static function dateTime($date = false) {
        return ($date) ? date('d/m/Y, h.i a', strtotime($date)) : date('d/m/Y h:i:s');
    }

    // Date time format
    public static function dateTimeFormat($date = false) {
        return ($date['registered_on']) ? date('d/m/Y, h.i a', strtotime($date['registered_on'])) : date('d/m/Y, h.i a');
    }

	 // To get all the the provider status for dropdown
    public static function getProviderStatusDropdown() {
      $status = ['1' => 'Under Review','2'=> 'Approved', '3' => 'Rejected'];
      return $status;
    }

    //Returns the time in 12 Hours Format in dropdown
    public static function getTimeDropDown($start=FALSE, $end=FALSE){
      $start_time = ($start) ? $start : '8';
      $end_time = ($end) ? $end : '21';
      for($hours=$start_time; $hours<$end_time; $hours++){
      //  for($mins=0; $mins<60; $mins+=30){
          //echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).'</option>';
          if($hours<12){
              $time = $hours.' AM';
          }else if($hours==12){
              $time = '12 PM';
          }else{
            $time = $hours - 12 .' PM';
          }

          $result[$hours] = $time;
        //}
      }
      return $result;
    }

    //Returns the weekdays
    public static function getAllWeekDays($start=FALSE, $end=FALSE){
      $dayNames = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];
        return $dayNames;
    }

    public static function convertString($str){
      return str_replace(' ', '-', strtolower($str));
    }
	
	/**
	* To convert the base64 encrypted string to image
	*
	* @param string $imageString
	* @param string $imageName
	* @return string 
	*/
	public static function convertStringToImage($imageString,$imageName){
		$imageData = base64_decode($imageString);
        $photo = imagecreatefromstring($imageData);
		$dateval = date('Ymdhis');
        if ($photo) {
			$file = $imageName.  '-' . $dateval . '.jpg';
            $path = base_path() . "/uploads/user/"; //file upload path
            //$data['profile_picture'] = $path . $imageName. '-' . $dateval . '.jpg';
            if (!is_dir($path)) {
                @mkdir($path);
            }
            if (imagejpeg($photo, $path . $file, 100)) {
				return $file;
            } else {
				return '';
			}
		}
            
	}
	
	/**
	 * To get the active menu
	 */
	public static function getActiveMenu($urlList){
		$currentUrl = explode('/',Route::getFacadeRoot()->current()->uri());
		$urlList = $urlList;
		$activeMenu = (in_array($currentUrl[0],$urlList)) ? 'active' : '' ;
		return $activeMenu;
	}
	
	/**
	 * To get the active sub menu
	 */
	public static function getActiveSubMenu($urlList){
		$currentUrl = Route::getFacadeRoot()->current()->uri();
		$activeMenu = ($currentUrl == $urlList) ? 'active' : '' ;
		return $activeMenu;
	}
	
	/**
	 * To get the active sub settings menu
	 */
	public static function getActiveSubMenuDefault($urlList){
		$currentUrl = explode('/',Route::getFacadeRoot()->current()->uri());
		$activeMenu = ($currentUrl[0] == $urlList) ? 'active' : '' ;
		return $activeMenu;
	}
	
	
}
