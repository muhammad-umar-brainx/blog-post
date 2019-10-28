
@extends('calculatormaster')

@section('content')
    <section class="container jumbotron">
        <form action="{{ action('PracticeController@calculator') }}" method="POST" class="was-validated form-inline text-center">
            {{csrf_field()}}


            <div class="form-group">
                <label for="firstNumber">First Number:</label>
                <input type="number" value="{{isset($firstNumber)?$firstNumber:''}}" class="form-control" id="firstNumber"  placeholder="First number" name="firstNumber" required>
            </div>
            <div class="form-group">
                <label for="secondNumber">Second Number:</label>
                <input type="number" value="{{isset($secondNumber)?$secondNumber:''}}" class="form-control" id="secondNumber" placeholder="Second number" name="secondNumber" required>
            </div>
            <div class="form-group form-check">
                <label for="operator">Operator</label>
                <select class="form-control" id="operator" name="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
            </div>
        </form>

        <div class="text-center">
            <button type="" id="submitBtn" class="btn btn-primary">Submit</button>
        </div>

        @if(isset($result))
            <label class="" id="resultLabel">Answer : {{$result}}</label>
        @endif
        <label class="" id="resultLabel">Answer :</label>
    </section>

    <div class="container text-center">
        <h1 class="text-center">AJAX Practice</h1>
        <div class="">
            <input type="text" placeholder="url here" id="urlinput" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <p id="para">Incoming data will display here</p>
        <button id="sendBtn">Submit</button>
    </div>

    <div class="form-group">
        <label for="mySelect">Select list (select one):</label>
        <select class="form-control" id="mySelect">
            <option value="GET">GET</option>
            <option value="POST">POST</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
        </select>
    </div>
    <p id="pselected"></p>

    @endsection