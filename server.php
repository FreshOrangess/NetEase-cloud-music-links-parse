<?php
if(array_key_exists("params",$_POST)){
    //初始化
    $curl = curl_init();

    //设置url
    curl_setopt($curl, CURLOPT_URL, 'https://music.163.com/weapi/song/enhance/player/url/v1?csrf_token=');

    // 标识这个请求是一个POST请求
    curl_setopt($curl, CURLOPT_POST,true);
    $data = array(
        "params"=>$_POST['params'],
        "encSecKey" => $_POST['encSecKey']
        );
    $headers = array("Cookie:"
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response, true);
    echo "<a href = ".$data['data'][0]['url'].">结果</a>";
}
?>