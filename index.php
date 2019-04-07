<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>form</title>
        <link rel="stylesheet" type="text/css" href="forms.css" />
    </head>

    <body>
            <div id ="header">
            <p><h1 id="white"><center> Friend book </center></h1></p>
            </div><br/>

            <div id="body">
            <form action="index.php" method="post">
                Name: <input type="text" name="name">
                <input type="submit" value="Add new friend"><br/>
           
            </form>

             <h1><b> My Best Friends are : </b></h1>
          <?php

            $filename = 'friends.txt';
            $file= fopen($filename , 'r');
            $friendsArray = array();
            if($file != false){
               while (!feof($file)) {
               $name=trim(fgets($file));
               if(strlen($name)>0){
                   $friendsArray[] = $name ;
               }
            }
           
            fclose($file);
           }

           
           

           ///////////////////////////////////// task2 AND task3 /////////////////////////////////////////

           //adding elements to array

           if(isset($_POST['name']) && strlen($_POST['name'])>0){

               $friendsArray[] = $_POST['name'];

            } 


            //filter element

            if(isset($_POST['namefilter']) && strlen($_POST['namefilter'])>0 ){ 

                $filter_elm = $_POST['namefilter'];

                for($i=0 ; $i<sizeof($friendsArray) ; $i++){

                $filt = strstr($friendsArray[$i],$filter_elm) ;

                $pos = strpos($friendsArray[$i],$filter_elm);

                if(isset($_POST['startingWith'])) {

                if ($pos !== false) {    

                    if ($pos === 0){

                echo '<ul><li>' . $friendsArray[$i] . '</li></ul>';      
                     }

                    }

                    }

                else {

                    if (!empty($filt)){

                echo '<ul><li>' . $friendsArray[$i] . '</li></ul>';
                }

                }
            }
        }
        
            else {
                foreach($friendsArray as $friend) {

                    echo '<ul><li>' .$friend. '</ul></li>'; 
                }
                }
            

                 // appeding elements on file 
                    $file = fopen( $filename, 'a' );
                    if(isset($_POST['name'])){
                    $result=$_POST['name'] ;
                    fwrite( $file , "$result \r\n ") ;
                    }'<br/>';

               
          ?><br/>
<form action="index.php" method="post">
<input type="text" name="namefilter"> <input type="checkbox" name="startingWith">Only names starting with</input> <input type="submit" value="Filter List"> 
</form>
 </div>
         

            <div id="footer">
            <p><h1 id="footwhite"><center> Footer </center></h1></p>
            </div>

    </body>
</html> 


