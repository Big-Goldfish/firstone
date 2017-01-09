<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    private $_model;

    protected function  _initialize()
    {
        $this->_model = D('Index');
    }

    public function index()
    {
        //商品分类数据;
        $brands = D('goods_category')->where(['status' => 1])->select();
        $this->assign('brands', $brands);

        //新品数据(前4个商品);
        $new_goods = $this->_model->new_goods();
        $this->assign('new_goods', $new_goods);

        //商品列表 展示全部商品
        $goods_lists = $this->_model->goods_lists();
        $this->assign('goods_lists', $goods_lists);

        //文章数据内容数据

        $articles = D('article')->select();
        $this->assign('articles', $articles);

        //文章分类数据
        //把数据放在缓存之中
        if(!$article_categorys=S('article_categorys')){
            $article_categorys = D('article_category')->select();
            S('article_categorys',$article_categorys,500);
            echo 23434;
        }

        $this->assign('article_categorys', $article_categorys);

        $session=session('MEMBER');
       // dump($session);die;
        $this->assign('session',$session);

        $this->display();
    }

    public function  tcommon($id)
    {
        $articles=D('article')->join('article_detail ad on ad.article_id=article.id')->select($id);
        $this->assign('articles',$articles[0]);
        $this->display();
    }

    public function  brand($id)
    {
        $brands = D('goods_category')->where(['status' => 1])->select();
        $this->assign('brands', $brands);


        $goods_lists = D('goods')->where(['goods_category_id' => $id])->select();
        $this->assign('goods_lists', $goods_lists);


        //文章数据内容数据
        $articles = D('article')->select();
        $this->assign('articles', $articles);

        //文章分类数据
        $article_categorys = D('article_category')->select();
        $this->assign('article_categorys', $article_categorys);



        $this->display('index');
    }
    public  function  username(){
        $name=session('MEMBER.username');
        $this->ajaxReturn($name);
    }

}