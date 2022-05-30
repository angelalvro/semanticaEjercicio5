<?php

class TornadosSparql
{
    public $service_url = "http://156.35.98.114:3030/tornados/sparql";

    public function getTornados()
    {
        try {
            $ch = curl_init();

            // Check if initialization had gone wrong*
            if ($ch === false) {
                throw new Exception('failed to initialize');
            }

            $query = "SELECT?subject?predicate?object?WHERE{?subject?predicate?object}";
            $url = $this->service_url."?query=".$query;
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

            $content = curl_exec($ch);

            // Check the return value of curl_exec(), too
            if ($content === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }

            // Check HTTP return code, too; might be something else than 200
            $httpReturnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            /* Process $content here */

        } catch(Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);

        } finally {
            // Close curl handle unless it failed to initialize
            if (is_resource($ch)) {
                $response = curl_exec($ch);
            }
        }

        return json_decode($response);

    }
}

?>
