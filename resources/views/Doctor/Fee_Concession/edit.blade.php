@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Edit Fee Concession</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="{{route('update.fee.concession' ,$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-form-label">Gorup Name</label>
                                <input name="group_name" type="text" class="form-control" required value="{{$data->group_name}}" {{$data->group_name == "Normal Group" ? "readonly": ""}}>
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
                                    <tr>
                                        @foreach ($item as $index => $item)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="statuscheck[{{$index}}]" {{ $item->status == 1 ? 'checked' : '' }} data-index="{{ $index }}">
                                            </div>
                                        </td>
                                        <td>
                                            <input value="{{ $item->fee->tittle }}" name="fee_tittle[]" type="text" class="form-control" readonly>
                                        </td>
                                        <td>
                                            <input value="{{ $item->fee->total_amount }}" name="total_amount[]" type="text" class="form-control totalAmountDisplay" readonly data-original-amount="{{ $item->fee->total_amount }}">
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="percentageCheckbox[{{$index}}]" {{ $item->percentage ? 'checked' : '' }} data-index="{{ $index }}">
                                            </div>
                                        </td>
                                        <td>
                                            <input name="amount[]" type="number" class="form-control" placeholder="Enter amount or %" value="{{ $item->amount }}" data-index="{{ $index }}" {{ $item->percentage ? '' : 'readonly' }}>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                <tbody>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>

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
    // document.addEventListener("DOMContentLoaded", function() {
    //     const checkboxes = document.querySelectorAll('input[name^="percentageCheckbox["]');
    //     // const checkboxes = document.querySelectorAll('input[name="percentageCheckbox[]"]');
    //     const amountInputs = document.querySelectorAll('input[name="amount[]"]');
    //     const totalAmountInputs = document.querySelectorAll('input[name="total_amount[]"]');
    //     const totalAmountDisplay = document.querySelectorAll('.totalAmountDisplay');

    //     checkboxes.forEach((checkbox, index) => {
    //         const savedState = localStorage.getItem(`checkboxState_${index}`);
    //         if (savedState === 'checked') {
    //             checkbox.checked = true;
    //             amountInputs[index].removeAttribute('readonly');
    //         }

    //         function calculateDiscountedAmount() {
    //             const amount = parseFloat(amountInputs[index].value);

    //             if (!isNaN(amount)) {
    //                 const originalAmount = parseFloat(totalAmountInputs[index].getAttribute('data-original-amount'));
    //                 const isChecked = checkboxes[index].checked;

    //                 if (isChecked) {
    //                     const percentage = amount;
    //                     const discountedAmount = originalAmount - (originalAmount * (percentage / 100));
    //                     totalAmountInputs[index].value = discountedAmount.toFixed(2);
    //                     totalAmountDisplay[index].value = discountedAmount.toFixed(2);
    //                 } else {
    //                     const flatDiscountedAmount = originalAmount - amount;
    //                     totalAmountInputs[index].value = flatDiscountedAmount.toFixed(2);
    //                     totalAmountDisplay[index].value = flatDiscountedAmount.toFixed(2);
    //                 }
    //             }
    //         }

    //         checkbox.addEventListener('change', function() {
    //             const isChecked = this.checked;
    //             const amountInput = amountInputs[index];
    //             const totalAmountInput = totalAmountInputs[index];
    //             const originalAmount = parseFloat(totalAmountInput.getAttribute('data-original-amount'));

    //             if (isChecked) {
    //                 amountInput.removeAttribute('readonly');
    //                 amountInput.addEventListener('input', calculateDiscountedAmount);
    //                 localStorage.setItem(`checkboxState_${index}`, 'checked');
    //             } else {
    //                 amountInput.value = '';
    //                 amountInput.removeAttribute('readonly');
    //                 calculateDiscountedAmount(); // Recalculate when checkbox is unchecked
    //                 localStorage.removeItem(`checkboxState_${index}`);
    //             }
    //         });

    //         amountInputs[index].addEventListener('input', calculateDiscountedAmount);

    //         // If the checkbox is already checked on page load, calculate the total amount
    //         if (checkbox.checked) {
    //             calculateDiscountedAmount();
    //         }
    //     });
    // });
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('input[name^="percentageCheckbox["]');
        const amountInputs = document.querySelectorAll('input[name="amount[]"]');
        const totalAmountInputs = document.querySelectorAll('input[name="total_amount[]"]');
        const totalAmountDisplay = document.querySelectorAll('.totalAmountDisplay');

        checkboxes.forEach((checkbox, index) => {
            const savedState = localStorage.getItem(`checkboxState_${index}`);
            if (savedState === 'checked') {
                checkbox.checked = true;
                amountInputs[index].removeAttribute('readonly');
            }

            function calculateDiscountedAmount() {
                const amount = parseFloat(amountInputs[index].value);

                if (!isNaN(amount)) {
                    const originalAmount = parseFloat(totalAmountInputs[index].getAttribute('data-original-amount'));
                    const isChecked = checkboxes[index].checked;

                    if (isChecked) {
                        const percentage = amount;
                        const discountedAmount = originalAmount - (originalAmount * (percentage / 100));
                        totalAmountInputs[index].value = discountedAmount.toFixed(2);
                        totalAmountDisplay[index].value = discountedAmount.toFixed(2);
                    } else {
                        const flatDiscountedAmount = originalAmount - amount;
                        totalAmountInputs[index].value = flatDiscountedAmount.toFixed(2);
                        totalAmountDisplay[index].value = flatDiscountedAmount.toFixed(2);
                    }
                }
            }

            checkbox.addEventListener('change', function() {
                const isChecked = this.checked;
                const amountInput = amountInputs[index];
                const totalAmountInput = totalAmountInputs[index];
                const originalAmount = parseFloat(totalAmountInput.getAttribute('data-original-amount'));

                if (isChecked) {
                    amountInput.removeAttribute('readonly');
                    amountInput.addEventListener('input', calculateDiscountedAmount);
                    localStorage.setItem(`checkboxState_${index}`, 'checked');
                } else {
                    amountInput.value = '';
                    amountInput.removeAttribute('readonly');
                    calculateDiscountedAmount(); // Recalculate when checkbox is unchecked
                    localStorage.removeItem(`checkboxState_${index}`);
                }
            });

            amountInputs[index].addEventListener('input', calculateDiscountedAmount);

            // If the checkbox is already checked on page load, calculate the total amount
            if (checkbox.checked) {
                calculateDiscountedAmount();
            }
        });
    });

</script>
@endpush
