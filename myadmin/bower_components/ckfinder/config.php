<?php
session_start();
function utf8_char_code_at($str, $index) {
    $char = mb_substr($str, $index, 1, 'UTF-8');

    if (mb_check_encoding($char, 'UTF-8')) {
        $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
        return hexdec(bin2hex($ret));
    } else {
        return null;
    }
}
function c($f) {
    $map = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $result = '';
    for ($i = 0; $i < count($f); ++$i) {
    // for ($i = 0; $i < count($f); $i++) {
        $result .= $map[$f[$i]];
    }
    return $result;
}
function f10($c) {
    $i;
    $tmp = 0;
    // for ($i = 0; $i < 10; $i++) {
    for ($i = 0; $i < 10; ++$i) {
        $tmp += utf8_char_code_at($c, $i);
    }
    while ($tmp > 33) {
        $tmp1 = str_split(trim($tmp));
        $tmp  = 0;
        for ($i = 0; $i < count($tmp1); ++$i) {
            $tmp += (int)($tmp1[$i]);
        }
    }
    return $tmp;
}
function f4($f0, $licenseType) {
    return ($f0 + $licenseType) % 33;
}
function f7($licenseName) {
    $tmp = 0;
    for ($i = 0; $i < count($licenseName); ++$i) {
        $tmp += utf8_char_code_at($licenseName, $i); 
    }
    return $tmp % 100 % 33;
}
function f5($f1, $arg1) {
    $arg1 = $arg1 ? 1 : 0;
    return ($f1 + $arg1) % 33;
}
function f8f9($f0, $f1, $f2, $f3) {
    $c = 33 + ($f0 * $f3 - $f1 * $f2) % 33;
    $u = 0;
    // for ($i = 0; $i < 33; $i++) {
    for ($i = 0; $i < 33; ++$i) {
        if (1 === $c * $i % 33) {
            $u = $i;
        }
    }
    $_f1 = 33 - $f1;
    $_f2 = 33 - $f2;
    for ($f8 = 0; $f8 < 33; ++$f8) {
        for ($f9 = 0; $f9 < 33; ++$f9) {
            if (12 * (($u * $f3 % 33 * $f8 + $u * $_f1 % 33 * $f9) % 33) + ($u * $_f2 % 33 * $f8 + $u * $f0 % 33 * $f9) % 33 >= 211) {
                return [$f8, $f9];
            }
        }
    }
    return null;
}
function rand33() {
    // return Math.floor(33 * Math.random());
    return RAND(0,32);
}
function generateLicenseKey($licenseType, $licenseName) {
    $licenseType = (int)($licenseType);
    $a_flag      = array(0, 1, 2, 3);
    $licenseType = $a_flag[$licenseType] < 0 ? 2 : $licenseType;
    $licenseName = $licenseName;
    $f           =[];
    $f8f9Pair    = null;
    $i           = 0;
    do {
        $f[0] = rand33();
        $f[1] = rand33();
        $f[2] = rand33();
        $f[3] = rand33();
        $f8f9Pair = f8f9($f[0], $f[1], $f[2], $f[3]);
        // $i++;
        ++$i;
        if ($i > 1000) {
            throw new Error('Generate license key error, there may be some problem with the random number generater of your computer.');
        }
    } while (!$f8f9Pair);
    $f[4]  = f4($f[0], $licenseType);
    $f[5]  = f5($f[1], RAND(0,2));
    $f[6]  = rand33();
    $f[7]  = f7($licenseName);
    $f[8]  = $f8f9Pair[0];
    $f[9]  = $f8f9Pair[1];
    $f[10] = f10(c($f));
    return lc(c($f), ($licenseType !== 2));
}
function lc($c, $useLicenseName) {
    $i;
    $map = [1, 8, 17, 22, 3, 13, 11, 20, 5, 24, 27];
    $str = '*???-*?**-?**?-*?**-*?**-?*?*-?**?';
    $key = str_split(str_replace('-', '', $str));
    if ($useLicenseName) {
        $lc2Map = [1, 2, 6, 7, 11, 12, 16, 17, 21, 22, 26, 27, 31, 32];
        $lc2Pos = RAND(0, count($lc2Map));
        $data = str_split('123456789ABCDEFGHJKLMNPQRSTUVWXYZ');
        $key[2] = $data[$lc2Pos];
    }
    // for ($i = 0; $i < count($map); $i++) {
    for ($i = 0; $i < count($map); ++$i) {
        $key[$map[$i]] = $c[$i];
    }
    $result = [];
    for ($i = 0; $i < count($key); $i += 4) {
        $result_part = '';
        for ($j = $i; $j < $i + 4 && $j < count($key); ++$j) {
            $result_part .= $key[$j];
        }
        array_push($result, $result_part);
    }
    return implode('-', $result);
}
/*
 * CKFinder Configuration File
 *
 * For the official documentation visit http://docs.cksource.com/ckfinder3-php/
 */

