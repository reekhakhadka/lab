<?php
/*
Admin - login, register,logout
Student- login,register,logout
Teacher - login, register, logout
*/
abstract class Auth{
    public function login(){
echo "login page";
    }
    public function logout(){
echo "logout page";
    }
    abstract function register();
}
interface CRUD{
    function create();
     function List();
      function delete();
       function update();

}
class Admin extends Auth{
    function register(){
        echo "Registration form for Admin";
        
    }
}
    class Teacher extends Auth implements CRUD{
    function register(){
        echo "Registration form for Teacher";
    }
    function create(){

    }
     function List(){

     }
      function delete(){

      }
       function update(){

       }
}
?>