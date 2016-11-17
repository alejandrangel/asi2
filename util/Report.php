<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/11/16
 * Time: 12:02 PM
 */

namespace util;


class Report
{
    public static function  PDF($style=null,$title,$content)
    {
        $header = ' |<h2>'.\Yii::$app->params['empresa'].'<br />
                  '.\Yii::$app->params['sys-name'].'</h2>
                    '.$title.'|'.@(\Yii::$app->user->identity->nombre).' <br/>'.date("d-m-Y").'<br />'.date("g:i a");
        $mpdf = new \mPDF();
        $mpdf->SetWatermarkImage(\Yii::$app->params['logo-report'], 1, '', array(13,5));
        $mpdf->showWatermarkImage = true;
        $mpdf->defaultheaderfontsize=6;
        $mpdf->defaultheaderline=0.5;
        $mpdf->setFooter('{PAGENO}');
        $mpdf->defaultfooterline=0;
        $mpdf->SetHeader($header);
        $mpdf->WriteHTML($style,1);
        $mpdf->WriteHTML("<BR /><BR />".$content,2);
        $mpdf->Output();
    }

}