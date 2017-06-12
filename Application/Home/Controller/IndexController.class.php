<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\TencentMusicAPI;
class IndexController extends Controller {
    public function index(){
        $qqmusicApi = new TencentMusicAPI();
        $results = $qqmusicApi->search('菊花台');
        echo $results;
    }
}