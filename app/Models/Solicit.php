<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicit
 * 
 * @property int $id
 * @property string $observacao
 * @property int $quantidade
 * @property int $product_id
 * @property int $unit_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property Unit $unit
 *
 * @package App\Models
 */
class Solicit extends Model
{
	protected $table = 'solicits';
	protected $dateFormat = 'U';

	protected $casts = [
		'stauts' => 'int',
	];

	protected $fillable = [
		'observacao',
		'status',
	];

	public function getStatusAttribute($value){
		return $value == 1 ? 'APROVADO' : 'RECUSADO';
	}
	
	public function products()
	{
		return $this->belongsToMany(Product::class)
					->withTimestamps();
	}

}
