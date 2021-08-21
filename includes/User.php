<?php

session_start();

class User{


    private $db_table_fields = ["id", 'name', 'family_name', 'image', 'is_active'];
    public $id;
    public $name;
    public $family_name;
    public $image;
    public $is_active;
    private $uploadPath = "../uploads/";


    public  static function find_all()
    {
        $query = "select * from users";

        return static::find_by_query($query);

    }


    public static function find_by_id($id)
    {
        $the_result_array =  static::find_by_query("select * from users where id='$id'");

        return !empty($the_result_array) ? array_shift($the_result_array): false;
    }


    public static function find_by_query($sql)
    {
        global $database;
        $result = $database->query($sql);
        $object = [];

        while($row = mysqli_fetch_assoc($result))
        {
            $object[] = static::instantiate($row);
        }

        return $object;

    }

    private static function instantiate($row)
    {

        $object_name = get_called_class();

        $new_object = new $object_name;

        foreach ($row as $item => $value){
            if($new_object->has_attribute($item))
            {
                $new_object->$item = $value;
            }
        }

        return $new_object;

    }

    private function has_attribute($item)
    {
        $object_properties = get_object_vars($this);

        return array_key_exists($item,$object_properties);

    }


    public function create(){
        global $database;




        $sql = "insert into users( name, family_name, image, is_active) values( '";
        $sql .= $database->escape_string($this->name)."', '";
        $sql .= $database->escape_string($this->family_name)."', '";
        if($this->upload_file($this->image))
        {
            $sql .= $database->escape_string($this->image)."', ";
        }
        $sql .= "0 )";
        $_SESSION['created'] = $this->name." muvafaqiyatli yaratildi!";

        return $database->query($sql);

    }

    public function update()
    {
        global $database;


        $sql = "update users set ";
        $sql .= "name='".$database->escape_string($this->name)."', ";
        $sql .= "family_name='".$database->escape_string($this->family_name)."', ";
        if($this->upload_file($this->image))
        {
            $sql .= "image='".$this->image."', ";
        }
        $sql .= "is_active=0 where id='$this->id'";

        $_SESSION['updated'] = $this->name." muvafaqiyatli o'zgartirildi!";

        return $database->query($sql);


    }


    public function delete(){

        global $database;
        $_SESSION['deleted'] = $this->name." muvafaqiyatli o'chirildi";

        return $database->query("delete from users where id='$this->id'");



    }
    public function upload_file($file)
    {
       if (!empty($file)){
           move_uploaded_file($file['tmp_name'], $this->uploadPath.$file['name']);
           $this->image = $file['name'];
           return true;
       }else{
           return false;
       }


    }
    public function picture_path()
    {
        return $this->uploadPath.$this->image;
    }

    public function set_active()
    {
        global $database;

        $sql = "update users set ";
        $sql .= "is_active=".$database->escape_string($this->is_active);
        $sql .= " where id='$this->id'";


        return $database->query($sql);


    }



}


