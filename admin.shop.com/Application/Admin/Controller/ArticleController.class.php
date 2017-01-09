<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 10:29
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Page;

class ArticleController extends PlatformController
{
        private $_model;
    //构造函数创建类名模型对象
        protected  function  _initialize(){
            $this->_model=D('Article');    //父类构造函数一个模块,穿件类名的一个模型
        }
    //主页  分页功能,根据条件显示
        public  function  index(){
             //统计出所有的记录条数
            $totalcount=$this->_model->count();
              //new一个分页对象传入总条数与每页显示条数
            $page=new Page($totalcount,C('PAGE_SIZE'));
              //分配数据到html页面
            $this->assign('pages',$page->show());

             //根据条件查询数据并分配
            $rows = $this->_model
                ->table(array('article'=>'a','article_detail'=>'c'))
                ->field('a.*,c.content')
                ->where('c.article_id=a.id and  status>-1')
                ->order('sort ')
                ->limit(
                    $page->firstRow,$page->listRows
                )
                ->select();


             $this->assign('rows',$rows);

            $res=D('Article_category')->select();

            $this->assign('res',$res);
             $this->display();
        }
    //显示文章分类
        public  function  article(){
            $rows=D('Article_category')
                ->where('status>-1')
                ->order('sort')
                ->select();
            $this->assign('rows',$rows);
            $this->display('article');

        }
    //添加分类,显示添加页面
        public function  article_add(){

            if(IS_POST){
                $rows=$this->_model->create();
                D('Article_category')->add($rows);
               $this->article();
            }else{
                $this->display('article_add');
            }

        }
    //添加文章,显示文章
        public  function  add(){
            if(IS_POST){
                if(!$rows=$this->_model->create()){
                    $this->error('get_errors()');
                }
               if($id=$this->_model->add($rows)){
                   $result=D('Article_detail')->add([
                       'article_id'=>$id,
                       'content'=>I('post.content','',false)]);
                   if($result){
                       $this->success("添加成功");
                   }else{
                       $this->error('添加失败');
                   }
               }
            }else{
                $rows=D('Article_category')->field('name,id')->select();
                $this->assign('rows',$rows);
                $this->display('add');
            }

        }
    //删除文章  修改状态为-1
        public function remove($id){
            $this->_model->save([
                'id'=>$id,
                'status'=>-1,
            ]);
            $this->redirect('U:index');
        }
    //删除文章分类  修改状态为-1
        public function del($id){
            D('Article_category')->save([
                'id'=>$id,
                'status'=>-1,
            ]);
            $this->redirect('U:article');
        }

    public function ajax(){
        if(IS_AJAX) {
            $id = I('post.id');

            $data=D('Article')->where('Article_category_id='.$id)->select();
         //   $data=json_decode($data);
            $a=$this->ajaxReturn(
               $data
            );
            $b=mysqli_fetch_assoc($a);
            dump($b);
            /* $rows = $this->_model
                 ->table(array('article'=>'a','article_detail'=>'c'))
                 ->field('a.*,c.content')
                 ->where('c.article_id=a.id and article_category_id=$id')
                 ->order('sort ')
                 ->select();
             $this->ajaxReturn($rows);
             if($name && $age){
                 //插入数据
                 $this->success('添加成功',U('User/index'),true);
             }else{
                 $this->ajaxReturn(array(
                     'status'    =>    0,
                     'info'    =>    '大爷,您没输入名字',
                     'url'    =>    U('User/add')
                 ));
             }

         }else{
             return false;
         }*/
        }
    }
}