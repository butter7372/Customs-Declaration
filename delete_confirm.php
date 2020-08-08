<?php
$ID = $_GET{"ID"};
echo "<script> if(confirm( '你确认要删除该数据吗？'))  location.href='data_delete.php?ID={$ID}';else history.back(); </script>";
?>