<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $descricao
 * @property float $preco
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category $category
 * @property Collection|Solicit[] $solicits
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'preco' => 'float',
		'category_id' => 'int'
	];

	protected $fillable = [
		'descricao',
		'preco',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function solicits()
	{
		return $this->hasMany(Solicit::class);
	}
}
