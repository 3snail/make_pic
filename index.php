<?php

$width=300;
$height=28;
//header("content-type:image/png");
for ($i = 0; $i < 9; $i++) {
    $name = md5($i.time());
    $arr = [0,1,2,3,4,5,6,7,8,9];
    shuffle($arr);
    $str = implode(' ', $arr);
    $str1 = implode('', $arr);

    $img=imagecreatetruecolor($width, $height);
    //给画布分配颜色
    $color1=imagecolorallocatealpha($img, 0, 0, 0, 127);
    $color2=imagecolorallocate($img, 255, 150, 30);

    imagecolortransparent($img, $color1);
    imagealphablending($img, false);
    imagesavealpha($img, true);

    //绘制带填充的矩形
    imagefilledrectangle($img, 0, 0, $width, $height, $color1);
    //往画布上写一行居中的字符串
    $font = './pingfang-black-stand.ttf';

    imagettftext($img, 24, 0, 0, 25, $color2, $font, $str);
    //imagettftext($img, 16, 0, 2, 19, $color2, $font, $str);


    //声明网页内容类型为图像
    //header("content-type:image/png");
    //输出图像
    //此处细节，用png更清楚，如果用jpeg格式文字周边会稍有模糊
    imagepng($img, $name.'.png', 9);
    //imagepng($img, null, 9);
    //销毁图像
    imagedestroy($img);
    echo $name.'.png';
    echo '========';
    echo $str1;

    echo '<br />';
}
