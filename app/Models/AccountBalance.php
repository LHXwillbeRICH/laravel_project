<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
    /*
    * 根据条件查询订单（需要完善）
    * @param $fields
    * @param $value
    * @param string $condition
    * @return mixed
    */
    public function getAccountBalanceByUserId($id){
        $where['u_id'] = $id;
        return $this->where($where)->first();
    }
    /**
     * @param array $data
     * @return mixed
     * 添加订单
     */
    public function addAccountBalance($data){
        return $this->insert($data);
    }


    /**
     * 修改余额
     * @param $plat_id
     * @param $data
     * @return bool
     */
    public function editAccountBalance($u_id,$money,$type){
        switch ($type){
            case 'ADDAT':
                return $this->where(['u_id'=>$u_id])->increment('account',$money);
                break;
            case 'ADDFA':
                return $this->where(['u_id'=>$u_id])->increment('freezing_account',$money);
                break;
            case 'DECAT':
                return $this->where(['u_id'=>$u_id])->decrement('account',$money);
                break;
            case 'DECFA':
                return $this->where(['u_id'=>$u_id])->decrement('freezing_account',$money);
                break;
        }

    }

    /**
     * 删除订单
     * @param $id
     * @return mixed
     */
    public function deleteAccountBalance($field,$value,$data){
        return $this->where([$field => $value])->save($data);
    }
}
