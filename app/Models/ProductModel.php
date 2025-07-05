<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
	protected $table = 'product'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'nama','harga','jumlah','foto','category','weight','created_at','updated_at'
	];  

    public function getSoldProducts()
    {
        $builder = $this->db->table('transaction_detail td');
        $builder->select('p.nama, p.harga, SUM(td.jumlah) as jumlah, SUM(td.subtotal_harga) as total');
        $builder->join('product p', 'p.id = td.product_id');
        $builder->groupBy('p.id, p.nama, p.harga');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
