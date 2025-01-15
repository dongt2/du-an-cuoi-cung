<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function stepfinal()
    {
        return view('user.instruction.stepfinal'); // Trả về view
    }
}
