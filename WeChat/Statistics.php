<?php

namespace WeChat;

use WeChat\Contracts\BasicWeChat;

/**
 * 统计
 * Class User
 * @package WeChat
 */
class Statistics extends BasicWeChat
{
    /**
     * 获取图文群发每日数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询1天数据，对应$begin_date
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getArticleSummary($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getarticlesummary?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取图文统计分时数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询1天数据，对应$begin_date
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUserReaHour($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getuserreadhour?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取图文群发总数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询1天数据，对应$begin_date
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getArticleTotal($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getarticletotal?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }
    /**
     * 获取图文统计数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询3天数据
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUserRead($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getuserread?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取图文分享转发数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询7天数据
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUserShare($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getusershare?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取图文分享转发分时数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询1天数据
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUserShareHour($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getusersharehour?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }


    /**
     * 获取用户增减数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多7天数据
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUserSummary($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getusersummary?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取累计用户数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多7天数据
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUserCumulate($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getusercumulate?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取消息发送概况数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多7天数据
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUpstreamMsg($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getupstreammsg?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取消息分送分时数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多1天数据   时间跨度 1
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUpstreamMsgHour($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getupstreammsghour?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取消息发送周数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多30天数据   时间跨度 30
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUpstreamMsgWeek($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getupstreammsgweek?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }


    /**
     * 获取消息发送月数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多30天数据   时间跨度 30
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUpstreamMsgMonth($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getupstreammsgmonth?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取消息发送分布数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多15天数据   时间跨度 15
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUpstreamMsgDist($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getupstreammsgdist?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

    /**
     * 获取消息发送分布周数据
     * @param string $begin_date 开始日期
     * @param string $end_date 结束日期，限定查询最多30天数据   时间跨度 30
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getUpstreamMsgdistWeek($begin_date, $end_date)
    {
        $url = 'https://api.weixin.qq.com/datacube/getupstreammsgdistweek?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
    }

	/**
	 * 获取消息发送分布月数据
	 * @param string $begin_date 开始日期
	 * @param string $end_date 结束日期，限定查询最多30天数据   时间跨度 30
	 * @return array
	 * @throws \WeChat\Exceptions\InvalidResponseException
	 * @throws \WeChat\Exceptions\LocalCacheException
	 */
	public function getUpstreamMsgdistMonth($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getupstreammsgdistmonth?access_token=ACCESS_TOKEN';
		$this->registerApi($url, __FUNCTION__, func_get_args());
		return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
	}

	/**
	 * 获取接口分析分时数据
	 * @param $begin_date string 开始时间
	 * @param $end_date string 结束时间
	 * @return array
	 */
	public function getInterfaceSummaryHour($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getinterfacesummaryhour?access_token=ACCESS_TOKEN';
		$this->registerApi($url, __FUNCTION__, func_get_args());
		return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
	}

    /**
	 * 获取接口分析数据
	 * @param $begin_date string 开始时间
	 * @param $end_date string 结束时间
	 * @return array
	 */
	public function getInterfaceSummary($begin_date, $end_date) {
		$url = 'https://api.weixin.qq.com/datacube/getinterfacesummary?access_token=ACCESS_TOKEN';
		$this->registerApi($url, __FUNCTION__, func_get_args());
		return $this->callPostApi($url, ['begin_date' => $begin_date, 'end_date' => $end_date], true);
	}

	public function tongji($fun, $begin_date, $end_date) {
		$url = "";
		switch (strtolower($fun)) {
		case 'getusersummary':
			$url = "https://api.weixin.qq.com/datacube/getusersummary?access_token=ACCESS_TOKEN";
			break;
		case 'getusercumulate':
			$url = 'https://api.weixin.qq.com/datacube/getusercumulate?access_token=ACCESS_TOKEN';
			break;
		case 'getarticletotal':
			$url = "https://api.weixin.qq.com/datacube/getarticletotal?access_token=ACCESS_TOKEN";
			break;
		case 'getarticlesummary':
			$url = 'https://api.weixin.qq.com/datacube/getarticlesummary?access_token=ACCESS_TOKEN';
			break;
		case 'getuserread':
			$url = 'https://api.weixin.qq.com/datacube/getuserread?access_token=ACCESS_TOKEN';
			break;
		case 'getuserreadhour':
			$url = 'https://api.weixin.qq.com/datacube/getuserreadhour?access_token=ACCESS_TOKEN';
			break;
		case 'getusershare':
			$url = 'https://api.weixin.qq.com/datacube/getusershare?access_token=ACCESS_TOKEN';
			break;
		case 'getusersharehour':
			$url = 'https://api.weixin.qq.com/datacube/getusersharehour?access_token=ACCESS_TOKEN';
			break;
		default:
			$url = '';
			break;

		}

		if ($url == '') {
			throw new InvalidResponseException("统计方法{$fun}不存在.", '0');
		}
		$data = ['begin_date' => $begin_date, 'end_date' => $end_date];
		$this->registerApi($url, __FUNCTION__, func_get_args());
		// return $url;
		return $this->httpPostForJson($url, $data);
	}
	public function getComments($msg_data_id, $index, $begin, $count, $type = "1") {
		$url = "https://api.weixin.qq.com/cgi-bin/comment/list?access_token=ACCESS_TOKEN";
		$data = ['msg_data_id' => $msg_data_id, 'index' => $index, 'begin' => $begin, 'count' => $count, 'type' => $type];
		$this->registerApi($url, __FUNCTION__, func_get_args());
		return $this->httpPostForJson($url, $data);
	}
}
