<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rolename'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sp_GetAllUsers($user_Id)
    {
        $result = DB::select('CALL sp_GetAllUsers(:id)', ['id' => $user_Id]);

        return $result;
    }

    public function sp_GetUserById($user_Id)
    {
        $result = DB::selectOne('CALL sp_GetUserById(:id)', ['id' => $user_Id]);

        return $result;
    }

    public function sp_GetAllUserroles()
    {
        $result = DB::select('CALL Sp_GetAllUserroles()');
        return $result;
    }

    public function sp_UpdateUser($id, $name, $email, $rolename)
    {
        $result = DB::selectOne('CALL Sp_UpdateUser(:id, :name, :email, :rolename)', [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'rolename' => $rolename
        ]);
    }

    public function sp_DeleteUser($userId)
    {
        $result = DB::selectOne('CALL sp_DeleteUser(:userId)', [
            'userId' => $userId
        ]);
        return $result->affected;
    }
}
