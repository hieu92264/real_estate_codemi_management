
<div class="container mt-4">
    <form action="{{ route('home') }}" method="GET" class="row justify-content-center">
        @csrf
        @method("GET")
        <div class="col-md-3">
            <div class="form-group">
                <label for="from">Từ ngày:</label>
                <input type="date" class="form-control" id="from" name="from" aria-label="From date">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="to">Đến ngày:</label>
                <input type="date" class="form-control" id="to" name="to" aria-label="To date">
            </div>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <input type="submit" class="btn btn-success w-100" value="Lọc"
                aria-label="Filter data">
                {{-- onclick="getData()" --}}
        </div>
    </form>
</div>
