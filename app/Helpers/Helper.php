<?php
namespace App\Helpers;
	class Helper
	{
		public static function Numberformat($price)
		{
			return number_format($price, 0, '', ',') . ' VNĐ ';
		}
	}