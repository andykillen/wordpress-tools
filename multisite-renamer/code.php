<?php
/**
 * Load this locally on your dev machine and below change the $database array to 
 * have the setttings for your local db install.
 * 
 * It will offer you a dropdown list of all databases, just select the one you
 * want to change, and then fill in the old domain and new domain name. 
 * 
 * When complete it will echo a list of tables to the screen that have been looked
 * at.
 * 
 * It ignores columns with these names.
 * 'id','uid','pid', 'ID', 'post_id', 'download_id','product_id',
 * 'user_id','user_email','order_id','meta_id','comment_id', 'link_id'.
 * 
 * 
 * Of course you can use this to change any string for anther in the db, it does
 * not just have to be the multisite domain name that is changes, but that is what 
 * this was built for.
 */
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Search and replace for WordPress multisite</title>
    </head>
    <body>
        <h1>Search and replace for WordPress multisite</h1>
        <?php
        
         $db = 'information_schema';
        
        if(isset($_POST['database']) && !empty($_POST['old']) && !empty($_POST['new']) ){
            
           $db = $_POST['database'];

        }

        $database = array('mysql' => array(
                'host' => '127.0.0.1',
                'username' => 'root',
                'password'  => '',
                'db' => $db
            ));

        $pdo = new PDO("mysql:host=".$database['mysql']['host'].";dbname=".$database['mysql']['db'].";charset=utf8"
                    , $database['mysql']['username']
                    , $database['mysql']['password']);

        
        if(!isset($_POST['database']) || (empty($_POST['old']) || empty($_POST['new'])) ) {
            
            $select = $pdo->prepare("select schema_name from information_schema.schemata");
            $select->execute();
            $result = $select->fetchAll();
            
        ?>
        <form action="" method="POST">
            <p><label>Select Database</label>
            <select name="database">
                <?php foreach ($result as $row) { ?>
                <option value="<?php echo $row['schema_name']  ?>"><?php echo $row['schema_name'] ?></option>                
                <?php } ?>
            </select></p>
            
            <p><label>Old website Domain Name</label>
                <input type="text" name="old" />                
            </p>
            <p><label>New website Domain Name</label>
                <input type="text" name="new" />                
            </p>
            <p>
                <input type="submit" />
            </p>    
            
        </form>
        <?php } else { 
            
            $result = $pdo->query("SELECT TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='{$_POST['database']}'");
            $array_of_columns = $result->fetchAll();
            
            foreach($array_of_columns as $set){
                if( !in_array($set['COLUMN_NAME'], array('id','uid','pid', 'ID', 'post_id', 'download_id','product_id','user_id','user_email','order_id','meta_id','comment_id', 'link_id')) ) {
                    echo $set['TABLE_NAME'] . " " . "." . $set['COLUMN_NAME']."\n";
                    
                    $select =  $pdo->prepare("UPDATE {$set['TABLE_NAME']} "
                                           . "SET {$set['COLUMN_NAME']} = replace({$set['COLUMN_NAME']}, '{$_POST['old']}', '{$_POST['new']}')");
                    $select->execute();                    
                    
                }
            }
            
        }?>          
    </body>
</html>

