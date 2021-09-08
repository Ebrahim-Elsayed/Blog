<?php

namespace App\Http\Controllers\Admin\trait;

use App\Models\User;
use PDF;

trait PDFGenerator {
    public function userpdf(){
        $users = User::all();
        $pdf = PDF::loadView('admin.user.userpdf', compact('users'));
        return $pdf->download('users.pdf');
    }
}