@extends('layouts.admin')



@section('content')
<style>
    #tp-box {
        background: #39cabb !important;
    }

    .tp-up,
    .tp-down {
        color: black !important;
    }

    #tp-close {
        background: #117c71 !important;
    }

    #tp-set {
        background: #135c55 !important;
    }

</style>


<div class="pagetitle">
    <h4>Add Tax </h4>


</div><!-- End Page Title -->

<section class="section">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="p-4">

                    <!-- Vertical Form -->

                    <form class="row g-3" action="{{ route('submit.tax') }}" method="POST" id="adddoctor">

                        @csrf

                        @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                        @elseif(session('error'))

                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">

                            {{ session('error') }}

                        </div>



                        @endif



                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Tax Name</label>

                                <div class="col-sm-12">

                                    <input type="text" name="name[]" class="form-control" required placeholder="Enter your tax name" />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Tax Percentage</label>

                                <div class="col-sm-12">

                                    <input type="number" name="amount[]" class="form-control" required placeholder="Enter tax in %" />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Tax Description</label>

                                <div class="col-sm-12">

                                    <input type="text" name="description[]" class="form-control" required />

                                </div>

                            </div>
                            <div id="taxDetailsContainer"></div>
                        </div>






                        <div class="text-center">
                            <button type="button" id="addTaxDetails" class="btn btn-theme">Add More</button>


                            <button type="submit" class="btn btn-theme">Submit</button>

                            <button type="reset" class="btn theme-btn-three">Reset</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>









@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to handle adding tax details row
        function addTaxRow() {
            var container = document.getElementById('taxDetailsContainer');

            var row = document.createElement('div');
            row.classList.add('row');

            row.innerHTML = `
                <div class="col-md-3">
                    <label for="inputNumber" class="col-sm-12 col-form-label">Tax Name</label>
                    <div class="col-sm-12">
                        <input type="text" name="name[]" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputNumber" class="col-sm-12 col-form-label">Tax Percentage</label>
                    <div class="col-sm-12">
                        <input type="number" name="amount[]" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputNumber" class="col-sm-12 col-form-label">Tax Description</label>
                    <div class="col-sm-12">
                        <input type="text" name="description[]" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-3" style="padding:30px">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-danger removeTaxRow">Remove</button>
                        </div>
                 
                </div>
            `;

            container.appendChild(row);
        }

        // Function to handle removing tax details row
        function removeTaxRow(event) {
            var row = event.target.closest('.row');
            row.remove();
        }

        // Add event listener to add tax details button
        document.getElementById('addTaxDetails').addEventListener('click', addTaxRow);

        // Event delegation to handle remove tax details button
        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('removeTaxRow')) {
                removeTaxRow(event);
            }
        });
    });

</script>
