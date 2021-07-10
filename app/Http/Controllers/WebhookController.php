<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\UsersPhoneNumbers;

class WebhookController extends Controller
{

    public function parseMessage($message, $sender)
    {
        //process the first word and call appropriate function

        //if not a keyword, tell sender to subscribe by setting $message and calling sendResponse

    }

    //sends dynamic XML response using TwiML
    private function sendResponse($response, $sender)
    {
        //be sure to send inital xml tag
    }

    //subscribes user
    private function subscribe($sender)
    {
        //check if number is in db and store number to db if needed. send result by calling sendResponse
    }    

    //unsubscribes user
    private function unsubscribe($sender)
    {
        //have the Model check if number is in db and remove if so. send result by calling sendResponse
    }    

    //get the list of subcribers
    private function getSubscribers($sender)
    {
        //ask Model for an array of subscribers that are not the sender
        //return array of subscribers
    }

    //determines if sender is an admin
    private function isAdmin($sender)
    {
        //ask Model to lookup sender in the table and return the is_admin field.
    }

    //broadcasts a message from admin to the list
    private function broadcast($message, $sender)
    {
        //check if FROM is an admin
        if(is_admin($sender)
        {
            //chop off the initial 'broadcast'
            //get list of subscribers not including FROM. send message to each one and confirmation  message to FROM
        }
        else
        {
            //tell sender they cant broadcast
        }

    }

    //send message to one subscriber
    private function sendMessage($message, $recipient)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipient, ['from' => $twilio_number, 'body' => $message] );
        
    }
}
