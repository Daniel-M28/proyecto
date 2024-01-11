<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;


class PdfController extends Controller
{
    
        public function showForm()
        { 
            // Verificar permiso para ver la página de carga de PDF
            /*Gate::authorize('cargar-pdf');*/
    
            $pdfFiles = $this->pdfFiles();
            return view('pdf.form', compact('pdfFiles'));
        }
    
        public function uploadPdf(Request $request)
        {
            // Verificar permiso para cargar PDF
            Gate::authorize('cargar-pdf');
    
            $request->validate([
                'pdf' => 'required|mimes:pdf|max:10240',
            ]);
    
            $originalName = $request->file('pdf')->getClientOriginalName();
            $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $request->file('pdf')->getClientOriginalExtension();
    
            $pdfPath = $request->file('pdf')->storeAs('pdfs', $filename);
    
            return redirect('/cargar-pdf')->with('pdfPath', $pdfPath);
        }
    
        public function downloadPdf($filename)
        {
            // Verificar permiso para descargar PDF
           /* Gate::authorize('descargar-pdf');*/
    
            $filepath = storage_path("app/pdfs/{$filename}");
    
            if (file_exists($filepath)) {
                return response()->download($filepath, $filename);
            } else {
                return response()->json(['error' => 'Archivo no encontrado'], 404);
            }
        }
    
        public function viewPdf($filename)
        {
            // Verificar permiso para ver PDF
          /*  Gate::authorize('ver-pdf');*/
    
            $filepath = storage_path("app/pdfs/{$filename}");
    
            if (file_exists($filepath)) {
                return response()->file($filepath);
            } else {
                return response()->json(['error' => 'Archivo no encontrado'], 404);
            }
        }
    
        public function deletePdf($filename)
        {
            // Verificar permiso para eliminar PDF
            Gate::authorize('eliminar-pdf');
    
            $filepath = storage_path("app/pdfs/{$filename}");
    
            if (file_exists($filepath)) {
                Storage::delete("pdfs/{$filename}");
                return redirect('/cargar-pdf')->with('success', 'Archivo eliminado correctamente');
            } else {
                return redirect('/cargar-pdf')->with('error', 'Archivo no encontrado');
            }
        }
    
        private function pdfFiles()
        {
            $files = [];
            $pdfPath = storage_path('app/pdfs');
    
            foreach (Storage::files('pdfs') as $file) {
                $files[] = [
                    'filename' => basename($file),
                    'name' => pathinfo($file, PATHINFO_FILENAME),
                ];
            }
    
            return $files;
        }
}
