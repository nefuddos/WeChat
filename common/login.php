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
        if(AccountXML ( $name , $pass ))
        {
            $array_ifo["tag"] = true;
            if (!isset($_SESSION['name'])) {
                $id = session_id();
                $_SESSION[$id] = $name;
              }
        }  else {
            $array_ifo["tag"] = false;
        }
        echo json_encode($array_ifo);
        ?>