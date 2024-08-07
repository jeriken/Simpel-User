<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponses;
use App\Models\User;



class ProfileController extends Controller
{
    use ApiResponses;

    public function index(): JsonResponse
    {
        
        $user = Auth::user();
  
        return $this->successResponse($user, 200);
          
    }
}
