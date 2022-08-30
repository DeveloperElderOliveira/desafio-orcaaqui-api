<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entity
 * 
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Entity extends Model
{
	protected $table = 'entities';

	protected $fillable = [
		'nome',
		'descricao'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
