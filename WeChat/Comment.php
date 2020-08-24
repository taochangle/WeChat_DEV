<?php

namespace WeChat;

use WeChat\Contracts\Tools;
use WeChat\Contracts\BasicWeChat;
use WeChat\Exceptions\InvalidResponseException;

/**
 * 评论数据管理
 * Class Comment
 * @package WeChat
 */
class Comment extends BasicWeChat
{


    /**
     * 打开已群发文章评论（新增接口）
     * @param $msg_data_id
     * @param int $index
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function open($msg_data_id, $index = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/open?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }


    /**
     * 关闭已群发文章评论（新增接口）
     * @param $msg_data_id
     * @param int $index
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function close($msg_data_id, $index = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/close?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }


    /**
     * 查看指定文章的评论数据（新增接口）
     * @param $msg_data_id
     * @param $index
     * @param $begin
     * @param $count
     * @param string $type
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function lists($msg_data_id, $index, $begin, $count, $type = "1")
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/list?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index, 'count' => $count, 'count' => $count, 'type' => $type];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }


    /**
     * 将评论标记精选（新增接口）
     * @param $msg_data_id
     * @param int $index
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function markelect($msg_data_id, $user_comment_id, $index = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/markelect?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index, 'user_comment_id' => $user_comment_id];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }


    /**
     * 将评论标记精选（新增接口）
     * @param $msg_data_id
     * @param int $index
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function unmarkelect($msg_data_id, $user_comment_id, $index = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/unmarkelect?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index, 'user_comment_id' => $user_comment_id];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }


    /**
     * 删除评论（新增接口）
     * @param $msg_data_id
     * @param int $index
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function delete($msg_data_id, $user_comment_id, $index = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/delete?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index, 'user_comment_id' => $user_comment_id];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }


    /**
     * 将评论标记精选（新增接口）
     * @param $msg_data_id
     * @param int $index
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function replyAdd($msg_data_id, $user_comment_id, $content, $index = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/reply/add?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index, 'user_comment_id' => $user_comment_id, 'content' => $content];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }

    /**
     * 删除回复（新增接口）
     * @param $msg_data_id
     * @param int $index
     * @return array
     * @throws Exceptions\LocalCacheException
     * @throws InvalidResponseException
     */
    public function replyDelete($msg_data_id, $user_comment_id, $index = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/comment/reply/delete?access_token=ACCESS_TOKEN";
        $data = ['msg_data_id' => $msg_data_id, 'index' => $index, 'user_comment_id' => $user_comment_id];
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }

}

 
