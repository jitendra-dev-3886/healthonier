@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Add Fee</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>

                    <form class="row g-3" action="{{ route('submit.fee') }}" method="POST">
                        @csrf
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            {{-- <div class="col-md-3">
                                <label class="col-form-label">currency</label>
                                <select name="currency" class="currency-selector">
                                    <option selected>INR</option>
                                    <option>USD</option>
                                    <option>EUR</option>
                                    <option>GBP</option>
                                    <option>JPY</option>
                                    <option>CAD</option>
                                    <option>AUD</option>
                                </select>
                            </div>


                        </div> --}}
                            <div class="col-md-6">
                                <label for="feeType" class="col-form-label">Fee Type:</label>
                                <input class="form-control" type="text" id="feeType" name="tittle" required>
                            </div>
                            <div class="col-md-6">
                                <label for="amount" class="col-form-label">Amount:</label>
                                <input class="form-control" type="number" id="amount" name="amount" step="0.01" required oninput="calculateTotal()">

                            </div>
                            <div class="col-md-6">

                                <label class="col-form-label">Tax:</label><br>
                                <input type="radio" id="withoutTax" name="tax" value="0" checked onclick="toggleTaxOptions()">
                                <label for="withoutTax">Without Tax</label><br>
                                <input type="radio" id="withTax" name="tax" value="1" onclick="toggleTaxOptions()">
                                <label for="withTax">With Tax</label><br>

                            </div>
                            <div class="col-md-6">

                                <div id="taxOptions" style="display:none;">
                                    <label class="col-form-label">Select Tax:</label><br>
                                    @foreach($items as $item)
                                    <input name="taxType[]" type="checkbox" class="taxCheckbox col-form-label" id="{{$item->amount}}" value="{{$item->id}}" onclick="calculateTotal()">
                                    <label>{{$item->tax_name }} {{ $item->amount}}%</label><br>
                                    @endforeach

                                    {{-- <select id="taxType" name="taxType" onchange="calculateTotal()">
                                        @foreach($items as $item)
                                        <option id="{{$item->amount}}" value="{{$item->id}}">{{$item->tax_name}}</option>
                                    @endforeach
                                    <!-- Add more options for different tax rates if needed -->
                                    </select><br><br> --}}
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label class="col-form-label" for="totalAmount">Total Amount:</label>
                                <input class="form-control" type="text" id="totalAmount" name="totalAmount" readonly><br><br>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_type">Consultant Type</label>

                                    <select class="form-select" id="discount_type" name="consultant_type">
                                        {{-- <option value="0">Online</option> --}}
                                        <option value="1">Offline</option>
                                    </select>
                                </div>

                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    function calculateTotal() {
        var amount = parseFloat(document.getElementById('amount').value);
        var withTax = document.getElementById('withTax').checked;
        var taxCheckboxes = document.getElementsByClassName('taxCheckbox');

        var totalAmount = amount;
        for (var i = 0; i < taxCheckboxes.length; i++) {
            if (taxCheckboxes[i].checked) {

                var taxRate = parseFloat(taxCheckboxes[i].id);

                totalAmount += withTax ? amount * (taxRate / 100) : 0;
            }
        }



        document.getElementById('totalAmount').value = totalAmount.toFixed(2);


    }

    function toggleTaxOptions() {
        var taxOptions = document.getElementById('taxOptions');
        taxOptions.style.display = document.getElementById('withTax').checked ? 'block' : 'none';
        calculateTotal();
    }

</script>
