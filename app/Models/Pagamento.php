<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Proprietario;

class Pagamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'valor',
        'data',
        'metodo',
    ];

    /**
     * Obter o proprietario a quem o pagamento pertence.
     */
    public function proprietario(): BelongsTo
    {
        return $this->belongsTo(Proprietario::class);
    }
}
