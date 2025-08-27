<?php 
namespace App\Models;
use CodeIgniter\Model;


class GUsuarioModel extends Model{
    protected $table = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario','nombre','carnet','correo','rol','password'];
    
}