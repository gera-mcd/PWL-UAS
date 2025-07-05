<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
	protected $table = 'product'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'nama','harga','jumlah','foto','created_at','updated_at'
	];  

    public function getProductsAndSoldCount()
    {
        $builder = $this->db->table($this->table . ' p');
        $builder->select('p.*, IFNULL(SUM(td.jumlah), 0) as sold_produk');
        $builder->join('transaction_detail td', 'p.id = td.product_id', 'left');
        $builder->groupBy('p.id');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
