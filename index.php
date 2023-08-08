<script src="wangyi.js"></script>

<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.4/jquery.js"></script>
<?php
if(array_key_exists('link', $_POST)){

    $html = file_get_contents($_POST["link"]);
    $dom = new DOMDocument();
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    $xpath = new DOMXPath($dom);
    $links = $xpath->query('//link[@rel="canonical"]');

    foreach ($links as $link) {
        $href = $link->getAttribute('href');
        $id = explode('id=', $href)[1];
        echo '<script>  var keys = generate('.$id.');$.post("server.php",{"params":keys[0],"encSecKey":keys[1]},function(data,status){$("#result").replaceWith(data)});</script>'; 
        }
}

?>
<form action="index.php" method="post">
    <p>请输入歌曲分享链接(手机版网易云歌曲页面点击分享，粘贴分享链接中的纯链接内容，不要有空格，否则解析无效)：</p>
    <p><input type="text" name="link"></p> 
    <p><button type="submit">解析</button></p>
    <p id="result"></p>
    <p>声明：本站仅供学习交流使用且不提供资源存储，也不参与录制、上传，用户必须遵守相关法律法规，尊重他人知识产权，不得侵犯他人合法权益，不得将站内信息用于商业目的或其他非法用途。</p>
    
    
</form>