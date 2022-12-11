<?php
class Image
{
    private $source;

    function __construct($source)
    {
        $this->source = $source;
    }

    function isImage()
    {
        $check = getimagesize($this->source["tmp_name"]);
        return !($check === false);
    }

    function limitSize($size)
    {
        return $this->source['size'] > $size;
    }

    function limitType($types)
    {
        $fileName = basename($this->source["name"]);
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $check = false;
        foreach ($types as $item) {
            $item = strtolower($item);
            if ($item == $ext) {
                $check = true;
                break;
            }
        }
        return $check;
    }

    function isExist($dir, $fileName = null)
    {
        $fileName = $fileName ?? basename($this->source["name"]);
        $targetFile = $dir . '/' . $fileName;
        return file_exists($targetFile);
    }

    function move($dir, $fileName = null)
    {
        $fileName = $fileName ?? basename($this->source["name"]);
        $index = 0;
        while($this->isExist($dir, $fileName)) {
            $index++;
            $fileName = $index . '_' . $fileName;
        }
        $targetFile = $dir . '/' . $fileName;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if (move_uploaded_file($this->source["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }
}
