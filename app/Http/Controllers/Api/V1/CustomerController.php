<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BalanceResource;
use App\Models\V1\Balance as UserBalance;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function get_user()
    {
        return response()->json(['user' => $this->user]);
    }
    public function get_balance()
    {
        $balance = $this->user
            ->balance()
            ->paginate();
        return new BalanceResource($balance);

    }
    public function add_balance(Request $request)
    {
        $this->validate($request, [
            'user_balance' => 'required'
        ]);
        UserBalance::create([
            'user_id' => $this->user->id,
            'user_balance' => $request->user_balance
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Add Balance successfully'
        ], Response::HTTP_OK);

    }
}
