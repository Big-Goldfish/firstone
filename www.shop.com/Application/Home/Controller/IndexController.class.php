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
        //��Ʒ��������;
        $brands = D('goods_category')->where(['status' => 1])->select();
        $this->assign('brands', $brands);

        //��Ʒ����(ǰ4����Ʒ);
        $new_goods = $this->_model->new_goods();
        $this->assign('new_goods', $new_goods);

        //��Ʒ�б� չʾȫ����Ʒ
        $goods_lists = $this->_model->goods_lists();
        $this->assign('goods_lists', $goods_lists);

        //����������������

        $articles = D('article')->select();
        $this->assign('articles', $articles);

        //���·�������
        //�����ݷ��ڻ���֮��
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


        //����������������
        $articles = D('article')->select();
        $this->assign('articles', $articles);

        //���·�������
        $article_categorys = D('article_category')->select();
        $this->assign('article_categorys', $article_categorys);



        $this->display('index');
    }
    public  function  username(){
        $name=session('MEMBER.username');
        $this->ajaxReturn($name);
    }

}