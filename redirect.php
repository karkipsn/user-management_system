<?php

class Redirect{

 public function redirect($url)
	{
		header("Location: $url");
	}

}
	?>