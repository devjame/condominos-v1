<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use DB;

use App\Models\Pagamento;

class Proprietario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        "phone",
        "fracao",
        "divida",
        "divida_atual",
        "permilagem"
    ];

    /**
     * Obter os pagamento do proprietario
     */
    public function pagamentos(): HasMany
    {
        return $this->hasMany(Pagamento::class);
    }

     
}
