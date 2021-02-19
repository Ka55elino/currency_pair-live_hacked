<?php 
 /**
  * 
  */
 class ShubCommodity
 {
 	 function __construct()
 	{
 		self::getJSON();
 	}

 	private static $url = "https://www.quandl.com/api/v3/datasets/{{param}}.json?start_date={{prev_day}}&end_date={{cur_day}}&api_key=".self::API_KEY;
 	
 	private const API_KEY = '7_yvBnuMKw2M-b4iVvdN';

 	public static $source =[
 		'Gold, London A.M. Fixing' => [
 			'source' => 'LBMA',
 			'param' => 'LBMA/GOLD',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/gold-bars.png"/>'
 		],
 		/*'Gold, World Gold Council' => [
 			'source' => 'WGC',
 			'param' => 'WGC/GOLD_DAILY_USD',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/gold-bars.png"/>'
 		],
 		'Gold, Bundesbank' =>[
 			'source' => 'BUNDESBANK',
 			'param' => 'BUNDESBANK/BBK01_WT5511',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/gold-bars.png"/>'
 		],*/
 		'Silver, London fixing, USD equivalent' => [
 			'source' => 'LBMA',
 			'param' => 'LBMA/SILVER',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/silver-bars.png"/>'
 		],
 		/*'Silver, Shanghai Silver Futures' => [
 			'source' => 'SHFE',
 			'param' => 'SHFE/AGV2013',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/silver-bars.png"/>'
 		],
 		'Silver, COMEX Silver Futures' => [
 			'source' => 'COMEX',
 			'param' => 'CHRIS/CME_SI1',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/silver-bars.png"/>'
 		],*/
 		'Platinum, Johnson Mathey London' => [
 			'source' => 'JOHNMATT',
 			'param' => 'JOHNMATT/PLAT',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/steel-bars.png"/>'
 		],/*
 		'Platinum, NYMEX Platinum Futures' => [
 			'source' => 'NYMEX',
 			'param' => 'CHRIS/CME_PL1',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/steel-bars.png"/>'
 		],
 		'Palladium, Johnson Mathey London' => [
 			'source' => 'JOHNMATT',
 			'param' => 'JOHNMATT/PALL',
 			'img' => '<img src="https://img.icons8.com/color/48/000000/steel-bars.png"/>'
 		],*/
 		'NYMEX RBOB Gasoline Futures' => [
 			'source' => 'NYMEX',
 			'param' => 'CHRIS/CME_RB1',
 			'img' => '<img src="https://img.icons8.com/ios-filled/50/000000/gasoline-refill.png"/>'
 		],
 		/*'NYMEX Crude Oil Futures' => [
 			'source' => 'NYMEX',
 			'param' => 'CHRIS/CME_CL1',
 			'img' => '<img src="https://img.icons8.com/android/24/000000/oil-industry.png"/>'
 		],*/
 		'ICE Brent Crude Oil Futures' => [
 			'source' => 'ICE',
 			'param' => 'CHRIS/ICE_B1',
 			'img' => '<img src="https://img.icons8.com/android/24/000000/oil-industry.png"/>'
 		]
 	];
 	public static $JSON = [];

	public static function setApiUrl($param){
		$date = new DateTime();
		$url = self::$url;
		$url = str_replace("{{param}}", $param, $url);
		$url = str_replace("{{prev_day}}", $date->modify("-1 days")->format('Y-m-d'), $url);
		$url = str_replace("{{cur_day}}", $date->format('Y-m-d'), $url);
		return $url;
	}
 	public static function getJSON(){

 		foreach ( self::$source as $key => $value) {
 			$url = self::setApiUrl($value['param']);
 			$temp = self::execCurl($url);
			self::$JSON[$key] = json_decode($temp,true);
			self::$JSON[$key]['datainfo'] = $value;
 		}
 	}
 		public static function execCurl($url,$ip = '64.18.0.0'){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36');
		/*curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'ORIGIN: '.$_SERVER['HOSTNAME'].time(),
		    "REMOTE_ADDR: $ip", 
		    "HTTP_X_FORWARDED_FOR: $ip",
		   	"CLIENT-IP: $ip",
			"X-FORWARDED-FOR: $ip",
		));*/
		$temp = curl_exec($ch);

		curl_close ($ch);

		return $temp;
	}
	public static function getRows(){
		$content = '';
		$data = self::$JSON;

		$USD_AM = 1;
		$USD_PM = 2;
		$GBP_AM = 3;
		$GBP_PM = 4;
		$EUR_AM = 5;
		$EUR_PM = 6;

		foreach ($data as $key => $value) {
			$content .= '<tr>
							<td>'.$value["datainfo"]["img"].'</td>
							<td>'.$key.'</td>
							<td>'.$value["dataset"]["data"][0][$USD_AM].'</td>
							<td>'.$value["dataset"]["data"][0][$USD_PM].'</td>
							<td>'.$value["dataset"]["data"][0][$GBP_AM].'</td>
							<td>'.$value["dataset"]["data"][0][$GBP_PM].'</td>
							<td>'.$value["dataset"]["data"][0][$EUR_AM].'</td>
							<td>'.$value["dataset"]["data"][0][$EUR_PM].'</td>
							<td>'.$value["datainfo"]["source"].'</td>
							<td>'.$value["dataset"]["refreshed_at"].'</td>
						</tr>';
		}
		return $content; 
	}
	public function print(){
		$rows = self::getRows();
		echo '<table>
				<thaed>
					<tr>
						<td colspan="2">Name</td>
						<td>USD(AM)</td>
						<td>USD(PM)</td>
						<td>GBP(AM)</td>
						<td>GBP(PM)</td>
						<td>EUR(AM)</td>
						<td>EUR(PM)</td>
						<td>Source</td>
						<td>Refreshed</td>
					</tr>
				</thead>
				<tbody>
					'.$rows.'
				</tbody>
			</table>';
	}

 }
?>
