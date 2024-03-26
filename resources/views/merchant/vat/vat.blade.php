@extends('merchant.master')

@section('title', 'VAT Calculation')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">VAT Calculation</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="gross-sum" class="form-label">Gross Sum:</label>
                <input type="text" id="gross-sum" class="form-control" placeholder="Enter gross sum">
            </div>
            <div class="col-md-6">
                <label for="vat-operation" class="form-label">VAT Calculation Operation:</label>
                <select id="vat-operation" class="form-select">
                    <option value="include">Include VAT</option>
                    <option value="exclude">Exclude VAT</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="vat-percentage" class="form-label">VAT Percentage:</label>
                <input type="text" id="vat-percentage" class="form-control" placeholder="Enter VAT percentage">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <button id="calculate-btn" class="btn btn-primary">Calculate</button>
            </div>
        </div>

        <div id="result" class="mt-4"></div>
    </main>

    <script>
        document.getElementById('calculate-btn').addEventListener('click', function () {
            // Get user inputs
            var grossSum = parseFloat(document.getElementById('gross-sum').value);
            var vatOperation = document.getElementById('vat-operation').value;
            var vatPercentage = parseFloat(document.getElementById('vat-percentage').value);

            // Validate inputs
            if (isNaN(grossSum) || isNaN(vatPercentage)) {
                document.getElementById('result').innerHTML = '<div class="alert alert-danger" role="alert">Please enter valid numbers.</div>';
                return;
            }

            // Perform calculation based on operation
            var vatAmount;
            if (vatOperation === 'include') {
                vatAmount = grossSum * (vatPercentage / 100);
            } else {
                vatAmount = grossSum / (1 + (vatPercentage / 100)) - grossSum;
            }

            // Display result
            document.getElementById('result').innerHTML = '<div class="alert alert-success" role="alert">VAT Amount: ' + vatAmount.toFixed(2) + '</div>';
        });
    </script>
@endsection
