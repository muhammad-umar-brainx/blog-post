<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{

    public function calculatorForm()
    {
        return view('calculatormaster');
    }
    public function calculateResult(Request $request){
        $result = 0;
        switch ($request->operator) {
            case "+":
                $result = $request->firstNumber + $request->secondNumber;
                break;
            case "-":
                $result = $request->firstNumber - $request->secondNumber;
                break;
            case "*":
                $result = $request->firstNumber * $request->secondNumber;
                break;
            case "/":
                try {
                    $result = $request->firstNumber / $request->secondNumber;
                } catch (\Exception  $e) {
//                    report($e);
                    $result = "invalid input";
                }
                break;
            default:
                break;
        }
        return $result;
    }

    public function calculatorApi(Request $request)
    {
        $result = $this->calculateResult($request);
//        dd($request->all());
        return $this->myResultCompact($request, $result);
    }

    public function calculator(Request $request)
    {

        $result = $this->calculateResult($request);


        return view('calculatormaster', $this->myResultCompact($request, $result));
    }

    private function myResultCompact(Request $request, $result){
        $firstNumber = $request->firstNumber;
        $secondNumber = $request->secondNumber;
        $operator = $request->operator;
        return compact('result', 'firstNumber', 'secondNumber', 'operator');
    }
}
