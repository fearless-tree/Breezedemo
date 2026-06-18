<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllergeenModel extends Model
{
    public function sp_GetAllAllergenen()
    {
        return DB::select('CALL SP_GetAllAllergenen');
    }

    public function sp_CreateAllergeen($name, $description)
    {
        $row = DB::selectOne(
            'CALL sp_CreateAllergeen(:name, :description)',
            [
                'name' => $name,
                'description' => $description
            ]
        );
        return $row->new_id;
    }

    public function sp_DeleteAllergeen($id)
    {
        $result = DB::selectOne('CALL sp_DeleteAllergeen(:id)', [
            'id' => $id
        ]);

        return $result->affected;
    }

    public function sp_GetAllergeenById($id)
    {
        return DB::selectOne(
            'CALL sp_GetAllergeenById(:id)',
            ['id' => $id]
        );
    }

    public function sp_UpdateAllergeen($id, $name, $description)
    {
        $row = DB::selectOne(
            'CALL sp_UpdateAllergeen(:id, :name, :description)',
            [
                'id'          => $id,
                'name'        => $name,
                'description' => $description
            ]
        );

        // stored procedure geeft ROW_COUNT() als 'affected' terug
        return $row->affected ?? 0;
    }
}
