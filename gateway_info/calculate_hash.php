<?php 
function calculateHashDigest($stringtohash, $key, $hashmethod)
	{
		
		switch($hashmethod)
		{
			case "MD5":
				$hash = md5($stringtohash);
				break;
			case "SHA1":
            $hash = sha1($stringtohash);
				break;
			case "HMACMD5":
				$hash = hash_hmac("md5", $stringtohash, $key);
				break;
			case "HMACSHA1":
				$hash = hash_hmac("sha1", $stringtohash, $key);
				break;
		}
		return ($hash);
	}