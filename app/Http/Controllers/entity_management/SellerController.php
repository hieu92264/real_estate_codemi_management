<?php

namespace App\Http\Controllers\entity_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuyerSeller; // Add this line to import the BuyerSeller class
use Exception;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $query = BuyerSeller::where('type', 'seller');
        // if ($request->has('search') && $request->search != '') {
        //     $search = $request->search;
        //     // Sử dụng whereLike để tìm kiếm gần đúng trên các trường bạn muốn
        //     $query->where(function ($q) use ($search) {
        //         $q->where('name', 'like', "%{$search}%")
        //             ->orWhere('phone', 'like', "%{$search}%")
        //             ->orWhere('email', 'like', "%{$search}%")
        //             ->orWhere('address', 'like', "%{$search}%");
        //     });
        // }
        // $sellers = BuyerSeller::where('type', 'seller')->paginate(9);
        // return view('entity_management.seller.index', [
        //     'sellers' => $sellers
        // ]);
        $query = BuyerSeller::where('type', 'seller'); // Lọc trước những bản ghi có type là 'seller'

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

        $sellers = $query->paginate(9); // Sử dụng $query đã được lọc và tìm kiếm để phân trang

        return view('entity_management.seller.index', [
            'sellers' => $sellers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entity_management.seller.create');
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
            //             $existingseller = BuyerSeller::where('email', $value->email)->first();
            //             if (!$existingseller) {
            //                 $seller = new BuyerSeller();
            //                 $seller->name = $value->name;
            //                 $seller->email = $value->email;
            //                 $seller->phone = $value->phone;
            //                 $seller->address = $value->address;
            //                 $seller->save();
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
                $existingSeller = BuyerSeller::where([
                    ['email', $request->email],
                    ['type', 'seller']
                ])->first();
                if (!$existingSeller) {
                    $seller = new BuyerSeller();
                    $seller->name = $request->name;
                    $seller->email = $request->email;
                    $seller->phone = $request->phone;
                    $seller->address = $request->address;
                    $seller->type = 'seller';
                    $seller->save();
                } else {
                    // seller already exists
                    return redirect()->back()->withErrors(['email' => 'seller with this email already exists.']);
                }
            } catch (Exception $e) {
                // Handle save error
                return redirect()->back()->withErrors(['general' => 'An error occurred while saving the seller.']);
            }

            return redirect()->route('danh-sach-nguoi-ban.index')->with([
                'success' => 'Người bán đã được khởi tạo thành công!'

            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seller = BuyerSeller::where('id', $id)->first();
        if ($seller) {
            return view('entity_management.seller.edit', [
                'seller' => $seller,
            ]);
        } else {
            return redirect()->route('danh-sach-nguoi-ban.index')->with([
                'error' => 'Người bán không tồn tại!'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $seller = BuyerSeller::where('id', $id)->first();
        if ($seller) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ]);
            $seller->name = $request->input('name');
            $seller->email = $request->input('email');
            $seller->phone = $request->input('phone');
            $seller->address = $request->input('address');
            $seller->type = 'seller';
            $seller->save();
            return redirect()->route('danh-sach-nguoi-ban.index')->with([
                'success' => 'Người bán đã được cập nhật thành công!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seller = BuyerSeller::where('id', $id)->first();
        if ($seller) {
            $seller->delete();
            return redirect()->route('danh-sach-nguoi-ban.index')->with([
                'success' => 'Người bán đã được xóa thành công!'
            ]);
        } else {
            return redirect()->route('danh-sach-nguoi-ban.index')->with([
                'error' => 'Người bán không tồn tại!'
            ]);
        }
    }

    
}
