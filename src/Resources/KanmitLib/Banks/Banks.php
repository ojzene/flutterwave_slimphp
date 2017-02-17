<?php
/**
 * KanmitLib Banks
 * 
 * @license http://www.kanmittechnologies.com
 * @copyright 2016 Oyekanmi Owolabi
 */

namespace App\Resources\KanmitLib\Banks;

/**
 * Banks
 * 
 * Bank is my Nigerian Standard for bank codes and codes for their subdivisions. The purpose of Bank is to get recognised codes for the representation of names of banks, branches
 *
 */
class Banks
{
	/**
     * List of country codes by name
     * 
     * @var array
     */
	protected static $list = [
        "Access Bank" => '',
		"Citibank" => '',
		"Coronation Merchant Bank" => '',
		"Diamond Bank" => '',
		"Dynamic Standard Bank" => '',
		"Ecobank Nigeria" => '',
		"FBN Merchant Bank Limited" => '',
		"Fidelity Bank Nigeria" => '',
		"First Bank of Nigeria" => '',
		"First City Monument Bank" => '',
		"FSDH Merchant Bank" => '',
		"Guaranty Trust Bank" => '',
		"Heritage Bank Plc" => '',
		"Jaiz Bank" => '',
		"Keystone Bank Limited" => '',
		"Providus Bank Plc" => '',
		"Rand Merchant Bank" => '',
		"Skye Bank - Acquired Mainstreet Bank Limited" => '',
		"Stanbic IBTC Bank Nigeria Limited" => '',
		"Standard Chartered Bank" => '',
		"Sterling Bank - Acquired Equitorial Trust Bank" => '',
		"Suntrust Bank Nigeria Limited" => '',
		"Union Bank of Nigeria" => '',
		"United Bank for Africa" => '',
		"Unity Bank Plc" => '',
		"Wema Bank" => '',
		"Zenith Bank" => '',
    ];

/* 
    "214": "FIRST CITY MONUMENT BANK PLC",
    "215": "UNITY BANK PLC",
    "221": "STANBIC IBTC BANK PLC",
    "232": "STERLING BANK PLC",
    "304": "Stanbic Mobile",
    "305": "PAYCOM",
    "307": "Ecobank Mobile",
    "309": "FBN MOBILE",
    "311": "Parkway",
    "315": "GTBank Mobile Money",
    "322": "ZENITH Mobile",
    "323": "ACCESS MOBILE",
    "401": "Aso Savings and Loans",
    "044": "ACCESS BANK NIGERIA",
    "014": "AFRIBANK NIGERIA PLC",
    "063": "DIAMOND BANK PLC",
    "050": "ECOBANK NIGERIA PLC",
    "084": "ENTERPRISE BANK LIMITED",
    "070": "FIDELITY BANK PLC",
    "011": "FIRST BANK PLC",
    "058": "GTBANK PLC",
    "030": "HERITAGE BANK",
    "082": "KEYSTONE BANK PLC",
    "076": "SKYE BANK PLC",
    "068": "STANDARD CHARTERED BANK NIGERIA LIMITED",
    "032": "UNION BANK OF NIGERIA PLC",
    "033": "UNITED BANK FOR AFRICA PLC",
    "035": "WEMA BANK PLC",
    "057": "ZENITH BANK PLC" 
*/

    /**
     * Get bank code
     * 
     * @param string $bank
     * @return string
     */
    protected static function bankCode($bank)
    {
        $bank = (string)$bank;
        if (strlen($bank) != 2) $bank = static::getCode($bank);
        
        return $bank;
    }

    /**
     * Get list of banks
     * 
     * @return array
     */
    public static function getList()
    {
        return array_flip(array_unique(static::$list));
    }
    
    /**
     * Get bank name by code
     * 
     * @param string $code  Bank code or name
     * @return string
     */
    public static function getName($code)
    {
        return array_search(static::bankCode($code), static::$list) ?: null;
    }
    
    /**
     * Get bank code by name
     * 
     * @param string $code
     * @return string
     */
    public static function getCode($code)
    {
        return isset(static::$list[$code]) ? static::$list[$code] : null;
    }
}