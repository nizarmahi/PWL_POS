<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as  Authenticatable;
// class UserModel extends Model implements Authenticatable
class UserModel extends Authenticatable implements  JWTSubject
{
    use HasFactory, AuthenticableTrait;

    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timespace = false;

    protected $fillable = [
        'level_id',
        'user_id',
        'username',
        'nama',
        'password',
        'image'
    ];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }

    // public function level(): BelongsTo{
    //     return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    // }
}