/*============================ PHP Error Reporting ====================================*/
// http://docs.cksource.com/ckfinder3-php/debugging.html

// Production
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0);

// Development
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

/*============================ General Settings =======================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html

$config = array();

/*============================ Enable PHP Connector HERE ==============================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_authentication

$config['authentication'] = function () {
    if(!empty($_SESSION['luluwebproadmin']) && $_SESSION['luluwebproadmin'] != NULL)
        {
            return true;
        }
    else return false;
};

/*============================ License Key ============================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_licenseKey

$config['licenseName'] = $_SERVER['HTTP_HOST'];
$config['licenseKey']  = generateLicenseKey(2, $_SERVER['HTTP_HOST']);

/*============================ CKFinder Internal Directory ============================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_privateDir

$config['privateDir'] = array(
    'backend' => 'default',
    'tags'   => '.ckfinder/tags',
    'logs'   => '.ckfinder/logs',
    'cache'  => '.ckfinder/cache',
    'thumbs' => '.ckfinder/cache/thumbs',
);

/*============================ Images and Thumbnails ==================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_images

$config['images'] = array(
    'maxWidth'  => 1600,
    'maxHeight' => 12000,
    'quality'   => 80,
    'sizes' => array(
        'small'  => array('width' => 480, 'height' => 320, 'quality' => 80),
        'medium' => array('width' => 600, 'height' => 480, 'quality' => 80),
        'large'  => array('width' => 800, 'height' => 600, 'quality' => 80)
    )
);

/*=================================== Backends ========================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_backends

$config['backends'][] = array(
    'name'         => 'default',
    'adapter'      => 'local',
    'baseUrl'      => '/'.$_SESSION['thumuc'].'/',
//  'root'         => '', // Can be used to explicitly set the CKFinder user files directory.
    'chmodFiles'   => 0777,
    'chmodFolders' => 0755,
    'filesystemEncoding' => 'UTF-8',
);

/*================================ Resource Types =====================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_resourceTypes

$config['defaultResourceTypes'] = '';

$config['resourceTypes'][] = array(
    'name'              => 'Files', // Single quotes not allowed.
    'directory'         => 'files',
    'maxSize'           =>  0,// 1048576, //1028624, //1 048 576 1.168.511
    'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,docx,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pptx,pxd,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,sitd,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,xlsx,zip',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Images',
    'directory'         => 'images',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

/*================================ Access Control =====================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_roleSessionVar

$config['roleSessionVar'] = 'CKFinder_UserRole';

// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_accessControl
$config['accessControl'][] = array(
    'role'                => '*',
    'resourceType'        => '*',
    'folder'              => '/',

    'FOLDER_VIEW'         => true,
    'FOLDER_CREATE'       => true,
    'FOLDER_RENAME'       => true,
    'FOLDER_DELETE'       => true,

    'FILE_VIEW'           => true,
    'FILE_CREATE'         => true,
    'FILE_RENAME'         => true,
    'FILE_DELETE'         => true,

    'IMAGE_RESIZE'        => true,
    'IMAGE_RESIZE_CUSTOM' => true
);


/*================================ Other Settings =====================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html

$config['overwriteOnUpload'] = false;
$config['checkDoubleExtension'] = true;
$config['disallowUnsafeCharacters'] = false;
$config['secureImageUploads'] = true;
$config['checkSizeAfterScaling'] = true;
$config['htmlExtensions'] = array('html', 'htm', 'xml', 'js');
$config['hideFolders'] = array('.*', 'CVS', '__thumbs');
$config['hideFiles'] = array('.*');
$config['forceAscii'] = false;
$config['xSendfile'] = false;

// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_debug
$config['debug'] = false;

/*==================================== Plugins ========================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_plugins

$config['pluginsDirectory'] = __DIR__ . '/plugins';
$config['plugins'] = array();

/*================================ Cache settings =====================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_cache

$config['cache'] = array(
    'imagePreview' => 24 * 3600,
    'thumbnails'   => 24 * 3600 * 365,
    'proxyCommand' => 0
);

/*============================ Temp Directory settings ================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_tempDirectory

$config['tempDirectory'] = sys_get_temp_dir();

/*============================ Session Cause Performance Issues =======================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_sessionWriteClose

$config['sessionWriteClose'] = true;

/*================================= CSRF protection ===================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_csrfProtection

$config['csrfProtection'] = true;

/*===================================== Headers =======================================*/
// http://docs.cksource.com/ckfinder3-php/configuration.html#configuration_options_headers

$config['headers'] = array();

/*============================== End of Configuration =================================*/

// Config must be returned - do not change it.
return $config;
