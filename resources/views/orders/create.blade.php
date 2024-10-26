<h1>Create Order</h1>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="invoice_number">Invoice Number</label>
        <input type="text" name="invoice_number" class="form-control" id="invoice_number" required>
    </div>

    <div class="form-group">
        <label for="customer_id">Customer</label>
        <select name="customer_id" id="customer_id" class="form-control" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="order_date">Order Date</label>
        <input type="datetime-local" name="order_date" class="form-control" id="order_date" required>
    </div>

    <div class="form-group">
        <label for="delivery_address">Delivery Address</label>
        <input type="text" name="delivery_address" class="form-control" id="delivery_address" required>
    </div>

    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea name="notes" id="notes" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Ordered">Ordered</option>
            <option value="In process">In process</option>
            <option value="In route">In route</option>
            <option value="Delivered">Delivered</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Order</button>
</form>