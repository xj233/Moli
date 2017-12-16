<?php header("Content-type:text/html;charset=utf-8");?>
<?php include("./common/header.php"); ?>
<div class="mdui-table-fluid">
<?php
    $year=$_POST['y']=date('Y');
    $month=$_POST['m']=date('m');
    $days=date('t',strtotime("{$year}-{$month}-1"));
    $week=date('w',strtotime("{$year}-{$month}-1"));
?>
<center><h1 class='doc-title mdui-text-color-theme'><?php echo "西元 {$year} 年 {$month} 月"; ?></h1></center>
<?php
echo "<table class='mdui-table'>";
    echo "<thead>";
      echo "<tr>";
        echo "<th class='mdui-table-col-numeric'>周日(Sun.)</th>";
        echo "<th class='mdui-table-col-numeric'>周一(Mon.)</th>";
        echo "<th class='mdui-table-col-numeric'>周二(Tue.)</th>";
        echo "<th class='mdui-table-col-numeric'>周三(Wed.)</th>";
        echo "<th class='mdui-table-col-numeric'>周四(Thu.)</th>";
        echo "<th class='mdui-table-col-numeric'>周五(Fri.)</th>";
        echo "<th class='mdui-table-col-numeric'>周六(Sat.)</th>";
      echo "</tr>";
    echo "</thead>";
      
        for($i=1-$week;$i<=$days;){
            echo "<tr>";
            for($j=0;$j<7;$j++){
                if($i>$days || $i<=0){
                    echo "<td>&nbsp;</td>";
                }else{
                echo "<td>{$i}</td>";
                }
                $i++;
            }
            echo "</tr>";
        }
        echo "</table>";
?>
</div>
<center><h1 class="doc-title mdui-text-color-theme">TODO LIST</h1>
<div class="mdui-table-fluid">
  <table class="mdui-table mdui-table-selectable">
    <thead>
      <tr>
        <th>待办事项</th>
        <th class="mdui-table-col-numeric">预期（天）</th>
      </tr>
    </thead>
    <tbody>
<?php
  $info = file_get_contents("todo.txt");
  
  $info = rtrim($info,"@");
  if(strlen($info)>=8){
      
  $todolist = explode("@@@",$info);
  
  foreach($todolist as $k=>$v){
   $todo = explode("##",$v);
   echo "<tr>";
   echo "<td>";
   $str0="$todo[0]";
   echo htmlspecialchars($str0);   
   echo "</td>";
   echo "<td>";
   $str1="$todo[1]";
   echo htmlspecialchars($str1);
   echo "</td>";
   echo "</tr>";
  }
  }
?>
</table>
</div>
<a href="add.php" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交事项</a>
<a class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">删除事项</a>
</center>
<?php include("./common/footer.php"); ?>