<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserPanel extends Authenticatable implements LaratrustUser
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRolesAndPermissions;

    protected $connection = 'oracle';

    protected $table = 'REFCENTRAL.USUARIO';

    protected $primaryKey = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'USUARIO',
        'CLAVE',
        'personas_id',
        'perfil_id',
        'fecha_ingreso',
        'descripcion',
        'activo',
        'usuario_id_mod',
        'fecha_mod',
        'clave_historial'
    ];

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'clave',
        'remember_token',
    ];

}
