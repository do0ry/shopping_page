<?php
namespace Platform\Contracts;


Interface CookieContract
{
    /**
     * TO CREATE OR FIND COOKIE FOR SPECIFIC COOKIE NAME
     * @return object
     */
    public static function getFromCookieOrCreate();

    /**
     * TO FIND COOKIE BY ITS KEY
     * @return object
     */
    public static function getFromCookie();

    /**
     * TO MAKE A COOKIE AND INITIALIZE NAME AND VALUE
     * @param $id
     * @return object
     */
    public static function makeCookie($id);

}
