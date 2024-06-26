<?php

namespace App\Http\Controllers\entity_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuyerSeller;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class BuyersController extends Controller
{
    public function index(Request $request)
    {
        $query = BuyerSeller::where('type', 'buyer'); // Lọc trước những bản ghi có type là 'seller'

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            // Sử dụng whereLike để tìm kiếm gần đúng trên các trường bạn muốn
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
            });
        }

        $buyer = $query->paginate(9); // Sử dụng $query đã được lọc và tìm kiếm để phân trang

        return view('entity_management.buyer.index', [
            'buyer' => $buyer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entity_management.buyer.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            // $request->validate([
            //     'excel_file' => 'required|mimes:xlsx,xls'
            // ]);
            // $file = $request->file('excel_file');
            // $file->move('uploads', $file->getClientOriginalName());
            // $path = public_path('uploads/' . $file->getClientOriginalName());
            // $data = Excel::load($path)->get();
            // if ($data->count()) {
            //     DB::beginTransaction();
            //     try {
            //         foreach ($data as $key => $value) {
            //             $existingBuyer = BuyerSeller::where('email', $value->email)->first();
            //             if (!$existingBuyer) {
            //                 $buyer = new BuyerSeller();
            //                 $buyer->name = $value->name;
            //                 $buyer->email = $value->email;
            //                 $buyer->phone = $value->phone;
            //                 $buyer->address = $value->address;
            //                 $buyer->save();
            //             }
            //         }
            //         DB::commit();
            //     } catch (Exception $e) {
            //         DB::rollBack();
            //         return redirect()->route('danh-sach-nguoi-mua.index')->with('error', 'Có lỗi xảy ra');
            //     }
            // }
            // return redirect()->route('danh-sach-nguoi-mua.index');
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ]);

            try {
                $existingBuyer = BuyerSeller::where([
                    ['email', $request->email],
                    ['type', 'buyer']
                ])->first();
                if (!$existingBuyer) {
                    $buyer = new BuyerSeller();
                    $buyer->name = $request->name;
                    $buyer->email = $request->email;
                    $buyer->phone = $request->phone;
                    $buyer->address = $request->address;
                    $buyer->save();
                } else {
                    // Buyer already exists
                    return redirect()->back()->withErrors(['email' => 'Buyer with this email already exists.']);
                }
            } catch (Exception $e) {
                // Handle save error
                return redirect()->back()->withErrors(['general' => 'An error occurred while saving the buyer.']);
            }

            return redirect()->route('danh-sach-nguoi-mua.index')->with([
                'success' => 'Người mua đã được khởi tạo thành công!'
            
            ]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buyer = BuyerSeller::where('id', $id)->first();
        if($buyer) {
            return view('entity_management.buyer.edit', [
                'buyer' => $buyer
            ]);
        } else {
            return redirect()->route('danh-sach-nguoi-mua.index')->with([
                'error' => 'Người mua không tồn tại!'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buyer = BuyerSeller::where('id', $id)->first();
        if($buyer) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ]);
            $buyer->name = $request->input('name');
            $buyer->email = $request->input('email');
            $buyer->phone = $request->input('phone');
            $buyer->address = $request->input('address');
            $buyer->save();
            return redirect()->route('danh-sach-nguoi-mua.index')->with([
                'success' => 'Người mua đã được cập nhật thành công!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buyer = BuyerSeller::where('id', $id)->first();
        if ($buyer) {
            $buyer->delete();
            return redirect()->route('danh-sach-nguoi-mua.index')->with([
                'success' => 'Người mua đã được xóa thành công!'
            ]);
        } else {
            return redirect()->route('danh-sach-nguoi-mua.index')->with([
                'error' => 'Người mua không tồn tại!'
            ]);
        }
    }
}
