<?php

namespace Admin\Controller;

use Admin\Common\Helper\Page;

class GoodsController extends  PlatformController{
    private  $_model;
    protected  function  _initialize(){
        $this->_model=D('Goods');
    }

    public  function  index(){
        $count=$this->_model->count();
        $page=new Page($count,C('PAGE_SIZE'));
        $rows=$this->_model->table(['Goods'=>'a','Goods_Category'=>'b','Goods_detail'=>'c'])
            ->field('a.*,b.name,c.content')
            ->where('a.goods_category_id=b.id=c.goods_id and status=1')
            ->limit($page->firstRow,$page->listRows)
            ->select();

        $this->assign('page',$page->show());
        $this->assign('rows',$rows);
        $this->_getdata();
        $this->display();
    }

    public  function  add(){
        if(IS_POST){

            $content=I('post.content');
            $path=I('post.path');
            if(!$rows=$this->_model->create()){
                $this->error(get_errors($this->_model));
            };


            if(!$id=$this->_model->add()){
                $this->error('插入失败');
            }
            //添加商品的详情
            D('GoodsDetail')->add(
                ['goods_id'=>$id,
                'content'=>$content
                ]
            );

            //添加商品促销类型
            D('Goods_prom')->add([
                'goods_id'=>$id,
                'prom_id'=>$_POST['prom_id']
            ]);

            //得到商品相册路径并添加到数据库
            $path=$this->gallery($id,$path);
            $this->_model->addgallery($path);

            //记录每天添加商品的条数
            $a=$this->_model->addcount();   //添加数据成功后再向统计数据里面加入1并返回统计后的数据
            $b=$this->sn($a);               //根据记录条数返回拼接后的订单号嘛

            $this->_model->save(['sn'=>$b,'id'=>$id]);
            $this->success('添加成功',U('index'));

                
        }else{
            $this->_getdata();
            $proms=D('promotion')->select();
            $this->assign('proms',$proms);
            $this->display();
        }
    }

    //主页显示数据
    private function _getdata(){
        $categorys=D('GoodsCategory')->getlist('id,name,parent_id');
        $this->assign('categorys',$categorys);
        $brands=D('Brand')->getField('id,name,sort');
        $this->assign('brands',$brands);
        $proms=D('promotion')->select();
        $this->assign('proms',$proms);
    }
    //拼接商品订单
    public  function  sn($count){
        $day=date('Ymd',time());
        $number=str_pad($count,5,0,STR_PAD_LEFT);
        return   'sn'.$day.$number;
    }
    //删除商品 显示状态为0
    public  function  remove($id){
        $this->_model->save(['id'=>$id,'status'=>0]);
        $this->redirect('U:index');
    }
    //编辑商品
    public  function  edit($id){
        $this->_getdata();
        $rows=$this->_model->table(['goods'=>'a','goods_detail'=>'b'])
            ->where(['id'=>$id])
            ->select();
        $this->assign('row',$rows[0]);
        $this->display('add');
    }
    //拼接商品相册路径
    public  function  gallery($id,$path){
        $arr=[];
        foreach($path as $b){
           $arr[]=[ 'goods_id'=>$id,'path'=>$b];
        }
        return $arr;
    }
    //商品搜索功能
    public  function  search()
    {
        $data = $this->_is_value(I('post.'));  //得到拼接好的数据
        $rows = $this->_model
            ->field('goods.*,brand.name,goods_category.name')
            ->join(' join brand on brand.id=goods.brand_id')
            ->join(' join goods_category on goods_category.id=goods.goods_category_id')
            ->where($data)
            ->select();
        $this->assign('rows', $rows);
        $this->display('index');
    }

    //拼接搜索传过来的数据
    private  function _is_value($data){
        if( isset($data['name'])){
            $str['goods_name']=['like','%'.$data['name'].'%'];
        }
        if($data['category_id']!=0){
            $str['goods_category_id']=['eq',$data['category_id']];
        }
        if($data['brand_id']!=0){
            $str['brand_id']=['eq',$data['brand_id']];
        }
         if($data['min']>=$data['max']){
             unset($data['max']);
         }
        if($data['min'] and (!$data['max'])){
            $str['shop_price']=['egt',$data['min']];
        }
        elseif((!$data['min']) and ($data['max'])){
            $str['shop_price']=['elt',$data['max']];
        }
        elseif(($data['min']) and ($data['max'])){
            $str['shop_price']=['between',[$data['min'],$data['max']]];
        }
        return $str;
    }
    //相册上传
    public function pics(){
        if(IS_POST){
            if($this->_model->addPics(I('post.')) === false){
                $this->error(get_errors($this->_model));
            }
            $this->success('相册上传成功！',U('pics',['id'=>I('post.goods_id')]));
        }else{
            $id = I('get.id');
            $this->assign('id',$id);
            $data = D('GoodsGallery')->where(['goods_id'=>$id])->select();
            $this->assign('data',$data);
            $this->display();
        }
    }
    public  function  pic_delete($id,$goods_id){

        if(D('Goods_gallery')->delete($id)){
            $this->success('删除成功！',U('pics',['id'=>$goods_id]));
        };
    }



}
