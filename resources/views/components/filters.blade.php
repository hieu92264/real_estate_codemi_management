{{-- <div class="row">
    <div class="col-md-4">
        <label for="From">From</label>
        <input type="date" class="form-control" id="from" name="from">
    </div>
    <div class="col-md-4">
        <label for="To">To</label>
        <input type="date" class="form-control" id="to" name="to">
    </div>
    <div class="col-md-4">
        <input type="button" class="btn btn-success" value="Filter" onclick="getData()">
    </div>
</div> --}}

<div class="container mt-4">
    <div class="row justify-content-center">
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
            <input type="button" class="btn btn-success w-100" value="Lọc" onclick="getData()"
                aria-label="Filter data">
        </div>
    </div>
</div>
