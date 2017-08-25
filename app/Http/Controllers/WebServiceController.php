<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\User;
use App\Models\CmsPages;
use App\Helpers\KranHelper;
use App\Http\Traits\WebserviceTrait;

class WebServiceController extends Controller
{
	use WebserviceTrait;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
	 	$this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
        $this->middleware('auth', ['except' => ['index','register','getCms']]);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
		return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	/**
	 * To register the user from the mobile end
	 *
	 * @param array
	 * @return array
	 */
	public function register(Request $request)
    {
		try{
			$data = $request->all();
			if($data){
				if($data['fullname'] && $data['mobile'] && $data['email'] && $data['password'] && $data['status']){
					$emailExists = User::get()->where('email',$data['email'])->count();
					if($emailExists == 0){
						$data['password'] = bcrypt($data['password']);
						$data['register_mode'] = $this->getRegisterMode($data['register_mode']);
						$data['been_there_status'] = ($data['been_there_status']=='Yes') ? 1 : 2;
						$data['registered_on'] = date('Y-m-d H:i:s');
						
						if(isset($data['profile_picture'])){
							$data['profile_picture'] = KranHelper::convertStringToImage($data['profile_picture'],$data['fullname']);
						} else {
							$data['profile_picture'] = '';
						}
						$registerStatus = User::create($data);
						if($registerStatus){
							$resultData = array('status'=>true,'message'=>'registered successfully','result'=>$registerStatus);	
						} else {
							$resultData = array('status'=>false,'message'=>'registration failed','result'=>$registerStatus);
						}
					} else {
						$resultData = array('status'=>false,'message'=>'Email exists already','result'=>'');
					}
				} else {
					$resultData = array('status'=>false,'message'=>'Invalid Input','result'=>'');
				}
				
			} else {
				$resultData = array('status'=>false,'message'=>'invalid request','result'=>'');
			}
		} catch(Exception $e){
			$resultData = array('status'=>false,'message'=>'invalid request','result'=>'');
		}
		return $resultData;
    }
	
	/**
	 * To get the CMS data by seo id (slug)
	 *
	 * @param string $slug
	 * @return array
	 */
	public function getCms($slug){
		try{
			if($slug){
				$cmsData = CmsPages::get()->where('slug',$slug);
				$cmsData = $cmsData->toArray();
				if($cmsData){
					$resultData = array('status'=>true,'message'=>'request success','result'=>$cmsData);
				} else {
					$resultData = array('status'=>false,'message'=>'invalid slug','result'=>'');
				}
			} else {
				$resultData = array('status'=>false,'message'=>'invalid request','result'=>'');
			}
		} catch(Exception $e){
			$resultData = array('status'=>false,'message'=>'invalid request','result'=>'');
		}
		return $resultData;
	}
}
