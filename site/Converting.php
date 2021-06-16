<?php
  function convertDoc($url, $data = false)
  {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_POST, 1);
    if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
  }

  $API_URL    = "http://mdpdfizer_api_1";
  $jsonResult = json_decode(
    convertDoc($API_URL,
      array(
        "mdSource"=>$_POST['mdSource'],
        "mdType"=>$_POST['mdType'],
        "outType"=>$_POST['outType']
    ))
  );
  echo $jsonResult;
#  header("Location: " . $response->);
#  die();
?>