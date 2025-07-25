<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Play;
use App\Models\PlayTeam;
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
            $filters = [
                'search' => request()->input('search', ''),
                'country_id' => request()->input('country', null),
            ];

            $plays = Play::with('teams');

            $plays = $plays->whereHas('teams', function ($query) use ($filters) {
                $query->where('team_name', 'LIKE', "%{$filters['search']}%");
                $query->orWhere('team_code', 'LIKE', "%{$filters['search']}%");
            });

            if (isset($country_id)) {
                $plays = $plays->whereHas('teams', function ($query) use ($filters) {
                    $query->orWhere('team_id', $filters['country_id']);
                });
            }

            $plays = $plays->get();

            return response()->json([
                'success' => true,
                'message' => 'Equipos obtenidos correctamente',
                'data' => $plays,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
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
                    'local_id' => 'required|int',
                    'local_goals' => 'required|boolean',
                    'team_id' => 'required|int',
                    'team_goals' => 'required|boolean',
                    'play_date' => 'required|date',
                    'play_start' => 'required|time'
                ],
                []
            );

            $playResult = DB::transaction(function () use ($request) {
                $play = Play::create($request->only('play_date', 'play_start'));

                // Local team
                PlayTeam::create([
                    'play_id' => $play->play_id,
                    'team_id' => $request->get('local_id'),
                    'team_goals' => $request->get('local_goals'),
                    'team_local' => true,
                ]);

                // Other team
                PlayTeam::create([
                    'play_id' => $play->play_id,
                    'team_id' => $request->get('team_id'),
                    'team_goals' => $request->get('team_goals'),
                    'team_local' => false,
                ]);

                return Play::with('teams')->where('play_id', $play->play_id)->first();
            });


            return response()->json([
                'success' => true,
                'message' => 'Equipos obtenidos correctamente',
                'data' => $playResult,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }
}
