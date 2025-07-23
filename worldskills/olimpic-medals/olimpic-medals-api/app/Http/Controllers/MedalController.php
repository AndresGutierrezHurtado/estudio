<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medal;
use Illuminate\Http\Request;

class MedalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $sort = $request->input('sort', 'medal_type:asc');
            $order = explode(':', $sort)[1];
            $sort = explode(':', $sort)[0];

            $filters = [
                'search' => $request->input('search', ''),
                'page' => $request->input('page', 1),
                'limit' => $request->input('limit', 10),
                'sort' => $sort,
                'order' => $order
            ];

            $medals = Medal::with('country', 'competitors')
                ->where(function ($query) use ($filters) {
                    $query->where('medal_type', 'LIKE', "%{$filters['search']}%");
                    $query->orWhere('medal_sport', 'LIKE', "%{$filters['search']}%");
                    $query->orWhere('medal_year', 'LIKE', "%{$filters['search']}%");
                })->paginate($filters['limit']);

            return response()->json([
                'success' => true,
                'message' => 'Medallas obtenidas correctamente',
                'data' => $medals->getCollection(),
                'total' => $medals->total()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener las medallas: ' . $e->getMessage(),
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
                    'medal_type' => 'required|in:gold,silver,bronze',
                    'medal_sport' => 'required|string',
                    'medal_year' => 'required|integer',
                    'country_id' => 'required|integer|exists:countries,country_id'
                ]
            );

            $newMedal = Medal::create([
                'medal_type' => $request->input('medal_type'),
                'medal_sport' => $request->input('medal_sport'),
                'modal_year' => $request->input('modal_year'),
                'country_id' => $request->input('country_id'),
            ]);

            if (!$newMedal) {
                throw new \Exception("Hubo un error al crear la medalla");
            }

            return response()->json([
                'success' => true,
                'message' => 'Medalla creada exitosamente',
                'data' => $newMedal,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al crear la medalla: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $medal = Medal::with('country', 'competitors')
                ->where('medal_id', $id)->first();

            if (!$medal) {
                throw new \Exception("No se encontró la medalla o no existe");
            }

            return response()->json([
                'success' => true,
                'message' => 'Medalla obtenida correctamente',
                'data' => $medal,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener la medalla: ' . $e->getMessage(),
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
                    'medal_type' => 'required|in:gold,silver,bronze',
                    'medal_sport' => 'required|string',
                    'medal_year' => 'required|integer',
                    'country_id' => 'required|integer|exists:countries,country_id'
                ]
            );

            $medal = Medal::where('medal_id', $id)->first();

            if (!$medal) {
                throw new \Exception("No se encontró la medalla o no existe");
            }

            $medal->update($request->only(
                'medal_type',
                'medal_sport',
                'medal_year',
                'country_id'
            ));

            return response()->json([
                'success' => true,
                'message' => 'Medalla actualizada correctamente',
                'data' => $medal,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al actualizar la medalla: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $medal = Medal::where('medal_id', $id)->first();

            if (!$medal) {
                throw new \Exception("No se encontró la medalla o no existe");
            }

            Medal::destroy($id);

            return response()->json([
                'success' => true,
                'message' => 'Medalla eliminada correctamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al eliminar la medalla: ' . $e->getMessage(),
            ], 500);
        }
    }
}
