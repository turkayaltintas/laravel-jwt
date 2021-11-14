<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OrderResource;
use App\Models\V1\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrderController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_order = $this->user
            ->orders()
            ->paginate();
        return new OrderResource($my_order);
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

        $data = $request->only('service', 'brand', 'model','price');
        $validator = Validator::make($data, [
            'service' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $product = $this->user->orders()->create([
            'user_id' => $this->user->id,
            'service' => $request->service,
            'brand' => $request->brand,
            'model' => $request->model,
            'price' => $request->price
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $product
        ], Response::HTTP_OK);
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
    public function update(Request $request, Order $order)
    {
        $data = $request->only('service', 'brand', 'model','price');
        $validator = Validator::make($data, [
            'service' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $order = $order->update([
            'service' => $request->service,
            'brand' => $request->brand,
            'model' => $request->model,
            'price' => $request->price
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully',
            'data' => $order
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully'
        ], Response::HTTP_OK);
    }
}
