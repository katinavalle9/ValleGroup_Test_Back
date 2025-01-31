<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Obtener parámetros con valores predeterminados
        $limit = $request->input('limit', 10);
        $orderBy = $request->input('orderBy', 'id');
        $orderDir = $request->input('orderDir', 'asc');
        $search = $request->input('search', '');
        if (!in_array(strtolower($orderDir), ['asc', 'desc'])) {
            $orderDir = 'asc'; // ✅ Si `orderDir` es inválido, usa 'asc'
        }

        // Validar que `orderBy` no esté vacío
        if (empty($orderBy)) {
            $orderBy = 'id'; // ✅ Si `orderBy` es inválido, usa 'id'
        }
        // Construir la consulta con búsqueda si se proporciona un término
        $query = Product::query();

        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('price', 'like', "%{$search}%");
        }

        // Aplicar ordenamiento
        $query->orderBy($orderBy, $orderDir);

        // Aplicar paginación
        $products = $query->paginate($limit);

        return response()->json([
            'data' => $products->items(),
            'total' => $products->total(),
            'per_page' => $products->perPage(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $product->delete();
        return response()->json(null, 204);
    }
}
