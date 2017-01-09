<?php
namespace Admin\Common\layout;

class MysqlDb implements DbMysql{
    public function connect() {
        echo __METHOD__ . '<br/>';
        dump(func_get_args());
        echo '<hr />';
    }

    public function disconnect() {
        echo __METHOD__ . '<br/>';
        dump(func_get_args());
        echo '<hr />';
    }

    public function free($result) {
        echo __METHOD__ . '<br/>';
        dump(func_get_args());
        echo '<hr />';
    }

    public function getAll($sql, array $args = array()) {
        $args = func_get_args();
        $tmpSql = $this->_buildSql($args);

        //��ȡ�����,��ά����
        return M()->query($tmpSql);
    }

    public function getAssoc($sql, array $args = array()) {
        echo __METHOD__ . '<br/>';
        dump(func_get_args());
        echo '<hr />';
    }

    public function getCol($sql, array $args = array()) {
        echo __METHOD__ . '<br/>';
        dump(func_get_args());
        echo '<hr />';
    }

    /**
     * ��ȡ��һ�еĵ�һ������
     * @param type $sql
     * @param array $args
     * @return scalar ��������.
     */
    public function getOne($sql, array $args = array()) {

        $args=func_get_args();
        $tmpsql=$this->_buildSql($args);
        $res=M()->query($tmpsql);
        $row=array_shift($res);
        $field=array_shift($row);
       return $field;
    }

    /**
     * ���ص�һ�м�¼,��������ķ�ʽ
     * @param type $sql
     * @param array $args
     * @return array
     */
    public function getRow($sql, array $args = array()) {

        $args=func_get_args();
        $tmpsql=$this->_buildSql($args);
        $rst=M()->query($tmpsql);
        return array_shift($rst);

    }

    /**
     * ִ�в������,�����¼�¼��id
     * @param type $sql
     * @param array $args
     * @return integer|false
     */
    public function insert($sql, array $args = array()) {


        $args = func_get_args();
        //��ȡsql�ṹ���
        $sql = $args[0];
        //��ȡ����
        $tableName = $args[1];
        $sql = str_replace('?T', $tableName, $sql);
        $params = $args[2];
        $tmp_sql = [];
        foreach($params as $field=>$value){
            $tmp_sql[] = $field . '="' . $value . '"';
        }
        $tmp_sql = implode(',', $tmp_sql);
        $sql = str_replace('?%', $tmp_sql, $sql);
        $rst = M()->execute($sql);
        return M()->getLastInsID();
    }

    public function query($sql, array $args = array()) {
        //��ȡʵ���б�

        $args=func_get_args();
        $tmpsql=$this->_buildSql($args);
        return M()->execute($tmpsql);

    }

    /**
     * @param type $sql
     * @param array $args
     * @return integer|false
     */
    public function update($sql, array $args = array()) {
        echo __METHOD__ . '<br/>';
        dump(func_get_args());
        echo '<hr />';
    }

    /**
     * ƴ��sql���
     * @param array $args
     * @return string
     */
    private function _buildSql(array $args)
    {


        $sql=array_shift($args);
        $sql=preg_split('/\?[FNT]/',$sql);
        array_pop($sql);
        $tmpsql='';
        foreach($sql as $key=>$value){
            $tmpsql.=$value.$args[$key];
        }
        return $tmpsql;
    }

}