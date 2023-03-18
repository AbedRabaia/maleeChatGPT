<?php

namespace App\Models\Malee;

use CodeIgniter\Model;

class WhatsappSessionsModel extends Model
{
    protected $table = 'whatsapp_sessions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'mobile', 'player_id'];
    protected $returnType = 'object';
}
