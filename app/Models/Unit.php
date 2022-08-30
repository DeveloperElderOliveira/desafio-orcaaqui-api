<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 * 
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Solicit[] $solicits
 *
 * @package App\Models
 */
class Unit extends Model
{
	protected $table = 'units';

	protected $fillable = [
		'nome',
		'descricao'
	];

	public function solicits()
	{
		return $this->hasMany(Solicit::class);
	}
}
