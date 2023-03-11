<?php
namespace WeChat;

use WeChat\Contracts\Tools;
use WeChat\Contracts\BasicWeChat;
use WeChat\Exceptions\InvalidResponseException;

/**
 * 微信素材管理
 * Class Media
 * @package WeChat
 */
class Media extends BasicWeChat
{
    /**
     * 新增临时素材
     * @param string $filename 文件名称
     * @param string $type 媒体文件类型(image|voice|video|thumb)
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function add($filename, $type = 'image')
    {
        if (!in_array($type, ['image', 'voice', 'video', 'thumb'])) {
            throw new InvalidResponseException('Invalid Media Type.', '0');
        }
        $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type={$type}";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['media' => Tools::createCurlFile($filename)], false);
    }

    /**
     * 获取临时素材
     * @param string $media_id
     * @param string $outType 返回处理函数
     * @return array|string
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function get($media_id, $outType = null)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id={$media_id}";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        $result = Tools::get($url);
        if (json_decode($result)) {
            return Tools::json2arr($result);
        }
        return is_null($outType) ? $result : $outType($result);
    }

    /**
     * 新增图文素材
     * @param array $data 文件名称
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function addNews($data)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }

    /**
     * 更新图文素材
     * @param string $media_id 要修改的图文消息的id
     * @param int $index 要更新的文章在图文消息中的位置（多图文消息时，此字段才有意义），第一篇为0
     * @param array $news 文章内容
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function updateNews($media_id, $index, $news)
    {
        $data = ['media_id' => $media_id, 'index' => $index, 'articles' => $news];
        $url = "https://api.weixin.qq.com/cgi-bin/material/update_news?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }

    /**
     * 上传图文消息内的图片获取URL
     * @param string $filename
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function uploadImg($filename)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['media' => Tools::createCurlFile($filename)], false);
    }

    /**
     * 新增其他类型永久素材
     * @param string $filename 文件名称
     * @param string $type 媒体文件类型(image|voice|video|thumb)
     * @param array $description 包含素材的描述信息
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function addMaterial($filename, $type = 'image', $description = [])
    {
     // return json_encode([]);
        if (!in_array($type, ['image', 'voice', 'video', 'thumb'])) {
            throw new InvalidResponseException('Invalid Media Type.', '0');
        }
        $url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=ACCESS_TOKEN&type={$type}";
      
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['media' => Tools::createCurlFile($filename), 'description' => Tools::arr2json($description)], false);
    }

    /**
     * 获取永久素材
     * @param string $media_id
     * @param null|string $outType 输出类型
     * @return array|string
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function getMaterial($media_id, $outType = null)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return Tools::post($url, ['media_id' => $media_id]);
        //$result = Tools::post($url, ['media_id' => $media_id]);
        //if (json_decode($result)) {
        //    return Tools::json2arr($result);
        //}
        //return is_null($outType) ? $result : $outType($result);
    }

    /**
     * 删除永久素材
     * @param string $media_id
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function delMaterial($media_id)
    {
      
        $url = "https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
     
        return $this->httpPostForJson($url, ['media_id' => $media_id]);
    }

    /**
     * 获取素材总数
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function getMaterialCount()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpGetForJson($url);
    }

    /**
     * 获取素材列表
     * @param string $type
     * @param int $offset
     * @param int $count
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function batchGetMaterial($type = 'image', $offset = 0, $count = 20)
    {
        if (!in_array($type, ['image', 'voice', 'video', 'news'])) {
            throw new InvalidResponseException('Invalid Media Type.', '0');
        }
        $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['type' => $type, 'offset' => $offset, 'count' => $count]);
    }
  public function test()
    {
      return json_encode([]);
    }
    public function tongji($fun, $begin_date, $end_date)
    {
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
       $data = ['begin_date' => $begin_date,'end_date'=>$end_date];
        $this->registerApi($url, __FUNCTION__, func_get_args());
     // return $url;
        return  $this->httpPostForJson($url, $data);
    }
	
  	public function getComments($msg_data_id,$index,$begin,$count,$type="1"){
     	$url = "https://api.weixin.qq.com/cgi-bin/comment/list?access_token=ACCESS_TOKEN";
      	$data = ['msg_data_id' => $msg_data_id,'index'=>$index,'count'=>$count,'count'=>$count,'type'=>$type];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return  $this->httpPostForJson($url, $data);
    }
	/**
     * 上传图文消息素材【订阅号与服务号认证后均可用】
     * @param array $data 文件名称
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function uploadNews($data)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=ACCESS_TOKEN";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }
     
}

 
