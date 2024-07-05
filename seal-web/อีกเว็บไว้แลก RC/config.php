<?php
    //ข้อมูลการเชื่อมต่อฐานข้อมูล
    /*
    $_CONFIG['sql']['host'] 		                = '';
    $_CONFIG['sql']['user'] 		                = '';
    $_CONFIG['sql']['pass'] 	                    = '';
    $_CONFIG['sql']['db_acc'] 	                    = '';
    $_CONFIG['sql']['db_char'] 	                    = '';
    $_CONFIG['sql']['db_item'] 	                    = '';
    */

    //----------------------------------------------------------------------------------//
    //                                                                                  //
    //                                 TOPUP API CONFIG                                 //
    //                                                                                  //
    //----------------------------------------------------------------------------------//
    //ตั้งค่าข้อมูลการเชื่อมต่อ API เติมเงิน
    $_CONFIG['api']['user']                         = "";
    $_CONFIG['api']['pass']                         = "";
    $_CONFIG['api']['temail']                       = "";
    $_CONFIG['api']['tpass']                        = "";
    $_CONFIG['api']['ac_code']                      = "";

    //----------------------------------------------------------------------------------//
    //                                                                                  //
    //                           TOPUP WALLET & BANK CONFIG                             //
    //                                                                                  //
    //----------------------------------------------------------------------------------//
    $_CONFIG['topup']['wallet']['phone']            = "";
    $_CONFIG['topup']['wallet']['name']             = "";

    $_CONFIG['topup']['bank']['con_id']             = "";
    $_CONFIG['topup']['bank']['ppay_no']            = "";
    $_CONFIG['topup']['bank']['ac_no']              = "";
    $_CONFIG['topup']['bank']['bk_name']            = "";
    $_CONFIG['topup']['bank']['ac_name']            = "";

    //----------------------------------------------------------------------------------//
    //                                                                                  //
    //                                TOPUP CASH CONFIG                                 //
    //                                                                                  //
    //----------------------------------------------------------------------------------//
    // จำนวน Cash ที่จะได้รับ
    $_CONFIG['topup']['cash_amount'][50]            = 500;
    $_CONFIG['topup']['cash_amount'][90]            = 900;
    $_CONFIG['topup']['cash_amount'][150]           = 1500;
    $_CONFIG['topup']['cash_amount'][300]           = 3000;
    $_CONFIG['topup']['cash_amount'][500]           = 5000;
    $_CONFIG['topup']['cash_amount'][1000]          = 10000;

    // จำนวน Segel ที่จะได้รับ
    $_CONFIG['topup']['segel_amount'][50]           = 50;
    $_CONFIG['topup']['segel_amount'][90]           = 90;
    $_CONFIG['topup']['segel_amount'][150]          = 150;
    $_CONFIG['topup']['segel_amount'][300]          = 300;
    $_CONFIG['topup']['segel_amount'][500]          = 500;
    $_CONFIG['topup']['segel_amount'][1000]         = 1000;


    //----------------------------------------------------------------------------------//
    //                                                                                  //
    //                                TOPUP ITEM CONFIG                                 //
    //                                                                                  //
    //----------------------------------------------------------------------------------//
    // Item ที่จะได้รับ (เทียบกับมูลค่าบัตรเงินสด)
    // $_CONFIG['topup']['items'][มูลค่าบัตรเงินสด (1-6)][index ของ item ตั้งแต่ 0 (เพิ่มได้ไม่จำกัด)]
    $_CONFIG['topup']['items'][50][0]['item_id']    = 8071;
    $_CONFIG['topup']['items'][50][0]['count']      = 1;
    $_CONFIG['topup']['items'][50][1]['item_id']    = 8072;
    $_CONFIG['topup']['items'][50][1]['count']      = 1;

    //
    $_CONFIG['topup']['items'][90][0]['item_id']    = 8071;
    $_CONFIG['topup']['items'][90][0]['count']      = 3;
    $_CONFIG['topup']['items'][90][1]['item_id']    = 8072;
    $_CONFIG['topup']['items'][90][1]['count']      = 3;

    //
    $_CONFIG['topup']['items'][150][0]['item_id']   = 8071;
    $_CONFIG['topup']['items'][150][0]['count']     = 5;
    $_CONFIG['topup']['items'][150][1]['item_id']   = 8072;
    $_CONFIG['topup']['items'][150][1]['count']     = 5;
    $_CONFIG['topup']['items'][150][2]['item_id']   = 8029;
    $_CONFIG['topup']['items'][150][2]['count']     = 49;
    $_CONFIG['topup']['items'][150][3]['item_id']   = 8036;
    $_CONFIG['topup']['items'][150][3]['count']     = 49;

    # ITEM ชิ้นที่ 1 สำหรับบัตรราคา 300 บาท
    $_CONFIG['topup']['items'][300][0]['item_id']   = 8018;
    $_CONFIG['topup']['items'][300][0]['count']     = 0;
    $_CONFIG['topup']['items'][300][1]['item_id']   = 8021;
    $_CONFIG['topup']['items'][300][1]['count']     = 0;
    $_CONFIG['topup']['items'][300][2]['item_id']   = 8029;
    $_CONFIG['topup']['items'][300][2]['count']     = 49;
    $_CONFIG['topup']['items'][300][3]['item_id']   = 8036;
    $_CONFIG['topup']['items'][300][3]['count']     = 49;
    $_CONFIG['topup']['items'][300][4]['item_id']   = 8037;
    $_CONFIG['topup']['items'][300][4]['count']     = 0;
    $_CONFIG['topup']['items'][300][5]['item_id']   = 8062;
    $_CONFIG['topup']['items'][300][5]['count']     = 0;
    $_CONFIG['topup']['items'][300][6]['item_id']   = 8008;
    $_CONFIG['topup']['items'][300][6]['count']     = 9;

    //
    $_CONFIG['topup']['items'][500][0]['item_id']   = 8018;
    $_CONFIG['topup']['items'][500][0]['count']     = 2;
    $_CONFIG['topup']['items'][500][1]['item_id']   = 8021;
    $_CONFIG['topup']['items'][500][1]['count']     = 2;
    $_CONFIG['topup']['items'][500][2]['item_id']   = 8029;
    $_CONFIG['topup']['items'][500][2]['count']     = 49;
    $_CONFIG['topup']['items'][500][3]['item_id']    = 8036;
    $_CONFIG['topup']['items'][500][3]['count']     = 49;
    $_CONFIG['topup']['items'][500][4]['item_id']   = 8037;
    $_CONFIG['topup']['items'][500][4]['count']     = 0;
    $_CONFIG['topup']['items'][500][5]['item_id']   = 8062;
    $_CONFIG['topup']['items'][500][5]['count']     = 0;
    $_CONFIG['topup']['items'][500][6]['item_id']   = 8008;
    $_CONFIG['topup']['items'][500][6]['count']     = 9;
    $_CONFIG['topup']['items'][500][7]['item_id']   = 8046;
    $_CONFIG['topup']['items'][500][7]['count']     = 0;
    $_CONFIG['topup']['items'][500][8]['item_id']   = 8011;
    $_CONFIG['topup']['items'][500][8]['count']     = 4;

    # ITEM ชิ้นที่ 1 สำหรับบัตรราคา 1,000 บาท
    $_CONFIG['topup']['items'][1000][0]['item_id']  = 8018;
    $_CONFIG['topup']['items'][1000][0]['count']    = 5;
    $_CONFIG['topup']['items'][1000][1]['item_id']  = 8021;
    $_CONFIG['topup']['items'][1000][1]['count']    = 5;
    $_CONFIG['topup']['items'][1000][2]['item_id']  = 8029;
    $_CONFIG['topup']['items'][1000][2]['count']    = 49;
    $_CONFIG['topup']['items'][1000][3]['item_id']  = 8036;
    $_CONFIG['topup']['items'][1000][3]['count']    = 49;
    $_CONFIG['topup']['items'][1000][4]['item_id']  = 8037;
    $_CONFIG['topup']['items'][1000][4]['count']    = 0;
    $_CONFIG['topup']['items'][1000][5]['item_id']  = 8062;
    $_CONFIG['topup']['items'][1000][5]['count']    = 0;
    $_CONFIG['topup']['items'][1000][6]['item_id']  = 8008;
    $_CONFIG['topup']['items'][1000][6]['count']    = 9;
    $_CONFIG['topup']['items'][1000][7]['item_id']  = 8046;
    $_CONFIG['topup']['items'][1000][7]['count']    = 0;
    $_CONFIG['topup']['items'][1000][8]['item_id']  = 8011;
    $_CONFIG['topup']['items'][1000][8]['count']    = 9;
    $_CONFIG['topup']['items'][1000][9]['item_id']  = 8100;
    $_CONFIG['topup']['items'][1000][9]['count']    = 4;
    $_CONFIG['topup']['items'][1000][10]['item_id'] = 8046;
    $_CONFIG['topup']['items'][1000][10]['count']   = 0;

    //----------------------------------------------------------------------------------//
    //                                                                                  //
    //                                TOPUP BONUS CONFIG                                //
    //                                                                                  //
    //----------------------------------------------------------------------------------//
    // กำหนดจำนวนเงินที่จะได้รับ Bonus Item เมื่อเติมเงินครบ (กำหนดได้หลาย Bonus Level เริ่มจาก 0)
    $_CONFIG['topup']['bonus_summ'][0]              = 2000;
    $_CONFIG['topup']['bonus_summ'][1]              = 3000;
    $_CONFIG['topup']['bonus_summ'][2]              = 4000;
    $_CONFIG['topup']['bonus_summ'][3]              = 5000;
    $_CONFIG['topup']['bonus_summ'][4]              = 6000;
    $_CONFIG['topup']['bonus_summ'][5]              = 8000;
    $_CONFIG['topup']['bonus_summ'][6]              = 9000;
    $_CONFIG['topup']['bonus_summ'][7]              = 10000;
    $_CONFIG['topup']['bonus_summ'][8]              = 11000;
    $_CONFIG['topup']['bonus_summ'][9]              = 12000;

    // กำหนดวันเริ่มต้นและวันสิ้นสุด สำหรับการคำนวณที่ยอดเติมเงินเพื่อรับ Bonus
    $_CONFIG['topup']['bonus_begin_date'] = '2021-09-11';
    $_CONFIG['topup']['bonus_end_date'] = '2021-09-30';

    // Bonus Item ที่จะได้รับ
    // $_CONFIG['topup'][Bonus Level]['bonus_item'][index ของ item ตั้งแต่ 0 (เพิ่มได้ไม่จำกัด)]

    # ITEM ชิ้นที่ 1 สำหรับ 2000
    $_CONFIG['topup']['bonus_item'][0][0]['item_id'] = 8011;
    $_CONFIG['topup']['bonus_item'][0][0]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][0][0]['item_name'] = 'Marco’s Mistake';
    $_CONFIG['topup']['bonus_item'][0][1]['item_id'] = 8100;
    $_CONFIG['topup']['bonus_item'][0][1]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][0][1]['item_name'] = 'Marco’s Mistake (Special)';
    $_CONFIG['topup']['bonus_item'][0][2]['item_id'] = 13252;
    $_CONFIG['topup']['bonus_item'][0][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][0][2]['item_name'] = '';
    # SEGAL / CASH สำหรับ 2000
    $_CONFIG['topup']['bonus_segal'][0] = 0;
    $_CONFIG['topup']['bonus_cash'][0] = 0;
    $_CONFIG['topup']['bonus_img'][0] = '/views/assets/images/promotion/pro2000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 3000
    $_CONFIG['topup']['bonus_item'][1][0]['item_id'] = 8011;
    $_CONFIG['topup']['bonus_item'][1][0]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][1][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][1][1]['item_id'] = 8100;
    $_CONFIG['topup']['bonus_item'][1][1]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][1][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][1][2]['item_id'] = 13249;
    $_CONFIG['topup']['bonus_item'][1][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][1][2]['item_name'] = '';
    # SEGAL / CASH สำหรับ Bonus Level 1
    $_CONFIG['topup']['bonus_segal'][1] = 0;
    $_CONFIG['topup']['bonus_cash'][1] = 0;
    $_CONFIG['topup']['bonus_img'][1] = '/views/assets/images/promotion/pro3000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 4000
    $_CONFIG['topup']['bonus_item'][2][0]['item_id'] = 8011;
    $_CONFIG['topup']['bonus_item'][2][0]['count'] = 9;
    $_CONFIG['topup']['bonus_item'][2][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][2][1]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][2][1]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][2][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][2][2]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][2][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][2][2]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][2][3]['item_id'] = 13480;
    $_CONFIG['topup']['bonus_item'][2][3]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][2][3]['item_name'] = '';
    # SEGAL / CASH 4000
    $_CONFIG['topup']['bonus_segal'][2] = 0;
    $_CONFIG['topup']['bonus_cash'][2] = 0;
    $_CONFIG['topup']['bonus_img'][2] = '/views/assets/images/promotion/pro4000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 5000
    $_CONFIG['topup']['bonus_item'][3][0]['item_id'] = 8100;
    $_CONFIG['topup']['bonus_item'][3][0]['count'] = 9;
    $_CONFIG['topup']['bonus_item'][3][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][3][1]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][3][1]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][3][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][3][2]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][3][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][3][2]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][3][3]['item_id'] = 23623;
    $_CONFIG['topup']['bonus_item'][3][3]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][3][3]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][3][4]['item_id'] = 25867;
    $_CONFIG['topup']['bonus_item'][3][4]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][3][4]['item_name'] = '';
    # SEGAL / CASH 5000
    $_CONFIG['topup']['bonus_segal'][3] = 0;
    $_CONFIG['topup']['bonus_cash'][3] = 0;
    $_CONFIG['topup']['bonus_img'][3] = '/views/assets/images/promotion/pro5000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 6000
    $_CONFIG['topup']['bonus_item'][4][0]['item_id'] = 26977;
    $_CONFIG['topup']['bonus_item'][4][0]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][4][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][4][1]['item_id'] = 26978;
    $_CONFIG['topup']['bonus_item'][4][1]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][4][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][4][2]['item_id'] = 26979;
    $_CONFIG['topup']['bonus_item'][4][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][4][2]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][4][3]['item_id'] = 26980;
    $_CONFIG['topup']['bonus_item'][4][3]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][4][3]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][4][4]['item_id'] = 23631;
    $_CONFIG['topup']['bonus_item'][4][4]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][4][4]['item_name'] = '';
    # SEGAL / CASH 6000
    $_CONFIG['topup']['bonus_segal'][4] = 0;
    $_CONFIG['topup']['bonus_cash'][4] = 0;
    $_CONFIG['topup']['bonus_img'][4] = '/views/assets/images/promotion/pro6000_1.png';


    $_CONFIG['topup']['bonus_item'][5][0]['item_id'] = 8011;
    $_CONFIG['topup']['bonus_item'][5][0]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][5][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][5][1]['item_id'] = 8100;
    $_CONFIG['topup']['bonus_item'][5][1]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][5][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][5][2]['item_id'] = 13252;
    $_CONFIG['topup']['bonus_item'][5][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][5][2]['item_name'] = '';
    # SEGAL / CASH สำหรับ 2000
    $_CONFIG['topup']['bonus_segal'][5] = 0;
    $_CONFIG['topup']['bonus_cash'][5] = 0;
    $_CONFIG['topup']['bonus_img'][5] = '/views/assets/images/promotion/pro7000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 3000
    $_CONFIG['topup']['bonus_item'][6][0]['item_id'] = 8011;
    $_CONFIG['topup']['bonus_item'][6][0]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][6][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][6][1]['item_id'] = 8100;
    $_CONFIG['topup']['bonus_item'][6][1]['count'] = 14;
    $_CONFIG['topup']['bonus_item'][6][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][6][2]['item_id'] = 13249;
    $_CONFIG['topup']['bonus_item'][6][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][6][2]['item_name'] = '';
    # SEGAL / CASH สำหรับ Bonus Level 1
    $_CONFIG['topup']['bonus_segal'][6] = 0;
    $_CONFIG['topup']['bonus_cash'][6] = 0;
    $_CONFIG['topup']['bonus_img'][6] = '/views/assets/images/promotion/pro8000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 4000
    $_CONFIG['topup']['bonus_item'][7][0]['item_id'] = 8011;
    $_CONFIG['topup']['bonus_item'][7][0]['count'] = 9;
    $_CONFIG['topup']['bonus_item'][7][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][7][1]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][7][1]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][7][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][7][2]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][7][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][7][2]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][7][3]['item_id'] = 13480;
    $_CONFIG['topup']['bonus_item'][7][3]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][7][3]['item_name'] = '';
    # SEGAL / CASH 4000
    $_CONFIG['topup']['bonus_segal'][7] = 0;
    $_CONFIG['topup']['bonus_cash'][7] = 0;
    $_CONFIG['topup']['bonus_img'][7] = '/views/assets/images/promotion/pro9000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 5000
    $_CONFIG['topup']['bonus_item'][8][0]['item_id'] = 8100;
    $_CONFIG['topup']['bonus_item'][8][0]['count'] = 9;
    $_CONFIG['topup']['bonus_item'][8][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][8][1]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][8][1]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][8][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][8][2]['item_id'] = 8046;
    $_CONFIG['topup']['bonus_item'][8][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][8][2]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][8][3]['item_id'] = 23623;
    $_CONFIG['topup']['bonus_item'][8][3]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][8][3]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][8][4]['item_id'] = 25867;
    $_CONFIG['topup']['bonus_item'][8][4]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][8][4]['item_name'] = '';
    # SEGAL / CASH 5000
    $_CONFIG['topup']['bonus_segal'][8] = 0;
    $_CONFIG['topup']['bonus_cash'][8] = 0;
    $_CONFIG['topup']['bonus_img'][8] = '/views/assets/images/promotion/pro10000_1.png';

    # ITEM ชิ้นที่ 1 สำหรับ 6000
    $_CONFIG['topup']['bonus_item'][9][0]['item_id'] = 26977;
    $_CONFIG['topup']['bonus_item'][9][0]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][9][0]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][9][1]['item_id'] = 26978;
    $_CONFIG['topup']['bonus_item'][9][1]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][9][1]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][9][2]['item_id'] = 26979;
    $_CONFIG['topup']['bonus_item'][9][2]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][9][2]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][9][3]['item_id'] = 26980;
    $_CONFIG['topup']['bonus_item'][9][3]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][9][3]['item_name'] = '';
    $_CONFIG['topup']['bonus_item'][9][4]['item_id'] = 23631;
    $_CONFIG['topup']['bonus_item'][9][4]['count'] = 0;
    $_CONFIG['topup']['bonus_item'][9][4]['item_name'] = '';
    # SEGAL / CASH 6000
    $_CONFIG['topup']['bonus_segal'][9] = 0;
    $_CONFIG['topup']['bonus_cash'][9] = 0;
    $_CONFIG['topup']['bonus_img'][9] = '/views/assets/images/promotion/pro10000_1.png';

    //---------------------------------------------------------------//
    //----------------------------- [ ห้ามยุ่ง ] -----------------------//
    return $_CONFIG;
    //----------------------------- [ ห้ามยุ่ง ] -----------------------//
    //---------------------------------------------------------------//
?>