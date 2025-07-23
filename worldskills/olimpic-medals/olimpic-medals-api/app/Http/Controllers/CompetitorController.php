<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Competitor;
use Illuminate\Http\Request;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $sort = $request->input('sort', 'competitor_name:asc');
            $order = explode(':', $sort)[1];
            $sort = explode(':', $sort)[0];

            $filters = [
                'search' => $request->input('search', ''),
                'page' => $request->input('page', 1),
                'limit' => $request->input('limit', 10),
                'sort' => $sort,
                'order' => $order
            ];

            $competitors = Competitor::with('country', 'medals')
                ->where(function ($query) use ($filters) {
                    $query->where('competitor_name', 'LIKE', "%{$filters['search']}%");
                    $query->orWhere('competitor_lastname', 'LIKE', "%{$filters['search']}%");
                    $query->orWhere('competitor_description', 'LIKE', "%{$filters['search']}%");
                    $query->orWhereHas('country', function ($query2) use ($filters) {
                        $query2->where('country_name', 'LIKE', "%{$filters['search']}%");
                        $query2->orWhere('country_code', 'LIKE', "%{$filters['search']}%");
                    });
                })->paginate($filters['limit']);

            return response()->json([
                'success' => true,
                'message' => 'Competidores obtenidos correctamente',
                'data' => $competitors->getCollection(),
                'total' => $competitors->total()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener los competidores: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'competitor_name' => 'required|string',
                    'competitor_lastname' => 'required|string',
                    'competitor_description' => 'required|string',
                    'competitor_birthdate' => 'required|date',
                    'country_id' => 'required|integer|exists:countries,country_id'
                ]
            );

            $newCompetitor = Competitor::create([
                'competitor_name' => $request->input('competitor_name'),
                'competitor_lastname' => $request->input('competitor_lastname'),
                'competitor_description' => $request->input('competitor_description'),
                'competitor_birthdate' => $request->input('competitor_birthdate'),
                'country_id' => $request->input('country_id'),
            ]);

            if (!$newCompetitor) {
                throw new \Exception("Hubo un error al crear el competidor");
            }

            return response()->json([
                'success' => true,
                'message' => 'Competidor creado exitosamente',
                'data' => $newCompetitor,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al crear el competidor: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $competitor = Competitor::with('country', 'medals')
                ->where('competitor_id', $id)->first();

            if (!$competitor) {
                throw new \Exception("No se encontró el competidor o no existe");
            }

            return response()->json([
                'success' => true,
                'message' => 'Competidor obtenida correctamente',
                'data' => $competitor,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener el competidor: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate(
                [
                    'competitor_name' => 'required|string',
                    'competitor_lastname' => 'required|string',
                    'competitor_description' => 'required|string',
                    'competitor_birthdate' => 'required|date',
                    'country_id' => 'required|integer|exists:countries,country_id'
                ]
            );

            $competitor = Competitor::where('competitor_id', $id)->first();

            if (!$competitor) {
                throw new \Exception("No se encontró el competidor o no existe");
            }

            $competitor->update($request->only(
                'competitor_name',
                'competitor_lastname',
                'competitor_description',
                'competitor_birthdate',
                'country_id'
            ));

            return response()->json([
                'success' => true,
                'message' => 'Competidor actualizado correctamente',
                'data' => $competitor,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error el competidor la medalla: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $competitor = Competitor::where('competitor_id', $id)->first();

            if (!$competitor) {
                throw new \Exception("No se encontró el competidor o no existe");
            }

            Competitor::destroy($id);

            return response()->json([
                'success' => true,
                'message' => 'Competidor eliminado correctamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al eliminar el competidor: ' . $e->getMessage(),
            ], 500);
        }
    }
}
