@extends('home')

@section('content')

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Lịch sử giao dịch</h4>
            <div class="transaction-details">
                {{-- <p>ID giao dịch: {{ $transaction->id }}</p>
                <p>ID bất động sản: {{ $transaction->property->id }} (Xem chi tiết)</p>
                <p>Tên người mua (ID: {{ $transaction->buyer->id }}): {{ $transaction->buyer->name }}</p>
                <p>Tên người bán (ID: {{ $transaction->seller->id }}): {{ $transaction->seller->name }}</p>
                <p>Giá: {{ $transaction->price }}</p>
                <p>Ngày giao dịch: {{ $transaction->date }}</p> --}}
    
                <p>ID giao dịch: 1</p>
                <p>ID bất động sản: 1 (Xem chi tiết)</p>
                <p>Tên người mua (ID: 1): Trần Huy Hoàng</p>
                <p>Tên người bán (ID: 1): Nguyễn Thế Hiểu</p>
                <p>Giá: 1200000000đ</p>
                <p>Ngày giao dịch: 28/11/2023</p>
            </div>
            <hr>
            <div class="transaction-details">
                {{-- <p>ID giao dịch: {{ $transaction->id }}</p>
                <p>ID bất động sản: {{ $transaction->property->id }} (Xem chi tiết)</p>
                <p>Tên người mua (ID: {{ $transaction->buyer->id }}): {{ $transaction->buyer->name }}</p>
                <p>Tên người bán (ID: {{ $transaction->seller->id }}): {{ $transaction->seller->name }}</p>
                <p>Giá: {{ $transaction->price }}</p>
                <p>Ngày giao dịch: {{ $transaction->date }}</p> --}}
    
                <p>ID giao dịch: 1</p>
                <p>ID bất động sản: 1 (Xem chi tiết)</p>
                <p>Tên người mua (ID: 1): Trần Huy Hoàng</p>
                <p>Tên người bán (ID: 1): Nguyễn Thế Hiểu</p>
                <p>Giá: 1200000000đ</p>
                <p>Ngày giao dịch: 28/11/2023</p>
            </div>
        </div>
    </div>
@endsection
