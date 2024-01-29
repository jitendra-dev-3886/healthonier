@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Edit Fee</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="{{route('update.fee' ,$data->id)}}" method="POST" onsubmit="return validateForm()">
                        @csrf
                        @method('PUT')
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        {{-- <div class="row">
                            <div class="col-md-3">
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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="feeType" class="col-form-label">Fee Type:</label>
                                <input class="form-control" type="text" id="feeType" name="tittle" required value="{{$data->tittle}}">
                            </div>
                            <div class="col-md-6">
                                <label for="amount" class="col-form-label">Amount:</label>
                                <input value="{{$data->amount}}" class="form-control" type="number" id="amount" name="amount" step="0.01" required oninput="calculateTotal()">

                            </div>
                            <div class="col-md-6">

                                <label class="col-form-label">Tax:</label><br>
                                <input type="radio" id="withoutTax" name="tax_status" value="0" {{ $data->tax_status == 0 ? 'checked' : '' }} onclick="toggleTaxOptions()">
                                <label for="withoutTax">Without Tax</label><br>
                                <input type="radio" id="withTax" name="tax_status" value="1" {{ $data->tax_status == 1 ? 'checked' : '' }} onclick="toggleTaxOptions()">
                                <label for="withTax">With Tax</label><br>

                            </div>
                            <div class="col-md-6">

                                <div id="taxOptions" {{ $data->tax_status == 1 ? 'style="display:block;"' : 'style="display:none;"' }}>
                                    <label class="col-form-label">Select Tax:</label><br>
                                    @foreach($items as $item)
                                    <input name="taxType[]" type="checkbox" class="taxCheckbox" id="{{$item->amount}}" value="{{$item->id}}" onclick="calculateTotal()" {{ in_array($item->id, $data->feeTaxFees->pluck('tax_id')->all()) ? 'checked' : '' }}>
                                    <label>{{$item->tax_name }} {{ $item->amount}}%</label><br>
                                    @endforeach
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label class="col-form-label" for="totalAmount">Total Amount:</label>
                                <input value="{{$data->total_amount}}" class="form-control" type="text" id="totalAmount" name="total_amount" readonly><br><br>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_type">Consultant Type</label>

                                    <select class="form-select" id="discount_type" name="consultant_type">
                                        <option value="0" {{$data->consultant_type == 0 ? 'selected' : ''}}>Online</option>
                                        <option value="1" {{$data->consultant_type == 1 ? 'selected' : ''}}>Offline</option>
                                    </select>
                                </div>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
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

    function validateForm() {
        var withTax = document.getElementById('withTax').checked;
        var taxCheckboxes = document.getElementsByClassName('taxCheckbox');

        if (withTax) {
            var taxChecked = false;
            for (var i = 0; i < taxCheckboxes.length; i++) {
                if (taxCheckboxes[i].checked) {
                    taxChecked = true;
                    break;
                }
            }

            if (!taxChecked) {
                Swal.fire({
                    icon: 'error'
                    , title: 'Error'
                    , text: 'Please select at least one tax when "With Tax" is chosen.'
                });
                return false; // Prevent form submission
            }
        }

        return true;
    }

</script>
