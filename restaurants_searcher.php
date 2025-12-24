# restautants_searcher.php

<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

#初期設定
# APIキーを環境変数から読み込む（セキュリティのベストプラクティス）
$KEYID = getenv('GNAVI_API_KEY');
if (!$KEYID) {
    die("Error: GNAVI_API_KEY environment variable is not set\n" .
        "Please set it using:\n" .
        "  Linux/Mac: export GNAVI_API_KEY=\"your_api_key_here\"\n" .
        "  Windows:   set GNAVI_API_KEY=your_api_key_here\n");
}

$HIT_PER_PAGE = 100;
$PREF = "PREF13";
$FREEWORD_CONDITION = 1;
$FREEWORD = "渋谷駅";

$PARAMS = array("keyid"=> $KEYID, "hit_per_page"=>$HIT_PER_PAGE, "pref"=>$PREF, "freeword_condition"=>$FREEWORD_CONDITION, "freeword"=>$FREEWORD);

function write_data_to_csv($params){
    
    $restaurants = [["名称","住所","営業日","電話番号"]];
    $client = new Client();
    try{
        $json_res = $client->request('GET',"https://api.gnavi.co.jp/RestSearchAPI/v3/",['query' => $params])->getBody();
    }catch(Exception $e){
        return print("エラーが発生しました");
    }
    
    $response = json_decode($json_res,true);
    
    if(isset($response["error"])){
        return print("エラーが発生しました！");
    }
    
    foreach($response["rest"] as &$restaurant){
        $rest_info = [$restaurant["name"],$restaurant["address"],$restaurant["opentime"],$restaurant["tel"]];
        $restaurants[] = $rest_info;

    }
    $handle = fopen("restaurants_list.csv","wb");
    
    foreach($restaurants as $values){
        fputcsv($handle,$values);
    }
    fclose($handle);
    
    return print_r($restaurants);
}
write_data_to_csv($PARAMS);
?>