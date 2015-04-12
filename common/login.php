     <?php
     session_start();
     include_once 'functions.php' ;
        header('Content-type: application/json');
        $array_ifo = array(
            "tag"=>false,
            );
        //  echo json_encode($_POST);
        $name = $_POST["name"];
        $pass = $_POST["pass"];
        //$name = "rjg";
        //$pass = "123";
        //如果当前的session_id有指定的名字，则应该将指定的用户设置为失效状态.然后更新$session_id的值
        $id = session_id();
        if($_SESSION[$id])
        {
            updateState($_SESSION[$id],time()-2000);
            $_SESSION[$id] = $name;
        }
        if (!isset($_SESSION[$id])) {
            $_SESSION[$id] = $name;
        }
        //获取客户端ip
         $ipifo = getip();
        if(AccountXML ( $name , $pass ,$ipifo,time()))
        {
            $array_ifo["tag"] = true;
        }  else {
            $array_ifo["tag"] = false;
        }
        echo json_encode($array_ifo);
        ?>