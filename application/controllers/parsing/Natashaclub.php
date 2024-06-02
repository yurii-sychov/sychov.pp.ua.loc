<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Natashaclub extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		include('./assets/lib/simplehtmldom/simple_html_dom.php');
		
		// Массив для сбора данных
		$data = [];

		$count_page = 1;
		for ($i=1; $i<=$count_page; $i++) {
		$url = 'https://www.natashaclub.com/search_result.php?p_per_page=10&photos_only=on&Sex=male&LookingFor=female&DateOfBirth_start=1&DateOfBirth_end=200&CityST=0&City=&&page='.$i;
		$html = str_get_html($this->get_curl($url));
		
		// $html = file_get_html('https://www.natashaclub.com/search_result.php?Language=Russian&p_per_page=10&photos_only=on&Sex=male&LookingFor=female&DateOfBirth_start=1&DateOfBirth_end=200&CityST=0&City=&&page='.$i);

			$links = $html->find('.SearchRowTable .thumb_search a');

			$this->db->truncate('parsing');
			foreach($links as $element) {
				$url_anketa = 'https://www.natashaclub.com/'.$element->href;

				$html_anketa = preg_replace('~[\x{10000}-\x{10FFFF}]~u', '', $this->get_curl($url_anketa));
				$html_anketa = str_get_html($html_anketa);

				// Сохраняем в базе данных html код анкет
				$this->db->set('donor', 'natashaclub');
				$this->db->set('html', $html_anketa);
				$this->db->insert('parsing');
				$id = $this->db->insert_id();

				// Получаем из базы данных html код анкет для парсинга
				$html_anketa = str_get_html($this->db->select('html')->where('id', $id)->get('parsing')->row('html'));

				$anketa['url_anketa'] = $url_anketa;
				$anketa['id'] = trim(explode(':', $html_anketa->find('.GreenText + ul + ul > li', 0)->innertext)[1]);
				$anketa['site_name'] = trim(explode(':', $html_anketa->find('#GuaranteeDiv span', 0)->innertext)[0]);
				$anketa['nick_name'] = trim($html_anketa->find('.GreenText', 0)->innertext);
				$anketa['age'] = trim(substr($html_anketa->find('.GreenText + ul > li', 0)->innertext, 0, 2));
				$anketa['zodiac'] = trim(explode(':', explode(',', $html_anketa->find('.GreenText + ul > li', 0)->innertext)[1])[1]);
				$anketa['city'] = trim(explode(',', $html_anketa->find('.GreenText + ul > li', 1)->innertext)[0]);
				$anketa['country'] = trim(explode(',', $html_anketa->find('.GreenText + ul > li', 1)->innertext)[1]);
				$anketa['employment'] = $html_anketa->find('.GreenText + ul > li', 3)->innertext;
				$language = explode(',', $html_anketa->find('.GreenText + ul > li', 2)->innertext);
				foreach ($language as $key => $value) $language[$key] = trim($value);
				$anketa['language'] = $language;
				$anketa['children'] = $html_anketa->find('.GreenText + ul > li', 4)->innertext;

				$anketa['sex'] = trim($html_anketa->find('.profile_table tr td', 3)->innertext);
				$anketa['children_1'] = trim($html_anketa->find('.profile_table tr td', 5)->innertext);
				$anketa['want_children'] = trim($html_anketa->find('.profile_table tr td', 7)->innertext);
				$anketa['height'] = trim($html_anketa->find('.profile_table tr td', 9)->innertext);
				$anketa['body_type'] = trim($html_anketa->find('.profile_table tr td', 11)->innertext);
				$anketa['ethnicity'] = trim($html_anketa->find('.profile_table tr td', 13)->innertext);
				$anketa['religion'] = trim($html_anketa->find('.profile_table tr td', 15)->innertext);
				$anketa['marital_status'] = trim($html_anketa->find('.profile_table tr td', 17)->innertext);
				$anketa['education'] = trim($html_anketa->find('.profile_table tr td', 19)->innertext);
				$anketa['income'] = trim($html_anketa->find('.profile_table tr td', 21)->innertext);
				$anketa['smoker'] = trim($html_anketa->find('.profile_table tr td', 23)->innertext);
				$anketa['drinker'] = trim($html_anketa->find('.profile_table tr td', 25)->innertext);

				$anketa['looking_for'] = trim($html_anketa->find('.profile_table tr td', 28)->innertext);
				$anketa['looking_age'] = trim($html_anketa->find('.profile_table tr td', 30)->innertext);
				$anketa['looking_height'] = trim($html_anketa->find('.profile_table tr td', 32)->innertext);
				$anketa['looking_body_type'] = trim($html_anketa->find('.profile_table tr td', 34)->innertext);
				$purpose = explode(',',  $html_anketa->find('.profile_table tr td', 36)->innertext);
				$anketa['purpose'] = $purpose;

				$anketa['about_me'] = trim($html_anketa->find('.profile_desc_text', 0)->innertext);
				$anketa['about_partner'] = trim($html_anketa->find('.profile_desc_text', 1)->innertext);

				array_push($data, $anketa);

				break;
			}
		}
		echo '<pre style="margin: 20px 0 0 300px;">';
		print_r(count($data));
		echo "<br/>";
		print_r($data);
		echo '</pre>';
	}

	public function upload_data()
	{
		echo memory_get_usage();
		echo "<br>";
		$results = file_get_contents('./uploads/data_3000.json');
		// echo mb_strlen($results);
		echo "<br>";
		echo memory_get_usage();
		unset($results);
		echo "<br>";
		echo memory_get_usage();
		
// 		if (mb_strlen($results) > (memory_get_usage())) {
//     die ('Decoding this would exhaust the server memory. Sorry!');
// }
		// $results = json_decode($results);
		// $this->db->truncate('parsing');
		// print_r(count($results));

		// foreach ($results as $item) {
			// echo '<pre style="margin: 20px 0 0 300px">';
			// print_r($item->page_id);
			// print_r($item->page_link);
			// echo '</pre>';
			// break;
			// $this->db->insert('parsing', $item);
		// }
		

	}

	public function add_html()
	{
		ini_set('max_execution_time', '10000');
		ini_set('memory_limit', '2048M');
		ini_set('max_input_time', '3600');
		set_time_limit(0);
		ignore_user_abort(true);

		include('./assets/lib/simplehtmldom/simple_html_dom.php');

		// $this->db->truncate('parsing');

		$count_page = 1691;
	
		for ($i=148; $i<=$count_page; $i++) {
			$url = 'https://www.natashaclub.com/search_result.php?p_per_page=10&photos_only=on&Sex=male&LookingFor=female&DateOfBirth_start=1&DateOfBirth_end=200&CityST=0&City=&page='.$i;
			$html = str_get_html($this->get_curl($url));

			$links = $html->find('.SearchRowTable .thumb_search a');

			foreach($links as $element) {
				$url_anketa = 'https://www.natashaclub.com/'.$element->href;

				$html_anketa = preg_replace('~[\x{10000}-\x{10FFFF}]~u', '', $this->get_curl($url_anketa));
				$html_anketa = str_get_html($html_anketa);

				if ($html_anketa) {
					$page_id = $html_anketa->find('.GreenText + ul + ul > li', 0) ? trim(explode(':', $html_anketa->find('.GreenText + ul + ul > li', 0)->innertext)[1]) : NULL;

					$html = $this->db->select('page_id')->where('page_id', $page_id)->get('parsing')->row();

					// Сохраняем в базе данных html код анкет
					if ($page_id) {
						$this->db->set('page_link', $url_anketa);
						$this->db->set('page_id', $page_id);
						$this->db->set('donor', 'natashaclub');
						$this->db->set('html', $html_anketa);
						$this->db->insert('parsing');
						$id = $this->db->insert_id();
					}
				}
					

				// Получаем из базы данных html код анкет для парсинга
				// $html_anketas = $this->db->select('html')->where('id', $id)->get('parsing')->row('html');
				// break;
			}
			echo $i. ' десяток.'; echo "<br>";
		}
	}

	public function test()
	{
		// ini_set('max_execution_time', '10000');
		ini_set('memory_limit', '2048M');
		ini_set('max_input_time', '3600');
		set_time_limit(0);
		ignore_user_abort(true);
		echo phpinfo();
	}

	private function get_curl($url, $referer = 'https://google.com')
	{
		$user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)";
		$header [] = "Accept: text/html, application/xml;q=0.9, application/xhtml+xml, image/png, image/jpeg, image/gif, image/x-xbitmap, */*;q=0.1";
		$header [] = "Accept-Language: ru-RU,ru;q=0.9,en;q=0.8";
		$header [] = "Accept-Charset: Windows-1251, utf-8, *;q=0.1";
		$header [] = "Accept-Encoding: deflate, identity, *;q=0";
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_COOKIE, "testCookie=1; memberT=KAUA30n3k5GT3k0JcyfjXDf7n2sD4MXlXmaK21xNBopUErgQ; Language=Russian; cookie_notice=1");

		// curl_setopt($ch, CURLOPT_PROXY, '144.76.241.110');
		// curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);

		$html = curl_exec($ch);
		curl_close($ch);
		
		return $html;
	}

}