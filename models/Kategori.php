<?php
/**
 * Description of News
 *
 * @author YtuUzem
 */
class Kategori extends Admin {
    
    public function insert( $isim ){
        
        $sql = 'INSERT INTO kategori(isim)'
                . "VALUES('$isim');";
        
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    
    public function delete($id){
        
        $sql = "DELETE FROM kategori WHERE id=$id;";
        $delete_result = self::$db->query($sql);
        
       

        return $delete_result;
    }
    public function update($isim){
    
        $sql="update kategori set isim= '$isim' where id='$id'; ";
    
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    

    

    public function getKategori($number=NULL) {
        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";
        
        $sql = 'SELECT * FROM kategori';
        $sql .= ' ORDER BY time DESC';
        $sql .= is_null($limit) ? '' : $limit;
       
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    
    public static function getTotalKategori(){
        $sql = 'SELECT count(*) FROM kategori;';
        
        return self::db()->get_var($sql);
    }
    
}
