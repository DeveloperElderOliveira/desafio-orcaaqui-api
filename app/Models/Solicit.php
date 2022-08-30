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

	protected $casts = [
		'quantidade' => 'int',
		'product_id' => 'int',
		'stauts' => 'int',
		'unit_id' => 'int'
	];

	protected $fillable = [
		'observacao',
		'quantidade',
		'product_id',
		'status',
		'unit_id'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function unit()
	{
		return $this->belongsTo(Unit::class);
	}
}
