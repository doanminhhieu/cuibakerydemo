<?php
require_once('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

$tenbaiviet_vi = !empty($_POST['tenbaiviet_vi']) ? $_POST['tenbaiviet_vi'] : "";
if($tenbaiviet_vi == "") exit();

// $source = 'ja';
$source = 'auto';
// $source = 'vi';//'auto';
// $target = 'ko';
// $text = 'Quận Hoàn Kiếm';

// $array_dich = array("en" => "en", "cn" => "fr");

$array_ngonngu          = array();
$trans                  = new GoogleTranslate();
foreach ($array_dich as $key => $val) {
    // if($key == "en") {
    //     $array_ngonngu[$key]    = $trans->translate($source, "ko", $tenbaiviet_vi);
    // }
    // else 
    $array_ngonngu[$key]    = $trans->translate($source, $val, $tenbaiviet_vi);
}
echo json_encode($array_ngonngu);
exit();
$arrayngonngu = array(
    "ar" => "Tiếng Ả Rập",
    "sq" => "Tiếng Albania",
    "auto" => "Phát hiện ngôn ngữ",
    "ar" => "Tiếng Ả Rập",
    "af" => "Tiếng Afrikaans",
    "sq" => "Tiếng Albania",
    "am" => "Tiếng Amharic",
    "en" => "Tiếng Anh",
    "hy" => "Tiếng Armenia",
    "az" => "Tiếng Azerbaijan",
    "pl" => "Tiếng Ba Lan",
    "fa" => "Tiếng Ba Tư",
    "bn" => "Tiếng Bangla",
    "eu" => "Tiếng Basque",
    "be" => "Tiếng Belarus",
    "bs" => "Tiếng Bosnia",
    "pt" => "Tiếng Bồ Đào Nha",
    "bg" => "Tiếng Bulgaria",
    "ca" => "Tiếng Catalan",
    "ceb" => "Tiếng Cebuano",
    "co" => "Tiếng Corsica",
    "hr" => "Tiếng Croatia",
    "iw" => "Tiếng Do Thái",
    "da" => "Tiếng Đan Mạch",
    "de" => "Tiếng Đức",
    "et" => "Tiếng Estonia",
    "tl" => "Tiếng Filipino",
    "fy" => "Tiếng Frisia",
    "gd" => "Tiếng Gael Scotland",
    "gl" => "Tiếng Galician",
    "ka" => "Tiếng Georgia",
    "gu" => "Tiếng Gujarati",
    "nl" => "Tiếng Hà Lan",
    "ht" => "Tiếng Haiti",
    "ko" => "Tiếng Hàn",
    "ha" => "Tiếng Hausa",
    "haw" => "Tiếng Hawaii",
    "hi" => "Tiếng Hindi",
    "hmn" => "Tiếng Hmong",
    "hu" => "Tiếng Hungary",
    "el" => "Tiếng Hy Lạp",
    "is" => "Tiếng Iceland",
    "ig" => "Tiếng Igbo",
    "id" => "Tiếng Indonesia",
    "ga" => "Tiếng Ireland",
    "it" => "Tiếng Italy",
    "jv" => "Tiếng Java",
    "kn" => "Tiếng Kannada",
    "kk" => "Tiếng Kazakh",
    "km" => "Tiếng Khmer",
    "ku" => "Tiếng Kurd",
    "ky" => "Tiếng Kyrgyz",
    "la" => "Tiếng La-tinh",
    "lo" => "Tiếng Lào",
    "lv" => "Tiếng Latvia",
    "lt" => "Tiếng Litva",
    "lb" => "Tiếng Luxembourg",
    "ms" => "Tiếng Mã Lai",
    "mk" => "Tiếng Macedonia",
    "mg" => "Tiếng Malagasy",
    "ml" => "Tiếng Malayalam",
    "mt" => "Tiếng Malta",
    "mi" => "Tiếng Maori",
    "mr" => "Tiếng Marathi",
    "my" => "Tiếng Miến Điện",
    "mn" => "Tiếng Mông Cổ",
    "no" => "Tiếng Na Uy",
    "ne" => "Tiếng Nepal",
    "ru" => "Tiếng Nga",
    "ja" => "Tiếng Nhật",
    "ny" => "Tiếng Nyanja",
    "ps" => "Tiếng Pashto",
    "fr" => "Tiếng Pháp",
    "fi" => "Tiếng Phần Lan",
    "pa" => "Tiếng Punjab",
    "eo" => "Tiếng Quốc Tế Ngữ",
    "ro" => "Tiếng Romania",
    "sm" => "Tiếng Samoa",
    "cs" => "Tiếng Séc",
    "sr" => "Tiếng Serbia",
    "sn" => "Tiếng Shona",
    "sd" => "Tiếng Sindhi",
    "si" => "Tiếng Sinhala",
    "sk" => "Tiếng Slovak",
    "sl" => "Tiếng Slovenia",
    "so" => "Tiếng Somali",
    "st" => "Tiếng Sotho Miền Nam",
    "su" => "Tiếng Sunda",
    "sw" => "Tiếng Swahili",
    "tg" => "Tiếng Tajik",
    "ta" => "Tiếng Tamil",
    "es" => "Tiếng Tây Ban Nha",
    "te" => "Tiếng Telugu",
    "th" => "Tiếng Thái",
    "tr" => "Tiếng Thổ Nhĩ Kỳ",
    "sv" => "Tiếng Thụy Điển",
    "zh-CN" => "Tiếng Trung (Giản Thể)",
    "zh-TW" => "Tiếng Trung (Phồn thể)",
    "uk" => "Tiếng Ucraina",
    "ur" => "Tiếng Urdu",
    "uz" => "Tiếng Uzbek",
    "vi" => "Tiếng Việt",
    "cy" => "Tiếng Wales",
    "xh" => "Tiếng Xhosa",
    "yi" => "Tiếng Yiddish",
    "yo" => "Tiếng Yoruba",
    "zu" => "Tiếng Zulu"
);
echo '<pre>';
var_dump($arrayngonngu);