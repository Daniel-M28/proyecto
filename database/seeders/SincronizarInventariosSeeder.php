<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Producto; // Asegúrate de importar el modelo Producto si no está importado

class SincronizarInventariosSeeder extends Seeder
{
    public function run()
    {
      
        $inventarios = DB::table('inventarios')->get();

        
        foreach ($inventarios as $inventario) {
            $producto = Producto::where('titulo', $inventario->producto)->first();
            if ($producto) {
                DB::table('inventarios')->where('id', $inventario->id)
                    ->update(['producto_id' => $producto->id]);
            }
        }
    }
}

?>