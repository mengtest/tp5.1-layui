<?php
namespace app\index\controller;

use app\common\model\ShopCart as Cart;

class ShopCart extends Base {
    protected function initialize(){
        parent::initialize();
        if (!self::islogin()){
            $this->error('您需要登录后在进行操作','user/login');
        }
        $this->Cart = new Cart();
    }
    // 购物车展示
    public function cart(){
        return $this->fetch('cart');
    }
    // 购物车商品添加
    public function add(){
        $goodsId = input('post.did');
        $goodsSum = input('post.sum');
        $pay = $this->Cart->addPay($goodsId,$goodsSum);
        if ($pay){
            return json(['code'=>'1001','data'=>'添加成功','url'=>'{:url("ShopCart/cart")}']);
        }else
            return json(['code'=>'1004','data'=>'添加失败']);
    }
    // 购物车商品购买
    public function pay(){
        $goodsId = input('post.did');
        $goodsSum = input('post.sum');
        $pay = $this->Cart->addPay($goodsId,$goodsSum);
        if ($pay){
            return json(['code'=>'1001','data'=>'购买成功']);
        }else
            return json(['code'=>'1004','data'=>'付款失败']);
    }
    // 购物车中的订单
    public function order(){
        $shopCart = $this->Cart->getSelectAll();
        return $this->fetch('index',[
            'shopCart' =>  $shopCart,
        ]);
    }
    // 状态修改
    public function status(){
        if (request()->isPost()){
            $id = input('post.id','','htmlspecialchars');
            $result = $this->Cart->field('status')->find($id);
            ($result['status']=='1')?($result['status']='0'):($result['status']='1');
            $re = $this->Cart->save(['status'=>$result['status']],['id'=>$id]);
            if ($re){
                return json(['code'=>'1001','data'=>'修改成功']);
            }else
                return json(['code'=>'1004','data'=>'修改失败']);
        }
    }
    // 栏目排序ajax
    public function sort(){
        $id = $this->request->param('id');
        $sort = $this->request->param('sort');
        $result = $this->Cart->where('id',$id)->find();
        if ($result){
            $res = $this->Cart->save(['sort'=>$sort],['id'=>$id]);
            return json(['code'=>'1001','data'=>'修改成功']);
        }
        return json(['code'=>'1004','data'=>'修改失败']);
    }
}