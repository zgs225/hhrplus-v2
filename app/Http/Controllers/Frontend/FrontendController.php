<?php namespace App\Http\Controllers\Frontend;

use App\Models\PackageGood;
use App\Http\Controllers\Controller;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller {

  /**
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $packageGoods = PackageGood::all();
    return view('frontend.index', compact('packageGoods'));
  }

  public function clients()
  {
    $websites     = [];
    $applications = [];
    $weixins      = [];

    $huiwubao = new \stdClass();
    $huiwubao->name = '会务宝';
    $huiwubao->desc = '会务宝是一款以PC和移动端为平台的会务管理和人脸识别签到管理系统。 ';

    $anjia = new \stdClass();
    $anjia->name = '安家传媒';
    $anjia->desc = '魔媒网是安家传媒集团提供的一个旨在打造中国最大的全媒体交易平台。';

    $chuangyefuwuqiH5 = new \stdClass();
    $chuangyefuwuqiH5->name = '创业服务器H5';
    $chuangyefuwuqiH5->desc = '为创业服务器制作的用于推广的手机端H5宣传页。';

    array_push($websites, $huiwubao);
    array_push($websites, $anjia);
    array_push($websites, $chuangyefuwuqiH5);

    $yali = new \stdClass();
    $yali->name = '鸭梨心理';
    $yali->desc = '为用户提供测评、咨询、调试一站式心理健康管理服务。';

    $shida = new \stdClass();
    $shida->name = '拾搭';
    $shida->desc = '拾塔是南京龙虎网旗下的一个孵化项目，是南京本地移动社交和生活分享平台。';

    $yangqiren = new \stdClass();
    $yangqiren->name = '氧气人';
    $yangqiren->desc = '氧气人是一个大型央企圈的一个社交应用APP。主要服务在央企工作的人群。';

    $youche = new \stdClass();
    $youche->name = '有车';
    $youche->desc = '有车APP是一款在线电动租车的移动应用，旨在提供全新的新能源汽车服务模式。';

    array_push($applications, $yali);
    array_push($applications, $shida);
    array_push($applications, $yangqiren);
    array_push($applications, $youche);

    $zuqiu = new \stdClass();
    $zuqiu->name = '动吧足球';
    $zuqiu->desc = '针对火热的校园足球与青少年足球市场，动吧体育将匹配需要足球初级培训的用户。';

    array_push($weixins, $zuqiu);

    return view('frontend.clients', compact('websites', 'applications', 'weixins'));
  }

  /**
   * @return \Illuminate\View\View
   */
  public function macros()
  {
    return view('frontend.macros');
  }
}
