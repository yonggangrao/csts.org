<?php

define(DOCUMENT_ROOT, $_SERVER['DOCUMENT_ROOT'] . '/');
define(MODEL_PATH, DOCUMENT_ROOT . 'application/models/');
define(CSS_PATH, DOCUMENT_ROOT . 'application/public/css/');
define(JS_PATH, DOCUMENT_ROOT . 'application/public/js/');
define(IMAGES_PATH, DOCUMENT_ROOT . 'application/public/images/');

define(DOMAIN, $_SERVER['HTTP_HOST']);
define(HOST, 'http://' . DOMAIN . '/');
define(CSS_URL, HOST . 'application/public/css/');
define(JS_URL, HOST . 'application/public/js/');
define(IMAGES_URL, HOST . 'application/public/images/');

function head_js()
{
	return array(
			//'jquery-1.7.1.js',
			'jquery-1.11.1.min.js',
			'ajaxFileupload.js',
			'config.js',
			'util.js',
			'com.js',

	);
}
function foot_js()
{
	return array(

			'jquery.md5.js',

	);
}


function head_css()
{
	return array(
			
			'com.css',
	);
}

class CONFIGURE
{
	const DOMAIN 				=		'nenushop.com';
	const SUCCESS 				= 		'success';
	const ERROR					= 		'error';
	const SHOP 					= 		'shop';
	const GOODS					= 		'goods';
	const LOGIN 				= 		'login';
	const HAS_SHOP 				= 		'has_shop';
	const PARAM_ILLEGAL 		= 		'Parameter illegal';

	const SQL_QUERY_ONE			=		'query_one';
	const SQL_QUERY_LIST		=		'query_list';
	const SQL_INSERT			=		'insert';
	const SQL_UPDATE			=		'update';
	const SQL_DELETE			=		'delete';

	const SUCCESS_ERRNO   		=        0;
	const PARAM_ILLEGAL_ERRNO   =        1;
	const DB_OPERATION_ERRNO   	=        2;
	const ACCIDENT_ERRNO   		=        -1;

	const ARTICLE_LIST_NO       =        4;
	


	public static function HEADER_JS()
	{
		return array(
				'jquery-1.11.1.min.js',
				'jquery.upload.js',
				'config.js',
				'util.js',
				'com.js',
		);
	}
	public static function FOOTER_JS()
	{
		return array(
				'jquery.form.js',
				'jquery.md5.js',
		);
	}


	public static function HEADER_CSS()
	{
		return array(

				'com.css',
					
		);
	}

	public static function LOGIN_PAGE()
	{
		return array(
				'/goods/upload'=>'/goods/upload',
				'/goods/update'=>'/goods/update',
				'/goods/manage'=>'/goods/manage',
				'/goods/list'=>'/goods/list',
				'/shop/home'=>'/shop/home',
				'/shop/create'=>'/shop/create',

		);
	}


	public static function IMG_FORMAT()
	{
		return array(
				'image/jpeg'=>'image/jpeg',
				'image/jpg'=>'image/jpg',
				'image/pjpg'=>'image/pjpg',
				'image/gif'=>'image/gif',
				'image/png'=>'image/png',
				'image/x-png'=>'image/x-png',

		);
	}

	public static function GET_TEST_DATA($test_type)
	{
		$temp = array();
		switch($test_type)
		{
			case 0:
				//噪声测试BSQZST
				$temp = array('bendizaosheng' => '本底噪声：', 'youwen' => '油温：','ceshijuli' => '测试距离：', 'dangwei' => '档位：', 
				'shuruzhuansu' => '输入转速：', 'shiyanniuju' => '实验扭距：', 
				'fangwei' => '方位：', 'cedeshengji' => '测得声级：', 'chazhi' => '差值：',
				 'xiuzhengzhi' => '修正值：', 'zuizhongzaoshengzhi' => '最终噪声值：', 'MAX' => 'MAX：');
				break;
			case 1:
				//传动效率测试BSQCDXLT
				$temp = array('dangwei' => '档位：', 'shuruzhuansu' => '输入转速：', 'shiyanniuju' => '实验扭距：', 
				'youwen' => '油温：', 'shuchuniuju' => '输出扭距：', 'chuandongxiaolv' => '传动效率：');
				break;
			case 2:
				//换档性能测试BSQHDXNT
				$temp = array('huandang' => '换档：', 'chesu' => '车速：', 'huandangcishu' => '换档次数：', 'qudongzhouzhuansu' => '驱动轴转速：', 'huandangli' => '换档力：', 'youwen' => '油温：',
				'mubiaozhuansu' => '目标转速：', 'tongbuli' => '同步力：', 'tongbuniuju' => '同步扭距：', 'bingbushijian' => '同步时间：');
				break;
			case 3:
				//静扭强度测试BSQJNQDT
				$temp = array('sunhuaiweizhi' => '损坏位置：', 'shuruzhuanjiao' => '输入转角：', 'shiyanniuju' => '实验扭距：', 'fadongjizuidaniuju' => '发动机最大扭距：', 
				'xuyonghoubeixishu' => '需用后备系数：', 'jingniuqiangduhoubeixishu' => '静扭强度后备系数：', 'hege' => '是否合格：');
				break;
			case 4:
				//高速测试BSQZST
				$temp = array('dangwei' => '档位：', 'shuruzhuansu' => '输入转速：', 'shiyanniuju' => '试验扭距：', 'chixushijian' => '持续时间：',
				 'louyou' => '是否漏油：', 'zhouchengsunhuai' => '轴承损坏否：', 'chilunsunhuai' => '齿轮损坏否：', 'hege' => '是否合格：');
				break;
			case 5:
				//动态密封测试BSQDTMFT
				$temp = array('xunhuandaihao' => '循环代号：', 'shiyanjieduan' => '试验阶段：', 'dangwei' => '档位：', 'youwen' => '油温：', 
				'shuruzhuansu' => '输入转速：', 'chixushijian' => '循环时间：', 'louyou' => '是否漏油：', 'hege' => '是否合格：');
				break;
					
			default:
		
		}
		return $temp;
	}
}

