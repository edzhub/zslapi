<?php

namespace Edzhub\Zslapi;

use Illuminate\Support\Facades\Http;

class ZslApi
{
    private const DEFAULT_URL = 'https://content.zerosciencelab.com/api/';
    private const GET_CLASSES = 'Classes/get';
    private const GET_SUBJECTS = 'Classes/get_subjects';
    private const GET_CHAPTERS = 'Chapter/get';
    private const GET_LINK = 'Link/get';
    private const CREATE_USER = 'Create/User';
    private const GET_CLASS_LINKS = 'Classes/getLinks';

    /**
     * @return array|mixed
     */
    public static function getClasses()
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CLASSES);
        return $response->json();
    }

    /**
     * @param $class
     * @return array|mixed
     */
    public static function getSubjects($class)
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_SUBJECTS, ['class' => $class]);
        return $response->json();
    }

    /**
     * @param $class
     * @param $subject
     * @return array|mixed
     */
    public static function getChapters($class, $subject)
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CHAPTERS, ['class' => $class, 'subject' => $subject]);
        return $response->json();
    }

    /**
     * @param null $identifier
     * @return array|mixed
     */
    public static function createUser($identifier = null)
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::CREATE_USER, ['identifier' => $identifier]);
        return $response->json();
    }

    /**
     * @param $chapter
     * @param $link
     * @param $token
     * @return array|mixed
     */
    public static function getLink($chapter, $link, $token)
    {
        $response = Http::withToken($token)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_LINK, ['chapter' => $chapter, 'link' => $link]);
        return $response->json();
    }

    public static function getClassLinks($class, $token = null)
    {
        $httpToken = $token ?? \config('zslapi.MANAGER_TOKEN');
        $response = Http::withToken($httpToken)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CLASS_LINKS, ['class' => $class]);
        return $response->json();
    }

}