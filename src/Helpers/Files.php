<?php

    namespace Helpers;

    trait Files
    {

        /**
         * Put data to a file
         * @param array  $data        array ou object
         * @param string $file        file name
         * @param string [$type='a+'] type
         */
        public static function put($data,$file,$type='a+')
        {
            if(is_array($data)||is_object($data)) json_encode($data);
            // Write into file {$file}            
            $file = fopen($file, $type);
            fwrite($file, $data);
            fclose($file);
            return;
        }

        public static function get($file)
        {
            return json_decode(file_get_contents($file));
        }

    }