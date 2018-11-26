<?php

namespace App\Http\Controllers;

use App\Appuser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\Admin\Request\UserRequest;

class UsersController extends Controller
{

    public function __construct()
    {

        view()->share('users_edit', 'user_edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $appuser = Appuser::with('application')->where('appusers.id', $id)->first();
        
        return view('Users.edit', ['appuser' => $appuser]);

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

        $appuser = Appuser::where('id', $id)->update(

            array(

                'country'                   => $request->get('country'),
                'device_type'               => $request->get('device_type'),
                'os_version'                => $request->get('os_version'),
                'app_version'               => $request->get('app_version'),
                'is_full_access'            => ($request->get('is_full_access')) ? 1 : 0,
                'purchase_ads'              => ($request->get('purchase_ads')) ? 1 : 0,
                'is_purchase_watermark'     => ($request->get('is_purchase_watermark')) ? 1 : 0,
                'is_purchase_unlimited'     => ($request->get('is_purchase_unlimited')) ? 1 : 0,
                'is_purchase_subscription'  => ($request->get('is_purchase_subscription')) ? 1 : 0,
                'last_date_of_subscription' => $request->get('last_date_of_subscription'),

            ));

        if($appuser)
        {
             \Toastr::success('Users Updated Successfully');
            return redirect(route('home'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Appuser::find($id)->delete();

        if ($delete == true) 
        {
            \Toastr::success('Users Deleted Successfully');
            return back();
        }
    }
}
