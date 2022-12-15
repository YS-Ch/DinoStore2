<?php
class PaymentCard
{
    public static $cards = array(
        'VISA' => array(
            'type' => 'VISA',
            'pattern' => '/^4/',
            'length' => array(13, 16),
            'cvcLength' => array(3),
            'luhn' => true,
        ),
        'MASTERCARD' => array(
            'type' => 'MASTERCARD',
            'pattern' => '/^(5[0-5]|2[2-7])/',
            'length' => array(16),
            'cvcLength' => array(3),
            'luhn' => true,
        ),
        'AMEX' => array(
            'type' => 'AMEX',
            'pattern' => '/^3[47]/',
            'format' => '/(\d{1,4})(\d{1,6})?(\d{1,5})?/',
            'length' => array(15),
            'cvcLength' => array(3, 4),
            'luhn' => true,
        ),
        'DINERSCLUB' => array(
            'type' => 'DINERSCLUB',
            'pattern' => '/^3[0689]/',
            'length' => array(14),
            'cvcLength' => array(3),
            'luhn' => true,
        ),
        'DISCOVER' => array(
            'type' => 'DISCOVER',
            'pattern' => '/^6([045]|22)/',
            'length' => array(16),
            'cvcLength' => array(3),
            'luhn' => true,
        ),
        'JCB' => array(
            'type' => 'JCB',
            'pattern' => '/^35/',
            'length' => array(16),
            'cvcLength' => array(3),
            'luhn' => true,
		),
    );
	public static function getCardImage($type) {
		$visa = "https://cdn3.iconfinder.com/data/icons/flat-icons-web/40/Visa-512.png";
		$discover = "https://cdn3.iconfinder.com/data/icons/flat-icons-web/40/Discover-512.png";
		$mastercard = "https://cdn3.iconfinder.com/data/icons/flat-icons-web/40/Mastercard-512.png";
		$amex = "https://cdn3.iconfinder.com/data/icons/flat-icons-web/40/Amex-512.png";
		$dinersclub = "https://img.icons8.com/color/480/diners-club.png";
		$jcb = "https://cdn.iconscout.com/icon/free/png-256/payment-jcb-card-transaction-bank-51332.png";
		$unknowncard = "https://cdn3.iconfinder.com/data/icons/firm/154/credit-card-512.png";
		
		if(strtoupper($type) == "VISA") {
			return $visa;
		}
		else if(strtoupper($type) == "DISCOVER") {
			return $discover;
		} 
		else if(strtoupper($type) == "MASTERCARD") { 
			return $mastercard;
		}
		else if(strtoupper($type) == "AMEX") {
			return $amex;
		}
		else if(strtoupper($type) == "DINERSCLUB") {
			return $dinersclub;
		}
		else if(strtoupper($type) == "JCB") {
			return $jcb;
		}
		else {
			return $unknowncard;
		}
	}

	public static function getCardImageTip($type) {
		$visaTip = "Visa Card";
		$discoverTip = "Discover Card";
		$mastercardTip = "Master Card";
		$amexTip = "American Express Card";
		$dinersTip = "Diners Club Card";
		$jcbTip = "JCB Card";
		$unknowncardTip = "Unknown Card";
		
		if(strtoupper($type) == "VISA") {
			return $visaTip;
		}
		else if(strtoupper($type) == "DISCOVER") {
			return $discoverTip;
		} 
		else if(strtoupper($type) == "MASTERCARD") { 
			return $mastercardTip;
		}
		else if(strtoupper($type) == "AMEX") {
			return $amexTip;
		}
		else if(strtoupper($type) == "DINERSCLUB") {
			return $dinersTip;
		}
		else if(strtoupper($type) == "JCB") {
			return $jcbTip;
		}
		else {
			return $unknowncardTip;
		}
	}
    public static function validCreditCard($number, $cvc, $type = null)
    {
        $ret = array(
            'valid' => false,
            'number' => '',
			'cvc' => '',
            'type' => '',
        );

        // Strip non-numeric characters
        $number = preg_replace('/[^0-9]/', '', $number);

        if (empty($type)) {
            $type = self::creditCardType($number);
        }

        if (array_key_exists($type, self::$cards) && self::validCard($number, $cvc, $type)) {
            return array(
                'valid' => true,
                'number' => $number,
				'cvc' => $cvc,
                'type' => $type,
            );
        }

        return $ret;
    }

    public static function validCard($number, $cvc, $type)
    {
        return (self::validPattern($number, $type) && self::validLength($number, $type) && self::validLuhn($number, $type) && self::validCvc($cvc, $type));
    }

	public static function validCvc($cvc, $type)
    {
        return (ctype_digit($cvc) && array_key_exists($type, self::$cards) && self::validCvcLength($cvc, $type));
    }

    public static function validDate($year, $month)
    {
        $month = str_pad($month, 2, '0', STR_PAD_LEFT);

        if (! preg_match('/^20\d\d$/', $year)) {
            return false;
        }

        if (! preg_match('/^(0[1-9]|1[0-2])$/', $month)) {
            return false;
        }

        // past date
        if ($year < date('Y') || $year == date('Y') && $month < date('m')) {
            return false;
        }

        return true;
    }

    public static function creditCardType($number)
    {
        foreach (self::$cards as $type => $card) {
            if (preg_match($card['pattern'], $number)) {
                return $type;
            }
        }

        return '';
    }

    public static function validPattern($number, $type)
    {
        return preg_match(self::$cards[$type]['pattern'], $number);
    }

    public static function validLength($number, $type)
    {
        foreach (self::$cards[$type]['length'] as $length) {
            if (strlen($number) == $length) {
                return true;
            }
        }

        return false;
    }

    public static function validCvcLength($cvc, $type)
    {
        foreach (self::$cards[$type]['cvcLength'] as $length) {
            if (strlen($cvc) == $length) {
                return true;
            }
        }

        return false;
    }

    public static function validLuhn($number, $type)
    {
        if (! self::$cards[$type]['luhn']) {
            return true;
        } else {
            return self::luhnCheck($number);
        }
    }

    public static function luhnCheck($number)
    {
        $checksum = 0;
        for ($i=(2-(strlen($number) % 2)); $i<=strlen($number); $i+=2) {
            $checksum += (int) ($number{$i-1});
        }

        // Analyze odd digits in even length strings or even digits in odd length strings.
        for ($i=(strlen($number)% 2) + 1; $i<strlen($number); $i+=2) {
            $digit = (int) ($number{$i-1}) * 2;
            if ($digit < 10) {
                $checksum += $digit;
            } else {
                $checksum += ($digit-9);
            }
        }

        if (($checksum % 10) == 0) {
            return true;
        } else {
            return false;
        }
    }
}