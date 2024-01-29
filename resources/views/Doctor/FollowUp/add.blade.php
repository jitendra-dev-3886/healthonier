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
    <h4>Add Follow Up </h4>


</div><!-- End Page Title -->

<section class="section">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="p-4">

                    <!-- Vertical Form -->

                    <form class="row g-3" action="{{ route('submit.followup') }}" method="POST" id="adddoctor">

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
                            <div class="col-md-3">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Min Days</label>

                                <div class="col-sm-12">

                                    <input type="number" name="mindays[]" class="form-control" required placeholder="Enter Min Days " />

                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Max Days</label>

                                <div class="col-sm-12">

                                    <input type="number" name="maxdays[]" class="form-control" required placeholder="Enter Max Days " />

                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Discount</label>

                                <div class="col-sm-12">

                                    <input type="number" name="discount[]" class="form-control" required placeholder="Enter Discount" />

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount_type">Discount Type</label>

                                    <select class="form-select" id="discount_type" name="discount_type[]">
                                        <option value="0">Flat</option>
                                        <option value="1">Percentage</option>
                                    </select>
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
                    <label for="inputNumber" class="col-sm-12 col-form-label">Min Days</label>
                    <div class="col-sm-12">
                        <input type="number" name="mindays[]" class="form-control" required placeholder="Enter Min Days " />
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputNumber" class="col-sm-12 col-form-label">Max Days</label>
                    <div class="col-sm-12">
                        <input type="number" name="maxdays[]" class="form-control" required placeholder="Enter Max Days " />
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputNumber" class="col-sm-12 col-form-label">Discount</label>
                    <div class="col-sm-12">
                        <input type="number" name="discount[]" class="form-control" required  placeholder="Discount In %" />
                    </div>
                </div>
                <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount_type">Discount Type</label>

                                    <select class="form-select" id="discount_type" name="discount_type[]">
                                        <option value="0">Flat</option>
                                        <option value="1">Percentage</option>
                                    </select>
                                </div>

                            </div>
             
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger removeTaxRow">Remove</button>
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
