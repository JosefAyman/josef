<?php

abstract class User {
    public $id;
    public $name;
    public $email;
    public $phone;
    protected $password;
    public $image_user;
    public $ban;
    public $created_at;
    public $updated_at;
    function __construct($id,$name,$email,$phone,$password,$image_user,$ban,$created_at,$updated_at)
    {
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->phone=$phone;
        $this->password=$password;
        $this->image_user = $image_user;
        $this->ban=$ban;
        $this->created_at=$created_at;
        $this->updated_at=$updated_at;
        
    }
    public static function login($email , $password){
        $user = null;
        $qry = "SELECT * FROM USERS WHERE email = '$email' AND password = '$password' ";
        require_once('connect.php');
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        if ($arr = mysqli_fetch_assoc($rslt) ) {
            switch ($arr["role"]) {
                case 'subscriber':
                   $user = new Subscriber($arr["id"],$arr["name"],$arr["email"],$arr["phone"],$arr["password"],$arr["image_user"],$arr["ban"],$arr["created_at"],$arr["updated_at"]);
                    break;
                
                    case 'admin':
                        $user = new Admin($arr["id"],$arr["name"],$arr["email"],$arr["phone"],$arr["password"],$arr["image_user"],$arr["ban"],$arr["created_at"],$arr["updated_at"]);
                         break;
            }
        }
        mysqli_close($cn);
        return $user ;
    }
}

class Admin extends User{
    public $role = "admin";
     function get_users(){
        $qry = "SELECT ID,name,email,phone FROM USERS ORDER BY CREATED_AT";
        require_once('connect.php');
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        $data = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
     }
     function get_posts(){
      $qry = "SELECT * FROM posts join users on posts.user_id = users.id ORDER BY posts.CREATED_AT";
      require_once('connect.php');
      $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
      $rslt = mysqli_query($cn,$qry);
      $data = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
      mysqli_close($cn);
      return $data;

     }
     function delete_posts($post_id){
      $qry = "DELETE FROM POSTS WHERE id = $post_id";
      require_once('connect.php');
      $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
      $rslt = mysqli_query($cn,$qry);
      mysqli_close($cn);
      return $rslt;

     }
     function Ban_users($user_id){
      $qry = "UPDATE users SET ban = 1 WHERE id= $user_id";
      require_once('connect.php');
      $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
      $rslt = mysqli_query($cn,$qry);
      mysqli_close($cn);
      return $rslt;

     }
     function delete_account($user_id){
      $qry = "DELETE FROM users WHERE id = $user_id";
      require_once('connect.php');
      $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
      $rslt = mysqli_query($cn,$qry);
      mysqli_close($cn);
      return $rslt;

     }

}
class  Subscriber extends User{
    public $role = "subscriber";
    public static function register($name, $email , $phone , $password){
        $qry = "INSERT INTO USERS (name,email,phone,password)
        VALUES ('$name','$email','$phone','$password')";
        require_once('connect.php');
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;
     }


     public function store_post($title,$content,$imageStore,$user_id){
        $qry = "INSERT INTO posts (title,content,image,user_id)values('$title','$content','$imageStore',$user_id)";
        require_once("connect.php");
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;
     }


     public function store_comment($commint,$post_id,$user_id){
        $qry = "INSERT INTO commints (content,post_id,user_id) values ('$commint',$post_id,$user_id)";
        require_once("connect.php");
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;
     }
     public function likes ($post_id,$user_id){
        $qry = "INSERT INTO likes (post_id,user_id) values ($post_id,$user_id)";
        require_once("connect.php");
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;
     }
     public function my_posts($user_id){
        $qry = "SELECT * FROM posts  WHERE user_id = $user_id ORDER BY CREATED_AT DESC ";
        require_once("connect.php");
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        $post = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $post ;
     }
     public function home_posts(){
        $qry = "SELECT * FROM posts join users on posts.user_id=users.id ORDER BY posts.CREATED_AT DESC LIMIT 10  ";
        require_once("connect.php");
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        $post = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $post ;
     }
     public function my_comments($post_id){
        $qry = "SELECT * FROM commints join users on commints.user_id = users.id WHERE post_id = $post_id ORDER BY commints.CREATED_AT DESC ";
        require_once("connect.php");
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        $comment = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $comment ;
     }
   //   public function home_comments(){
   //      $qry = "SELECT * FROM commints join users on commints.user_id = users.id  ORDER BY commints.CREATED_AT DESC ";
   //      require_once("connect.php");
   //      $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
   //      $rslt = mysqli_query($cn,$qry);
   //      $comment = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
   //      mysqli_close($cn);
   //      return $comment ;
   //   }
     public function profile_image($image,$user_id){
        $qry = "UPDATE users SET IMAGE_user ='$image' WHERE id = $user_id";
        require_once("connect.php");
        $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;
     }

}
