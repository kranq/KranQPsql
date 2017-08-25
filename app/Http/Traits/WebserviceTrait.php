<?php
namespace App\Http\Traits;

trait WebserviceTrait {
	
	/**
	 * To get the registration mode 
	 *
	 * @param string $registerMode
	 * @return int
	 */
    public function getRegisterMode($registerMode) {
		$registerMode = ($registerMode) ? $registerMode : '';
        // Get all the register modes list
        $registerModeList = $this->registerModesList();
        return $registerModeList[$registerMode];
    }
	
	/**
	 * To return the list of register modes
	 *
	 * @return array 
	 */
	public function registerModesList(){
		$registerModes = array(
							''=>'0',
							'Email'=>'1',
							'Facebook'=>'2',
							'G+'=>'3',
						);
		return $registerModes;
	}
}