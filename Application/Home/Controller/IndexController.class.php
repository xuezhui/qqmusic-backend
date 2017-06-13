<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\TencentMusicAPI;
class IndexController extends Controller {
    public function index(){
        $qqmusicApi = new TencentMusicAPI();
        $results = $qqmusicApi->topicLists();
        $arrTopicLists = $this->getTopicListsArray($results);
        print_r(json_encode($arrTopicLists));
    }

    public function getTopicListsArray($topicListsJson){
        $arrResults = json_decode($topicListsJson,true);
        $ret = [];
        $counter=0;
        foreach ($arrResults as $item) {
            foreach ($item['List'] as $value) {
                $ret[$counter]['ListName'] = $value['ListName'];
                $ret[$counter]['topic_id'] = $value['topID'];
                $counter++;
            }
        }
        return $ret;
    }
}