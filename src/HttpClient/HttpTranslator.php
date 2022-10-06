<?php
namespace notesow\translatorAPI\Http;

use notesow\translatorAPI\translatorAPI;

class HttpTranslator {
    private $httpclient = null;
    private $language = array();

    public function __construct()
    {
        $this->httpclient = curl_init();    
    }

    public function source($source){
        $this->language['source'] = $source;
        return $this;
    }

    public function target($target){
        $this->language['target'] = $target;
        return $this;
    }

    public function requestTranslation($text){
        if(!is_null($this->httpclient)){
            $fields = array(
                'sl' => urlencode($this->language['source']),
                'tl' => urlencode($this->language['target']),
                'q' => urlencode($text)
            );

            $query = http_build_query($fields);

            curl_setopt($this->httpclient, CURLOPT_URL, translatorAPI::$BASE_URL);
            curl_setopt($this->httpclient, CURLOPT_POST, count($fields));
            curl_setopt($this->httpclient, CURLOPT_POSTFIELDS, $query);
            curl_setopt($this->httpclient, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->httpclient, CURLOPT_ENCODING, 'UTF-8');
            curl_setopt($this->httpclient, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->httpclient, CURLOPT_SSL_VERIFYHOST, false);

            $response = curl_exec($this->httpclient);

            curl_close($this->httpclient);

            return $this->Detach($response);
        } else {
            return false;
        }
    }

    protected function Detach($json)
    {
        $sentencesArray = json_decode($json, true);
        $sentences = "";

        if (!$sentencesArray || !isset($sentencesArray[0]))
            throw new \notesow\translatorAPI\Exceptions\Handler('Google detected unusual traffic from your computer network, try again later (2 - 48 hours)');

        foreach ($sentencesArray[0] as $s) {
            $sentences .= isset($s[0]) ? $s[0] : '';
        }

        return $sentences;
    }

    private function reset(){

    }
}