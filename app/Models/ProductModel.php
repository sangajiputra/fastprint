<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'no_produk';
    protected $allowedFields = ['id_produk','nama_produk', 'harga', 'kategori', 'status'];
}
