<?php 

class FileUploader{

    protected $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    protected $maxSize = 2 * 1024 * 1024;

    public function upload($file){

        if(!in_array($file['type'], $this->allowedTypes)){
            throw new Exception("Invalid file type");
        }

        if($file['sized'] > $this->maxSize){
            throw new Exception("File size too long");
        }

        $fileName = uniqid() . '_'. $file['name'];

        $path = __DIR__ . '../storage/uploads/'. $fileName;

        if(!is_dir(dirname($path))){
            mkdir(dirname($path), 0777, true);
        }

        move_uploaded_file($file['tmp_name'], $path);

        return $fileName;
    }
}

?>