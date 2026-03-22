<?php 

class Cache{

    protected $path;

    public function __construct()
    {
        $this->path = __DIR__ . '/../storage/cache';

        //auto-create folder if not exists
        if(!is_dir($this->path)){
            mkdir($this->path, 0777, true);
        }

    }
        
    public function get($key){
        $file = $this->path . md5($key);

        if(!file_exists($file)){
            return null;
        }

        $data = json_decode(file_get_contents($file), true);

        //expiry check
        if($data['expiry'] < time()){
            unlink($file);
            return null;
        }

        return $data['value'];
    }

    public function put($key, $value, $seconds = 60){
        $file = $this->path . md5($key);

        $data = [
            'value' => $value,
            'expiry' => time() + $seconds
        ];

        file_put_contents($file, json_encode($data));
    }
}

?>