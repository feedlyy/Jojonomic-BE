<?php


namespace App\Http\Controllers;

use App\Cd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{

    public function index ()
    {
        $Cd = Cd::query()->simplePaginate(5);
        return response()->json(['Success' => $Cd], 200);
    }

    public function store (Request $request)
    {
        if ($request->user()->can('owner')) { // validation user login
            $request = $request->all();
            $cds = new Cd;
            $validate = Validator::make($request, $cds->rules);
//        validate incoming form request
            if ($validate->fails()) {
                return response()->json($validate->failed(), 422);
            }

            $cds = Cd::create($request);

            return response()->json(['Cd Created' => $cds], 200);
        } else {
            return response()->json(['Error' => 'Only owner that able to access this url'], 401);
        }

    }

    public function update (Request $request, $id)
    {
        if ($request->user()->can('owner')) { //validation user login
            $request = $request->only(['title', 'rate', 'category', 'quantity']);
            $cds = Cd::query()->find($id);
//        check if id is exist in database
            if ($cds === null) {
                return response()->json(['Error' => 'Id Not Found'], 404);
            }
            Cd::query()->select('*')->where('id', $id)->update($request);
            return response()->json(['Data Updated' => Cd::find($id)], 200);
        } else {
            return response()->json(['Error' => 'Only owner that able to access this url'], 401);
        }
    }

}
