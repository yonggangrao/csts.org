
function CONSTVAR(){}

CONSTVAR.SEARCH_STRING_LENGTH = 64;
CONSTVAR.SUCCESS = 'success';
CONSTVAR.LOGIN = 'login';
CONSTVAR.HAS_SHOP = 'has_shop';
CONSTVAR.ARTICLE_LIST_NO = 4;






function login_page()
{
	return  {
		'/goods/upload'		:	'/goods/upload',
		'/goods/update'		:	'/goods/update',
		'/goods/manage'		:	'/goods/manage',
		'/goods/list'		:	'/goods/list',
		'/shop/home'		:	'/shop/home',
		'/shop/create'		:	'/shop/create',
	}
}


function get_test_data($test_type)
{
	//alert($test_type);
	var $temp = new Array();
	switch($test_type)
	{
		case '0':
			//噪声测试BSQZST
			$temp = new Array('ceshijuli', 'dangwei', 'shuruzhuansu', 'shiyanniuju', 
			'fangwei', 'cedeshengji','bendizaosheng', 'chazhi',
			 'xiuzhengzhi', 'zuizhongzaoshengzhi', 'MAX', 'youwen');
			break;
		case '1':
			//传动效率测试BSQCDXLT
			$temp = new Array('dangwei', 'shuruzhuansu', 'shiyanniuju', 
			'youwen', 'shuchuniuju', 'chuandongxiaolv');
			break;
		case '2':
			//换档性能测试BSQHDXNT
			$temp = new Array('huandang', 'chesu', 'huandangcishu', 'qudongzhouzhuansu', 'huandangli', 'youwen',
			'mubiaozhuansu', 'tongbuli', 'tongbuniuju', 'bingbushijian');
			break;
		case '3':
			//静扭强度测试BSQJNQDT
			$temp = new Array('sunhuaiweizhi', 'shuruzhuanjiao', 'shiyanniuju', 'fadongjizuidaniuju', 
			'xuyonghoubeixishu', 'jingniuqiangduhoubeixishu', 'hege');
			break;
		case '4':
			//高速测试BSQZST
			$temp = new Array('dangwei', 'shuruzhuansu', 'shiyanniuju', 'chixushijian',
			 'louyou', 'zhouchengsunhuai', 'chilunsunhuai', 'hege');
			break;
		case '5':
			//动态密封测试BSQDTMFT
			$temp = new Array('xunhuandaihao', 'shiyanjieduan', 'dangwei' , 'youwen' , 
			'shuruzhuansu', 'chixushijian', 'louyou', 'hege' );
			break;
				
		default:
	
	}
	return $temp;
	
}