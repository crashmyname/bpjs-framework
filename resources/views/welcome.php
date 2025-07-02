<?php

echo '<title>'.$title.'</title>';
echo "<h1>HELLO WORLD</h1>";
?>
<a href="<?= url('test')?>">test</a>
<br>
<?php foreach($user as $u){
    echo "Username:".$u->username.' Name:'.$u->name.'<br>';
}?>