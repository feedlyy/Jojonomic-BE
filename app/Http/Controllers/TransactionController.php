<?php


namespace App\Http\Controllers;

use App\Cd;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function rentCd(Request $request, $id)
    {
        if ($request->user()->can('costumer')) { //check if the user loggin is costumer or owner
            // rules for input
            $rules = [
                'quantity' => 'required|integer',
                'day' => 'required|integer'
            ];

            // get all req
            $request = $request->all();

            //validate form request
            $validate = Validator::make($request, $rules);
            if ($validate->fails()) {
                return response()->json($validate->failed(), 422);
            }

            // get cds that want to rent
            $cd = Cd::query()->find($id);

            // get loggin user
            $user = Auth::user();

            // get total fare rent
            $total = $request['quantity'] * $request['day'] * $cd->rate;

            // check for available cds
            if ($request['quantity'] > $cd->quantity) {
                return response()->json(['Error' => 'The cd stock is not enough to rent'], 400);
            }

            // check if costumer money enough to rent a cd
            if ($user->balance < $total) {
                return response()->json(['Error' => 'Your money is not enough to rent'], 400);
            }

            // cut the balance after user succeed rent a cd
            $balanceCut = User::query()->select('*')
                ->where('id', Auth::id())->first();
            User::query()->where('id', Auth::id())->update([
                'balance' => $balanceCut->balance -= $total
            ]);

            // reduce quantity after users rent a cd
            $cd->quantity -= $request['quantity'];
            $cd->save();

            return response()->json(['Success' => [
                'Rented Cd' => Cd::query()->select('id', 'title')
                    ->where('id', $id)->first(),
                'Total Rent' => ['Quantity' => $request['quantity'], 'Days' => $request['day']],
                'Your Balance' => User::query()->select('balance')
                    ->where('id', Auth::id())->first()
            ]], 200);
        } else {
            return response()->json(['Error' => 'Only costumer that able to access this url'], 401);
        }
    }
}
