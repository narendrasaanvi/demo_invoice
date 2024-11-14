@extends('backend.layouts.master')
@section('title','Admin-Panel || Banner Create')
@section('main-content')
<style>
    label {
        display: inline-block;
        margin-bottom: .3rem !important;
        font-weight: normal !important;
        ;
    }

    li.list-group-item {
        cursor: pointer;
    }
</style>
<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item"><a href="{{ URL::asset('admin/dashboard')}}"><i
                                    class="fas fa-cubes"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">
                            <span><i class="fas fa-file-alt"></i> Billing For {{ $companyName }}</span>
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <div id="clock"></div>
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0">
                                    Invoice For {{ $companyName }}
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container mt-3">
                                @if (session('success'))
                                <script type="text/javascript">
                                    toastr.success('{{ session("success") }}')
                                </script>
                                @elseif(session('error'))
                                <script type="text/javascript">
                                    toastr.warning('{{ session("error") }}')
                                </script>
                                @endif
                                <form id="invoiceForm" method="POST" action="{{ route('admin.invoice.store') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="row mb-2">
                                        <input type="hidden" name="company_name" value="{{ $companyName }}">
                                        <!-- Customer Information -->
                                        <div class="col-6 mb-2">
                                            <label for="customerName" class="form-label">Tax Type</label>
                                            <select name="tax_type" id="tax_type" class="form-control">
                                                <option value="18">18%</option>
                                                <option value="5">5%</option>
                                                <option value="0">0%</option>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="customerName" class="form-label">Tax For</label>
                                            <select name="tax_for" id="tax_for" class="form-control">
                                                <option value="CGST & SGST">CGST & SGST</option>
                                                <option value="IGST">IGST</option>
                                                <option value="Free">Free</option>

                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="customerName" class="form-label">Customer Name</label>
                                            <input type="text"
                                                class="form-control @error('customerName') is-invalid @enderror"
                                                name="customerName" id="customerName" required>
                                            <ul id="customerList" class="list-group"
                                                style="position:absolute; z-index:1000;"></ul>
                                            @error('customerName')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="mobileNumber" class="form-label">Mobile Number</label>
                                            <input type="text"
                                                class="form-control  @error('mobileNumber') is-invalid @enderror"
                                                name="mobileNumber" id="mobileNumber">
                                            @error('mobileNumber')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="emailAddress" class="form-label">Email Address</label>
                                            <input type="text"
                                                class="form-control @error('emailAddress') is-invalid @enderror"
                                                name="emailAddress" id="emailAddress">
                                            @error('emailAddress')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="emailAddress" class="form-label">Address</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                name="address" id="address">
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="gst" class="form-label">GST</label>
                                            <input type="text" class="form-control @error('gst') is-invalid @enderror"
                                                name="gst" id="gst">
                                            @error('gst')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="service" class="form-label">Service</label>
                                            <input type="text"
                                                class="form-control @error('service') is-invalid @enderror"
                                                name="service" id="service">
                                            @error('gst')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="event_date" class="form-label">Event Date</label>
                                            <input type="text"
                                                class="form-control @error('event_date') is-invalid @enderror"
                                                name="event_date" id="event_date">
                                            @error('event_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="venue" class="form-label">Venue</label>
                                            <input type="text" class="form-control @error('venue') is-invalid @enderror"
                                                name="venue" id="venue">
                                            @error('venue')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Invoice Items -->
                                    <div id="invoiceItems">
                                        <hr>
                                        <h4 class="mb-2">Invoice Items</h4>
                                        <div class="row mb-2">
                                            <div class="col-4">
                                                <input type="text" class="form-control" placeholder="Item Name"
                                                    name="itemName[]" required>
                                            </div>
                                            <div class="col-2">
                                                <input type="number" class="form-control quantity"
                                                    placeholder="Quantity" name="quantity[]" required>
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control price" name="price[]"
                                                    placeholder="Unit Price" required>
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" name="hsncode[]"
                                                    placeholder="HSN Code" required>
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-danger remove-item">Remove</button>
                                            </div>
                                            <div class="col-10">
                                                <label>Description*</label>
                                                <textarea class="form-control" name="note[]" rows="3"></textarea>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Item Button -->
                                    <div class="text-end mb-2">
                                        <button type="button" class="btn btn-primary" id="addItem">Add Item</button>
                                    </div>
                                    <!-- Totals -->
                                    <div class="mb-2 d-none">
                                        <label class="form-label">Subtotal: <span id="subtotal">₹0.00</span></label><br>
                                        <label class="form-label">Tax (<span id="displaytaxType">18</span>%): <span
                                                id="tax">₹0.00</span></label><br>
                                        <label class="form-label">Total: <span id="total">₹0.00</span></label>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-md-12 mb-2">
                                            <label>Subtotal</label>
                                            <input type="text" class="form-control w-50" name="total_amount"
                                                id="total_amount" readonly>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>Tax</label>
                                            <input type="text" class="form-control w-50" name="tax_amount"
                                                id="tax_amount" readonly>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>Total</label>
                                            <input type="text" class="form-control w-50" name="final_amount"
                                                id="final_amount" readonly>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>Agency Charges (In Percentage)</label>
                                            <input type="number" class="form-control w-50" name="discount" id="discount"
                                                placeholder="Discount" value="0">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>Final Total</label>
                                            <input type="text" class="form-control w-50"
                                                name="final_amount_after_discount" id="final_amount_after_discount"
                                                placeholder="Final Amount" readonly>
                                        </div>
                                    </div>
                                    <!-- Invoice Number and Date -->
                                    <div class="mb-2">
                                        <label for="invoiceNumber" class="form-label">Invoice Number</label>
                                        <input type="text" class="form-control" name="invoiceNumber"
                                            value="{{$invoiceNumber}}" readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label for="invoiceDate" class="form-label">Invoice Date</label>
                                        <input type="text" id="datePicker" class="form-control" name="invoiceDate"
                                            placeholder="dd/mm/yy">
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Generate Invoice</button>
                                    </div>
                                </form>
                            </div>
                            <script>
                                // JavaScript code
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Add item button
                                    const addItemButton = document.getElementById("addItem");
                                    addItemButton.addEventListener("click", addItem);

                                    // Remove item buttons
                                    const removeItemButtons = document.querySelectorAll(".remove-item");
                                    removeItemButtons.forEach(button => {
                                        button.addEventListener("click", removeItem);
                                    });

                                    // Calculate totals when quantity or price changes
                                    document.addEventListener("input", function(event) {
                                        if (event.target.classList.contains("quantity") || event.target
                                            .classList.contains("price") || event.target.id ===
                                            "discount" || event.target.id === "tax_type") {
                                            calculateTotals();
                                        }
                                    });





                                    // Generate invoice number and date
                                    const invoiceNumberInput = document.getElementById("invoiceNumber");
                                    const invoiceDateInput = document.getElementById("invoiceDate");
                                    const invoiceDate = new Date().toLocaleDateString("en-US");
                                    invoiceNumberInput.value = generateInvoiceNumber();
                                    invoiceDateInput.value = invoiceDate;
                                });

                                function addItem() {
                                    const invoiceItems = document.getElementById("invoiceItems");
                                    const newItem = document.createElement("div");
                                    newItem.classList.add("row", "mb-2");
                                    newItem.innerHTML = `
                                            <div class="col-4">
                                                <input type="text" class="form-control" placeholder="Item Name" name="itemName[]" required>
                                            </div>
                                            <div class="col-2">
                                                <input type="number" class="form-control quantity" placeholder="Quantity" name="quantity[]" required>
                                            </div>
                                            <div class="col-2">
                                                <input type="number" class="form-control price" name="price[]" placeholder="Unit Price" required>
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="form-control" name="hsncode[]" placeholder="HSN Code" required>
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-danger remove-item">Remove</button>
                                            </div>
                                            <div class="col-10">
                                                <label>Description*</label>
                                                <textarea class="form-control" name="note[]" rows="3"></textarea>
                                                <hr>
                                            </div>
                         `;
                                    invoiceItems.appendChild(newItem);
                                    newItem.querySelector(".remove-item").addEventListener("click", removeItem);
                                    calculateTotals()
                                }

                                function removeItem(event) {
                                    const item = event.target.closest(".row");
                                    item.remove();
                                    calculateTotals();
                                }

                                function calculateTotals() {
                                    let subtotal = 0;
                                    const quantities = document.querySelectorAll(".quantity");
                                    const prices = document.querySelectorAll(".price");
                                    const taxType = document.getElementById("tax_type").value;
                                    const discount = parseFloat(document.getElementById("discount").value) || 0;
                                    quantities.forEach((quantity, index) => {
                                        const price = prices[index].value ? parseFloat(prices[index].value) : 0;
                                        const qty = quantity.value ? parseInt(quantity.value) : 0;
                                        subtotal += qty * price;
                                    });

                                    const tax = subtotal * (taxType / 100);
                                    const total = subtotal + tax;


                                    const discountAmountWithoutTax = total * (discount / 100);
                                    const discountAmount = discountAmountWithoutTax * (taxType / 100);
                                    const finalTotalAfterDiscount = total + discountAmountWithoutTax + discountAmount;

                                    document.getElementById("subtotal").textContent = `₹${subtotal.toFixed(2)}`;
                                    document.getElementById("tax").textContent = `₹${tax.toFixed(2)}`;
                                    document.getElementById("total").textContent = `₹${total.toFixed(2)}`;
                                    document.getElementById("displaytaxType").innerHTML = taxType;

                                    document.getElementById("total_amount").value = subtotal.toFixed(2);
                                    document.getElementById("tax_amount").value = tax.toFixed(2);
                                    document.getElementById("final_amount").value = total.toFixed(2);
                                    document.getElementById("final_amount_after_discount").value = finalTotalAfterDiscount
                                        .toFixed(2);
                                }

                                function generateInvoiceNumber() {
                                    return Math.floor(100000 + Math.random() * 900000);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const customerNameInput = document.getElementById('customerName');
        const customerList = document.getElementById('customerList');

        customerNameInput.addEventListener('keyup', function() {
            const query = this.value;
            if (query.length > 2) {
                fetch(`/admin/customers?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        customerList.innerHTML = '';
                        data.forEach(customer => {
                            const li = document.createElement('li');
                            li.className = 'list-group-item';
                            li.dataset.id = customer.id;
                            li.textContent = customer.customer_name;
                            customerList.appendChild(li);
                        });
                    });
            } else {
                customerList.innerHTML = '';
            }
        });


        customerList.addEventListener('click', function(event) {
            if (event.target.tagName === 'LI') {
                const customerId = event.target.dataset.id;
                fetch(`/admin/customers/${customerId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('customerName').value = data.customer_name;
                        document.getElementById('mobileNumber').value = data.custmore_mobile;
                        document.getElementById('emailAddress').value = data.custmore_email;
                        document.getElementById('address').value = data.address;
                        document.getElementById('gst').value = data.gst;
                        customerList.innerHTML = '';
                    });
            }
        });
    });
</script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datePicker", {
            dateFormat: "d-m-Y", // Set the format to dd/mm/yy
            defaultDate: "today" // Set default date to today
        });
    });
</script>

<script type="text/javascript">
    $('.invoice-genrate').addClass('active');
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const taxTypeSelect = document.getElementById('tax_type');
        const taxForSelect = document.getElementById('tax_for');

        taxTypeSelect.addEventListener('change', function() {
            if (taxTypeSelect.value === '0') {
                taxForSelect.value = 'Free';
            } else {

                taxForSelect.value = 'CGST & SGST';
            }
        });
    });
</script>
@endsection