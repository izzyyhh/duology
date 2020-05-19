<?php
/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

require "config.php";

define("RIOTAPIKEY", $apikey);

class RiotGamesAPI{

    private static $riotAPIKey = RIOTAPIKEY;
    public static $httpStatusCode = "";

    public static function summonerV4Request($summonername){
        /*
        "id": "GXadSYjHR-PFOJIMCMOCpzP7zJshQSLC_AEwKELP3S6zdLA",
        "accountId": "I8_0P-5lS05MK85qB0LySzoW5Gp9vzT1Wqj9EHjfx3LBFaQ",
        "puuid": "EJp-BeNfODqLh0-Vhr8r8SJnyQGANDmYsKYOjb5nwf-gCs-2Xus2uYnoU-oxkL1h65Mw3-2EVPf-lA",
        "name": "Shïrutensho",
        "profileIconId": 4244,
        "revisionDate": 1587819182000,
        "summonerLevel": 175
      */
        $reqUrl = "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/". urlencode($summonername) . "?api_key=" . self::$riotAPIKey;


        try{ 
        
        $handle = curl_init($reqUrl);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
        #data here already!!!!!!!!!!!!!!!
        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        self::$httpStatusCode = $httpCode;

        curl_close($handle);

          if($httpCode != 200){
            throw new Exception();
          }

          $respJson = file_get_contents($reqUrl);
          $respObj = json_decode($respJson);
          return $respObj;


        } catch(Exception $e) {
          #dont forget accounts with perma ban!!!
          return null;
        }

    }

    public static function LeagueV4Request($summonername){
      /*
      [
    {
        "leagueId": "ad4154d7-4ec0-4d20-893e-9385cc5c9260",
        "queueType": "RANKED_FLEX_SR",
        "tier": "BRONZE",
        "rank": "I",
        "summonerId": "GXadSYjHR-PFOJIMCMOCpzP7zJshQSLC_AEwKELP3S6zdLA",
        "summonerName": "Shïrutensho",
        "leaguePoints": 30,
        "wins": 11,
        "losses": 5,
        "veteran": false,
        "inactive": false,
        "freshBlood": false,
        "hotStreak": true
    },
    {
        "leagueId": "ababb792-0bb1-4e07-bd27-a39f5a402723",
        "queueType": "RANKED_SOLO_5x5",
        "tier": "GOLD",
        "rank": "I",
        "summonerId": "GXadSYjHR-PFOJIMCMOCpzP7zJshQSLC_AEwKELP3S6zdLA",
        "summonerName": "Shïrutensho",
        "leaguePoints": 18,
        "wins": 251,
        "losses": 237,
        "veteran": false,
        "inactive": false,
        "freshBlood": false,
        "hotStreak": false
    }
]
*/
    #dont forget exception handling
      $summonerId = self::summonerV4Request($summonername)->id;

      $reqUrl = "https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/" . urlencode($summonerId) . "?api_key=" . self::$riotAPIKey;

      $respJson = file_get_contents($reqUrl);
      $respArr = json_decode($respJson);

      return $respArr;

    }
}



?>
