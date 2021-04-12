<?php

namespace Flex\Utilities;

class Response
{

  /**
   * send a json formed response with data.
   * @param int $status the status name.
   * @param mixed $data the data to send.
   */
  public static function json(int $status, array $data = ["message" => "No Message!"])
  {
    http_response_code($status);
    header("Content-Type: application/json");
    echo json_encode($data);
  }


  /**
   * send a not authorized response to client browser.
   * @param string $message the message to send.
   */
  public static function notAuthorized(String $message = null)
  {
    http_response_code(401);
    header("Content-Type: application/json");
    $default = "You don't have permissions to perform this action.";

    echo json_encode([
      "status" => "401 Unauthorized",
      "info" => is_null($message) ? $default : $message,
    ]);
  }


  /**
   * send a server failure response to client browser.
   * @param string $message the message to send.
   */
  public static function serverFailure(String $message)
  {
    http_response_code(500);
    header("Content-Type: application/json");
    echo json_encode(["status" => "500 Internal Server Error", "info" => $message]);
  }


  /**
   * send a regular error message in the event of action failure. (not related to server failure.)
   * @param string $message the message to send.
   */
  public static function error($message = null)
  {
    Response::json("error", [
      "info" => !is_null($message) ? $message : "Sorry, something went wrong!",
    ]);
  }


  /**
   * dump some data (bebugging use only!)
   * @param array $message the message to send.
   */
  public static function dump(array $message)
  {
    Response::json("debug", $message);
  }


  /**
   * Tweak the response content type as needed. (in the event of downoloads..etc.)
   */
  public static function ctype($type)
  {
    return header("Content-Type: {$type}");
  }
}
