@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Add Fee Concession</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form class="row g-3" action="{{ route('submit.fee.concession') }}" method="POST">
                        @csrf
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-form-label">Group Name</label>
                                <input name="group_name" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-12 mt-4">

                                <table class="table table-bordered">

                                    <thead>
                                        <tr>
                                            <th scope="col"> <label>Action</label></th>
                                            <th scope="col"> <label>Fee</label></th>
                                            <th scope="col"> <label>Total Amount</label></th>
                                            <th scope="col"> <label>In Percentage %</label></th>
                                            <th scope="col"> <label>Percentage/Amount</label></th>
                                        </tr>
                                    </thead>
                                    @foreach ($item as $index => $items)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="statuscheck[{{$index}}]" data-index="{{$index}}"> </div>
                                        </td>
                                        <td>
                                            <input value="{{$items->tittle}}" name="fee_tittle[]" type="text" class="form-control" readonly>
                                        </td>
                                        <td>
                                            <input value="{{$items->total_amount}}" name="total_amount[]" type="text" class="form-control" readonly data-original-amount="{{$items->total_amount}}">
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="percentageCheckbox[{{$index}}]" data-index="{{$index}}">
                                            </div>
                                        </td>
                                        <td>
                                            <input value="0" name="amount[]" type="text" class="form-control" required placeholder="Enter amount or %" data-index="{{$index}}">
                                        </td>
                                    </tr>
                                    @endforeach


                                </table>

                                <div class="text-center mt-4">
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
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all the checkboxes and amount input fields
        const checkboxes = document.querySelectorAll('input[name^="percentageCheckbox["]');
        // const checkboxes = document.querySelectorAll('input[name="percentageCheckbox[]"]');
        const amountInputs = document.querySelectorAll('input[name="amount[]"]');
        const totalAmountInputs = document.querySelectorAll('input[name="total_amount[]"]');

        // Define a function to handle input events
        function handleInput(index) {
            const amountInput = amountInputs[index];
            const totalAmountInput = totalAmountInputs[index];
            const originalAmount = parseFloat(totalAmountInput.getAttribute('data-original-amount'));
            const isChecked = checkboxes[index].checked;
            const value = parseFloat(amountInput.value);

            if (isNaN(value)) {
                totalAmountInput.value = originalAmount.toFixed(2);
            } else {
                if (isChecked) {
                    const discountedAmount = originalAmount - (originalAmount * (value / 100));
                    totalAmountInput.value = discountedAmount.toFixed(2);
                } else {
                    const flatDiscountedAmount = originalAmount - value;
                    totalAmountInput.value = flatDiscountedAmount.toFixed(2);
                }
            }
        }

        // Attach input event listeners to all amount input fields
        amountInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                handleInput(index);
            });

            // Call handleInput function initially to apply discounts
            handleInput(index);
        });
    });

</script>
@endpush
