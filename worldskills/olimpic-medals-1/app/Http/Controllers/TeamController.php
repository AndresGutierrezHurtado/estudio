<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $search = request()->input('search', '');

            $teams = Team::with('plays');
            $teams = $teams->where(function ($query) use ($search) {
                $query->where('team_name', 'LIKE', "%$search%");
                $query->orWhere('team_code', 'LIKE', "%$search%");
                $query->orWhere('team_id', 'LIKE', "%$search%");
            });

            $teams = $teams->get();

            return response()->json([
                'success' => true,
                'message' => 'se obtuvieron las selecciones correctamente',
                'data' => $teams,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al otener las selecciones: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function ranking()
    {
        try {
            $teams = Team::with('plays')->get();

            $result = [];

            foreach($teams as $team) {
                $t = $team->toArray();
                $t['stats'] = $team->stats();

                $result[] = $t;
            }

            return response()->json([
                'success' => true,
                'message' => 'se obtuvieron las selecciones correctamente',
                'data' => $result,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener el listado: ' . $e->getMessage()
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
                    'team_name' => 'required|string',
                    'team_code' => 'required|string|min:3|max:3',
                    'team_file' => 'required|image|dimensions:width=500,height=500|size:3072',
                ],
                [
                    'team_name.required' => 'El nombre del equipo es necesario',
                    'team_code.required' => 'El código equipo es necesario',
                    'team_code.min' => 'El código equipo debe tener una longitud de 3 carácteres',
                    'team_code.max' => 'El código equipo debe tener una longitud de 3 carácteres',
                    'team_file.required' => 'La imagen de la selección es necesaria',
                    'team_file.size' => 'La imagen de la selección debe pesar máximo 3MB',
                    'team_file.dimensions' => 'La imagen de la selección debe tener una dimension de 500 x 500',
                    'team_file.image' => 'La imagen de la selección debe ser una imagen',
                ]
            );

            $data = [
                'team_name' => $request->input('team_name'),
                'team_code' => $request->input('team_code'),
                'team_image' => '/storage/teams/default.jpg',
            ];

            $new = Team::create($data);

            $request->file('team_file')->storeAs('teams', $new->team_id . '.jpg', 'public');

            $new->update([
                'team_file' => "/storage/teams/{$new->team_id}.jpg",
            ]);

            return response()->json([
                'success' => true,
                'message' => 'se creo la selección correctamente',
                'data' => $new,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al crear la selección: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $team = Team::with('plays', 'plays.teams')
                ->where('team_id', $id)
                ->first();

            $result = $team->toArray();

            $result['stats'] = $team->stats();

            return response()->json([
                'success' => true,
                'message' => 'se obtuvo la selección correctamente',
                'data' => $result,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener la selección: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            return response()->json([
                'success' => true,
                'message' => 'se xxx correctamente',
                'data' => []
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al x: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            return response()->json([
                'success' => true,
                'message' => 'se xxx correctamente',
                'data' => []
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al x: ' . $e->getMessage()
            ], 500);
        }
    }
}
