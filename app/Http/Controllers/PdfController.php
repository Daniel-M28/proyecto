<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class PdfController extends Controller
{
    public function showForm()
    {
    $user = Auth::user();

    $pdfFiles = $this->getUserPdfs($user);
    $users = User::all();
    $isAdmin = $user->roles()->where('name', 'admin')->exists();

    if ($isAdmin) {
        $pdfFiles = Storage::files('pdfs');
    }
    return view('pdf.form', compact('pdfFiles', 'users', 'isAdmin'));
    }

    public function uploadPdf(Request $request)
    {
        
    Gate::authorize('cargar-pdf');

    $request->validate([
        'pdf' => 'required|mimes:pdf|max:10240',
        'user_id' => 'required|exists:users,id',
    ]);

   
    $targetUserId = $request->user_id;

    
    $filename = 'pdf_usuario_' . $targetUserId . '_' . time() . '.' . $request->file('pdf')->getClientOriginalExtension();

   
    $pdfPath = $request->file('pdf')->storeAs('pdfs', $filename);

    return redirect('/cargar-pdf')->with('pdfPath', $pdfPath);
    }

    private function getUserPdfs($user)
    {
       
    $files = Storage::files('pdfs');

    
    $userFiles = [];
    foreach ($files as $file) {
        
        if (strpos($file, 'pdf_usuario_' . $user->id . '_') !== false) {
            $userFiles[] = $file;
        }
    }

    return $userFiles;
    }

    public function deletePdf($filename)
    {
      
        Gate::authorize('eliminar-pdf');

        $filepath = storage_path("app/pdfs/{$filename}");

        if (file_exists($filepath)) {
            Storage::delete("pdfs/{$filename}");
            return redirect('/cargar-pdf')->with('success', 'Archivo eliminado correctamente');
        } else {
            return redirect('/cargar-pdf')->with('error', 'Archivo no encontrado');
        }
    }

    public function viewPdf($filename)
    {
        $filepath = storage_path("app/pdfs/{$filename}");

        if (file_exists($filepath)) {
            $headers = [
                'Content-Type' => 'application/pdf',
            ];

            // return the PDF as a response, not as a download
            return response()->file($filepath, $headers);
        } else {
            error_log("El archivo PDF '{$filename}' no se encontró en la ubicación '{$filepath}'.");
            
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }
    }

}
