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

        //获取结果集,二维数组
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
     * 获取第一行的第一列数据
     * @param type $sql
     * @param array $args
     * @return scalar 标量类型.
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
     * 返回第一行记录,关联数组的方式
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
     * 执行插入操作,返回新记录的id
     * @param type $sql
     * @param array $args
     * @return integer|false
     */
    public function insert($sql, array $args = array()) {


        $args = func_get_args();
        //获取sql结构语句
        $sql = $args[0];
        //获取表名
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
        //获取实参列表

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
     * 拼凑sql语句
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