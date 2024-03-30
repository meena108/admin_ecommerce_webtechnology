<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    public function GetVisitorDetails()
    {
        try {
            $visitors = Visitor::all();
            return response()->json($visitors, 200);
        } catch (\Exception $e) {
            \Log::error('Error in GetVisitorDetails: ' . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
    }
}