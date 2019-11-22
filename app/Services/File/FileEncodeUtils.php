<?php
/**
 * Created by PhpStorm.
 * User: veljko
 * Date: 11/22/19
 * Time: 2:45 PM
 */

namespace App\Services\File;


/**
 * Class FileEncodeUtils
 * @package App\Library\Helpers
 */
class FileEncodeUtils
{
    /**
     * Find file encoding
     *
     * @param string $filepath
     *
     * @return string
     */
    public static function findFileEncoding(string $filepath)
    {
        // default encoding
        $encoding = 'iso-8859-1';

        // find file encoding
        $encodingExec = exec(sprintf('file -bi %s', $filepath));

        // parse result
        if ($encodingExec) {
            $explode = explode('charset=', $encodingExec);

            if (isset($explode[1])) {
                $encoding = $explode[1];
            }
        }

        // if the encoding is unknown-8bit or x-user-defined we assume it might be utf-8; otherwise iconv will fail
        if (($encoding == 'unknown-8bit') || ($encoding == 'x-user-defined')) {
            $encoding = 'utf-8';
        }

        return $encoding;
    }

    /**
     * Convert file to UTF-8 encoding
     *
     * @param $encoding string
     * @param $input    string
     * @param $output   string
     *
     * @throws \Exception
     * @return void|mixed
     */
    public static function convertToUTF8($encoding, $input, $output)
    {
        try {
            $command = sprintf("iconv -c -f %s -t UTF-8//TRANSLIT %s > %s ", $encoding, $input, $output);
            exec($command);
            return $output;
        } catch (\Exception $e) {
            throw new \Exception(sprintf('Encoding Convert Error %s', $e->getMessage()));
        }
    }

    /**
     * Calculate base64 encoded file size with a tolerance to a possible very small difference to the real size, and return in bytes
     *
     * @param string $encodedImage
     * @return int
     */
    public static function calcApproxBase64EncodedFileSizeInBytes($encodedImage) {

        list($type, $image) = explode(';', $encodedImage);
        list(, $image)      = explode(',', $image);

        return (int) floor((strlen(rtrim($image, '=')) * 3 / 4));

    }

    /**
     * @param $bytes
     * @param int $decimals
     * @return string
     */
    public static function humanFilesize($bytes, $decimals = 2) {

        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);

        $decimals = @$size[$factor] == 'kB' ? 0 : $decimals;

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];

    }

    /**
     * @param string $val
     * @return bool|int|string
     */
    public static function returnIniBytes($val)
    {
        $val  = trim($val);

        if (is_numeric($val)) {
            return $val;
        }

        $last = strtolower($val[strlen($val)-1]);
        $val  = substr($val, 0, -1); // necessary since PHP 7.1; otherwise optional

        switch($last) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }

        return intval($val);
    }

    /**
     * @param int $value
     * @param int $decimals
     * @return float|int
     */
    public static function bytesToKilobytes($value, $decimals = 2) {
        return round($value/1024, $decimals);
    }
}
