<?php

namespace Flex\Utilities;

class Response
{

  /**
   * send a json formed response with data.
   * @param string $status the status name.
   * @param mixed $data the data to send.
   */
  public static function json(String $status, array $data = ["message" => "No Message!"])
  {
    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode(array_merge(["status" => $status], $data));
    exit();
  }


  /**
   * send a regular text formed response with data.
   * @param string $status the status name.
   * @param mixed $data the data to send.
   */
  public static function text(String $status, array $data = ["message" => "No Message!"])
  {
    header("Content-Type: text/html");
    http_response_code(200);
    echo json_encode(array_merge(["status" => $status], $data));
    exit();
  }


  /**
   * send a not found response to client browser.
   * @param string $message the message to send.
   */
  public static function notFound(String $message)
  {
    header("Content-Type: application/json");
    http_response_code(404);
    echo json_encode(["status" => "404 Not Found", "info" => $message]);
    exit();
  }


  /**
   * send a not authorized response to client browser.
   * @param string $message the message to send.
   */
  public static function notAuthorized(String $message = null)
  {
    header("Content-Type: application/json");
    http_response_code(401);
    $default = "You don't have permissions to perform this action.";
    echo json_encode([
      "status" => "401 Unauthorized",
      "info" => is_null($message) ? $default : $message,
    ]);
    exit();
  }


  /**
   * send a server failure response to client browser.
   * @param string $message the message to send.
   */
  public static function serverFailure(String $message)
  {
    header("Content-Type: application/json");
    http_response_code(500);
    echo json_encode(["status" => "500 Internal Server Error", "info" => $message]);
    exit();
  }


  /**
   * send a regular error message in the event of action failure. (not related to server failure.)
   * @param string $message the message to send.
   */
  public static function default_error($message = null)
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
