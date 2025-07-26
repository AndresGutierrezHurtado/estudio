<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Play;
use App\Models\PlayTeam;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $search = request()->input('search', '');

            $plays = Play::with('teams');
            $plays = $plays->where(function ($query) use ($search) {
                $query->whereHas('teams', function ($query) use ($search) {
                    $query->where('team_name', 'LIKE', "%$search%");
                    $query->orWhere('team_code', 'LIKE', "%$search%");
                });
                $query->orWhere('play_date', 'LIKE', "%$search%");
                $query->orWhere('play_start', 'LIKE', "%$search%");
            });

            $plays = $plays->orderBy('play_date', 'desc')->get();

            return response()->json([
                'success' => true,
                'message' => 'se obtuvieron los resultados correctamente',
                'data' => $plays,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener los resultados: ' . $e->getMessage()
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
                    'play_date' => 'required',
                    'play_start' => 'required',
                    'local_id' => 'required|integer',
                    'local_goals' => 'required|integer',
                    'team_id' => 'required|integer',
                    'team_goals' => 'required|integer',
                ],
            );

            $new = DB::transaction(function () use ($request) {
                $play = Play::create($request->only('play_date', 'play_start'));

                $local = PlayTeam::create([
                    'play_id' => $play->play_id,
                    'team_id' => $request->input('local_id'),
                    'team_goals' => $request->input('local_goals'),
                    'team_local' => true,
                ]);

                $other = PlayTeam::create([
                    'play_id' => $play->play_id,
                    'team_id' => $request->input('team_id'),
                    'team_goals' => $request->input('team_goals'),
                    'team_local' => false,
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'se creo el resultado correctamente',
                'data' => $new,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el resultado: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            return response()->json([
                'success' => true,
                'message' => 'se obtuvo el resultado correctamente',
                'data' => [],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al x: ' . $e->getMessage()
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
