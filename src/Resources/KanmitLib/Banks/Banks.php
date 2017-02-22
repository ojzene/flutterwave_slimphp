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
		"Access Bank" => 'ACC',
		"Citibank" => 'CIT',
		"Coronation Merchant Bank" => 'COR',
		"Diamond Bank" => 'DIA',
		"Dynamic Standard Bank" => 'DYN',
		"Ecobank Nigeria" => 'ECO',
		"FBN Merchant Bank Limited" => 'FMB',
		"Fidelity Bank Nigeria" => 'FID',
		"First Bank of Nigeria" => 'FBN',
		"First City Monument Bank" => 'FCM',
		"FSDH Merchant Bank" => 'FSD',
		"Guaranty Trust Bank" => 'GTB',
		"Heritage Bank Plc" => 'HER',
		"Jaiz Bank" => 'JAI',
		"Keystone Bank Limited" => 'KEY',
		"Providus Bank Plc" => 'PRO',
		"Rand Merchant Bank" => 'RAN',
		"Skye Bank - Acquired Mainstreet Bank Limited" => 'SKY',
		"Stanbic IBTC Bank Nigeria Limited" => 'STB',
		"Standard Chartered Bank" => 'SCB',
		"Sterling Bank - Acquired Equitorial Trust Bank" => 'STE',
		"Suntrust Bank Nigeria Limited" => 'SUN',
		"Union Bank of Nigeria" => 'UBN',
		"United Bank for Africa" => 'UBA',
		"Unity Bank Plc" => 'UNI',
		"Wema Bank" => 'WEM',
		"Zenith Bank" => 'ZEN',
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
