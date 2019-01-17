@extends('pdf.layout_pp')
@push('css')
    <STYLE type="text/css">

        body {margin-top: 0px;margin-left: 0px;}

        #page_1, #page_2, #page_3 {page-break-after  : always;page-break-before : avoid;page-break-inside : avoid}
        #page_4, #page_6 {page-break-after  : always;page-break-before : avoid;page-break-inside : avoid}
        #page_7, #page_8, #page_9 {page-break-after  : always;page-break-before : avoid;page-break-inside : avoid}
        #page_10, #page_11 {page-break-after : always;page-break-before : avoid;page-break-inside : avoid}
        #page_12 {page-break-after : avoid;page-break-before : avoid;page-break-inside : avoid}


        #page_1 {position:relative; overflow: hidden;margin: 23px 0px 25px 0px;padding: 0px;border: none;}
        #page_1 #id1_1 {border:none;margin: 133px 0px 0px 0px;padding: 0px;border:none;width: 794px;overflow: hidden;}
        #page_1 #id1_2 {border:none;margin: 0px 0px 0px 154px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_1 #p1dimg1 {position:absolute;top:0px;left:38px;z-index:-1;width:718px;height:1055px;}
        #page_1 #p1dimg1 #p1img1 {width:718px;height:1055px;}




        #page_2 {position:relative; overflow: hidden;margin: 23px 0px 25px 38px;padding: 0px;border: none;}
        #page_2 #id2_1 {border:none;margin: 132px 0px 0px 4px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_2 #id2_2 {border:none;margin: 0px 0px 0px 116px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_2 #p2dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:718px;height:1055px;}
        #page_2 #p2dimg1 #p2img1 {width:718px;height:1055px;}




        #page_3 {position:relative; overflow: hidden;margin: 23px 0px 25px 38px;padding: 0px;border: none;}
        #page_3 #id3_1 {border:none;margin: 132px 0px 0px 4px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_3 #id3_2 {border:none;margin: 0px 0px 0px 116px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_3 #p3dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:718px;height:1055px;}
        #page_3 #p3dimg1 #p3img1 {width:718px;height:1055px;}




        #page_4 {position:relative; overflow: hidden;margin: 23px 0px 25px 38px;padding: 0px;border: none;}
        #page_4 #id4_1 {border:none;margin: 149px 0px 0px 4px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_4 #id4_2 {border:none;margin: 0px 0px 0px 116px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_4 #p4dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:718px;height:1055px;}
        #page_4 #p4dimg1 #p4img1 {width:718px;height:1055px;}




        #page_5 {position:relative; overflow: hidden;margin: 23px 0px 25px 37px;padding: 0px;border: none;}
        #page_5 #id5_1 {border:none;margin: 130px 0px 0px 5px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_5 #id5_2 {border:none;margin: 0px 0px 0px 20px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_5 #id5_2 #id5_2_1 {float:left;border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 446px;overflow: hidden;}
        #page_5 #id5_2 #id5_2_2 {float:left;border:none;margin: 34px 0px 0px 0px;padding: 0px;border:none;width: 306px;overflow: hidden;}
        #page_5 #id5_3 {border:none;margin: 9px 0px 0px 5px;padding: 0px;border:none;width: 752px;overflow: hidden; font-size: 5px !important;}
        #page_5 #id5_4 {border:none;margin: 0px 0px 0px 117px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_5 #p5dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:719px;height:1055px;}
        #page_5 #p5dimg1 #p5img1 {width:719px;height:1055px;}




        #page_6 {position:relative; overflow: hidden;margin: 23px 0px 25px 37px;padding: 0px;border: none;}
        #page_6 #id6_1 {border:none;margin: 134px 0px 0px 5px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_6 #id6_2 {border:none;margin: 0px 0px 0px 117px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_6 #p6dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:719px;height:1055px;}
        #page_6 #p6dimg1 #p6img1 {width:719px;height:1055px;}




        #page_7 {position:relative; overflow: hidden;margin: 23px 0px 25px 37px;padding: 0px;border: none;}
        #page_7 #id7_1 {border:none;margin: 134px 0px 0px 5px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_7 #id7_2 {border:none;margin: 0px 0px 0px 117px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_7 #p7dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:719px;height:1055px;}
        #page_7 #p7dimg1 #p7img1 {width:719px;height:1055px;}




        #page_8 {position:relative; overflow: hidden;margin: 23px 0px 25px 37px;padding: 0px;border: none;}
        #page_8 #id8_1 {border:none;margin: 134px 0px 0px 5px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_8 #id8_2 {border:none;margin: 0px 0px 0px 117px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_8 #p8dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:719px;height:1055px;}
        #page_8 #p8dimg1 #p8img1 {width:719px;height:1055px;}

        #page_8 #p8inl_img1 {position:relative;width:12px;height:11px;}
        #page_8 #p8inl_img2 {position:relative;width:12px;height:11px;}



        #page_9 {position:relative; overflow: hidden;margin: 23px 0px 25px 37px;padding: 0px;border: none;}
        #page_9 #id9_1 {border:none;margin: 134px 0px 0px 5px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_9 #id9_2 {border:none;margin: 0px 0px 0px 117px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_9 #p9dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:719px;height:1055px;}
        #page_9 #p9dimg1 #p9img1 {width:719px;height:1055px;}




        #page_10 {position:relative; overflow: hidden;margin: 23px 0px 25px 0px;padding: 0px;border: none;}
        #page_10 #id10_1 {border:none;margin: 134px 0px 0px 0px;padding: 0px;border:none;width: 794px;overflow: hidden;}
        #page_10 #id10_2 {border:none;margin: 0px 0px 0px 154px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_10 #p10dimg1 {position:absolute;top:0px;left:38px;z-index:-1;width:718px;height:1055px;}
        #page_10 #p10dimg1 #p10img1 {width:718px;height:1055px;}




        #page_11 {position:relative; overflow: hidden;margin: 23px 0px 25px 37px;padding: 0px;border: none;}
        #page_11 #id11_1 {border:none;margin: 134px 0px 0px 5px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_11 #id11_2 {border:none;margin: 0px 0px 0px 117px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_11 #p11dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:719px;height:1055px;}
        #page_11 #p11dimg1 #p11img1 {width:719px;height:1055px;}




        #page_12 {position:relative; overflow: hidden;margin: 23px 0px 25px 38px;padding: 0px;border: none;}
        #page_12 #id12_1 {border:none;margin: 134px 0px 0px 4px;padding: 0px;border:none;width: 752px;overflow: hidden;}
        #page_12 #id12_2 {border:none;margin: 0px 0px 0px 116px;padding: 0px;border:none;width: 640px;overflow: hidden;}

        #page_12 #p12dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:718px;height:1055px;}
        #page_12 #p12dimg1 #p12img1 {width:718px;height:1055px;}




        .dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

        .ft0{font: bold 20px 'Helvetica';color: #8f181b;line-height: 24px;}
        .ft1{font: 1px 'Helvetica';line-height: 1px;}
        .ft2{font: 10px 'Helvetica';line-height: 13px;}
        .ft3{font: 11px 'Helvetica';line-height: 14px;}
        .ft4{font: bold 19px 'Helvetica';line-height: 22px;}
        .ft5{font: 11px 'Helvetica';margin-left: 3px;line-height: 14px;}
        .ft6{font: italic 11px 'Helvetica';line-height: 14px;}
        .ft7{font: italic 10px 'Helvetica';line-height: 13px;}
        .ft8{font: 5px 'Helvetica';line-height: 6px;}
        .ft9{font: bold 21px 'Helvetica';line-height: 24px;}
        .ft10{font: bold 11px 'Helvetica';line-height: 14px;}
        .ft11{font: 11px 'Helvetica';line-height: 18px;}
        .ft12{font: 11px 'Helvetica';line-height: 16px;}
        .ft13{font: 11px 'Helvetica';line-height: 17px;}
        .ft14{font: 8px 'Helvetica';line-height: 8px;}
        .ft15{font: 8px 'Helvetica';line-height: 9px;}
        .ft16{font: 8px 'Helvetica';line-height: 10px;}
        .ft17{font: 11px 'Helvetica';margin-left: 3px;line-height: 16px;}
        .ft18{font: 11px 'Helvetica';margin-left: 4px;line-height: 16px;}
        .ft19{font: 11px 'Helvetica';margin-left: 3px;line-height: 17px;}
        .ft20{font: bold 13px 'Helvetica';line-height: 16px;}

        .p0{text-align: center;margin-top: 0px;margin-bottom: 0px;}
        .p1{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p2{text-align: left;padding-left: 166px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p3{text-align: left;padding-left: 42px;margin-top: 52px;margin-bottom: 0px;}
        .p4{text-align: left;padding-left: 42px;margin-top: 41px;margin-bottom: 0px;}
        .p5{text-align: left;padding-left: 42px;margin-top: 23px;margin-bottom: 0px;}
        .p6{text-align: left;padding-left: 42px;margin-top: 5px;margin-bottom: 0px;}
        .p7{text-align: left;padding-left: 42px;margin-top: 43px;margin-bottom: 0px;}
        .p8{text-align: left;padding-left: 42px;margin-top: 24px;margin-bottom: 0px;}
        .p9{text-align: left;margin-top: 0px;margin-bottom: 0px;}
        .p10{text-align: left;padding-left: 290px;margin-top: 0px;margin-bottom: 0px;}
        .p11{text-align: left;margin-top: 54px;margin-bottom: 0px;}
        .p12{text-align: left;padding-left: 249px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p13{text-align: left;padding-left: 15px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p14{text-align: left;margin-top: 58px;margin-bottom: 0px;}
        .p15{text-align: right;padding-right: 75px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p16{text-align: right;padding-right: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p17{text-align: left;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p18{text-align: left;padding-left: 12px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p19{text-align: right;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p20{text-align: left;margin-top: 16px;margin-bottom: 0px;}
        .p21{text-align: left;padding-left: 204px;margin-top: 3px;margin-bottom: 0px;}
        .p22{text-align: left;margin-top: 14px;margin-bottom: 0px;}
        .p23{text-align: left;padding-right: 31px;margin-top: 24px;margin-bottom: 0px;}
        .p24{text-align: justify;padding-right: 33px;margin-top: 24px;margin-bottom: 0px;}
        .p25{text-align: left;padding-right: 39px;margin-top: 22px;margin-bottom: 0px;}
        .p26{text-align: left;padding-right: 36px;margin-top: 24px;margin-bottom: 0px;}
        .p27{text-align: left;margin-top: 42px;margin-bottom: 0px;}
        .p28{text-align: left;margin-top: 24px;margin-bottom: 0px;}
        .p29{text-align: left;margin-top: 5px;margin-bottom: 0px;}
        .p30{text-align: justify;padding-right: 37px;margin-top: 5px;margin-bottom: 0px;}
        .p31{text-align: left;margin-top: 22px;margin-bottom: 0px;}
        .p32{text-align: justify;padding-right: 40px;margin-top: 5px;margin-bottom: 0px;}
        .p33{text-align: left;margin-top: 21px;margin-bottom: 0px;}
        .p34{text-align: justify;padding-right: 36px;margin-top: 5px;margin-bottom: 0px;}
        .p35{text-align: left;margin-top: 23px;margin-bottom: 0px;}
        .p36{text-align: left;padding-right: 39px;margin-top: 5px;margin-bottom: 0px;}
        .p37{text-align: left;margin-top: 37px;margin-bottom: 0px;}
        .p38{text-align: left;padding-left: 174px;margin-top: 11px;margin-bottom: 0px;}
        .p39{text-align: justify;padding-right: 37px;margin-top: 9px;margin-bottom: 0px;}
        .p40{text-align: justify;padding-right: 37px;margin-top: 2px;margin-bottom: 0px;}
        .p41{text-align: justify;padding-right: 37px;margin-top: 4px;margin-bottom: 0px;}
        .p42{text-align: left;padding-right: 34px;margin-top: 0px;margin-bottom: 0px;}
        .p43{text-align: justify;padding-right: 35px;margin-top: 23px;margin-bottom: 0px;}
        .p44{text-align: justify;padding-right: 36px;margin-top: 6px;margin-bottom: 0px;}
        .p45{text-align: left;padding-right: 38px;margin-top: 22px;margin-bottom: 0px;}
        .p46{text-align: left;padding-right: 34px;margin-top: 6px;margin-bottom: 0px;}
        .p47{text-align: justify;padding-right: 41px;margin-top: 25px;margin-bottom: 0px;}
        .p48{text-align: justify;padding-right: 36px;margin-top: 3px;margin-bottom: 0px;}
        .p49{text-align: justify;padding-right: 37px;margin-top: 24px;margin-bottom: 0px;}
        .p50{text-align: justify;padding-right: 37px;margin-top: 25px;margin-bottom: 0px;}
        .p51{text-align: left;padding-right: 292px;margin-top: 31px;margin-bottom: 0px;}
        .p52{text-align: left;margin-top: 15px;margin-bottom: 0px;}
        .p53{text-align: left;margin-top: 16px;margin-bottom: 0px;}
        .p54{text-align: left;padding-right: 41px;margin-top: 0px;margin-bottom: 0px;}
        .p55{text-align: left;padding-right: 41px;margin-top: 0px;margin-bottom: 0px;}
        .p56{text-align: justify;padding-right: 38px;margin-top: 0px;margin-bottom: 0px;}
        .p57{text-align: left;padding-left: 170px;margin-top: 0px;margin-bottom: 0px;}
        .p58{text-align: left;margin-top: 50px;margin-bottom: 0px;}
        .p59{text-align: left;margin-top: 4px;margin-bottom: 0px;}
        .p60{text-align: left;margin-top: 16px;margin-bottom: 0px;}
        .p61{text-align: left;margin-top: 43px;margin-bottom: 0px;}
        .p62{text-align: justify;padding-right: 40px;margin-top: 36px;margin-bottom: 0px;}
        .p63{text-align: justify;padding-right: 41px;margin-top: 2px;margin-bottom: 0px;}
        .p64{text-align: left;margin-top: 3px;margin-bottom: 0px;}
        .p65{text-align: left;padding-left: 120px;margin-top: 0px;margin-bottom: 0px;}
        .p66{text-align: left;padding-right: 40px;margin-top: 43px;margin-bottom: 0px;}
        .p67{text-align: left;margin-top: 6px;margin-bottom: 0px;}
        .p68{text-align: left;margin-top: 80px;margin-bottom: 0px;}
        .p69{text-align: left;margin-top: 38px;margin-bottom: 0px;}
        .p70{text-align: left;padding-right: 40px;margin-top: 1px;margin-bottom: 0px;}
        .p71{text-align: left;padding-left: 84px;margin-top: 0px;margin-bottom: 0px;}
        .p72{text-align: left;margin-top: 17px;margin-bottom: 0px;}
        .p73{text-align: left;padding-right: 40px;margin-top: 24px;margin-bottom: 0px;}
        .p74{text-align: left;padding-left: 257px;margin-top: 0px;margin-bottom: 0px;}
        .p75{text-align: left;margin-top: 12px;margin-bottom: 0px;}
        .p76{text-align: left;padding-right: 37px;margin-top: 24px;margin-bottom: 0px;}
        .p77{text-align: left;padding-right: 38px;margin-top: 6px;margin-bottom: 0px;}
        .p78{text-align: left;padding-right: 34px;margin-top: 5px;margin-bottom: 0px;text-indent: 17px;}
        .p79{text-align: left;padding-left: 17px;margin-top: 6px;margin-bottom: 0px;}
        .p80{text-align: left;padding-right: 41px;margin-top: 5px;margin-bottom: 0px;text-indent: 17px;}
        .p81{text-align: left;padding-right: 38px;margin-top: 6px;margin-bottom: 0px;text-indent: 15px;}
        .p82{text-align: left;padding-right: 35px;margin-top: 4px;margin-bottom: 0px;text-indent: 17px;}
        .p83{text-align: left;padding-left: 14px;margin-top: 5px;margin-bottom: 0px;}
        .p84{text-align: left;padding-left: 26px;margin-top: 5px;margin-bottom: 0px;}
        .p85{text-align: left;padding-left: 17px;margin-top: 4px;margin-bottom: 0px;}
        .p86{text-align: left;padding-right: 41px;margin-top: 43px;margin-bottom: 0px;}
        .p87{text-align: left;margin-top: 25px;margin-bottom: 0px;}
        .p88{text-align: left;margin-top: 9px;margin-bottom: 0px;}
        .p89{text-align: left;margin-top: 64px;margin-bottom: 0px;}
        .p90{text-align: right;padding-right: 239px;margin-top: 0px;margin-bottom: 0px;}
        .p91{text-align: left;padding-left: 42px;margin-top: 12px;margin-bottom: 0px;}
        .p92{text-align: left;padding-left: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p93{text-align: left;padding-left: 10px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p94{text-align: left;padding-left: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p95{text-align: left;padding-left: 42px;margin-top: 45px;margin-bottom: 0px;}
        .p96{text-align: left;padding-left: 186px;margin-top: 0px;margin-bottom: 0px;}
        .p97{text-align: left;padding-left: 202px;margin-top: 3px;margin-bottom: 0px;}
        .p98{text-align: justify;padding-right: 620px;margin-top: 5px;margin-bottom: 0px;}
        .p99{text-align: left;margin-top: 59px;margin-bottom: 0px;}
        .p100{text-align: left;margin-top: 99px;margin-bottom: 0px;}
        .p101{text-align: left;padding-left: 52px;margin-top: 0px;margin-bottom: 0px;}
        .p102{text-align: left;padding-right: 37px;margin-top: 12px;margin-bottom: 0px;}
        .p103{text-align: justify;padding-right: 34px;margin-top: 5px;margin-bottom: 0px;}
        .p104{text-align: left;padding-right: 167px;margin-top: 5px;margin-bottom: 0px;}
        .p105{text-align: left;padding-left: 317px;margin-top: 24px;margin-bottom: 0px;}
        .p106{text-align: left;padding-left: 158px;margin-top: 5px;margin-bottom: 0px;}
        .p107{text-align: left;padding-right: 33px;margin-top: 23px;margin-bottom: 0px;}
        .p108{text-align: justify;padding-right: 35px;margin-top: 4px;margin-bottom: 0px;}
        .p109{text-align: left;padding-right: 40px;margin-top: 3px;margin-bottom: 0px;}
        .p110{text-align: left;padding-right: 35px;margin-top: 6px;margin-bottom: 0px;}
        .p111{text-align: left;padding-right: 34px;margin-top: 24px;margin-bottom: 0px;}

        .td0{padding: 0px;margin: 0px;width: 463px;vertical-align: bottom;}
        .td1{padding: 0px;margin: 0px;width: 252px;vertical-align: bottom;}
        .td2{padding: 0px;margin: 0px;width: 321px;vertical-align: bottom;}
        .td3{padding: 0px;margin: 0px;width: 62px;vertical-align: bottom;}
        .td4{padding: 0px;margin: 0px;width: 386px;vertical-align: bottom;}
        .td5{padding: 0px;margin: 0px;width: 160px;vertical-align: bottom;}
        .td6{padding: 0px;margin: 0px;width: 70px;vertical-align: bottom;}
        .td7{padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
        .td8{padding: 0px;margin: 0px;width: 242px;vertical-align: bottom;}
        .td9{padding: 0px;margin: 0px;width: 137px;vertical-align: bottom;}
        .td10{padding: 0px;margin: 0px;width: 140px;vertical-align: bottom;}
        .td11{padding: 0px;margin: 0px;width: 165px;vertical-align: bottom;}
        .td12{padding: 0px;margin: 0px;width: 259px;vertical-align: bottom;}
        .td13{padding: 0px;margin: 0px;width: 259px;vertical-align: bottom;}
        .td14{padding: 0px;margin: 0px;width: 183px;vertical-align: bottom;}
        .td15{padding: 0px;margin: 0px;width: 158px;vertical-align: bottom;}
        .td16{padding: 0px;margin: 0px;width: 324px;vertical-align: bottom;}

        .tr0{height: 17px;}
        .tr1{height: 69px;}
        .tr2{height: 16px;}
        .tr3{height: 18px;}
        .tr4{height: 20px;}
        .tr5{height: 19px;}
        .tr6{height: 38px;}

        .t0{width: 715px;margin-left: 42px;margin-top: 94px;font: 11px 'Helvetica';}
        .t1{width: 383px;margin-left: 369px;margin-top: 397px;font: italic 10px 'Helvetica';}
        .t2{width: 616px;margin-top: 19px;font: 11px 'Helvetica';}
        .t3{width: 691px;margin-top: 20px;font: 11px 'Helvetica';}
        .t4{width: 383px;margin-left: 327px;margin-top: 503px;font: italic 10px 'Helvetica';}
        .t5{width: 423px;margin-top: 31px;font: 11px 'Helvetica';}
        .t6{width: 383px;margin-left: 327px;margin-top: 182px;font: italic 10px 'Helvetica';}
        .t7{width: 383px;margin-left: 327px;margin-top: 130px;font: italic 10px 'Helvetica';}
        .t8{width: 383px;margin-left: 327px;margin-top: 75px;font: italic 10px 'Helvetica';}
        .t9{width: 383px;margin-left: 327px;margin-top: 148px;font: italic 10px 'Helvetica';}
        .t10{width: 383px;margin-left: 327px;margin-top: 367px;font: italic 10px 'Helvetica';}
        .t11{width: 383px;margin-left: 327px;margin-top: 114px;font: italic 10px 'Helvetica';}
        .t12{width: 456px;margin-left: 42px;margin-top: 40px;font: 11px 'Helvetica';}
        .t13{width: 386px;margin-left: 366px;margin-top: 530px;font: italic 10px 'Helvetica';}
        .t14{width: 386px;margin-left: 324px;margin-top: 144px;font: italic 10px 'Helvetica';}
        .t15{width: 386px;margin-left: 324px;margin-top: 151px;font: italic 10px 'Helvetica';}

    </STYLE>
@endpush
@section('body')
<DIV id="page_1">
    <DIV id="id1_1">
        <P class="p0 ft0">DEMANDE DE RESERVATION PRODUIT {{strtoupper(in_array($formulae->nom, ['confort', 'confort-echelonne']) ? "Confort" : "Serenite")}}</P>
        <TABLE cellpadding=0 cellspacing=0 class="t0">
            <TR>
                <TD class="tr0 td0"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr0 td0"><P class="p2 ft2">Date : <NOBR>{{\Carbon\Carbon::now()->format('d-m-Y')}}</NOBR></P></TD>
            </TR>
            <TR>
                <TD class="tr1 td0"><P class="p1 ft3">Par réception numérique : Valable jusqu'au <NOBR>{{\Carbon\Carbon::now()->addDay(7)->format('d-m-Y')}}</NOBR></P></TD>
                <TD class="tr1 td0"><P class="p1 ft3">Par réception courrier : Valable jusqu'au <NOBR>{{\Carbon\Carbon::now()->addDay(10)->format('d-m-Y')}}</NOBR></P></TD>
            </TR>
        </TABLE>
        <P class="p3 ft4">{{ucfirst($investor->civilite)}} {{ $investor->full_name }}</P>
        <P class="p4 ft3">Merci de bien vouloir nous retourner un exemplaire original sous 14 jours :</P>
        <P class="p5 ft3"><SPAN class="ft2">-</SPAN><SPAN class="ft5">Dûment renseigné,</SPAN></P>
        <P class="p6 ft3"><SPAN class="ft2">-</SPAN><SPAN class="ft5">Signé, pages 4, 5, 6, 7, 8</SPAN></P>
        <P class="p6 ft3"><SPAN class="ft2">-</SPAN><SPAN class="ft5">Paraphé, pages 1, 2, 3, 9, 10, 11</SPAN></P>
        <P class="p7 ft3">Accompagné des pièces <NOBR>ci-dessous</NOBR> et des chèques de règlement figurant page 12</P>
        <P class="p8 ft3"><SPAN class="ft2">-</SPAN><SPAN class="ft5">Copie de la pièce d'identité</SPAN></P>
        <P class="p6 ft3"><SPAN class="ft2">-</SPAN><SPAN class="ft5">Justificatif de domicile</SPAN></P>

    </DIV>
</DIV>
<DIV id="page_2">
    <DIV id="id2_1">
        <P class="p10 ft9">SOMMAIRE</P>
        <P class="p11 ft4">I - PRESENTATION</P>
        <TABLE cellpadding=0 cellspacing=0 class="t2">
            <TR>
                <TD class="tr0 td4"><P class="p12 ft3">Signature</P></TD>
                <TD class="tr0 td5"><P class="p1 ft3">Paraphe</P></TD>
                <TD class="tr0 td6"><P class="p1 ft3">Commentaires</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td4"><P class="p1 ft3">1 - Notice explicative</P></TD>
                <TD class="tr2 td5"><P class="p13 ft3">X</P></TD>
                <TD class="tr2 td6"><P class="p1 ft1">&nbsp;</P></TD>
            </TR>
        </TABLE>
        <P class="p14 ft4">II - RESERVATION</P>
        <TABLE cellpadding=0 cellspacing=0 class="t3">
            <TR>
                <TD class="tr2 td7"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr2 td8"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr2 td9"><P class="p1 ft3">Signature</P></TD>
                <TD class="tr2 td10"><P class="p1 ft3">Paraphe</P></TD>
                <TD class="tr2 td11"><P class="p15 ft3">Commentaires</P></TD>
            </TR>
            <TR>
                <TD class="tr0 td7"><P class="p16 ft3">1</P></TD>
                <TD class="tr0 td8"><P class="p17 ft3">- Demande de réservation</P></TD>
                <TD class="tr0 td9"><P class="p18 ft3">X</P></TD>
                <TD class="tr0 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr0 td11"><P class="p19 ft2">Signature plus mention à respecter</P></TD>
            </TR>
            <TR>
                <TD class="tr3 td7"><P class="p16 ft3">2</P></TD>
                <TD class="tr3 td8"><P class="p17 ft3">- Identité de l'investisseur</P></TD>
                <TD class="tr3 td9"><P class="p18 ft3">X</P></TD>
                <TD class="tr3 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr3 td11"><P class="p19 ft3">A remplir plus signature</P></TD>
            </TR>
            <TR>
                <TD class="tr4 td7"><P class="p16 ft3">3</P></TD>
                <TD class="tr4 td8"><P class="p17 ft3">- Déclaration de non condamnation</P></TD>
                <TD class="tr4 td9"><P class="p18 ft3">X</P></TD>
                <TD class="tr4 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr4 td11"><P class="p19 ft3">A remplir plus signature</P></TD>
            </TR>
            <TR>
                <TD class="tr3 td7"><P class="p16 ft3">4</P></TD>
                <TD class="tr3 td8"><P class="p17 ft3">- Consentement entre époux ou engagés</P></TD>
                <TD class="tr3 td9"><P class="p18 ft3">X</P></TD>
                <TD class="tr3 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr3 td11"><P class="p19 ft2">Signature plus mention à respecter</P></TD>
            </TR>
            <TR>
                <TD class="tr5 td7"><P class="p16 ft3">5</P></TD>
                <TD class="tr5 td8"><P class="p17 ft3">- Pouvoir</P></TD>
                <TD class="tr5 td9"><P class="p18 ft3">X</P></TD>
                <TD class="tr5 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr5 td11"><P class="p19 ft2">Signature plus mention à respecter</P></TD>
            </TR>
            <TR>
                <TD class="tr5 td7"><P class="p16 ft3">6</P></TD>
                <TD class="tr5 td8"><P class="p17 ft3">- Règlements</P></TD>
                <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr5 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr5 td11"><P class="p1 ft1">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr5 td7"><P class="p16 ft3">7</P></TD>
                <TD class="tr5 td8"><P class="p17 ft3">- Droit de rétractation</P></TD>
                <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr5 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr5 td11"><P class="p1 ft1">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr5 td7"><P class="p16 ft3">8</P></TD>
                <TD class="tr5 td8"><P class="p17 ft3">- Récapitulatif</P></TD>
                <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr5 td10"><P class="p13 ft3">X</P></TD>
                <TD class="tr5 td11"><P class="p1 ft1">&nbsp;</P></TD>
            </TR>
        </TABLE>
    </DIV>
</DIV>
<DIV id="page_3">
    <DIV id="id3_1">
        <P class="p9 ft9">I - PRESENTATION</P>
        <P class="p20 ft4">1. NOTICE EXPLICATIVE DE LA DEMANDE DE RESERVATION</P>
        <P class="p21 ft3">En application de l'article <NOBR>L.121-20·10</NOBR> du code de la consommation</P>
        <P class="p22 ft10">I- Contexte de votre Investissement :</P>
        <P class="p23 ft11">La société INVESTIS DOM, dont le siège est situé au Centre d'affaires CADJEE - 62 boulevard du Chaudron - 97490 - Sainte Clotilde à la Réunion, a pour principale activité, le montage et la gestion d'opérations d'investissements relevant de l'article 199 undecies B du Code Général des Impôts. En souscrivant à nos opérations, vous pouvez bénéficier dès l'an prochain d'une réduction d'impôt sur le revenu égale 44.12% (52.95% à Mayotte) du prix de revient des investissements déduction faite des subventions éventuelles et des frais pour les opérations de plein droit. De 45 3% (54.36% à Mayotte) pour les opérations industrielles avec agrément fiscal décerné par le préfet et les services fiscaux et de 50% pour les opérations en logement social.</P>
        <P class="p24 ft11">Si le montant de la réduction d'impôt excède l'impôt dû par les investisseurs, cet excédent constitue un report de réduction d'impôt d'égal montant utilisé pour le paiement de l'impôt dû au titre des années suivantes jusqu'à la cinquième année inclusivement. La fraction non utilisée à l'expiration de cette période sera définitivement perdue.</P>
        <P class="p25 ft12">PLAFONNEMENT DES NICHES FISCALES : Au titre de l'article 200·0 A du CGI la réduction d'impôt acquise au titre du Girardin Industriel est soumise au respect du plafonnement spécifique de 18 000 euros net de rétrocession au locataire.</P>
        <P class="p26 ft11">COTISATIONS SOCIALES : En investissant avec INVESTIS DOM, vous allez acquérir la qualité d'associé d'une Société en Nom Collectif et de ce fait, vous serez affilié à une caisse d'allocation vieillesse des professions industrielles et commerciales (Art. <NOBR>L622-7</NOBR> du code de la sécurité sociale). Nous attirons votre attention sur l'importance de répondre au courrier d'affiliation que vous pourriez recevoir de la part d'une des caisses d'allocation vieillesse de votre département. Nous tiendrons à votre disposition un courrier type vous permettant de justifier, le cas échéant, de l'exonération des cotisations (selon les articles L751·1, <NOBR>L756-3,</NOBR> <NOBR>0756-7</NOBR> du code de la sécurité sociale).</P>
        <P class="p27 ft10">II- Conditions de souscription :</P>
        <P class="p28 ft3">Vous souscrivez nos opérations d'investissement afin de bénéficier d'une réduction d'impôt de {{$reservation->montant_reduction}} euros.</P>
        <P class="p28 ft3">Pour ce faire, vos engagements financiers sont :</P>
        <P class="p29 ft3">Apport en compte courant d'associé de {{number_format($reservation->apport, 2, ","," ")}} euros</P>
        <?php
        //        $total = ($reservation->nbr_snc*60)+($reservation->montant_reduction/1000)+($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"]) ? $reservation->nbr_snc*75 : 0);
        $total = ($reservation->nbr_snc*60)+($reservation->montant_reduction/1000)+($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"]) ? $reservation->nbr_snc*75 : 0);
        ?>
        <P class="p29 ft3">Frais d'enregistrement : {{ number_format($total, 2, ","," ") }} euros</P>
        <TABLE cellpadding=0 cellspacing=0 class="t5">
            <TR>
                <TD class="tr0 td12"><P class="p1 ft3">- Formalités d'enregistrement</P></TD>
                <TD class="tr0 td13"><P class="p1 ft3">{{ number_format($reservation->nbr_snc*60, 2, ","," ") }} euros, (60 euros par SNC)</P></TD>
            </TR>
            <TR>
                <TD class="tr2 td12"><P class="p1 ft3">- Prix des parts sociales</P></TD>
                <TD class="tr2 td13"><P class="p17 ft3">{{number_format($reservation->montant_reduction/1000, 2, ","," ")}} euros, (0.10 euro la part)</P></TD>
            </TR>
            <TR>
                <TD class="tr5 td12"><P class="p1 ft3">- Assistance juridique</P></TD>
                <TD class="tr5 td13"><P class="p13 ft2">@if($reservation->assistance_juridique && in_array($formulae->nom, ['confort', 'confort-echelonne'])) {{number_format($reservation->nbr_snc*75, 2, ","," ")}} @else 0 @endif euros, (75.00 euros par SNC)</P></TD>
            </TR>
        </TABLE>
    </DIV>
</DIV>
<DIV id="page_4">
    <DIV id="id4_1">
        <P class="p9 ft10">Risques et sécurisation de votre investissement :</P>
        <P class="p30 ft11">En tant qu'investisseur, vous êtes associé dans une ou plusieurs Sociétés en Nom Collectif. La particularité de la Société en Nom Collectif tient à ce que les associés sont solidairement et indéfiniment responsables des engagements et des dettes de la société. Pour pallier ce risque, INVESTIS DOM vous fait bénéficier des garanties suivantes :</P>
        <P class="p31 ft10">Clause de limitation de recours :</P>
        <P class="p32 ft11">Les contrats de prêt des banques et des organismes financiers sollicités pour le financement des matériels donnés en location comportent systématiquement à titre de garantie, une cession des loyers et du nantissement des matériels. De ce fait ils renoncent à tous recours contre la SNC et les associés en cas de <NOBR>non-paiement</NOBR> des loyers.</P>
        <P class="p33 ft10">Assurance RC Professionnelle :</P>
        <P class="p34 ft11">INVESTIS DOM bénéficie d'une assurance Responsabilité Civile Professionnelle souscrite dans une limite de garantie de 1 000 000 d'euros par sinistre et par an. Elle consiste à garantir les conséquences pécuniaires des sinistres et/ou les frais de défense résultant de toute réclamation introduite par un tiers à l'encontre d'INVESTIS DOM pendant la période d'assurance mettant en jeu la responsabilité civile d'INVESTIS DOM. Cette responsabilité peut être imputable à toute faute professionnelle réelle ou présumée, commise dans l'exercice de l'activité d'INVESTIS DOM avant la date de résiliation ou d'expiration d'une ou des garanties du présent contrat.</P>
        <P class="p35 ft10">Assurance RC « Bouclier » :</P>
        <P class="p36 ft11">INVESTIS DOM a souscrit une assurance nommée « RC Bouclier » qui vous protège contre : Tous les dommages et intérêts, les frais consécutifs à l'examen du dossier et à la défense de l'assuré (frais d'enquête et d'expertise, de procès, honoraires d'avocat, rémunération des arbitres), concernant l'inobservation des dispositions législatives ou réglementaires pour lesquels vous pourriez être appelé à payer suite à une réclamation, en tant qu'associé solidairement et indéfiniment responsable.</P>
        <P class="p35 ft10">III- Rétractation - Fin du contrat</P>
        <P class="p30 ft11">L'investisseur dispose d'un délai de rétractation de 14 jours calendaires à compter de la signature de la présente demande de réservation confort. Le contrat ne recevra aucun commencement d'exécution avant l'expiration du délai de rétractation. En dehors de ce droit de rétractation, il n'existe aucune autre possibilité de résiliation. Vous êtes informé que la sortie de l'opération dans laquelle vous avez souscrit s'opère par voie de cession des droits sociaux au terme de la 5ème année (ou après dissolution et liquidation de la ou des SNC dont vous êtes associé). La langue utilisée dans les contrats et pour l'exécution de ces contrats est le français.</P>
        <P class="p37 ft9">II - RESERVATION</P>
        <P class="p38 ft4">1. DEMANDE DE RESERVATION</P>
        <P class="p39 ft11">Je soussigné(e) {{ $investor->full_name }} demeurant {{ $investor->address_1.", ".$investor->address_2 }} - {{$investor->postal_code}} - {{$investor->city}} m'engage à m'associer aux investissements en défiscalisation loi Girardin (articles 199 undecies B du CGI) sélectionnés par INVESTIS DOM pour un montant total de réduction d'impôt au titre de l'IRPP de : {{$reservation->montant_reduction}} euros.</P>
        <P class="p40 ft13">Je déclare avoir pris la décision de m'associer aux investissements en défiscalisation loi Girardin en toute connaissance de cause, avoir sollicités tous avis auprès de conseils spécialisés et être en mesure d'appréhender l'ensemble des contraintes et risques inhérents à ce type de placement.</P>
        <P class="p41 ft12">Je suis informé(e) que je ne peux participer à cette opération que pour mon propre compte et que la souscription au capital d'une Société en Nom Collectif emporte la qualité d'associé pendant toute la durée de l'opération. Il m'appartient de veiller à ce que cette qualité ne soit pas incompatible</P>
    </DIV>
</DIV>
<DIV id="page_5">
    <DIV id="id5_1">
        <P class="p42 ft13">avec mon propre statut ou ma propre activité et, le cas échéant, m'engage à en référer aux instances compétentes de ma profession et de procéder aux déclarations sociales résultant de cette qualité et d'en acquitter les cotisations.</P>
        <P class="p43 ft12">Je reconnais que les obligations prévues à l'article <NOBR>L541-8-1</NOBR> du Code Monétaire et Financier <NOBR>ci-dessous</NOBR> mentionnés ont été respectées dans le cadre de la signature de la présente réservation.</P>
        <P class="p44 ft11">Je remets entre les mains de la société INVESTIS DOM pour encaissement un chèque postal ou bancaire émanant d'une banque ayant une représentation en France tiré à l'ordre de la société INVESTIS DOM la somme de {{ number_format($reservation->apport, 2, ","," ") }} euros correspondant à ma souscription en compte courant d'associé des opérations qui me seront proposées et pour laquelle je bénéficierai d'un taux de souscription de {{ number_format(floatval($reservation->taux_reservation)*100, 2, ",", " ") }} % (apport en compte courant rapporté à ma réduction d'impôt). Soit une rentabilité de {{ number_format(floatval($reservation->taux_rentabilite)*100, 2, ",", " ")}} %.</P>
        <P class="p45 ft12">Je suis informé(e) que ces conditions sont valables sous réserve que mon dossier complet soit adressé à INVESTIS DOM au plus tard le <NOBR>{{\Carbon\Carbon::now()->addDay(7)->format('d-m-Y')}}</NOBR> par voie numérique puis au plus tard le <NOBR>{{\Carbon\Carbon::now()->addDay(10)->format('d-m-Y')}}</NOBR> par courrier.</P>
        <P class="p46 ft12">Sous réserve de l'acceptation par INVESTIS DOM de la présente réservation, de l'encaissement de mon dépôt en compte courant et des frais liés, INVESTIS DOM s'engage à honorer ma souscription avant le 31/12/{{\Carbon\Carbon::now()->format('Y')}}, date limite de la cession des parts sociales.</P>
        <P class="p47 ft11">Je donne pouvoir à INVESTIS DOM pour signer en mon nom et pour mon compte les dossiers de souscription et effectuer toutes les formalités y afférant. Dans l'hypothèse où tout ou partie de mes souscriptions ne seraient pas réalisées avant le 31/12/{{\Carbon\Carbon::now()->format('Y')}}, INVESTIS DOM s'engage â me rembourser le montant des sommes non utilisées hors écart d'ajustement qui sera porté au crédit de mon compte.</P>
        <P class="p48 ft12">Pendant la durée de détention des parts sociales à minima de 5 années, @if($reservation->assistance_juridique) je souhaite @else je ne souhaite pas @endif bénéficier de l'assistance juridique d'INVESTIS DOM @if($reservation->assistance_juridique && in_array($formulae->nom, ['confort', 'confort-echelonne'])) d'un montant de  75,00 euros par SNC, soit un montant annuel de {{number_format($reservation->nbr_snc*75/5, 2, ","," ")}} euros @endif.</P>
        <?php
//        $total = ($reservation->nbr_snc*60)+($reservation->montant_reduction/1000)+($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"]) ? $reservation->nbr_snc*75 : 0);
        $total = ($reservation->nbr_snc*60)+($reservation->montant_reduction/1000)+($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"]) ? $reservation->nbr_snc*75 : 0);
        ?>
        <P class="p28 ft3">Je suis informé(e) que les formalités d'enregistrement s'élèvent à {{ number_format($total) }} euros que je m'engage à payer au gérant des SNC.</P>
        <P class="p49 ft12">Pour cette réservation, je suis averti que conformément à l'article <NOBR>L.121-20-12</NOBR> du code de la consommation. Je dispose d'un délai de 14 jours révolu pour exercer mon droit de rétractation.</P>
        <P class="p50 ft11">En application de l'article <NOBR>L.411-2</NOBR> du Code Monétaire et Financier, cette opération ne donne pas lieu à l'établissement de documents d'informations soumis au visa de l'Autorité dos marchés financiers (AMF). Je suis informé(e) que, s'agissant d'un placement privé visant un cercle restreint d'investisseurs, le nombre d'investisseurs participant à chacune des opérations souscrites ne doit pas dépasser le chiffre de 150 conformément aux articles et dispositions <NOBR>L.411-2</NOBR> et <NOBR>D411-4</NOBR> du Code Monétaire et Financier.</P>
    </DIV>
    <DIV id="id5_2">
        <TABLE cellpadding=0 cellspacing=0 class="t3">
            <TR>
                <TD class="tr4 td6">
                    <P class="p0 ft3">Fait à : {{$investor->postal_code}} {{$investor->city}}, le
                        <NOBR>{{date('d-m-Y')}}</NOBR>
                    </P>
                </TD>
                <TD class="tr4 td7"><P class="p0 ft0">&nbsp;</P></TD>
            </TR>
            <TR>
                <TD class="tr5 td6">
                    <P class="p0 ft3">
                        {{ $investor->prenom_invest }} {{ strtoupper($investor->name_invest) }}<br>
                        Mention « Bon pour réservation »<br>
                        signature
                    </P>
                </TD>
                <TD class="tr3 td6">
                    <P class="p0 ft3">
                        INVESTIS DOM<br>
                        « Lu et approuvé, bon pour mandat »<br>
                        signature
                    </P>
                </TD>
            </TR>
        </TABLE>
    </DIV>
    <br>
    <br>
    <br>
    <DIV id="id5_3">
        <P class="p54 ft14">Article <NOBR>L.518-8-1</NOBR> du code monétaire et financier « Les conseillers en investissements financiers » doivent :</P>
        <P class="p55 ft16">1° Se comporter avec loyauté et agir avec équité au mieux des intérêts de leurs clients.</P>
        <P class="p55 ft14">2° Exercer leur activité, dans les limites autorisées par leur statut, avec la compétence, le soin et la diligence, qui s'imposent au mieux des intérêts de leurs clients, afin de leur proposer une offre de services adaptée et proportionnée à leurs besoins et à leurs objectifs.</P>
        <P class="p9 ft15">3° Etre dotés des ressources et des procédures nécessaires pour mener à bien leurs activités et mettre en oeuvre ces ressources et procédures avec un souci d'efficacité.</P>
        <P class="p56 ft16">4° S'enquérir auprès de leurs clients ou de leurs clients potentiels avant de formuler un conseil mentionné au I de l'article <NOBR>L.541-1,</NOBR> de leurs connaissances et de leur expérience en matière d'investissement, ainsi que de leur situation financière et de leurs objectifs d'investissements, de manière à pouvoir leur recommander les opérations, instruments et services adaptés à leur situation. Lorsque les clients ou les clients potentiels ne communiquent pas les informations requises, les conseillers en investissements financiers s'abstiennent de leur recommander les opérations, instrument et services en question.</P>
        <P class="p56 ft14">5° Communiquer aux clients d'une manière appropriée, la nature juridique et l'étendue des éventuelles relations entretenues avec les établissements promoteurs de produits mentionnés au 1 de l'article <NOBR>L.341-3,</NOBR> les informations utiles à la prise de décision par ces clients ainsi que celles concernant les modalités de leur rémunération, notamment la tarification de leurs prestations.</P>
        <P class="p9 ft14">Ces règles de bonne conduite sont précisées par le règlement général de l'Autorité des marchés financiers.</P>
        <P class="p9 ft16">Les codes de bonne conduite mentionnées à l'article <NOBR>L.541-4</NOBR> doivent respecter ces prescriptions qu'ils peuvent préciser et compléter.</P>
    </DIV>
</DIV>
<DIV id="page_6">
    <DIV id="id6_1">
        <P class="p57 ft4">2. IDENTITE DE L'INVESTISSEUR</P>
        <P class="p58 ft3">Civilité : {{ucfirst($investor->civilite)}}</P>
        <P class="p29 ft3">Nom : {{$investor->name_invest}}</P>
        <P class="p29 ft3">Nom de jeune fille : {{$investor->name_jeunefille_invest?: "-"}}</P>
        <P class="p29 ft3">Prénom : {{$investor->prenom_invest}}</P>
        <P class="p29 ft3">Date de naissance : <NOBR>{{$investor->birth_date->format("d/m/Y")}}</NOBR></P>
        <P class="p59 ft3">Lieu de naissance : {{$investor->prenom_invest}}</P>
        <P class="p29 ft3">Nationalité : {{$investor->country_invest}}</P>
        <P class="p29 ft3">Profession : {{$investor->profession_invest}}</P>
        <P class="p29 ft3">Adresse : {{$investor->address_1}} {{$investor->address_2}}- {{$investor->postal_code}} - {{$investor->city}}</P>
        <P class="p28 ft3">Téléphone : {{$investor->fixe_invest ?: "-"}}</P>
        <P class="p29 ft3">Fax : {{$investor->fax_invest ?: "-"}}</P>
        <P class="p29 ft3">Mobile : {{$investor->gsm_invest ?: "-"}}</P>
        <P class="p29 ft3">Email : {{$investor->email_invest ?: "-"}}</P>
        <P class="p28 ft3">Situation matrimoniale :</P>
        <LABEL class="p60 ft3"><input type="checkbox" @if($investor->regime_mat_invest == "01" )checked="checked"@endif> Célibataire</LABEL><br>
        <LABEL class="p29 ft3"><input type="checkbox" @if($investor->regime_mat_invest == "02" )checked="checked"@endif> Marié(e) sous contrat</LABEL><br>
        <LABEL class="p29 ft3"><input type="checkbox" @if($investor->regime_mat_invest == "03" )checked="checked"@endif> Marié(e) sous le régime de la communauté</LABEL><br>
        <LABEL class="p29 ft3"><input type="checkbox" @if($investor->regime_mat_invest == "04" )checked="checked"@endif> Pacsé(e)</LABEL><br>
        <LABEL class="p29 ft3"><input type="checkbox" @if($investor->regime_mat_invest == "05" )checked="checked"@endif> Divrocé(e)</LABEL><br>
        <LABEL class="p29 ft3"><input type="checkbox" @if($investor->regime_mat_invest == "06" )checked="checked"@endif> Veuf(ve)</LABEL>
        <P class="p28 ft3">Si marié(e) ou engagé(e) dans les liens d'un Pacte Civil de Solidarité (P.A.C.S) :</P>
        <P class="p35 ft3">Renonciation du conjoint à la qualité d'associé</P>
        <P class="p28 ft3">Le soussigné(e) déclare acquérir les parts de SNC au moyen de ses deniers propres.</P>
        <P class="p28 ft3">Fait à : {{$investor->postal_code}} {{$investor->city}}</P>
        <P class="p59 ft3">Le : <NOBR>{{\Carbon\Carbon::now()->format('d-m-Y')}}</NOBR></P>
        <P class="p61 ft3">signature</P>
        <P class="p62 ft14">Les Informations recueillies par INVESTIS DOM font l'objet d'un traitement informatique destiné à traiter votre souscription dans nos opérations d'investissements au titre de l'article 199 undecies B du Code Général des Impôts. Vos opérations et données personnelles sont couvertes par le secret professionnel auquel nous sommes tenus.</P>
        <P class="p63 ft16">Conformément â la loi « Informatique et libertés » du 6 janvier 1978 modifiée en 2004, vous bénéficiez d'un droit d'accès, de rectification et d'opposition pour motifs légitimes aux informations qui vous concernent, que vous pouvez exercer par courrier électronique à <NOBR>contact@investis-dom.com</NOBR> ou par courrier postal à INVESTIS DOM - Centre d'affaires CADJEE - 62 boulevard du Chaudron - 97490 Sainte Clotilde.</P>
        <P class="p64 ft16">Cette demande devra être accompagnée d'une copie du titre d'identité portant la signature du titulaire.</P>
    </DIV>

</DIV>
<DIV id="page_7">
    <DIV id="id7_1">
        <P class="p65 ft4">3. DECLARATION DE NON CONDAMNATION</P>
        <P class="p58 ft3">Je soussigné(e) : {{ $investor->prenom_invest }} {{ strtoupper($investor->name_invest) }}</P>
        <P class="p29 ft3">né(e) le : <NOBR>{{$investor->birth_date->format("d/m/Y")}}</NOBR></P>
        <P class="p29 ft3">A : {{$investor->birth_location}}</P>
        <P class="p29 ft3">De (nom et prénom du père) : {{$investor->father_invest}}</P>
        <P class="p29 ft3">Et de (nom et prénom de la mère) : {{$investor->madre_invest}}</P>
        <P class="p59 ft3">Demeurant : {{$investor->address_1}} {{$investor->address_2?:""}} - {{ $investor->postal_code }}- {{$investor->city}}</P>
        <P class="p66 ft12">Déclare sur l'honneur, conformément à l'article 17 de l'arrêté du 9 février 1968 pris à la suite du décret n° <NOBR>84-406</NOBR> du 30 mai 1984, relatif au Registre du Commerce et des Sociétés, n'avoir fait l'objet d'aucune condamnation pénale ni de sanction civile ou administrative de nature à m'interdire :</P>
        <P class="p67 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">Soit d'exercer une activité commerciale</SPAN></P>
        <P class="p29 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">Soit de gérer, d'administrer ou de diriger une personne morale.</SPAN></P>
        <P class="p68 ft3">Fait à : {{$investor->postal_code}} {{$investor->city}}</P>
        <P class="p29 ft3">Le : <NOBR>{{\Carbon\Carbon::now()->format('d-m-Y')}}</NOBR></P>
        <P class="p61 ft3">signature</P>
        <P class="p69 ft15">Rappel : Article L <NOBR>123-5</NOBR> du Code de Commerce</P>
        <P class="p9 ft16">(Ordonnance n° <NOBR>2000-916</NOBR> du 19 septembre 2000 art. 3 Journal Officiel du 22 septembre 2000 en vigueur le 1er janvier 2002).</P>
        <P class="p70 ft14">Le fait de donner, de mauvaise foi, des indications inexactes ou incomplètes en vue d'une immatriculation, d'une radiation ou d'une mention complémentaire ou rectificative au registre du commerce et des sociétés est puni d'une amende de 4 500 euros et d'un emprisonnement de six mois.</P>
        <P class="p64 ft16">Les dispositions des deuxièmes et troisièmes alinéas de l'article <NOBR>L.123-4</NOBR> sont applicables dans les cas prévus au présent article.</P>
    </DIV>

</DIV>
<DIV id="page_8">
    <DIV id="id8_1">
        <P class="p71 ft4">4. CONSENTEMENT DES EPOUX OU DES ENGAGES</P>
        @if(!in_array($investor->regime_mat_invest, ["01", "04", "05", "06"]))
        <P class="p58 ft3">Je soussigné(e) :</P>
        <P class="p29 ft3">Prénom : {{$investor->prenom_conjoint ?: "-"}} </P>
        <P class="p29 ft3">Nom : {{$investor->nom_conjoint ?: "-"}} </P>
        <P class="p29 ft3">Nom de jeune fille : {{$investor->nom_jeunefille_conjoint ?: "-"}}</P>
        <P class="p29 ft3">Né(e) le : <NOBR>{{isset($investor->birth_conjoint) ? $investor->birth_conjoint->format('d/m/Y') : "-"}}</NOBR></P>
        <P class="p59 ft3">Marié(e) ou engagé(e) à {{ $investor->prenom_invest }} {{ strtoupper($investor->name_invest) }}</P>
        <P class="p72 ft3">Marié(e) sous le régime de la séparation de biens Marié(e) sous le régime de la communauté légale Engagé(e) dans les liens d'un Pacte Civil de Solidarité (P.A.C.S)</P>
        <P class="p27 ft3">Déclare par la présente,</P>
        <P class="p73 ft12"><SPAN class="ft16">°</SPAN><SPAN class="ft17">Avoir été informé(e) conformément aux dispositions de l'article </SPAN><NOBR>1832-2</NOBR> du Code Civil, de la demande de souscription effectuée par mon conjoint pour un montant de réduction d'impôt de {{$reservation->montant_reduction}} euros</P>
        <P class="p67 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">Renoncer, en application de l'article </SPAN><NOBR>1832-2</NOBR> du Code Civil, à revendiquer la qualité d'associé de la SNC et reconnais cette qualité à mon conjoint.</P>
        <P class="p68 ft3">Fait à : {{$investor->postal_code}} {{$investor->city}}</P>
        <P class="p29 ft3">Le : <NOBR>{{\Carbon\Carbon::now()->format('d-m-Y')}}</NOBR></P>
        <P class="p61 ft3">signature</P>
        @else
            <P class="p72 ft3">Aucun consentement n'est nécessaire</P>
        @endif
    </DIV>
</DIV>
<DIV id="page_9">
    <DIV id="id9_1">
        <P class="p74 ft4">5. POUVOIRS</P>
        <P class="p75 ft3">Je soussigné(e) Monsieur {{ $investor->prenom_invest }} {{ strtoupper($investor->name_invest) }} demeurant {{$investor->address_1}} {{$investor->address_2?:""}} - {{ $investor->postal_code }}- {{$investor->city}}</P>
        <P class="p76 ft12">- M'engage à m'associer aux opérations d'investissements en défiscalisation loi Girardin sélectionnées par INVESTIS DOM pour un montant total de réduction d'impôt sur le revenu de {{$reservation->montant_reduction}} euros.</P>
        <P class="p46 ft12"><SPAN class="ft2">-</SPAN><SPAN class="ft18">Déclare avoir pris la décision de souscrire à ces opérations en toute connaissance de cause, avoir sollicités tous avis auprès de conseils spécialisés et être en mesure d'appréhender l'ensemble des contraintes et risques inhérents à ce type de placement.</SPAN></P>
        <P class="p77 ft12"><SPAN class="ft2">-</SPAN><SPAN class="ft18">M'engage à conserver les parts des SNC pendant une période d'au moins 5 années à compter de la date de souscription conformément aux dispositions relatives à l'article 199 undecies B du Code Général des Impôts.</SPAN></P>
        <P class="p29 ft3"><SPAN class="ft2">-</SPAN><SPAN class="ft5">Donne pouvoir à INVESTIS DOM ou à son représentant légal pour :</SPAN></P>
        <P class="p78 ft12"><SPAN class="ft3">-</SPAN><SPAN class="ft17">Acquérir en mon nom et pour mon compte toute part de SNC (Société en Nom Collectif) gérée par INVESTIS DOM ou par une société de son groupe.</SPAN></P>
        <P class="p79 ft3"><SPAN class="ft3">-</SPAN><SPAN class="ft5">Signer en mon nom les actes de cession de parts correspondants.</SPAN></P>
        <P class="p80 ft12"><SPAN class="ft3">-</SPAN><SPAN class="ft17">Signer une convention de compte courant au terme de laquelle je renonce expressément à demander le remboursement de mon compte courant ainsi qu'à tout boni de liquidation éventuel.</SPAN></P>
        <P class="p81 ft12">- Céder mon compte courant d'associé au gérant de la SNC et signer une promesse de vente par laquelle je m'engage à vendre mes parts sociales pour un euro symbolique à compter du premier jour suivant la clôture du cinquième exercice social de la SNC.</P>
        <P class="p79 ft3"><SPAN class="ft3">-</SPAN><SPAN class="ft5">Céder à l'issue de la période de défiscalisation les parts de SNC que j'aurai acquises pour la somme symbolique de : un euro.</SPAN></P>
        <P class="p82 ft13"><SPAN class="ft3">-</SPAN><SPAN class="ft19">Me représenter et voter en mon nom et pour mon compte, et ce pendant toute la période de détention de mes parts, aux Assemblées Générales Ordinaires, Extraordinaires et de Liquidation de chacune des SNC dans lesquelles j'aurai acquis des parts et qui seront amenées à délibérer sur l'ordre du jour suivant :</SPAN></P>
        {{--<P class="p59 ft3"></P>--}}
        <P class="p83 ft3"><SPAN class="ft3">-</SPAN><SPAN class="ft5">Rapport de la Gérance,</SPAN></P>
        <P class="p84 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">Examen et approbation des comptes, du bilan et de l'annexe de l'exercice clos.</SPAN></P>
        <P class="p84 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">Quitus au Gérant de sa gestion.</SPAN></P>
        <P class="p84 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">Affectation du résultat de l'exercice.</SPAN></P>
        <P class="p84 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">Dissolution par anticipation de la SNC.</SPAN></P>
        <P class="p84 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">La nomination d'un liquidateur.</SPAN></P>
        <P class="p84 ft3"><SPAN class="ft16">°</SPAN><SPAN class="ft5">La constatation de la clôture de liquidation.</SPAN></P>
        <P class="p85 ft3"><SPAN class="ft3">-</SPAN><SPAN class="ft5">De signer en mes lieux et places les </SPAN><NOBR>procès-verbaux</NOBR> ainsi que tous autres documents se rapportant à ces assemblées.</P>
        <P class="p86 ft12">Je suis informé(e) que je pourrai disposer prochainement sur mon compte personnel INVESTIS DOM (accessible depuis <NOBR>www.investis-dom.com)</NOBR> de l'ensemble de mes dossiers de souscription, ainsi qu'aux dossiers des pièces contractuelles.</P>
        <P class="p87 ft3">Fait à : {{$investor->postal_code}} {{$investor->city}}</P>
        <P class="p29 ft3">Le : <NOBR>{{\Carbon\Carbon::now()->format('d-m-Y')}}</NOBR></P>
        <P class="p67 ft16">Faire précéder la signature de la mention manuscrite</P>
        <P class="p88 ft16">« Bon pour pouvoir »</P>
        <P class="p89 ft3">signature</P>

    </DIV>

</DIV>
<DIV id="page_10">
    <DIV id="id10_1">
        <P class="p90 ft4">6. REGLEMENTS DE VOTRE RESERVATION</P>
        <P class="p91 ft3">Règlements à adresser au : 62 boulevard du Chaudron - Centre d'affaires - 97490 - SAINTE CLOTILDE</P>
        <P class="p7 ft3">1 - A l'ordre de : INVESTIS DOM</P>
        <P class="p7 ft3">Enregistrement de la cession des parts sociales et acquisition de {{round($reservation->montant_reduction/100)}} parts sociales</P>
        <TABLE cellpadding=0 cellspacing=0 class="t12">
            <TR>
                <TD class="tr0 td14"><P class="p1 ft3">- Formalités et frais d'enregistrement</P></TD>
                <TD class="tr0 td15"><P class="p1 ft2">{{number_format($reservation->nbr_snc*60, 2, ","," ")}} euros (60.00 euros par SNC)</P></TD>
            </TR>
            <TR>
                <TD class="tr0 td14"><P class="p1 ft3">- Prix des parts sociales</P></TD>
                <TD class="tr0 td15"><P class="p1 ft2">{{number_format($reservation->montant_reduction/1000, 2, ","," ")}} euros (0.10 euros la part)</P></TD>
            </TR>
            <TR>
                <TD class="tr0 td14"><P class="p1 ft3">- Assistance juridique</P></TD>
                <TD class="tr0 td15"><P class="p1 ft2">@if($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"])) {{number_format($reservation->nbr_snc*75, 2, ","," ")}} @else 0 @endif euros (75.00 euros par SNC)</P></TD>
            </TR>
            <TR>
                <TD class="tr6 td14"><P class="p1 ft3">Total</P></TD>
                <?php
                    $total = ($reservation->nbr_snc*60)+($reservation->montant_reduction/1000)+($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"]) ? $reservation->nbr_snc*75 : 0);
                ?>
                <TD class="tr6 td15"><P class="p94 ft3">{{number_format($total, 2, ",", " ")}} euros</P></TD>
            </TR>
        </TABLE>
        <P class="p95 ft3">2 - A l'ordre de : INVESTIS DOM COLLECTE</P>
        <P class="p5 ft3">- Chèque de {{ number_format($reservation->apport, 2, ","," ") }} euros.</P>

    </DIV>

</DIV>
<DIV id="page_11">
    <DIV id="id11_1">
        <P class="p96 ft4">7. DROIT DE RETRACTATION</P>
        <P class="p97 ft3">Article <NOBR>L.121-20-12</NOBR> du code de la consommation</P>
        <P class="p45 ft12">En cas de rétractation, vous devez renvoyer le présent document au plus tard le 14ème jour suivant la date de signature de la demande de réservation.</P>
        <P class="p61 ft3">A envoyer par lettre recommandée avec accusé de réception à :</P>
        <P class="p28 ft3">INVESTIS DOM</P>
        <P class="p98 ft11">Centre d'affaires CADJEE 62 Boulevard du Chaudron 97490 Sainte Clotilde</P>
        <P class="p99 ft3">Je soussigné(e)</P>
        <P class="p28 ft3">Déclare exercer par la présente, mon droit de rétractation, se rapportant à ma demande de réservation suivante :</P>
        <P class="p28 ft3">Montant de la réduction d'impôt : {{number_format($reservation->montant_reduction, 2, ",", " ")}} euros</P>
        <P class="p28 ft3">Nom : {{$investor->name_invest}}</P>
        <P class="p35 ft3">Prénom : {{$investor->prenom_invest}}</P>
        <P class="p28 ft3">Adresse : {{$investor->address_1}} {{$investor->address_2?:""}}</P>
        <P class="p28 ft3">Code postal : {{$investor->postal_code}}</P>
        <P class="p28 ft3">Ville : {{$investor->city}}</P>
        <P class="p100 ft3">Fait à : {{$investor->postal_code}} {{$investor->city}}</P>
        <P class="p29 ft3">Le : <NOBR>{{\Carbon\Carbon::now()->format('d-m-Y')}}</NOBR></P>
        <P class="p61 ft3">signature</P>

    </DIV>

</DIV>
<DIV id="page_12">
    <DIV id="id12_1">
        <P class="p101 ft4">8. RECAPITULATIF DE VOTRE DOSSIER DE RESERVATION</P>
        <P class="p102 ft12">{{ucfirst($investor->civilite)}} {{ $investor->prenom_invest }} {{ strtoupper($investor->name_invest) }} vous investissez un apport en compte courant de {{ number_format($reservation->apport, 2, ","," ") }} euros afin de bénéficier d'une réduction d'impôt de {{ number_format($reservation->montant_reduction, 2, ",", " ") }} euros, réalisant ainsi une économie d'impôt sur le revenu de : {{ number_format($reservation->gain_brut, 2, ",", " ") }} euros.</P>
        <P class="p87 ft3">Vous avez choisi de souscrire un produit confort sans notre option d'assistance juridique.</P>
        <P class="p103 ft11">Dans tous les cas de contentieux diligentés et pris en charge par INVESTIS DOM au bénéfice de la SNC ou de ses associés. Il est expressément convenu que les éventuelles indemnités allouées par tes tribunaux compétents au titre des frais exposés dans la procédure seront intégralement reversées par l'associé de la SNC à INVESTIS DOM.</P>
        <P class="p33 ft3">Règlements :</P>
        <P class="p29 ft3">Un chèque pour l'apport en compte courant : {{ number_format($reservation->apport, 2, ","," ") }} euros libellé à l'ordre de : INVESTIS DOM COLLECTE.</P>
        <?php
        //        $total = ($reservation->nbr_snc*60)+($reservation->montant_reduction/1000)+($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"]) ? $reservation->nbr_snc*75 : 0);
        $total = ($reservation->nbr_snc*60)+($reservation->montant_reduction/1000)+($reservation->assistance_juridique && in_array($formulae->slug, ["confort", "confort-echelonne"]) ? $reservation->nbr_snc*75 : 0);
        ?>
        <P class="p29 ft3">Un chèque pour les formalités et les frais d'enregistrement : {{ number_format($total) }} euros libellé à l'ordre de : INVESTIS DOM</P>
        <P class="p28 ft3">Documents à nous adresser :</P>
        <P class="p29 ft3">Nous vous remercions de bien vouloir nous retourner :</P>
        <P class="p104 ft12">Pour le <NOBR>{{\Carbon\Carbon::now()->addDay(7)->format('d-m-Y')}}</NOBR> au plus tard la copie de votre demande de réservation et des chèques à <NOBR>reservation@investis-dom.com</NOBR> Pour le <NOBR>{{\Carbon\Carbon::now()->addDay(10)->format('d-m-Y')}}</NOBR> au plus tard votre dossier complet par courrier.</P>
        <P class="p67 ft3">Une copie de votre pièce d'identité</P>
        <P class="p59 ft3">Un relevé d'identité bancaire</P>
        <P class="p29 ft3">Votre dernier avis d'imposition</P>
        <P class="p29 ft3">Un justificatif de domicile</P>
        <P class="p29 ft3">Votre demande de réservation complétée, paraphée et signée avec toutes les mentions utiles à :</P>
        <P class="p105 ft3">INVESTIS DOM</P>
        <P class="p106 ft3">Centre d'affaires CADJEE - 62 boulevard du Chaudron - 97490 SAINTE CLOTILDE</P>
        <P class="p31 ft20">Prochaines démarches :</P>
        <P class="p107 ft13">Après avoir reçu votre demande de réservation signée et vos règlements, INVESTIS DOM vous enverra un accusé de réception par email ou par courrier.</P>
        <P class="p108 ft11">INVESTIS DOM vous positionnera alors sur les différentes opérations souhaitées. Vous serez donc assuré de bénéficier du taux de retour sur apport validé lors de votre demande de réservation. Vous disposerez prochainement sur votre compte personnel INVESTIS DOM (accessible depuis <NOBR>www.investis-dom.com)</NOBR> de l'ensemble de vos dossiers de souscription ainsi que des dossiers des pièces contractuelles.</P>
        <P class="p109 ft12">En janvier {{\Carbon\Carbon::now()->addYear()->format('Y')}}, nous vous inviterons à envoyer une lettre au trésorier pour lui signaler la réduction de votre tiers provisionnel ou de votre mensualisation. Une lettre type à personnaliser est à votre disposition sur votre compte personnel.</P>
        <P class="p110 ft12">INVESTIS DOM précise que les affaires présentées et les résultantes financières et fiscales ont un caractère strictement confidentiel, et que les informations divulguées au réservataire ne devront pas être diffusées auprès de tiers.</P>
        <P class="p111 ft13">L'équipe d'INVESTIS DOM espère que votre demande de réservation répond pleinement à votre projet de réduction d'impôt {{\Carbon\Carbon::now()->format('Y')}} et vous remercie de la confiance que vous voulez bien lui accorder.</P>
    </DIV>
</DIV>
@endsection