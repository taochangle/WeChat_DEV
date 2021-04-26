<?php

namespace WeChat\Contracts;

/**
 * 自定义CURL文件类
 * Class MyCurlFile
 * @package WeChat\Contracts
 */
class MyCurlFile extends \stdClass
{
    /**
     * 当前数据类型
     * @var string
     */
    public $datatype = 'MY_CURL_FILE';

    /**
     * MyCurlFile constructor.
     * @param string|array $filename
     * @param string $mimetype
     * @param string $postname
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function __construct($filename, $mimetype = '', $postname = '')
    {
        
        if (is_array($filename)) {
            foreach ($filename as $k => $v) $this->{$k} = $v;
        } else {
            
                $this->mimetype = $mimetype;
                $this->postname = $postname;
                
                $this->extension = pathinfo($filename, PATHINFO_EXTENSION);
                
                if (empty($this->extension)) $this->extension = 'tmp';
                if (empty($this->mimetype)) $this->mimetype = Tools::getExtMine($this->extension);
                if (empty($this->postname)) $this->postname = pathinfo($filename, PATHINFO_BASENAME);
                

                
               // file_put_contents('file.log', $filename.PHP_EOL, FILE_APPEND); 	
                try{  
                    restore_error_handler();
                    set_error_handler(function ($err_severity, $err_msg, $err_file, $err_line, array $err_context)
                    {
                        throw new \ErrorException( $err_msg, 0, $err_severity, $err_file, $err_line );
                    }, E_WARNING);
                    $content = @file_get_contents($filename);
                   
                    if($content===false) {
                        file_put_contents('file.log', 'false'.$content.PHP_EOL, FILE_APPEND); 
                        return false;
                    }
                    $this->content = base64_encode($content);
                    //file_put_contents('file.log', $filename.PHP_EOL, FILE_APPEND); 	
                    $this->tempname = md5($this->content) . ".{$this->extension}";
                    restore_error_handler();
            }catch(\Exception $e){
                restore_error_handler();
                $ch = curl_init(); 
                //设置网址
                curl_setopt($ch,CURLOPT_URL,$filename); 
                //以字符串的形式返回传输
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
                curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla / 5.0(Windows; U; Windows NT 5.1; en-US; rv：1.8.1.13)Gecko / 20080311 Firefox / 2.0.0.13'); 
                // $ output包含输出字符串
               
               
                if(curl_exec($ch) === false)
               {
                return false;
                
               }
               else
               {
                  $content = curl_exec($ch); 
                   $this->content = base64_encode($content);
                   //file_put_contents('file.log', $filename.PHP_EOL, FILE_APPEND); 	
                   $this->tempname = md5($this->content) . ".{$this->extension}";
               }
                curl_close($ch); 
                
                
            }
               
           
        }
         
    }

    /**
     * 获取文件信息
     * @return \CURLFile|string
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function get()
    {
        //file_put_contents('file.log',time().$this->tempname.PHP_EOL, FILE_APPEND);
        $this->filename = Tools::pushFile($this->tempname, base64_decode($this->content));
        if(!$this->filename ){
            return false;
        }
        if (class_exists('CURLFile')) {
            return new \CURLFile($this->filename, $this->mimetype, $this->postname);
        }
        return "@{$this->tempname};filename={$this->postname};type={$this->mimetype}";
    }

    /**
     * 类销毁处理
     */
    public function __destruct()
    {
        // Tools::delCache($this->tempname);
    }

}