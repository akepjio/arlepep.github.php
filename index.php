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
                <input type="submit"><br/>
           
            </form>

             <h1><b><center> My Best Friends are : <center></b></h1>
          <?php
            $filename = 'friends.txt';
                    $file = fopen( $filename, 'r+' );
                    while (!feof($file)) {
                    $ligne = fgets($file);
                     echo '<ul><li>' .$ligne . '</li></ul>' ;
                    }

                    
                    //appending to file   
                    $file = fopen( $filename, 'a' );
                    if(isset($_POST['name'])){
                    $result=$_POST['name'] ;
                    echo '<ul><li>' .$result . '</li></ul>' ;
                    fwrite( $file , $result . "\r\n ") ;
                    }
                  
          ?>
            </div>

            <div id="footer">
            <p><h1 id="footwhite"><center> Footer </center></h1></p>
            </div>

    </body>
</html>
<!-- \r -->