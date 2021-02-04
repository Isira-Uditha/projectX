<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userData;
use App\Models\salary;
use DB;


class FrontEndController extends Controller
{
    public function insertData(Request $request){

        //dd($request->all());
        $user = new userData;
        $salary = new salary;

        $user->userName = $request->c_name;
        $user->address = $request->c_address;
        $user->contact = $request->c_contact;
        $user->email = $request->c_email;

        $user->save();

        $salary->u_ID = $user->userID;
        if( $request->c_salary != null){
            $salary->salary = $request->c_salary;
        }else{
            $salary->salary = 0;
        }

        
        $salary->save();


        return redirect()->back();

    }

    public function viewData($id){

        /*$data = DB::table('user_data')
        ->select('userID','userName','address','contact','email')->where('userID',$id)
        ->first();*/

        $data = DB::table('user_data')
        ->join('salaries','u_ID','userID')
        ->select('user_data.userID','user_data.userName','user_data.address','user_data.contact','user_data.email','salaries.salary')->where('userID',$id)
        ->first();

        return view('/View',compact('data'));

    }

    public function updateViewData($id){

        /*$data = DB::table('user_data')
        ->select('userID','userName','address','contact','email')->where('userID',$id)
        ->first();*/

        $data = DB::table('user_data')
        ->join('salaries','u_ID','userID')
        ->select('user_data.userID','user_data.userName','user_data.address','user_data.contact','user_data.email','salaries.salary')->where('userID',$id)
        ->first();

        return view('/Update',compact('data'));

    }

    public function updateData(Request $request){


        $uID = $request->c_id;
        $uName = $request->c_name;
        $uAddress = $request->c_address;
        $uContact = $request->c_contact;
        $uEmail = $request->c_email;
        $uSalary = $request->c_salary;

        $data = userData::find($uID);
        $salary = salary::find($uID);
        $data->userName = $uName;
        $data->address = $uAddress;
        $data->contact = $uContact;
        $data->email = $uEmail;
        $salary->salary = $uSalary;

        $data->save();
        $salary->save();

        return redirect("/home");

    }

    public function deleteData($id){

        $data = userData::find($id);
        $data->delete();


        return redirect("/home");

    }
}
