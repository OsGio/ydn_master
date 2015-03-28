<?php

/************************
*  macro Function
************************/

/**
* @param $campaign_name キャンペーン名
* @param $ad_group_name 広告グループ名
* @param $component_type コンポーネントの種類
* @param $send_flg 配信設定
* @param $send_status 配信状況
* @param $match_type マッチタイプ
* @param $keywords キーワード
* @param $custom_url カスタムURL
* @param $ad_group_cost 入札価格
* @param $ad_ads_name 広告名
* @param $ad_ads_title 広告タイトル
* @param $ad_ads_note01 説明文１
* @param $ad_ads_note02 説明文２
* @param $ad_ads_display_url 表示URL
* @param $ad_ads_link_url リンク先URL
* @param $campaign_budget キャンペーン予算（日額）
* @param $start_day キャンペーン開始日
* @param $device_type デバイス
* @param $send_to 配信先
* @param $sp_budget_ratio スマートフォン入札価格調整率（%）
* @param $ad_ads_type 広告タイプ
* @param $career キャリア
* @param $priority_device 優先デバイス
* @param $campaign_id キャンペーンID
* @param $ad_group_id 広告グループID
* @param $keywords_id キーワードID
* @param $ad_ads_id 広告ID
* @param $err_msg エラーメッセージ
*/



    HTML::macro('toCsv', function($obj){
        if(!Session::has('cnt'))
        {
            $now = 0; $id = 0;
            Session::flash('cnt', 0);
        }
        else
        {
            //Session::reflash();
            $now = Session::get('cnt');
            Session::flash('cnt', $now + 1);
        }
        $id = Session::get('cnt');
// print('id is ');
// var_dump($id);
        $campaign_name = "campaign_name";
        $ad_group_name = "ad_group_name";
        $component_type = "component_type";
        $send_flg = "send_flg";
        $send_status = "send_status";
        $match_type = "match_type";
        $keywords = "keywords";
        $custom_url = "custom_url";
        $ad_group_cost = "ad_group_cost";
        $ad_ads_name = "ad_ads_name";
        $ad_ads_title = "ad_ads_title";
        $ad_ads_note01 = "ad_ads_note01";
        $ad_ads_note02 = "ad_ads_note02";
        $ad_ads_display_url = "ad_ads_display_url";
        $ad_ads_link_url = "ad_ads_link_url";
        $campaign_budget = "campaign_budget";
        $start_day = "start_day";
        $device_type = "device_type";
        $send_to = "send_to";
        $sp_budget_ratio = "sp_budget_ratio";
        $ad_ads_type = "ad_ads_type";
        $career = "career";
        $priority_device = "priority_device";
        $campaign_id = "campaign_id";
        $ad_group_id = "ad_group_id";
        $keywords_id = "keywords_id";
        $ad_ads_id = "ad_ads_id";
        $err_msg = "err_msg";

        // return "<tr><td>". $obj->getVal($campaign_name) ."</td><td>". $obj->getVal($ad_group_name) ."</td><td>". $obj->getVal($component_type) ."</td><td>". $obj->getVal($send_flg) ."</td><td>". $obj->getVal($send_status) ."</td>
        //         <td>". $obj->getVal($match_type) ."</td><td>". $obj->getVal($keywords) ."</td><td>". $obj->getVal($custom_url) ."</td><td>". $obj->getVal($ad_group_cost) ."</td><td>". $obj->getVal($ad_ads_name) ."</td><td>". $obj->getVal($ad_ads_title) ."</td><td>". $obj->getVal($ad_ads_note01) ."</td>
        //         <td>". $obj->getVal($ad_ads_note02) ."</td><td>". $obj->getVal($ad_ads_display_url) ."</td><td>". $obj->getVal($ad_ads_link_url) ."</td><td>". $obj->getVal($campaign_budget) ."</td><td>". $obj->getVal($start_day) ."</td><td>". $obj->getVal($device_type) ."</td>
        //         <td>". $obj->getVal($send_to) ."</td><td>". $obj->getVal($sp_budget_ratio) ."</td><td>". $obj->getVal($ad_ads_type) ."</td><td>". $obj->getVal($career) ."</td><td>". $obj->getVal($priority_device) ."</td>
        //         <td>". $obj->getVal($campaign_id) ."</td><td>". $obj->getVal($ad_group_id) ."</td><td>". $obj->getVal($keywords_id) ."</td><td>". $obj->getVal($ad_ads_id) ."</td><td>". $obj->getVal($err_msg) ."</td></tr>";

        $did = array('ad_ads_name' => $obj->getVal($ad_ads_name), 'ad_ads_title' => $obj->getVal($ad_ads_title), 'ad_ads_note01' => $obj->getVal($ad_ads_note01),
                'ad_ads_note02' => $obj->getVal($ad_ads_note02), 'ad_ads_display_url' => $obj->getVal($ad_ads_display_url), 'ad_ads_link_url' => $obj->getVal($ad_ads_link_url));
        $rules = array('ad_ads_name' => 'max:50', 'ad_ads_title' => 'max:15', 'ad_ads_note01' => 'max:19', 'ad_ads_note02' => 'max:19', 'ad_ads_display_url' => 'max:29',
                    'ad_ads_link_url' => 'max:1024');

        $validator = Validator::make($did, $rules);


        if($validator->fails()){
            $failed = $validator->failed();
            $failed_keys = array_keys($failed);
        }else{
            $failed_keys = array();
        }
// print('failed is ...');
// var_dump($failed_keys);

        return "<tr>"
                . Form::valid($failed_keys, $campaign_name, $obj, $id) . Form::valid($failed_keys, $ad_group_name, $obj, $id) . Form::valid($failed_keys, $component_type, $obj, $id) . Form::valid($failed_keys, $send_flg, $obj, $id) . Form::valid($failed_keys, $send_status, $obj, $id)
                . Form::valid($failed_keys, $match_type, $obj, $id) . Form::valid($failed_keys, $keywords, $obj, $id) . Form::valid($failed_keys, $custom_url, $obj, $id) . Form::valid($failed_keys, $ad_group_cost, $obj, $id) . Form::valid($failed_keys, $ad_ads_name, $obj, $id)
                . Form::valid($failed_keys, $ad_ads_title, $obj, $id) . Form::valid($failed_keys, $ad_ads_note01, $obj, $id)
                . Form::valid($failed_keys, $ad_ads_note02, $obj, $id) . Form::valid($failed_keys, $ad_ads_display_url, $obj, $id) . Form::valid($failed_keys, $ad_ads_link_url, $obj, $id) . Form::valid($failed_keys, $campaign_budget, $obj, $id) . Form::valid($failed_keys, $start_day, $obj, $id) . Form::valid($failed_keys, $device_type, $obj, $id)
                . Form::valid($failed_keys, $send_to, $obj, $id) . Form::valid($failed_keys, $sp_budget_ratio, $obj, $id) . Form::valid($failed_keys, $ad_ads_type, $obj, $id) . Form::valid($failed_keys, $career, $obj, $id) . Form::valid($failed_keys, $priority_device, $obj, $id)
                . Form::valid($failed_keys, $campaign_id, $obj, $id) . Form::valid($failed_keys, $ad_group_id, $obj, $id) . Form::valid($failed_keys, $keywords_id, $obj, $id) . Form::valid($failed_keys, $ad_ads_id, $obj, $id) . Form::valid($failed_keys, $err_msg, $obj, $id)
                ."</tr>";


    });


    HTML::macro('header', function($header){
        $result = "";
        foreach($header as $h)
        {
            $result .= "<td>". $h ."</td>";
        }
        return $result;
    });



    Form::macro('valid', function($failed_keys, $var, $obj, $id){
        if(!in_array($var, $failed_keys))
        {
            return "<td>". $obj->getVal($var) ."</td>";
        }
        elseif(in_array($var, $failed_keys))
        {
            if(Session::has('valid') && array_key_exists($var, Session::get('valid')))
            {
                foreach(array_values(Session::get('valid')[$var]) as $k => $v)
                {
//var_dump($var);
                    if($id == $k)
                    {
                        return "<td class='warning'>". $v ."</td>";
                    }
                }
            }
//             else
//             {
//                 return "<td class='danger'><div>". Form::text($var ."[". $id ."]", "'". $obj->getVal($var). "'") ."</div></td>";
// //exit;
//             }
            else
            {
                    return "<td class='warning'></td>";
            }
        }
        else
        {
                return "<td class='warning'>".$v."</td>";
        }

    });
