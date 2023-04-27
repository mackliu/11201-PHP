<h1>表單傳值</h1>
<h3>GET</h3>

<form action="target.php" method="get">
    <input type="text" name="addr" id="name">
    <input type="submit" value="送出">
</form>

<h3>POST</h3>
<form action="target.php" method="post">
    <input type="text" name="name" id="name">
    <input type="submit" value="送出">
</form>

<h3>POST及檔案上傳</h3>
<form action="target.php" method="post" enctype="multipart/form-data" >
    <input type="text" name='type'>
    <input type="file" name="img" id="">
    <input type="submit" value="送出">

</form>