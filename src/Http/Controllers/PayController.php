<?php

namespace Skytower0098\Fakerpay\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FakerpayController extends Controller
{
    public function index(Request $request)
    {
        $pays = Pay::orderBy('created_at', 'desc')->paginate(20);
        return view('fakerpay::admin.orders', compact('pays'));
    }

    public function show(Pay $pay)
    {
        return view('fakerpay::admin.order-detail', compact('pay'));
    }

    public function update(Request $request, Pay $pay)
    {
        $request->validate([
            'status' => 'sometimes|integer',
            'deliver' => 'sometimes|integer',
            'track' => 'sometimes|string',
            // ...
        ]);

        $data = $request->only(['status', 'deliver', 'track']);
        $pay->update($data);

        return redirect()->back()->with('message', 'سفارش با موفقیت بروزرسانی شد.');
    }

    public function delete(Pay $pay)
    {
        $pay->delete();
        return redirect()->back()->with('message', 'سفارش حذف شد.');
    }

    public function indexApi()
    {
        $pays = Pay::orderBy('created_at', 'desc')->paginate(20);
        return response()->json($pays);
    }

    public function showApi(Pay $pay)
    {
        return response()->json($pay);
    }

    public function updateApi(Request $request, Pay $pay)
    {
        $request->validate([
            'status' => 'sometimes|integer',
            'deliver' => 'sometimes|integer',
            'track' => 'sometimes|string',
        ]);

        $data = $request->only(['status', 'deliver', 'track']);
        $pay->update($data);

        return response()->json(['message' => 'Order updated successfully']);
    }

    public function deleteApi(Pay $pay)
    {
        $pay->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
