# phpHttp

## Examples
Get Request Example:
	
    <?php 
		require_once 'HttpClient.php';
		$http = new PhpHttpClient("https://api.twitter.com/2/users/by/username/");
		$result = $http->Get("AydinCanAltun", [
			"Accept: application/json",
			"Authorization: Bearer "
		]);
		var_dump($result->GetResponse());
	?>
Post Request Example:

    <?php 
		require_once 'HttpClient.php';
		$http = new PhpHttpClient("https://phpHttp.aydincanaltun.com/");
		$result = $http->Post("post.php", [
			"Accept: application/json",
			"Authorization: Bearer "
		], [
			'username' => "1",
			'password' => "1"
		]);
		var_dump($result->GetResponse());
	?>
    

