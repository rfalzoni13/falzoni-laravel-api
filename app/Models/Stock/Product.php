<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\Stock\ProductFactory> */
    use HasFactory, HasUuids;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Generate a new unique key for the model.
     *
     * @return string
     */
    public function newUniqueId(): UuidV4
    {
        return Uuid::v4();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'discount'
    ];
}
